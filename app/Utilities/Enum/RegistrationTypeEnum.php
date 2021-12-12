<?php

namespace App\Utilities\Enum;

/* To get the Keys,
 * Use: RegistrationTypeEnum::getKeys()
 * To get the Values,
 * Use: RegistrationTypeEnum::getValues()
 */

abstract class RegistrationTypeEnum extends BasicEnum
{
    // To call it anywhere, just call: RegistrationTypeEnum::Web

    const Web = 1;
    const Facebook = 2;
    const Whatsapp = 3;

}

