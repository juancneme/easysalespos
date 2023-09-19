<?php

namespace App\Enums;


abstract class EndPointSisteCreditEnum
{
    const
        GET_CREDIT_LIMIT = 'getCreditLimitClient',
        GET_CREDIT_DETAIL = 'getCreditDetails',
        GET_CREDIT_TOKEN = 'getCreditToken',

        CREATE = 'create',
        CANCEL_CREDIT = 'requestCancelCredit',

        PAY_CREDIT = 'payCredit',
        CANCEL_PAYMENT = 'requestCancelPayment',
        
        CHAT_BOT = 'Bot/GetRequestByIdDocument',
        /*CHAT_BOT = '/Bot/GetRequestByIdDocumentForCustomer',*/

        GET_ACTIVE_CREDITS = 'getactivecredits';


        
}