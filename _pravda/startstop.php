<?
include("admincp/config.php");
$start = mysql_fetch_array(mysql_query("select * from rus_config"));
$go = $start['start'];
print($go);
?>