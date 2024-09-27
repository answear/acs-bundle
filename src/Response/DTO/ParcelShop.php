<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Response\DTO;

use Webmozart\Assert\Assert;

readonly class ParcelShop
{
    public function __construct(
        public int $countryId,
        public string $countryDescription,
        public int $areaId,
        public string $areaDescription,
        public string $stationId,
        public string $stationIdEn,
        public string $stationDescription,
        public int $branchId,
        public string $workingHours,
        public string $workingHoursSaturday,
        public string $truckPickupHours,
        public string $truckPickupHoursSaturday,
        public string $deliveryStartHour,
        public int $coordinatesVerified,
        public int $kind,
        public string $services,
        public string $paymentTypes,
        public string $idCode,
        public string $smartpointKind,
        public string $workingHoursJson,
        public string $message,
        public Address $address,
        public Coordinates $coordinates,
    ) {
    }

    public static function fromArray(array $parcelShopArray): self
    {
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_COUNTRY_ID');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_COUNTRY_DESCR');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_AREA_ID');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_AREA_DESCR');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_STATION_ID');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_STATION_ID_EN');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_STATION_DESCR');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_BRANCH_ID');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_WORKING_HOURS');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_WORKING_HOURS_SATURDAY');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_TRUCK_PICKUP_HOURS');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_TRUCK_PICKUP_HOURS_SATURDAY');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_DELIVERY_START_HOUR');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_COORDINATES_VERIFIED');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_KIND');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_SERVICES');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_PAYMENT_TYPES');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_ID_CODE');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_SMARTPOINT_KIND');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_WORKING_HOURS_JSON');
        Assert::keyExists($parcelShopArray, 'ACS_SHOP_MESSAGE');

        return new self(
            $parcelShopArray['ACS_SHOP_COUNTRY_ID'],
            $parcelShopArray['ACS_SHOP_COUNTRY_DESCR'],
            $parcelShopArray['ACS_SHOP_AREA_ID'],
            $parcelShopArray['ACS_SHOP_AREA_DESCR'],
            $parcelShopArray['ACS_SHOP_STATION_ID'],
            $parcelShopArray['ACS_SHOP_STATION_ID_EN'],
            $parcelShopArray['ACS_SHOP_STATION_DESCR'],
            $parcelShopArray['ACS_SHOP_BRANCH_ID'],
            $parcelShopArray['ACS_SHOP_WORKING_HOURS'],
            $parcelShopArray['ACS_SHOP_WORKING_HOURS_SATURDAY'],
            $parcelShopArray['ACS_SHOP_TRUCK_PICKUP_HOURS'],
            $parcelShopArray['ACS_SHOP_TRUCK_PICKUP_HOURS_SATURDAY'],
            $parcelShopArray['ACS_SHOP_DELIVERY_START_HOUR'],
            $parcelShopArray['ACS_SHOP_COORDINATES_VERIFIED'],
            $parcelShopArray['ACS_SHOP_KIND'],
            $parcelShopArray['ACS_SHOP_SERVICES'],
            $parcelShopArray['ACS_SHOP_PAYMENT_TYPES'],
            $parcelShopArray['ACS_SHOP_ID_CODE'],
            $parcelShopArray['ACS_SHOP_SMARTPOINT_KIND'],
            $parcelShopArray['ACS_SHOP_WORKING_HOURS_JSON'],
            $parcelShopArray['ACS_SHOP_MESSAGE'],
            Address::fromArray($parcelShopArray),
            Coordinates::fromArray($parcelShopArray)
        );
    }
}
