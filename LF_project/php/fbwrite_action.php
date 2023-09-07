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
$authority = $_SESSION['authority'];
$date = date('yyyy-MM-dd');
$title = $_POST['title'];
$content = $_POST['content'];

$query = "INSERT INTO freeboard (studentID, title, Name, content, date) VALUES('$studentID', '$title','$name', '$content', '$date');";

$url = '../04-freeboarder.php';
$result = $connect->query($query);
if($result){
?>
<script>
  alert("<?php echo '게시글이 등록되었습니다.'?>");
  location.replace("<?php echo $url ?>");
</script>
<?php
} else{
  echo "게시글 등록에 실패했습니다.";
}

mysql_close($connect)
?>


<!-- //일단 파일 넣는건 생, 기본적 기능 구현 목적
// $img_file = $_FILES['img_file']['tmp_name'];

//strrchr() 문자열을 검색된 위치 이후 문자열만 반환

//write에서 값을 받아서 freeboard 데이터베이스에 저장을 해야한다. -->
