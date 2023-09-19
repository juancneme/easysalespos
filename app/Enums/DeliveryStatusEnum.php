<?php


namespace App\Enums;


abstract class DeliveryStatusEnum
{
    const
        ENLISTMENT = 131,
        PREPARED   = 132,
        ASSIGNED   = 133,
        IN_TRANSIT = 134,
        RECEIVED   = 135,
        REJECTED   = 136;
}