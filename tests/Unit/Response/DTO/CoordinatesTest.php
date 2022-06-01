<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Tests\Unit\Response\DTO;

use Answear\AcsBundle\Response\DTO\Coordinates;
use Answear\AcsBundle\Tests\Unit\Response\StationsResponseTrait;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\InvalidArgumentException;

class CoordinatesTest extends TestCase
{
    use StationsResponseTrait;

    /**
     * @test
     */
    public function correctlyReturnsCoordinates(): void
    {
        $coordinates = Coordinates::fromArray($this->getCorrectResponseItemArray());

        self::assertEquals(
            $this->getCorrectCoordinates(),
            $coordinates
        );
    }

    /**
     * @test
     */
    public function throwsErrorWhenDataNotComplete(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected the key "ACS_SHOP_LAT');
        Coordinates::fromArray($this->getResponseItemArrayWithoutAddressAndLatitude());
    }
}
