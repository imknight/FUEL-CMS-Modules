<?php 
//link the controller to the nav link

$route[FUEL_ROUTE.'group_access'] = FUEL_FOLDER.'/module';
$route[FUEL_ROUTE.'group_access/(.*)'] = FUEL_FOLDER.'/module/$1';
//$route[FUEL_ROUTE.'backup/dashboard'] = 'backup/dashboard';
