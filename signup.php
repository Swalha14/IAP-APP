<?php
require 'ClassAutoLoad.php';
$Objlayout->header($conf);
$Objlayout->nav($conf);
$Objlayout->banner($conf);
$Objlayout->form_content($conf,$Objform);
$Objlayout->footer($conf);
?>