<html lang="ru">
<head>
<title>Результаты голосования</title>
<link rel="stylesheet" href="/vote/files/style.css" media="all"/>
<script type="text/javascript" src="/vote/files/jquery-1.6.1.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/x-icon" href="/vote/files/favicon.ico" />
</head>
<body>
<div id="pagew">
<div class="result">
<?
$uri = $_SERVER['DOCUMENT_ROOT'];
include($uri."/vote/admincp/config.php");
$row = mysql_fetch_array(mysql_query("SELECT * FROM `rus_config`"));
$i = $row['result'];
echo "<img src=/vote/admincp/rus_result".$i.".png>";
$row = mysql_fetch_array(mysql_query("SELECT * FROM `rus_poll`"));
$testlink = $row['testlink'];
?>
<a href="<?echo $testlink?>"><img src="/vote/files/buttontest.png" style="float: right;"></a>
</div> <!-- poll -->
</div> <!-- pagew -->

<script type="text/javascript">
var timerId = setInterval(function() {
$.ajax({
    type: "POST",
    url: "startstop.php",
    success: function(data){
                if (data == 1) {window.location.href = "vote.php"}
    }
});
}, 2000);;
</script>

</body>
</html>