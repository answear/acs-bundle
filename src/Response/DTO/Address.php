<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Response\DTO;

use Webmozart\Assert\Assert;

class Address
{
    private string $street;
    private string $zipCode;
    private string $city;
    private string $phones;
    private string $email;
    private string $fax;

    public function __construct(
        string $street,
        string $zipCode,
        string $city,
        string $phones,
        string $email,
        string $fax
    ) {
        $this->street = $street;
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->phones = $phones;
        $this->email = $email;
        $this->fax = $fax;
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

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function getPhones(): ?string
    {
        return $this->phones;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
}
