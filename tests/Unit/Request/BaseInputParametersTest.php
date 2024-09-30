<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Tests\Unit\Request;

use Answear\AcsBundle\Request\BaseInputParameters;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class BaseInputParametersTest extends TestCase
{
    #[Test]
    public function returnCorrectArray(): void
    {
        $baseInputParameters = new BaseInputParameters('companyId', 'companyPassword', 'userId', 'userPassword', 'EN');

        self::assertSame(
            [
                'Company_ID' => 'companyId',
                'Company_Password' => 'companyPassword',
                'User_ID' => 'userId',
                'User_Password' => 'userPassword',
                'language' => 'EN',
            ],
            $baseInputParameters->toArray()
        );
    }
}
