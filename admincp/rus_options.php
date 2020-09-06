<?php

include("config.php");
include("templates.php");
access();
echo $header;
echo "<div id='optionlist'><a href='rus_index.php'>Текущее</a> | <a href='rus_new.php'>Создать</a> | <a href='rus_edit.php'>Редактировать</a> | <strong>Выравнивание</strong> | <a href='/vote/admincp/'>Возврат</a></div>";

$config = mysql_fetch_array(mysql_query("SELECT * FROM `rus_config`"));
$w_lesson = $config['w_lesson'];
$w_question = $config['w_question'];

if($_POST['options']) {
    $w_lesson = $_POST['w_lesson'];
    $w_question = $_POST['w_question'];
    $options = mysql_query("UPDATE `rus_config` SET `w_lesson`='$w_lesson', `w_question`='$w_question'");
}
    $poll = mysql_fetch_array(mysql_query("SELECT * FROM `rus_poll`"));
    $lesson = $poll['lesson'];
    $question = $poll['question'];
    unlink('rus_background.jpg'); //удаляем старый рисунок
    $file = 'background_clean.jpg'; //исходный рисунок без надписей
    $newfile = 'rus_background.jpg'; //расположение нового рисунка
    copy($file, $newfile); //копируем из папки
    $img="rus_background.jpg"; //новый исходник в корне - ссылка в переменную
    $pic = ImageCreateFromjpeg($img); //открываем рисунок
    $color_lesson=ImageColorAllocate($pic, 210, 36, 54); //цвет для $lesson
    $color_question=ImageColorAllocate($pic, 0, 0, 0); //цвет для $question
    //координаты размещения текста
    $h_lesson = 50; //высота
    $h_question = 146; //высота
    ImageTTFtext($pic, 30, 0, $w_lesson, $h_lesson, $color_lesson, "font/gnyrwn971.ttf", $lesson); //выводим текст $lesson
    ImageTTFtext($pic, 23, 0, $w_question, $h_question, $color_question, "font/gnyrwn971.ttf", $question); //выводим текст $question
    Imagejpeg($pic,"rus_background.jpg", 100); //сохраняем рисунок
    ImageDestroy($pic); //освобождаем память
?>

<form action="<? echo $_SERVER['PHP_SELF']; ?>" method="post">
<table style="margin: 24px auto 0 auto; text-align: center;">
    <tr style="margin-bottom: 12px;">
        <td>Название урока:</td><td><input type="text" name="w_lesson" id="field_options" value="<? echo $w_lesson; ?>" /></td>
    </tr>

    <tr style="margin-bottom: 12px;">
        <td>Вопрос:</td><td><input type="text" name="w_question" id="field_options" value="<? echo $w_question; ?>" /></td>
    </tr>

    <tr>
        <td><input type="submit" name="options" id="buttonnext" value="Применить" /></td>
    </tr>

</table>
</form>
<div style="text-align:center; border:1px solid black; margin-top:24px;"><img src="rus_background.jpg"></div>