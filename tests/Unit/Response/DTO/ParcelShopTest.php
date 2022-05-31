<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Tests\Unit\Response\DTO;

use Answear\AcsBundle\Response\DTO\Address;
use Answear\AcsBundle\Response\DTO\ParcelShop;
use Answear\AcsBundle\Tests\Unit\Response\StationsResponseTrait;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\InvalidArgumentException;

class ParcelShopTest extends TestCase
{
    use StationsResponseTrait;

    /**
     * @test
     */
    public function correctlyReturnsParcelShop(): void
    {
        $parcelShop = ParcelShop::fromArray($this->getCorrectResponseItemArray());

        self::assertEquals(
            $this->getCorrectParcelShop(),
            $parcelShop
        );
    }

    /**
     * @test
     */
    public function throwsErrorWhenDataNotComplete(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected the key "ACS_SHOP_ADDRESS" to exist.');
        Address::fromArray($this->getResponseItemArrayWithoutAddressAndLatitude());
    }
}
