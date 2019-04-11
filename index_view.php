<?php
/**
 * Created by PhpStorm.
 * User: cpayret
 * Date: 12/2/2015
 * Time: 11:29 AM
 */

require_once('init.php');
require_once('DB_connect_Local.php');
require_once('DB_connect_Remote.php');
require_once('Updater.php');
$initial=time(); //initial time
echo @date('H:i:s', time()).'\n';
  $Updater_job=new Updater();
echo "Update starting \n";
echo "Getting the list : \n";
$Updater_job->update();
 //initial time
echo @date('H:i:s', time()).'\n';
echo   $initial-time() ;
