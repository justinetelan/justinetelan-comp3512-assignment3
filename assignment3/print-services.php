<?php
$jsonRead =  file_get_contents('js/printRules.json');
header('Content-type: application/json');
echo json_encode($jsonRead);

?>