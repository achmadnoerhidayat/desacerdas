<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php
$_GET['var1'];
$_GET['var2'];
$_GET['var3'];
echo '<div class="search-result">';
                echo '<div class="search-title">Video Title: '.$var1.'</div>';
                echo '<div class="search-link">';
                echo '<iframe width="560" height="315" src="http://www.youtube.com/embed/'.$var2.'&loop=1" frameborder="0" allowfullscreen></iframe>';
                echo '</div>';
                echo '<div class="search-cata">';
                echo '<p>Instructions: '.$var3.'</p>';
                echo '</div>';
                echo '<br />';
                echo '<br />';
            echo '</div>';

?>
</body>
</html>