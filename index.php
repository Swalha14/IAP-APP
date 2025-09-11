<?php
//Include the class autoload method
require_once 'ClassAutoLoad.php';


$layout->header($conf);
//Call the methods
//print $hello->greet();

//print $hello->today();


$form->signup();
$layout->footer($conf);


?>