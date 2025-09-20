<?php

require_once 'ClassAutoLoad.php';


$mailContent = [
    'name_from' => 'ICS C Community',
    'email_from' => 'no-reply@icscommunity.com',
    'name_to' => 'Receiver',
    'email_to' => 'receiver@gmail.com',
    'subject' => 'Welcome to ICS C Community',
    'body' => 'This is a new semester.<b>Let\'s make the most of it</b>'
];




$ObjSendMail->Send_Mail($conf, $mailContent);   