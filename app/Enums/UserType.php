<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserType extends Enum
{
    const superadmin = 1;
    const owner = 2;
    const financial = 3;
    const protection = 4;
    const successor = 5;
    const master = 6;
    const support = 7;
    const supplier = 8;
}
