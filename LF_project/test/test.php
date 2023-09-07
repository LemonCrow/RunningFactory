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
  $dept = $_SESSION['DPET'];
  $numbers = $_POST['numbers'];
  $subject = $_POST['subject'];

  if ($authority === 'u'){
      $authority1 = '유저';
  } elseif ($authority === 'm') {
      $authority1 = '관리자';
  }
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>미치것네</title>
   </head>
   <body>
     <form class="" action="testAction.php" method="post">
       <select class="" name="numbers">
         <option value="5">5</option>
         <option value="10">10</option>
         <option value="15">15</option>
         <option value="20">20</option>
         <option value="4000">4000</option>
       </select>
       <select class="" name="subject">
         <option selected>선택하세요</option>
         <option value="English">영어</option>
         <option value="DB_practice">데이터베이스실습</option>
         <option value="Python">파이썬</option>
         <option value="Java_Basics">자바기초 </option>
       </select>
       <button type="submit" name="button">가즈안</button>
     </form>
   </body>
 </html>
