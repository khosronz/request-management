<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MainCategories extends Enum
{
    const Root = 1;
    const Digital_goods = 2;
    const Beauty_Health_Wellness = 3;
    const Car_Tools_Office = 4;
    const Fashion_and_Apparel = 5;
    const Home_and_Kitchen = 6;
    const Books_Writing_and_Art_Services = 7;
    const Toys_Baby_and_Baby = 8;
    const Sport_and_Travel = 9;
    const Food_and_Beverage = 10;
    const Vps = 11;
    const Host = 12;
    const Domain = 13;
}
