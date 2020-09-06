<?php

include("config.php");
include("templates.php");
access();
echo $header;
echo "<div id='optionlist'><a href='rus_index.php'>Текущее</a> | <strong>Создать</strong> | <a href='rus_edit.php'>Редактировать</a> | <a href='rus_options.php'>Выравнивание</a> | <a href='/vote/admincp/'>Возврат</a></div>";

if($_POST['step1']){
?>

<form action="<? echo $_SERVER['PHP_SELF']; ?>" method="post">
	<table style="margin: 24px auto 0 auto; text-align: center;">
		<tr>
			<td><input type="text" name="lesson" class='field' required value="<? echo $_POST['lesson']; ?>" /></td>
		</tr>
		<tr>
			<td><input type="text" name="question" class='field' required value="<? echo $_POST['question']; ?>" /></td>
		</tr>
<?
	$i = 1;
	while ($i <= $_POST['options']) {
  		echo("<tr><td><input type='text' name='field[$i]' placeholder='Вариант $i' class='field' required /></td></tr>");
   		$i++;
	}
	echo("<tr><td><input type='submit' name='step2' id='buttonnext' value='Создать' /></td></tr></table></form>");

}elseif($_POST['step2']){
	$question = addslashes($_POST['question']);
	$lesson = addslashes($_POST['lesson']);

	//delete all previous poll data (no multiple polls yet, maybe later...)
	$delete_previous_options = mysql_query(" TRUNCATE `rus_options`");
	$delete_previous_poll = mysql_query(" TRUNCATE `rus_poll`");

	//insert new poll info
	$insert_new_poll = mysql_query("INSERT INTO rus_poll (id, lesson, question, totalvotes)" . "VALUES ('NULL', '$lesson', '$question', '0')");
	$field = $_POST['field'];

	//for each option
	foreach ($field as $value) {
		//add it to the database
		$add_fields = mysql_query("INSERT INTO rus_options (id, field, votes)" . "VALUES ('NULL', '$value', '0')");
	}

	echo "<div class='message'>Голосование создано!</div>";
}else{
	//our first form
?>
	<form action="<? $_SERVER['PHP_SELF']; ?>" method="post">
	<table style="margin: 24px auto 0 auto; text-align: center;">
		<tr>
			<td><input type="text" name="lesson" class="field" placeholder="Название урока" required /></td>
		</tr>
		<tr>
			<td><input type="text" name="question" class="field" placeholder="Вопрос" required /></td>
		</tr>
		<tr>
			<td><input type="text" name="options" class="field" placeholder="Количество вариантов (число)" required /></td>
		</tr>
		<tr>
			<td><input type="submit" name="step1" id="buttonnext" value="Продолжить" /></td>
		</tr>
	</table>
	<br />
	</form>
<?
}
?>