<?php

namespace App\Utilities\Enum;

/* To get the Keys,
 * Use: StatusEnum::getKeys()
 * To get the Values,
 * Use: StatusEnum::getValues()
 */

abstract class RegistrationApprovalEnum extends BasicEnum
{
    // To call it anywhere, just call: StatusEnum::Active

    const Pending = 0;
    const Approved = 1;
    const Rejected = 2;

}

