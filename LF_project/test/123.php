<?php
$change = $_POST['change'];
$file = "texttest";
$fp = fopen($file, "w") or die("파일 작성이 불가능합니다!");

fwrite($fp, $change);

fclose($fp);
 ?>
