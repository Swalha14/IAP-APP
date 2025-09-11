<?php

require 'Plugins/PHPMailer/vendor/autoload.php';

require_once 'conf.php';
$directories = ['Global', 'Forms', 'Layouts'];  

spl_autoload_register(function ($className) use ($directories) {
    foreach ($directories as $directory) {
        $filePath = __DIR__ . '/' . $directory . '/' . $className . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }
    }
});

//Create an instances
$ObjSendMail= new SendMail();
$form = new form();
$layout = new layout();

?>