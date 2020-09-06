<?php

include("config.php");
include("templates.php");
access();

echo $header;
echo "<div id='lessonlist'>
			<p><a href='rus_index.php'>".$rus."</a></p>
		   	<p><a href='kremlin_index.php'>".$kremlin."</a></p>
		   	<p><a href='izbir_index.php'>".$izbir."</a></p>
		   	<p><a href='pravda_index.php'>".$pravda."</a></p>
		   	<p><a href='zapovedn_index.php'>".$zapovedn."</a></p>
	  </div>";
?>