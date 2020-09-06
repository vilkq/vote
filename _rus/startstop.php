<?
$uri = $_SERVER['DOCUMENT_ROOT'];
include($uri."/vote/admincp/config.php");
$start = mysql_fetch_array(mysql_query("SELECT * FROM `rus_config`"));
$go = $start['start'];
print($go);
?>