<?php

//return array(
//    'pdf' => array(
//        'enabled' => true,
//        'binary' => base_path('vendor\h4cc\wkhtmltopdf-amd64\bin\wkhtmltopdf-amd64'), //'/usr/local/bin/wkhtmltopdf',
//        'timeout' => false,
//        'options' => array(),
//    ),
//    'image' => array(
//        'enabled' => true,
//        'binary' => base_path('vendor\h4cc\wkhtmltoimage-amd64\bin\wkhtmltopdf-amd64'), //'/usr/local/bin/wkhtmltoimage',
//        'timeout' => false,
//        'options' => array(),
//    ),
//);
if(PHP_OS == 'WINNT'){
    return [
        'pdf'=>[
            'enabled'=>true,
            'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe"',
            'options'=>[],
        ],
        'image'=>[
            'enabled' => true,
            'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltoimage.exe"',
            'options' => [],
        ]
    ];
}else{
    return array(
            'pdf' => array(
                'enabled' => true,
                'binary' => base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64'), //'wkhtmltopdf',
                'options' => array(),
            ),
            'image' => array(
                'enabled' => true,
                'binary' => base_path('vendor/h4cc/wkhtmltoimage-amd64/bin/wkhtmltoimage-amd64'), //'wkhtmltoimage',
                'options' => array(),
            ),
    );
}