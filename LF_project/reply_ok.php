<?php
    session_start();
    if(!isset($_SESSION['studentID'])) {
      echo "<script>alert('로그인을 해주세요');</script>";
      echo "<script>location.replace('../../index.php');</script>";
    }
    $connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die ("connect falied");
    $name = $_SESSION['name'];
    $idx = $_GET['idx'];
    $content = $_POST['content'];
    $date = date("Y-m-d H:i:s");

    if($idx && $_POST['content']){
        $query = "INSERT INTO reply (con_num, name, content, date) VALUES('$idx', '$name','$content', '$date');";
        $result = $connect->query($query);
        echo "<script>alert('댓글이 작성되었습니다.');
        location.href='04-2-freeboarderRead.php?number=$idx';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.');
        history.back();</script>";
    }
?>
