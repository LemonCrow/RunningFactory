<?php
	$createdate = date("Y-m-d"); //가입일자
	$name = $_POST['name']; //이름
	$DEPT = $_POST['DEPT']; //학과
	$studentID = $_POST['studentID']; //학번
	$pw = $_POST['pw1']; // 비번
	$pw_check = $_POST['pw2']; //비번재입력
	$authority = 'u'; //권한


	$num_studentID = preg_match('/[0-9]/u', $studentID); //학번 숫자입력
	$num_pw = preg_match('/[0-9]/u', $pw); //비밀번호 숫자입력
	$eng1_pw = preg_match('/[a-z]/u', $pw); //비밀번호 소문자입력
	$eng2_pw = preg_match('/[A-Z]/u', $pw); //비밀번호 대문자입력
    $spe_pw = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw); //비밀번호 특수문자입력
    $spe_name = preg_match("/[\!\@\#\$\%\^\&\*]/u",$name); //이름 특수문자입력
    $num_name = preg_match('/[0-9]/u', $name);


	if( !is_null($studentID)) { //학번이 입력되있으면 실행
		$DB_conn = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime'); //DB로그인 sql문
		$DB_sql = "SELECT studentID FROM usertable WHERE studentID = '$studentID';"; //학번 중복 확인 sql문
		$DB_result = mysqli_query($DB_conn, $DB_sql); //sql실행문
		while ( $DB_row = mysqli_fetch_array( $DB_result ) ) { //반복문으로 모든 유저 학번 중복 비교
      		$studentID_e = $DB_row['studentID']; //만약 중복이면 studentID_e에 해당 학번 대입
    	}

    	if ($spe_name != 0 || $num_name != 0) { //특수문자와 숫자 못들어가게
    		echo "<script>";
			echo "alert('이름은 특수문자를 입력할 수 없습니다.');";
			echo "window.location = '../index.php';"; //index.php 강제 이동
			echo "</script>";
    	} elseif ($studentID == $studentID_e) { //학번이 중복되면 실행
			echo "<script>";
			echo "alert('이미 가입하신 학번입니다');";
			echo "window.location = '../index.php';"; //index.php 강제 이동
			echo "</script>";
		} elseif (strlen($pw) < 8 || strlen($pw) > 16) { //비밀번호 자릿수 확인
			echo "<script>";
			echo "alert('비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 8자리에서 최대 16자리 이내로 입력해주세요. 길이');";
			echo "window.location = '../index.php';";
			echo "</script>";
		} elseif ($eng1_pw == 0 && $eng2_pw == 0) { //소대문자 상관없이 하나만 들어가도 되게
			echo "<script>";
			echo "alert('비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 8자리에서 최대 16자리 이내로 입력해주세요. 대소문자');";
			echo "window.location = '../index.php';";
			echo "</script>";
		} elseif ($num_pw == 0 || $spe_pw == 0) { //비밀번호 숫자, 특문 확인
			echo "<script>";
			echo "alert('비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 8자리에서 최대 16자리 이내로 입력해주세요. 특문');";
			echo "window.location = '../index.php';";
			echo "</script>";
		} elseif ($pw != $pw_check) { //비번이 다르면 수정점 문자+숫자+특문+8~16
			echo "<script>";
			echo "alert('비밀번호가 다릅니다. \\n비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 8자리에서 최대 16자리 이내로 입력해주세요.');";
			echo "window.location = '../index.php';";
			echo "</script>";
		} elseif ($num_studentID == 0) { //학번 숫자만 입력 확인
			echo "<script>";
			echo "alert('학번은 숫자만 입력해주세요.');";
			echo "window.location = '../index.php';";
			echo "</script>";
		} elseif (strlen($studentID) != 10) { //숫자 10자리 고정
			echo "<script>";
			echo "alert('학번을 확인해주세요.');";
			echo "window.location = '../index.php';";
			echo "</script>";
		} elseif ($DEPT == "" || $name == "" || $studentID == "" || $pw == ""){ //공백이 있다면
			echo "<script>";
			echo "alert('빈칸이 존재합니다');";
			echo "window.location = '../index.php';";
			echo "</script>";
		} else { //위의 조건을 다 피하면 실행
			$encrypted_password = password_hash($pw, PASSWORD_DEFAULT); // 비번 암호화
			$DB_sql_add_user = "INSERT INTO usertable (createdate, name, DEPT, studentID, pw, authority) VALUES ('$createdate', '$name', '$DEPT', '$studentID', '$encrypted_password', '$authority');"; //유저 테이블에 값 전송 sql문
			mysqli_query($DB_conn, $DB_sql_add_user); //sql실행
			echo "<script>";
			echo "alert('회원가입 성공!');";
			echo "window.location = '../index.php';";
			echo "</script>";
		}


	}

	?>
