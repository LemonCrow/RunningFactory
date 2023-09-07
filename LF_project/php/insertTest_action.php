<?php

// 에러 검출기
// error_reporting(E_ALL);
// ini_set("display_errors", 1);


session_start();
if(!isset($_SESSION['studentID'])) {
  echo "<script>alert('로그인을 해주세요');</script>";
  echo "<script>location.replace('../../index.php');</script>";
}
$connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die ("connect falied");
// $authority = $_SESSION['authority'];

$studentID = $_SESSION['studentID']; //올린사람 특정을 위해
$subject = $_POST['subject']; //과목
$Q = $_POST['Q']; //문제
$A1 = $_POST['A1']; //1번 답
$A2 = $_POST['A2']; //2번 답
$A3 = $_POST['A3']; //3번 답
$A4 = $_POST['A4']; //4번 답
$A5 = $_POST['A5']; //5번 답
$A0 = $_POST['A0']; //정답 번호
$A_sub = $_POST['A_sub']; //주관식 정답 입력
$O_X = $_POST['O_X']; //OX문제 정답
$report = $_POST['report']; //신고 횟수 구현하지는 않을 예정
$date = date("y-m-d");
$category = $_POST['category']; //출제 유형
$DEPT = $_SESSION['DEPT']; //학과정보 가져오기



$query = "INSERT INTO $subject (studentID, category, Q, A1, A2, A3, A4, A5, A0, A_sub, O_X, date, DEPT) VALUES ('$studentID', '$category', '$Q', '$A1', '$A2', '$A3', '$A4', '$A5', '$A0', '$A_sub', '$O_X', '$date', '$DEPT');";

// 임시로 지정한 페이지 // 추후 후정 예
$url = '../03-2-3-insertTest.php';

$result = $connect->query($query);


if($result){
?>
<script>
  alert("<?php echo '문제가 등록되었습니다.'?>");
  location.replace("<?php echo $url ?>");
</script>
<?php
} else{
?>
  <script>
    alert("<?php echo '문제 등록에 실패했습니다.'?>");
    location.replace("<?php echo $url ?>");
  </script>
<?php
}

mysql_close($connect)
 ?>
