<?php

include("config.php");
include("templates.php");
access();
echo $header;
echo "<div id='optionlist'><a href='rus_index.php'>Текущее</a> | <a href='rus_new.php'>Создать</a> | <strong>Редактировать</strong> | <a href='rus_options.php'>Выравнивание</a> | <a href='/vote/admincp/'>Возврат</a></div>";
?>

<?php
if($_POST['poll_edit']){
?>
    <form action="<? echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table style="margin: 24px auto 0 auto; text-align: center;">
        <tr>
            <td><input type="text" name="lesson" class="field" placeholder="Название урока" value="<? echo $_POST['lesson']; ?>" /></td>
        </tr>
        <tr>
            <td><input type="text" name="question" class="field" placeholder="Вопрос" value="<? echo $_POST['question']; ?>"/></td>
        </tr>
        <?
            $row = mysql_fetch_array(mysql_query("SELECT `id` FROM `rus_options` AS `id` ORDER BY `id` DESC LIMIT 1"));
            $maxid = $row['id'];
            $i = 1;
            while($i <= $maxid){
                $field = $_POST['field_'.$i];
                echo("<tr><td><input type='text' name='field_$i' placeholder='Вариант $i' class='field' value='$field' required /></td></tr>");
                $i++;
        }
        ?>
        <tr>
            <td><input type="submit" name="poll_edit" id='buttonnext' value="Сохранить" /></td>
        </tr>
    </table>
    </form>
    <div class='message'>Голосование отредактировано!</div>
<?
    $lesson = $_POST['lesson'];
    $question = $_POST['question'];
    $update_poll_edit = mysql_query("UPDATE rus_poll SET lesson='$lesson',question='$question'");
    $i = 1;
    while($i <= $maxid){
        $field = $_POST['field_'.$i];
        $edit_fields = mysql_query("UPDATE rus_options SET field='$field' WHERE id=$i");
        $i++;
    }
}
else{
?>

<form action="<? echo $_SERVER['PHP_SELF']; ?>" method="post">
<table style="margin: 24px auto 0 auto; text-align: center;">
    <?
    $poll = mysql_fetch_array(mysql_query("SELECT * FROM `rus_poll`"));
    $lesson = $poll['lesson'];
    $question = $poll['question'];
    ?>
    <tr>
        <td><input type="text" name="lesson" class="field" placeholder="Название урока" value="<? echo $lesson; ?>" /></td>
    </tr>
    <tr>
        <td><input type="text" name="question" class="field" placeholder="Вопрос" value="<? echo $question; ?>"/></td>
    </tr>
    <?
        $row = mysql_fetch_array(mysql_query("SELECT `id` FROM `rus_options` AS `id` ORDER BY `id` DESC LIMIT 1"));
        $maxid = $row['id'];
        $i = 1;
        while($i <= $maxid){
            $row=mysql_fetch_array(mysql_query("SELECT `field` FROM `rus_options` AS `field` WHERE `id` = $i"));
            $field = $row['field'];
            echo("<tr><td><input type='text' name='field_$i' placeholder='Вариант $i' class='field' value='$field' required /></td></tr>");
            $i++;
    }
    ?>
    <tr>
        <td><input type="submit" name="poll_edit" id='buttonnext' value="Сохранить" /></td>
    </tr>
</table>
</form>
<?}?>