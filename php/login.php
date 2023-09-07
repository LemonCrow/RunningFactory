<?php
	session_start();
	$host = 'localhost';
	$db_name = 'zerosugarlime';
	$db_conn = mysqli_connect("localhost", "zerosugarlime", "poly2305", "zerosugarlime");
	$username = $_POST['uname'];
	$userpass = $_POST['psw'];


	$q = "SELECT * FROM usertable WHERE studentID = '$username'";
	$result = mysqli_query($db_conn, $q);

	if(mysqli_num_rows($result)==1){

		$row = mysqli_fetch_assoc($result);

		$p = "SELECT * FROM usertable WHERE pw = '$userpass'";
		$result2 = mysqli_query($db_conn, $p);
		$row2 = mysqli_num_rows($result2);

		if(password_verify($userpass, $row['pw'])){
			$_SESSION['studentID'] = $row['studentID'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['authority'] = $row['authority'];
			$_SESSION['DEPT'] = $row['DEPT'];
			$_SESSION['id'] = $row['id'];
			echo "<script>location.replace('../LF_project/01-index.php');</script>";
			exit;
		}

	}

	if($row == Null or $row2 == 0){
		echo "<script>alert('아이디나 비밀번호가 틀립니다');</script>";
		echo "<script>location.replace('../index.php');</script>";
		exit;
	}
?>
