<html lang="ru">
<head>
<title>Голосование</title>
<link rel="stylesheet" href="/vote/files/style.css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/vote/files/jquery-1.6.1.min.js"></script>
<link rel="icon" type="image/x-icon" href="/vote/files/favicon.ico" />
</head>
<body>
<img src="/vote/files/underline.jpg" style="margin-top:172px;">
<script type="text/javascript">
var timerId = setInterval(function() {
$.ajax({
    type: "POST",
    url: "startstop.php",
    success: function(data){
                if (data == 0) {window.location.href = "index.php"}
    }
});
}, 2000);;
</script>
</body>
</html>