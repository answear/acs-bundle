<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Request;

use Answear\AcsBundle\Enum\CountryIdEnum;

class StationsRequest implements Request
{
    private const ALIAS = 'ACS_Stations';

    private BaseInputParameters $baseInputParameters;
    private CountryIdEnum $countryId;
    private ?int $kind;

    public function __construct(BaseInputParameters $baseInputParameters, CountryIdEnum $countryId, ?int $kind = null)
    {
        $this->baseInputParameters = $baseInputParameters;
        $this->countryId = $countryId;
        $this->kind = $kind;
    }

    public function toJson(): string
    {
        $parameters = [
            'ACS_SHOP_COUNTRY_ID' => $this->countryId->getValue(),
        ];

        if (null !== $this->kind) {
            $parameters['ACS_SHOP_KIND'] = $this->kind;
        }

        return json_encode([
            'ACSAlias' => self::ALIAS,
            'ACSInputParameters' => array_merge($parameters, $this->baseInputParameters->toArray()),
        ], JSON_THROW_ON_ERROR);
    }
}
