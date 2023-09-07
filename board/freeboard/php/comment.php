<?php
session_start();
if(!isset($_SESSION['studentID'])) {
  echo "<script>alert('로그인을 해주세요');</script>";
  echo "<script>location.replace('../../index.php');</script>";
}
$connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die ("connect falied");
// $authority = $_SESSION['authority'];
// $title = $_POST['title'];
// $content = $_POST['content'];
// $name = $_SESSION['name'];
// $studentID = $_SESSION['studentID'];
// $date = date('Y-m-d');

$name = $_SESSION['name'];
$studentID = $_SESSION['studentID'];
$date = date(Y-M-d-h-m);
$comment = $_POST['comment'];
$postidx = $_POST['postidx'];

$query = "INSERT INTO fboard_comment (postidx, studentID, Name, comment, date) VALUES ('$postidx', '$studentID', '$name', '$comment', '$date')";

$result = $connect->$query($query);

$url = 'read.php?number='$postidx;


 ?>
