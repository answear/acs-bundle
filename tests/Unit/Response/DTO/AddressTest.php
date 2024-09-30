<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Tests\Unit\Response\DTO;

use Answear\AcsBundle\Response\DTO\Address;
use Answear\AcsBundle\Tests\Unit\Response\StationsResponseTrait;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\InvalidArgumentException;

class AddressTest extends TestCase
{
    use StationsResponseTrait;

    #[Test]
    public function correctlyReturnsAddress(): void
    {
        $address = Address::fromArray($this->getCorrectResponseItemArray());

        self::assertEquals(
            $this->getCorrectAddress(),
            $address
        );
    }

    #[Test]
    public function throwsErrorWhenDataNotComplete(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected the key "ACS_SHOP_ADDRESS" to exist.');
        Address::fromArray($this->getResponseItemArrayWithoutAddressAndLatitude());
    }
}
