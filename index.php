<?php
//Include the class autoload method
require_once 'ClassAutoLoad.php';

//Call the methods
//print $hello->greet();

//print $hello->today();




$Objlayout->header($conf);
$Objlayout->nav($conf);
$Objlayout->banner($conf);
$Objlayout->content($conf);
$Objlayout->footer($conf);
?>