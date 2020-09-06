<?
include("admincp/config.php");
$start = mysql_fetch_array(mysql_query("select * from kremlin_config"));
$go = $start['start'];
print($go);
?>