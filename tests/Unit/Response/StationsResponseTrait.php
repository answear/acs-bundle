<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Tests\Unit\Response;

use Answear\AcsBundle\Response\DTO\Address;
use Answear\AcsBundle\Response\DTO\Coordinates;
use Answear\AcsBundle\Response\DTO\ParcelShop;

trait StationsResponseTrait
{
    public function getCorrectResponseItemArray(): array
    {
        return [
            'ACS_SHOP_COUNTRY_ID' => 2,
            'ACS_SHOP_COUNTRY_DESCR' => 'country desc',
            'ACS_SHOP_AREA_ID' => 0,
            'ACS_SHOP_AREA_DESCR' => '',
            'ACS_SHOP_STATION_ID' => 'AB',
            'ACS_SHOP_STATION_ID_EN' => 'ABC',
            'ACS_SHOP_STATION_DESCR' => 'station desc',
            'ACS_SHOP_BRANCH_ID' => 1,
            'ACS_SHOP_ADDRESS' => 'address',
            'ACS_SHOP_ZIPCODE' => '1234',
            'ACS_SHOP_PHONES' => '123123123',
            'ACS_SHOP_FAX' => '123123124',
            'ACS_SHOP_WORKING_HOURS' => '07:45-19:00',
            'ACS_SHOP_WORKING_HOURS_SATURDAY' => '08:45-13:00',
            'ACS_SHOP_TRUCK_PICKUP_HOURS' => '',
            'ACS_SHOP_TRUCK_PICKUP_HOURS_SATURDAY' => '',
            'ACS_SHOP_LAT' => '34.00000000',
            'ACS_SHOP_LONG' => '33.00000000',
            'ACS_SHOP_DELIVERY_START_HOUR' => '',
            'ACS_SHOP_COORDINATES_VERIFIED' => 1,
            'ACS_SHOP_KIND' => 1,
            'ACS_SHOP_SERVICES' => 'services',
            'ACS_SHOP_EMAIL' => 'test@email.com',
            'ACS_SHOP_PAYMENT_TYPES' => 'types',
            'ACS_SHOP_ID_CODE' => '1234',
            'ACS_SHOP_CITY' => 'city',
            'ACS_SHOP_SMARTPOINT_KIND' => '',
            'ACS_SHOP_WORKING_HOURS_JSON' => '',
            'ACS_SHOP_MESSAGE' => 'message',
        ];
    }

    public function getSecondCorrectResponseItemArray(): array
    {
        return [
            'ACS_SHOP_COUNTRY_ID' => 2,
            'ACS_SHOP_COUNTRY_DESCR' => 'country desc',
            'ACS_SHOP_AREA_ID' => 1,
            'ACS_SHOP_AREA_DESCR' => '',
            'ACS_SHOP_STATION_ID' => 'BC',
            'ACS_SHOP_STATION_ID_EN' => 'BCD',
            'ACS_SHOP_STATION_DESCR' => 'station desc',
            'ACS_SHOP_BRANCH_ID' => 1,
            'ACS_SHOP_ADDRESS' => 'address',
            'ACS_SHOP_ZIPCODE' => '6789',
            'ACS_SHOP_PHONES' => '654654654',
            'ACS_SHOP_FAX' => '654654653',
            'ACS_SHOP_WORKING_HOURS' => '07:45-16:00',
            'ACS_SHOP_WORKING_HOURS_SATURDAY' => '08:45-12:00',
            'ACS_SHOP_TRUCK_PICKUP_HOURS' => '',
            'ACS_SHOP_TRUCK_PICKUP_HOURS_SATURDAY' => '',
            'ACS_SHOP_LAT' => '38.00000000',
            'ACS_SHOP_LONG' => '32.00000000',
            'ACS_SHOP_DELIVERY_START_HOUR' => '',
            'ACS_SHOP_COORDINATES_VERIFIED' => 1,
            'ACS_SHOP_KIND' => 1,
            'ACS_SHOP_SERVICES' => 'services',
            'ACS_SHOP_EMAIL' => 'second_test@email.com',
            'ACS_SHOP_PAYMENT_TYPES' => 'types',
            'ACS_SHOP_ID_CODE' => '6789',
            'ACS_SHOP_CITY' => 'city',
            'ACS_SHOP_SMARTPOINT_KIND' => '',
            'ACS_SHOP_WORKING_HOURS_JSON' => '',
            'ACS_SHOP_MESSAGE' => 'message',
        ];
    }

    public function getArrayForStationsResponse(): array
    {
        return [
            'ACSTableOutput' => [
                'Table_Data' => [
                    $this->getCorrectResponseItemArray(),
                    $this->getSecondCorrectResponseItemArray(),
                ],
            ],
        ];
    }

    public function getResponseItemArrayWithoutAddressAndLatitude(): array
    {
        return [
            'ACS_SHOP_COUNTRY_ID' => 2,
            'ACS_SHOP_COUNTRY_DESCR' => 'country desc',
            'ACS_SHOP_AREA_ID' => 0,
            'ACS_SHOP_AREA_DESCR' => '',
            'ACS_SHOP_STATION_ID' => 'AB',
            'ACS_SHOP_STATION_ID_EN' => 'AB',
            'ACS_SHOP_STATION_DESCR' => 'station desc',
            'ACS_SHOP_BRANCH_ID' => 1,
            'ACS_SHOP_ZIPCODE' => '1234',
            'ACS_SHOP_PHONES' => '123123123',
            'ACS_SHOP_FAX' => '123123124',
            'ACS_SHOP_WORKING_HOURS' => '07:45-19:00',
            'ACS_SHOP_WORKING_HOURS_SATURDAY' => '08:45-13:00',
            'ACS_SHOP_TRUCK_PICKUP_HOURS' => '',
            'ACS_SHOP_TRUCK_PICKUP_HOURS_SATURDAY' => '',
            'ACS_SHOP_LONG' => '33.00000000',
            'ACS_SHOP_DELIVERY_START_HOUR' => '',
            'ACS_SHOP_COORDINATES_VERIFIED' => 1,
            'ACS_SHOP_KIND' => 1,
            'ACS_SHOP_SERVICES' => 'services',
            'ACS_SHOP_EMAIL' => 'test@email.com',
            'ACS_SHOP_PAYMENT_TYPES' => 'types',
            'ACS_SHOP_ID_CODE' => '1234',
            'ACS_SHOP_CITY' => 'city',
            'ACS_SHOP_SMARTPOINT_KIND' => '',
            'ACS_SHOP_WORKING_HOURS_JSON' => '',
            'ACS_SHOP_MESSAGE' => 'message',
        ];
    }

    public function getCorrectAddress(): Address
    {
        return new Address(
            'address',
            '1234',
            'city',
            '123123123',
            'test@email.com',
            '123123124'
        );
    }

    public function getCorrectCoordinates(): Coordinates
    {
        return new Coordinates(34.0, 33.0);
    }

    public function getCorrectParcelShop(): ParcelShop
    {
        return new ParcelShop(
            2,
            'country desc',
            0,
            '',
            'AB',
            'ABC',
            'station desc',
            1,
            '07:45-19:00',
            '08:45-13:00',
            '',
            '',
            '',
            1,
            1,
            'services',
            'types',
            '1234',
            '',
            '',
            'message',
            $this->getCorrectAddress(),
            $this->getCorrectCoordinates()
        );
    }

    public function getSecondCorrectParcelShop(): ParcelShop
    {
        return new ParcelShop(
            2,
            'country desc',
            1,
            '',
            'BC',
            'BCD',
            'station desc',
            1,
            '07:45-16:00',
            '08:45-12:00',
            '',
            '',
            '',
            1,
            1,
            'services',
            'types',
            '6789',
            '',
            '',
            'message',
            new Address(
                'address',
                '6789',
                'city',
                '654654654',
                'second_test@email.com',
                '654654653'
            ),
            new Coordinates(38.0, 32.0)
        );
    }
}
