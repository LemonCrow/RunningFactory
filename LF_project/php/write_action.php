<?php
	session_start();
	if(!isset($_SESSION['studentID'])) {
		echo "<script>alert('로그인을 해주세요');</script>";
		echo "<script>location.replace('../../index.php');</script>";
	}
	$connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die ("connect falied");
	$authority = $_SESSION['authority'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$name = $_SESSION['name'];
  $studentID = $_SESSION['studentID'];
	$date = date('Y-m-d');
  $tmpfile =  $_FILES['t_file']['tmp_name'];
	$o_name = $_FILES['t_file']['name'];
  $tmpfile2 =  $_FILES['r_file']['tmp_name'];
	$o_name2 = $_FILES['r_file']['name'];
	$ext = substr(strrchr($o_name, '.'), 1);
  $ext2 = substr(strrchr($o_name2, '.'), 1);
	$filename = date('YmdHis').$studentID.".".$ext;
  $filename2 = date('YmdHis').$studentID.".".$ext2;
	$folder = "../text/".$filename;
  $folder2 = "../record/".$filename2;

	move_uploaded_file($tmpfile,$folder) or die("upload falied");
  move_uploaded_file($tmpfile2,$folder2) or die("upload falied");

	$url = '../01-index.php';

	$query = "INSERT INTO lecture (studentID, Name, title, content, rcontent, date, file, rfile) VALUES ('$studentID ','$name', '$title', '$o_name', '$filename', '$date', '$o_name2', '$filename2');";

	$result = $connect->query($query);
	if($result){
?>
<script>
	alert("<?php echo "게시글이 등록되었습니다." ?>");
	location.replace("<?php echo $url ?>");
</script>
<?php
} else{
	echo "게시글 등록에 실패하였습니다.";
}

mysql_close($connect);
?>
