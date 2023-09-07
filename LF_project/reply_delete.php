<?php
session_start();
if(!isset($_SESSION['studentID'])) {
  echo "<script>alert('로그인을 해주세요');</script>";
  echo "<script>location.replace('../../index.php');</script>";
}
$connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die ("connect falied");
$rno = $_POST['rno'];
$query = "SELECT * FROM reply WHERE idx=$rno";
$r = mysqli_query($connect, $query);
$reply = mysqli_fetch_array($r);

$bno = $_POST['b_no'];

$query2 = "SELECT * FROM freeboard WHERE idx=$bno";
$r2 = mysqli_query($connect, $query2);

$query3 = "DELETE FROM reply WHERE idx=$rno";
$r3 = mysqli_query($connect, $query3);
$board = mysqli_fetch_array($r3);

echo $rno;
echo $bno;
?>
<script type="text/javascript">alert('댓글이 삭제되었습니다.'); location.replace("04-2-freeboarderRead.php?number=<?php echo $bno ?>");</script>
