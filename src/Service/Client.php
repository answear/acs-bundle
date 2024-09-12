<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Service;

use Answear\AcsBundle\ConfigProvider;
use Answear\AcsBundle\Exception\MalformedResponse;
use Answear\AcsBundle\Exception\ServiceUnavailable;
use Answear\AcsBundle\Request\BaseInputParameters;
use Answear\AcsBundle\Request\Request;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Webmozart\Assert\Assert;

class Client
{
    private const CONNECTION_TIMEOUT = 10;
    private const TIMEOUT = 30;

    protected ConfigProvider $configProvider;
    protected ClientInterface $guzzle;

    public function __construct(ConfigProvider $configProvider, ?ClientInterface $client = null)
    {
        $this->configProvider = $configProvider;
        $this->guzzle = $client ?? new \GuzzleHttp\Client(['timeout' => self::TIMEOUT, 'connect_timeout' => self::CONNECTION_TIMEOUT]);
    }

    public function request(Request $request): array
    {
        try {
            $response = $this->guzzle->request(
                'POST',
                $this->configProvider->getUrl(),
                [
                    'headers' => $this->configProvider->getRequestHeaders(),
                    'body' => $request->toJson(),
                ]
            );
            $responseText = $this->getResponseText($response);
        } catch (GuzzleException $e) {
            throw new ServiceUnavailable($e->getMessage(), $e->getCode(), $e);
        }

        return $this->getResult($responseText);
    }

    public function getBaseInputParameters(): BaseInputParameters
    {
        return $this->configProvider->getBaseInputParameters();
    }

    private function getResponseText(ResponseInterface $response): string
    {
        if ($response->getBody()->isSeekable()) {
            $response->getBody()->rewind();
        }

        return $response->getBody()->getContents();
    }

    private function getResult(string $responseText): array
    {
        $decoded = \json_decode($responseText, true);

        try {
            Assert::isArray($decoded);
            Assert::keyExists($decoded, 'ACSExecution_HasError');
            Assert::keyExists($decoded, 'ACSExecutionErrorMessage');
            Assert::keyExists($decoded, 'ACSOutputResponce');
        } catch (\InvalidArgumentException $e) {
            throw new MalformedResponse($e->getMessage(), $decoded, $e);
        }

        if (true === $decoded['ACSExecution_HasError']) {
            throw new MalformedResponse($decoded['ACSExecutionErrorMessage'], $decoded);
        }

        return $decoded['ACSOutputResponce'];
    }
}
