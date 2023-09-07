<?php
    session_start();
    if(!isset($_SESSION['studentID'])) {
      echo "<script>alert('로그인을 해주세요');</script>";
      echo "<script>location.replace('../../index.php');</script>";
    }
    $connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die ("connect falied");
    $name = $_SESSION['name'];
    $fromId = $_SESSION['id'];
    $toId = $_POST['toId'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];
    $date = date("Y-m-d H:i:s");

    $q = "SELECT * FROM usertable WHERE studentID='$toId'";
    $r = mysqli_query($connect, $q);
    $result = mysqli_fetch_assoc($r);
    $toId = $result['id'];

    if($subject && $_POST['content'] && $_POST['toId']){
        $query = "INSERT INTO Message (subject, fromId, toId, content, date) VALUES('$subject', '$fromId','$toId', '$content', '$date');";
        $result = $connect->query($query);
        echo "<script>alert('쪽지가 전송되었습니다.');
        location.href='05-01-myInfo.php';</script>";
    }else{
        echo "<script>alert('쪽지 전송이 실패하였습니다.');
        history.back();</script>";
    }
?>
