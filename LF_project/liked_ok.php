<?php
    session_start();
    if(!isset($_SESSION['studentID'])) {
      echo "<script>alert('로그인을 해주세요');</script>";
      echo "<script>location.replace('../../index.php');</script>";
    }
    $connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die ("connect falied");
    $id = $_SESSION['studentID'];
    $idx = $_GET['idx'];
    $query = "INSERT INTO liked_name (liked_num, id) VALUES('$idx', '$id');";
    $result = $connect->query($query);
    echo "<script>alert('추천되었습니다.');
    location.href='04-2-freeboarderRead.php?number=$idx';</script>";
?>
