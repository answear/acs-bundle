<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Tests\Unit;

use Answear\AcsBundle\ConfigProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ConfigProviderTest extends TestCase
{
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
    public function returnsCorrectRequestHeaders(): void
    {
        self::assertSame(
            [
                'AcsApiKey' => 'apiKey',
                'Content-Type' => 'application/json',
            ],
            $this->configProvider->getRequestHeaders()
        );
    }

    #[Test]
    public function returnCorrectBaseInputParameters(): void
    {
        self::assertEquals(
            [
                'Company_ID' => 'companyId',
                'Company_Password' => 'companyPassword',
                'User_ID' => 'userId',
                'User_Password' => 'userPassword',
                'language' => 'EN',
            ],
            $this->configProvider->getBaseInputParameters()->toArray()
        );
    }
}
