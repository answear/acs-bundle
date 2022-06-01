<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Service;

use Answear\AcsBundle\Enum\CountryIdEnum;
use Answear\AcsBundle\Request\StationsRequest;
use Answear\AcsBundle\Response\DTO\ParcelShop;
use Answear\AcsBundle\Response\StationsResponse;

class ParcelShopsService
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return ParcelShop[]
     */
    public function getList(CountryIdEnum $countryId, ?int $kind = null): array
    {
        $response = $this->client->request(new StationsRequest($this->client->getBaseInputParameters(), $countryId, $kind));

        return StationsResponse::fromArray($response)->getParcelShops();
    }
}
