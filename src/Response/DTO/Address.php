<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Response\DTO;

use Webmozart\Assert\Assert;

readonly class Address
{
    public function __construct(
        public string $street,
        public string $zipCode,
        public string $city,
        public string $phones,
        public string $email,
        public string $fax,
    ) {
    }

    public static function fromArray(array $parcelShopArray): self
    {
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_ADDRESS');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_ZIPCODE');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_CITY');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_PHONES');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_EMAIL');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_FAX');

        return new self(
            $parcelShopArray['ACS_SHOP_ADDRESS'],
            $parcelShopArray['ACS_SHOP_ZIPCODE'],
            $parcelShopArray['ACS_SHOP_CITY'],
            $parcelShopArray['ACS_SHOP_PHONES'],
            $parcelShopArray['ACS_SHOP_EMAIL'],
            $parcelShopArray['ACS_SHOP_FAX']
        );
    }
}
