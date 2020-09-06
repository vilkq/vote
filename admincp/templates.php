<?php

$poll = mysql_fetch_array(mysql_query("select * from rus_poll")); $rus = $poll['lesson'];
$poll = mysql_fetch_array(mysql_query("select * from kremlin_poll")); $kremlin = $poll['lesson'];
$poll = mysql_fetch_array(mysql_query("select * from izbir_poll")); $izbir = $poll['lesson'];
$poll = mysql_fetch_array(mysql_query("select * from pravda_poll")); $pravda = $poll['lesson'];
$poll = mysql_fetch_array(mysql_query("select * from zapovedn_poll")); $zapovedn = $poll['lesson'];

$header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ru">
<head>
<title>Административная панель</title>
<link rel="stylesheet" href="admin.css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/vote/files/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="/vote/files/html2canvas.min.js"></script>
</head>
<body>';
//на страницу ввода логина и пароля:
$login_header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ru">
<head>
<title>Административная панель</title>
<link rel="stylesheet" href=admin.css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h2>Административная панель</h2>
<hr />
<br />
</html>';
?>