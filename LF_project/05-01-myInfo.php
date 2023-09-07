<?php
  session_start();
  if(!isset($_SESSION['studentID'])) {
    echo "<script>alert('로그인을 해주세요');</script>";
    echo "<script>location.replace('../../index.php');</script>";
  }
  $connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die ("connect falied");
  $name = $_SESSION['name'];
  $id = $_SESSION['id'];
  $studentID = $_SESSION['studentID'];
  $authority = $_SESSION['authority'];
  $dept = $_SESSION['DPET'];
  $date = date("Y-m-d H:i:s");

  if ($authority === 'u'){
      $authority1 = '학생';
  } elseif ($authority === 'm') {
      $authority1 = '관리자';
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>와 즐거운 메시지 타임~~</h1>
    <h3>전송부</h3>
    <form class="" action="message_ok.php" method="post">
      <span><?php echo $name; ?></span>
      <span><?php echo $date; ?></span><br>
      <input type="text" name="toId" placeholder="전송할 아이디"><br><br>
      <input type="text" name="subject" placeholder="제목"><br><br>
      <textarea name="content" rows="8" cols="80" placeholder="내용"></textarea><br>
      <button type="submit" name="button">전송</button>
    </form>
    <hr>
    <h3>출력부</h3>
    <?php
      $query = "SELECT * FROM Message WHERE toId=$id ORDER BY idx DESC";
      $r = mysqli_query($connect, $query);
      while($message=mysqli_fetch_array($r)){
        $user_q = "SELECT * FROM usertable WHERE id=$message[fromId]";
        $user_r = mysqli_query($connect, $user_q);
        $user_result = mysqli_fetch_array($user_r);
    ?>
    보낸사람: <span><?php echo $user_result['name']; ?></span><br><br>
    보낸시간: <span><?php echo $message['date']; ?></span><br><br>
    제목: <span><?php echo $message['subject']; ?></span><br><br>
    내용: <span><?php echo $message['content']; ?></span><hr><br><br>
  <?php } ?>
  </body>
</html>
