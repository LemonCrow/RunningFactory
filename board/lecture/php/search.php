<?php

session_start();
if(!isset($_SESSION['id'])) {
  echo "<script>";
  echo "alert('로그인을 해주세요');";
  echo "location.replace('../index.php');";
  echo "</script>";
}

else{
  $username = $_SESSION['id'];
  $name = $_SESSION['name'];
  $authority = $_SESSION['authority'];
}

$category = $_POST['category'];
$search = $_POST['search'];


 ?>
 user
 content
