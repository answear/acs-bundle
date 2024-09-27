<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Request;

use Answear\AcsBundle\Enum\CountryIdEnum;

class StationsRequest implements Request
{
    private const ALIAS = 'ACS_Stations';

    public function __construct(
        private readonly BaseInputParameters $baseInputParameters,
        private readonly CountryIdEnum $countryId,
        private readonly ?int $kind = null,
    ) {
    }

    public function toJson(): string
    {
        $parameters = [
            'ACS_SHOP_COUNTRY_ID' => $this->countryId->value,
        ];

        if (null !== $this->kind) {
            $parameters['ACS_SHOP_KIND'] = $this->kind;
        }

        return json_encode(
            [
                'ACSAlias' => self::ALIAS,
                'ACSInputParameters' => array_merge($parameters, $this->baseInputParameters->toArray()),
            ],
            JSON_THROW_ON_ERROR
        );
    }
}
