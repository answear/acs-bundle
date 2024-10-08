<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Response\DTO;

use Webmozart\Assert\Assert;

class Coordinates
{
    public function __construct(
        public float $latitude,
        public float $longitude,
    ) {
        Assert::range($latitude, -90, 90);
        Assert::range($longitude, -180, 180);
    }

    public static function fromArray(array $parcelShopArray): self
    {
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_LAT');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_LONG');

        return new self((float) $parcelShopArray['ACS_SHOP_LAT'], (float) $parcelShopArray['ACS_SHOP_LONG']);
    }
}
