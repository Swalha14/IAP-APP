<?php

require_once 'ClassAutoLoad.php';


$mailContent = [
    'name_from' => 'ICS C Community',
    'email_from' => 'no-reply@icscommunity.com',
    'name_to' => 'Swalha',
    'email_to' => 'swalha.ahmed@strathmore.edu',
    'subject' => 'Welcome to ICS C Community',
    'body' => 'This is a new semester.<b>Let\'s make the most of it</b>'
];




$ObjSendMail->Send_Mail($conf, $mailContent);   