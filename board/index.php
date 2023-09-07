<?php
	session_start();
	if(!isset($_SESSION['studentID'])) {
		echo "<script>";
		echo "alert('로그인을 해주세요');";
		echo "location.replace('../index.php');";
		echo "</script>";
	}

	else{
		$name = $_SESSION['name'];
		$authority = $_SESSION['authority'];
		$userid = $_SESSION['studentID'];
		$dept = $_SESSION['DEPT'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>임시 로그인 페이지</title>
</head>
<body>
	<h1>임시 로그인 페이지 입니다~~~</h1>
	<span><?php echo "환영합니다, {$name}님";?></span><br>
	<a href="lecture/index.php"><button>강의</button></a>
	<a href="freeboard/board.php"><button>자유게시판</button></a>
</body>
</html>
