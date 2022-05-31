<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Tests\Unit\Service;

use Answear\AcsBundle\ConfigProvider;
use Answear\AcsBundle\Enum\CountryIdEnum;
use Answear\AcsBundle\Exception\MalformedResponse;
use Answear\AcsBundle\Exception\ServiceUnavailable;
use Answear\AcsBundle\Request\StationsRequest;
use Answear\AcsBundle\Service\Client;
use Answear\AcsBundle\Tests\MockGuzzleTrait;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    use MockGuzzleTrait;

    private Client $client;
    private StationsRequest $stationsRequest;

    private const API_KEY = 'api-key';

    public function setUp(): void
    {
        parent::setUp();

        $configProvider = new ConfigProvider(
            self::API_KEY,
            'companyId',
            'companyPassword',
            'userId',
            'userPassword',
            'GR'
        );

        $this->client = new Client($configProvider, $this->setupGuzzleClient());
        $this->stationsRequest = new StationsRequest($configProvider->getBaseInputParameters(), CountryIdEnum::cyprus());
    }

    /**
     * @test
     */
    public function properResponse(): void
    {
        $this->guzzleHandler->append(new Response(200, [], '{"ACSExecution_HasError":false,"ACSExecutionErrorMessage":"","ACSOutputResponce":{"ACSTableOutput":{}}}'));

        $result = $this->client->request($this->stationsRequest);

        self::assertEquals(
            [
                'ACSTableOutput' => [],
            ],
            $result
        );
        self::assertCount(1, $this->clientHistory);
    }

    /**
     * @test
     */
    public function responseWithExecutionErrors(): void
    {
        $this->guzzleHandler->append(new Response(200, [], '{"ACSExecution_HasError":true,"ACSExecutionErrorMessage":"error message","ACSOutputResponce":""}'));

        $this->expectException(MalformedResponse::class);
        $this->expectExceptionMessage('error message');

        $this->client->request($this->stationsRequest);
    }

    /**
     * @test
     */
    public function responseWithoutOutputResponce(): void
    {
        $this->guzzleHandler->append(new Response(200, [], '{"ACSExecution_HasError":false,"ACSExecutionErrorMessage":""}'));

        $this->expectException(MalformedResponse::class);
        $this->expectExceptionMessage('Expected the key "ACSOutputResponce"');

        $this->client->request($this->stationsRequest);
    }

    /**
     * @test
     */
    public function responseWithoutExecutionErrorMessage(): void
    {
        $this->guzzleHandler->append(new Response(200, [], '{"ACSExecution_HasError":false}'));

        $this->expectException(MalformedResponse::class);
        $this->expectExceptionMessage('Expected the key "ACSExecutionErrorMessage"');

        $this->client->request($this->stationsRequest);
    }

    /**
     * @test
     */
    public function responseWithoutHasError(): void
    {
        $this->guzzleHandler->append(new Response(200, [], '{}'));

        $this->expectException(MalformedResponse::class);
        $this->expectExceptionMessage('Expected the key "ACSExecution_HasError"');

        $this->client->request($this->stationsRequest);
    }

    /**
     * @test
     */
    public function responseWithoutArray(): void
    {
        $this->guzzleHandler->append(new Response(200, [], '"result":[]'));

        $this->expectException(MalformedResponse::class);
        $this->expectExceptionMessage('Expected an array. Got: NULL');

        $this->client->request($this->stationsRequest);
    }

    /**
     * @test
     */
    public function serviceUnavailable(): void
    {
        $this->guzzleHandler->append(new Response(500, [], '{}'));

        $this->expectException(ServiceUnavailable::class);

        $this->client->request($this->stationsRequest);
    }
}
