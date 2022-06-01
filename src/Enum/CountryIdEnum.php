<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Enum;

use MabeEnum\Enum;

class CountryIdEnum extends Enum
{
    public const GREECE = 'GR';
    public const CYPRUS = 'CY';

    public static function greece(): self
    {
        return static::get(static::GREECE);
    }

    public static function cyprus(): self
    {
        return static::get(static::CYPRUS);
    }
}
