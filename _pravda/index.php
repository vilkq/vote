<html lang="ru">
<head>
<title>Результаты голосования</title>
<link rel="stylesheet" href="style.css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<link rel="icon" type="image/x-icon" href="favicon.ico" />
</head>
<body>
<div id="pagew">
<div class="result">
<?
include("admincp/config.php");
$result = mysql_fetch_array(mysql_query("select * from rus_config"));
$i = $result['result'];
echo "<img src=admincp/result".$i.".jpeg>"
?>
<a href="http://olympiada.prlib.ru/Lite.aspx?test=russian"><img src="buttontest.png" style="float: right;"></a>
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