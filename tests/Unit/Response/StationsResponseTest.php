<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Tests\Unit\Response;

use Answear\AcsBundle\Exception\MalformedResponse;
use Answear\AcsBundle\Response\StationsResponse;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class StationsResponseTest extends TestCase
{
    use StationsResponseTrait;

    #[Test]
    public function correctlyReturnsStationsResponse(): void
    {
        $stationsResponse = StationsResponse::fromArray($this->getArrayForStationsResponse());

        self::assertEquals(
            new StationsResponse([$this->getCorrectParcelShop(), $this->getSecondCorrectParcelShop()]),
            $stationsResponse
        );
    }

    #[Test]
    public function throwsErrorWhenResponseWithoutACSTableOutput(): void
    {
        $this->expectException(MalformedResponse::class);
        $this->expectExceptionMessage('Expected the key "ACSTableOutput" to exist.');
        StationsResponse::fromArray([]);
    }

    #[Test]
    public function throwsErrorWhenResponseWithoutTableData(): void
    {
        $this->expectException(MalformedResponse::class);
        $this->expectExceptionMessage('Expected the key "Table_Data" to exist.');
        StationsResponse::fromArray(['ACSTableOutput' => []]);
    }

    #[Test]
    public function throwsErrorWhenResponseWithIncorrectItems(): void
    {
        $this->expectException(MalformedResponse::class);
        $this->expectExceptionMessage('Expected the key "ACS_SHOP_COUNTRY_ID');
        StationsResponse::fromArray(
            [
                'ACSTableOutput' => [
                    'Table_Data' => [
                        [
                            'a' => 1,
                        ],
                    ],
                ],
            ]
        );
    }
}
