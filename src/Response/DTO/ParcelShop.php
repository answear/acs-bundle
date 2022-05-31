<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Response\DTO;

use Webmozart\Assert\Assert;

class ParcelShop
{
    private int $countryId;
    private string $countryDescription;
    private int $areaId;
    private string $areaDescription;
    private string $stationId;
    private string $stationIdEn;
    private string $stationDescription;
    private int $branchId;
    private string $workingHours;
    private string $workingHoursSaturday;
    private string $truckPickupHours;
    private string $truckPickupHoursSaturday;
    private string $deliveryStartHour;
    private int $coordinatesVerified;
    private int $kind;
    private string $services;
    private string $paymentTypes;
    private string $idCode;
    private string $smartpointKind;
    private string $workingHoursJson;
    private string $message;
    private Address $address;
    private Coordinates $coordinates;

    public function __construct(
        int $countryId,
        string $countryDescription,
        int $areaId,
        string $areaDescription,
        string $stationId,
        string $stationIdEn,
        string $stationDescription,
        int $branchId,
        string $workingHours,
        string $workingHoursSaturday,
        string $truckPickupHours,
        string $truckPickupHoursSaturday,
        string $deliveryStartHour,
        int $coordinatesVerified,
        int $kind,
        string $services,
        string $paymentTypes,
        string $idCode,
        string $smartpointKind,
        string $workingHoursJson,
        string $message,
        Address $address,
        Coordinates $coordinates
    ) {
        $this->countryId = $countryId;
        $this->countryDescription = $countryDescription;
        $this->areaId = $areaId;
        $this->areaDescription = $areaDescription;
        $this->stationId = $stationId;
        $this->stationIdEn = $stationIdEn;
        $this->stationDescription = $stationDescription;
        $this->branchId = $branchId;
        $this->workingHours = $workingHours;
        $this->workingHoursSaturday = $workingHoursSaturday;
        $this->truckPickupHours = $truckPickupHours;
        $this->truckPickupHoursSaturday = $truckPickupHoursSaturday;
        $this->deliveryStartHour = $deliveryStartHour;
        $this->coordinatesVerified = $coordinatesVerified;
        $this->kind = $kind;
        $this->services = $services;
        $this->paymentTypes = $paymentTypes;
        $this->idCode = $idCode;
        $this->smartpointKind = $smartpointKind;
        $this->workingHoursJson = $workingHoursJson;
        $this->message = $message;
        $this->address = $address;
        $this->coordinates = $coordinates;
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

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function getCountryDescription(): string
    {
        return $this->countryDescription;
    }

    public function getAreaId(): int
    {
        return $this->areaId;
    }

    public function getAreaDescription(): string
    {
        return $this->areaDescription;
    }

    public function getStationId(): string
    {
        return $this->stationId;
    }

    public function getStationIdEn(): string
    {
        return $this->stationIdEn;
    }

    public function getStationDescription(): string
    {
        return $this->stationDescription;
    }

    public function getBranchId(): int
    {
        return $this->branchId;
    }

    public function getWorkingHours(): string
    {
        return $this->workingHours;
    }

    public function getWorkingHoursSaturday(): string
    {
        return $this->workingHoursSaturday;
    }

    public function getTruckPickupHours(): string
    {
        return $this->truckPickupHours;
    }

    public function getTruckPickupHoursSaturday(): string
    {
        return $this->truckPickupHoursSaturday;
    }

    public function getDeliveryStartHour(): string
    {
        return $this->deliveryStartHour;
    }

    public function getCoordinatesVerified(): int
    {
        return $this->coordinatesVerified;
    }

    public function getKind(): int
    {
        return $this->kind;
    }

    public function getServices(): string
    {
        return $this->services;
    }

    public function getPaymentTypes(): string
    {
        return $this->paymentTypes;
    }

    public function getIdCode(): string
    {
        return $this->idCode;
    }

    public function getSmartpointKind(): string
    {
        return $this->smartpointKind;
    }

    public function getWorkingHoursJson(): string
    {
        return $this->workingHoursJson;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }
}
