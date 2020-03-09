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
    const successor_waite = '2';
    const master_waite = '3';
    const protection_waite = '4';
    const financial_waite = '5';
    const support_waite = '6';
    const supplier_waite = '7';

    const owner_reject = '8';
    const successor_reject = '9';
    const master_reject = '10';
    const protection_reject = '11';
    const financial_reject = '12';
    const support_reject = '13';
    const supplier_reject = '14';
}
