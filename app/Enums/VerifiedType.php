<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class VerifiedType extends Enum
{
    const owner_waite = '1';
    const protection_waite = '2';
    const successor_waite = '3';
    const master_waite = '4';
    const financial_waite = '5';
    const support_waite = '6';
    const supplier_waite = '7';
    const completed_wait = '8';
}
