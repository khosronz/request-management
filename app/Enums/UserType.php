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
    const owner = 3;
    const financial = 4;
    const protection = 5;
    const successor = 6;
    const master = 7;
    const support = 8;
}
