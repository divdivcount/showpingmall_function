<?php

return [

    /*
    |--------------------------------------------------------------------------
    | kakaopay
    |--------------------------------------------------------------------------
    | 
    | src/main/java/com/kakao/pay/sample/application.properties => properties
    | src/main/resources/ConfirmationSample.java => confirmation
    | 
    */

    'properties' => [
        # KakaoDevelopers 에서 앱 생성 후 발급받은 admin key
        # Admin key created by App of KakaoDevelopers
        'kakao_api_admin_key' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',

        # Kakao로부터 전달받은 가맹점 ID
        # partner payment id from KakaoPay
        'cid' => 'TC0ONETIME',

        # Callback Service url
        'sample_host'=> 'http://localhost:8080'
    ],

    'confirmation' => [
        'pcConfirmationUrlPrefix' => "https://pg-web.kakao.com/v1/confirmation/p/",
        'mobileConfirmationUrlPrefix' => "https://pg-web.kakao.com/v1/confirmation/m/",
        'cid' => "C847130110",
        'tid' => "T2345560999051526180",
        'partnerOrderId' => "6406",
        'partnerUserId' => "pg_qa",
        'paymentAid' => "A2345561170850086930",
        'cancelAid' => "A2345583027818929490",
    ],
];
