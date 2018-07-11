<?php

global $session;

chdir(dirname(__FILE__) . '/../../');

include_once("./config.php");
include_once("./lib/loader.php");
include_once("./lib/threads.php");

$db = new mysql(DB_HOST, '', DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_GET['id'])) {
 $id=$_GET['id'];
 
 $rec=SQLSelectOne("SELECT * FROM calendar_categories WHERE ID=". (int)$id );
 if (isset($_GET['at_calendar'])) 
  $rec['AT_CALENDAR']=$_GET['at_calendar'];

 if (isset($_GET['holidays'])) 
  $rec['HOLIDAYS']=$_GET['holidays'];

 if (isset($_GET['workdays'])) 
  $rec['WORKDAYS']=$_GET['workdays'];


 if (isset($_GET['calendar_color'])) 
  $rec['CALENDAR_COLOR']=$_GET['calendar_color'];


 SQLUpdate('calendar_categories', $rec);
}
?>