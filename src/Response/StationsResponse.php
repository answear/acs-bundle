<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Response;

use Answear\AcsBundle\Exception\MalformedResponse;
use Answear\AcsBundle\Response\DTO\ParcelShop;
use Webmozart\Assert\Assert;

class StationsResponse
{
    /**
     * @var ParcelShop[]
     */
    private array $parcelShops;

    /**
     * @param ParcelShop[] $parcelShops
     */
    public function __construct(array $parcelShops)
    {
        Assert::allIsInstanceOf($parcelShops, ParcelShop::class);
        $this->parcelShops = $parcelShops;
    }

    public static function fromArray(array $response): StationsResponse
    {
        try {
            Assert::isArray($response);
            Assert::keyExists($response, 'ACSTableOutput');
            $output = $response['ACSTableOutput'];
            Assert::keyExists($output, 'Table_Data');

            return new self(
                array_map(
                    static function ($item) {
                        return ParcelShop::fromArray($item);
                    },
                    $output['Table_Data'],
                )
            );
        } catch (\Throwable $e) {
            throw new MalformedResponse($e->getMessage(), $response, $e);
        }
    }

    /**
     * @return ParcelShop[]
     */
    public function getParcelShops(): array
    {
        return $this->parcelShops;
    }
}
