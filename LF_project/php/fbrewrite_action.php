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

// $result = $connect->query($query);
$number = $_GET['number'];
$title = $_POST['title'];
$content = $_POST['content'];
$result = $connect->query($query);
$url = '../04-freeboarder.php';

$query = "UPDATE freeboard SET title ='$title', content = '$content' WHERE idx = '$number' ";
$result = $connect->query($query);

 ?>

 <script>
   alert("<?php echo '게시글이 수정되었습니다.'?>");
   location.replace("<?php echo $url ?>");
 </script>
