<html lang="ru">
<head>
<title>Голосование</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/vote/files/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="/vote/files/flotr2.min.js"></script>
<script type="text/javascript" src="/vote/files/html2canvas.min.js"></script>
<link rel="icon" type="image/x-icon" href="/vote/files/favicon.ico" />
</head>
<body>
<?php
include("config.php");
$countvotes = mysql_query("SELECT * FROM `rus_options` ORDER BY `id` DESC");
while ($row = mysql_fetch_assoc($countvotes)) {$totalvotes += $row["votes"];} //количество вариантов ответов суммируем

$i = 0;
//$get_questions = mysql_query("SELECT * FROM `rus_options`");
while($r=mysql_fetch_array($countvotes)){
    extract($r);
    if ($totalvotes == 0) {
        $totalvotes = 1;
        $per = $votes * 100 / $totalvotes;
        $per = floor($per);
        $i++;
        ${'per'.$i} = $per/10;
        ${'vote'.$i} = $field;
    }
    else{
        $per = $votes * 100 / $totalvotes;
        $per = floor($per);
        $i++;
        ${'per'.$i} = $per/10;
        ${'vote'.$i} = $field;
    }
}
//$getcurrent = mysql_query("SELECT * FROM `rus_options` ORDER BY `id` DESC");
while($r=mysql_fetch_array($countvotes)){
    extract($r);
// ЗДЕСЬ НАДО КОЛИЧЕСТВО СТРОК СДЕЛАТЬ РАВНЫМ ВАРИАНТАМ
?>
<script type="text/javascript">
(function basic_pie(container) {
    var
        d1 = [[0, <?php echo $per1;?>]],
        d2 = [[0, <?php echo $per2;?>]],
        d3 = [[0, <?php echo $per3;?>]],
    graph;

    graph = Flotr.draw(container, [
        { data : d1, label : '<?php echo $vote1;?>' },
        { data : d2, label : '<?php echo $vote2;?>' },
        { data : d3, label : '<?php echo $vote3;?>' },
    ],{
        HtmlText: false,
        colors: ['#00A8F0', '#C0D800', '#CB4B4B', '#4DA74D', '#003300'],
        shadowSize: 5,
        fontSize: 9,
        grid : {
            verticalLines : false,
            horizontalLines : false
        },
        xaxis : { showLabels : false },
        yaxis : { showLabels : false },
        pie : {
            show : true,
            explode : 20
        },
        mouse : { track : false },
        legend : {
            position : 'se',
            backgroundColor : '#fff'
        }
    });
})(document.getElementById("graph"));
</script>
<?}?>

<div class="render" id="graph" style="height:500px;width:1000px;"></div>

<script type="text/javascript">
/*html2canvas(document.body).then(function(canvas) {
    document.body.appendChild(canvas);
    var canvas = $('canvas')[0];
    var data = canvas.toDataURL('image/png').replace(/data:image\/png;base64,/, '');
    $.post('',{data:data}, function(rep){});
    $('canvas').remove();
    //setTimeout(function() { window.close() }, 2000);
});
</script>
</body>
</html>
<?
$rus_config = mysql_fetch_array(mysql_query("SELECT `result` FROM `rus_config` AS `result`"));
$i = $rus_config['result']; //count
file_put_contents('rus_result'.$i.'.png', base64_decode($_POST['data'] )); //canvas to png
?>