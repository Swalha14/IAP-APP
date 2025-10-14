<?php

require 'Plugins/PHPMailer/vendor/autoload.php';

require_once 'conf.php';
require_once 'Includes/dbconnection.php';

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
//Create a database connection
$SQL = new dbConnection($conf['db_type'], $conf['db_host'], $conf['db_name'], $conf['db_user'], $conf['db_pass'], $conf['db_port']);
//$conn = $DB->connect();

//Create an instances
$ObjSendMail= new SendMail();
$Objform = new form();
$Objlayout = new layout();

?>