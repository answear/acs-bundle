<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Tests\Unit\Request;

use Answear\AcsBundle\Enum\CountryIdEnum;
use Answear\AcsBundle\Request\BaseInputParameters;
use Answear\AcsBundle\Request\StationsRequest;
use PHPUnit\Framework\TestCase;

class StationsRequestTest extends TestCase
{
    /**
     * @test
     */
    public function returnCorrectJson(): void
    {
        $baseInputParameters = new BaseInputParameters('companyId', 'companyPassword', 'userId', 'userPassword', 'EN');
        $stationsRequest = new StationsRequest($baseInputParameters, CountryIdEnum::greece(), 1);

        self::assertSame(
            '{"ACSAlias":"ACS_Stations","ACSInputParameters":{"ACS_SHOP_COUNTRY_ID":"GR","ACS_SHOP_KIND":1,"Company_ID":"companyId","Company_Password":"companyPassword","User_ID":"userId","User_Password":"userPassword","language":"EN"}}',
            $stationsRequest->toJson()
        );
    }

    /**
     * @test
     */
    public function returnCorrectJsonWithoutKind(): void
    {
        $baseInputParameters = new BaseInputParameters('companyId', 'companyPassword', 'userId', 'userPassword', 'EN');
        $stationsRequest = new StationsRequest($baseInputParameters, CountryIdEnum::greece());

        self::assertSame(
            '{"ACSAlias":"ACS_Stations","ACSInputParameters":{"ACS_SHOP_COUNTRY_ID":"GR","Company_ID":"companyId","Company_Password":"companyPassword","User_ID":"userId","User_Password":"userPassword","language":"EN"}}',
            $stationsRequest->toJson()
        );
    }
}
