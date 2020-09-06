<?php
include("config.php");
access();

$uri = $_SERVER['DOCUMENT_ROOT'];
$rus_config = mysql_fetch_array(mysql_query("SELECT `result` FROM `rus_config` AS `result`"));
$i = $rus_config['result'];

if($_POST['stop']){
    rename($uri."/vote/admincp/rus_result".$i.".php", $uri."/vote/admincp/rus_result".($i+1).".php");
    rename($uri."/vote/admincp/rus_result".$i.".png", $uri."/vote/admincp/rus_result".($i+1).".png");
    $i++;
    $insert = mysql_query("UPDATE `rus_config` SET `result` = $i");
    $insert = mysql_query("UPDATE `rus_config` SET `start` = 0");
    header("Location: rus_index.php");
}

if($_POST['start']){
    $insert = mysql_query("UPDATE `rus_config` SET `start` = 1");
    echo "<div class='message'>Голосование начато!</div";
}

if($_POST['drop_result']){
    $drop = mysql_query("UPDATE `rus_options` SET `votes` = 0 WHERE `id` < 99");
    $drop = mysql_query("UPDATE `rus_poll` SET `totalvotes` = 0");
    echo "<div class='message'>Результаты сброшены!</div>";
    header("Location: rus_index.php");
}
?>

<html lang="ru">
<head>
<title>Административная панель</title>
<link rel="stylesheet" href="admin.css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/x-icon" href="/vote/files/favicon.ico" />
<script type="text/javascript">
function stopd(){
    //alert ('Результаты сформированы!');
    window.open('rus_result<?echo $i;?>.php','subwindow','height=520px,width=1020px');
}
</script>
</head>
<body>
<div id='optionlist'>Текущее | <a href='rus_new.php'>Создать</a> | <a href='rus_edit.php'>Редактировать</a> | <a href='rus_options.php'>Выравнивание</a> | <a href='/vote/admincp/'>Возврат</a></div>
<table id="buttonstable">
        <tr>
            <td><form action="rus_index.php" method="post"><input type="submit" id="start" name="start" value="Старт" /></form></td>
            <td><form action="rus_index.php" method="post"><input type="submit" id="stop" name="stop" value="Стоп" onclick="return stopd(this.form)"/></form></td>
            <td><form action="rus_index.php" method="post"><input type="submit" id="drop_result" name="drop_result" value="Сбросить результат" /></form></td>
        </tr>
</table>