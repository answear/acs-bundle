<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Tests\Integration\Service;

use Answear\AcsBundle\ConfigProvider;
use Answear\AcsBundle\Enum\CountryIdEnum;
use Answear\AcsBundle\Service\Client;
use Answear\AcsBundle\Service\ParcelShopsService;
use Answear\AcsBundle\Tests\MockGuzzleTrait;
use Answear\AcsBundle\Tests\Unit\Response\StationsResponseTrait;
use Answear\AcsBundle\Tests\Util\FileTestUtil;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ParcelShopsServiceTest extends TestCase
{
    use MockGuzzleTrait;
    use StationsResponseTrait;

    private Client $client;
    private ConfigProvider $configProvider;

    public function setUp(): void
    {
        parent::setUp();

        $this->configProvider = new ConfigProvider(
            'apiKey',
            'companyId',
            'companyPassword',
            'userId',
            'userPassword',
            'EN'
        );
    }

    #[Test]
    public function successfulGetParcelShop(): void
    {
        $this->client = $this->getClient();
        $service = $this->getService();

        $this->mockGuzzleResponse(
            new Response(200, [], FileTestUtil::getFileContents(__DIR__ . '/data/parcelShops.json'))
        );

        $result = $service->getList(CountryIdEnum::Cyprus);

        $this->assertEquals($this->getExpectedParcelShops(), $result);
    }

    private function getClient(): Client
    {
        return new Client($this->configProvider, $this->setupGuzzleClient());
    }

    private function getService(): ParcelShopsService
    {
        return new ParcelShopsService($this->client);
    }

    private function getExpectedParcelShops(): array
    {
        return [
            $this->getCorrectParcelShop(),
            $this->getSecondCorrectParcelShop(),
        ];
    }
}
