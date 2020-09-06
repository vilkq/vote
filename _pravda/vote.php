<?php

include("admincp/config.php");
$start = mysql_fetch_array(mysql_query("select * from rus_config"));
$go = $start['start'];

if($_POST['submit']){
	//grab vars
	$vote = $_POST['vote'];
	$refer = $_POST['refer'];
	$vote = (int)$vote;
	//если вариант выбран, то записываем и идём на submit.php
	//иначе перезагружаем страницу
	if ($vote != 0) {
		$update_totalvotes = "UPDATE rus_poll SET totalvotes = totalvotes + 1";
			$insert = mysql_query($update_totalvotes);
		$update_votes = "UPDATE rus_options SET votes = votes + 1 WHERE id = $vote";
			$insert = mysql_query($update_votes);
		header("Location: submit.php");
	} else header("Location: ".$_SERVER["REQUEST_URI"]);

}
	//$uri = $_SERVER['REQUEST_URI'];
	//display the form!
?>
<html lang="ru">
<head>
<title>Голосование</title>
<link rel="stylesheet" href="style.css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<link rel="icon" type="image/x-icon" href="favicon.ico" />
</head>
<body>
<div id="pagew">
		<form action="vote.php" method="post">
			<div class="poll"><?
			$getcurrent = mysql_query("select * from rus_options ORDER by id");
			while($r=mysql_fetch_array($getcurrent)){
				extract($r);
				?><label><input type="radio" class="option-input radio" name="vote" value="<? echo($id); ?>" class="radiobutton" style="margin-top: 22px;" /><? echo($field); ?></label><br />
		<?	}	?>
			<input type="hidden" name="refer" value="<? echo $_SERVER['PHP_SELF']; ?>" />
			</div> <!-- poll -->
			<input type="submit" name="submit" value=" " style="background-image: url(button.png); width: 180px; height: 56px; color: #000; float: right; margin: 10px 135px 0 0;" />
		</form>
</div> <!-- pagew -->

<script type="text/javascript">
var timerId = setInterval(function() {
$.ajax({
    type: "POST",
    url: "startstop.php",
    success: function(data){
                if (data == 0) {window.location.href = "index.php"} else
                if (data == 2) {window.location.href = "present/index.html"}
    }
});
}, 2000);;
</script>

</body>
</html>