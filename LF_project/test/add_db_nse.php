<?php
session_start();
if(!isset($_SESSION['studentID'])) {
  echo "<script>alert('로그인을 해주세요');</script>";
  echo "<script>location.replace('../../index.php');</script>";
}
$connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die ("connect falied");

$name = $_SESSION['name'];
$studentID = $_SESSION['studentID'];
$authority = $_SESSION['authority'];

$date = date('Y-m-d');
$content = $_POST['ir1'];

echo $content
 ?>
