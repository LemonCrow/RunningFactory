
<?php
session_start();
if(!isset($_SESSION['studentID'])) {
  echo "<script>alert('로그인을 해주세요');</script>";
  echo "<script>location.replace('../../index.php');</script>";
}
$connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die ("connect falied");

$query = "SELECT FROM * AI_subject order by idx desc";

$result = mysqli_query($connect,$query);

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: "Lato", sans-serif;
}

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
}
  padding-right: 8px;

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

</style>
</head>
<body>

<div class="sidenav">
  <a href="intro.html">LF소개</a>
<!--   <a href="#services">Services</a> -->
  <a href="lecture.html">강의</a>
  <button class="dropdown-btn">자료실
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="test.php">자료실</a>
    <a href="selftest.php">셀프테스트</a>
  </div>
  <a href="board.html">자유게시판</a>
<!--   <a href="myInfo.html">내정보수정</a> -->

  <!-- test starts-->
  <button class="dropdown-btn">설정
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="myInfo.html">내정보수정</a>
    <a href="adminSettings.html">관리자모드</a>
  </div>
  <!-- test ends -->
</div>


<div class="main">
  <h2>학습자료업로드 - 시험 및 퀴즈</h2>
  <p>지난 중간고사, 기말고사, 기타 퀴즈 문제를 업로드하세요!</p>
  <hr>
  <!-- <form action="test_action.php" method="post">
  <label for="n-n-test">학년 및 학기 선택:</label>
  <select id="tests" name="semester">
    <option value="test-types" selected>===선택하세요===</option>
    <option value="1-1-mid">1학년 1학기 중간고사</option>
    <option value="1-2-final">1학년 2학기 기말고사</option>
    <option value="2-1-mid">2학년 1학기 중간고사</option>
    <option value="2-2-final">2학년 2학기 기말고사</option>
  </select>
  <input type="submit" value="모든 문항 저장하기">
</form>

  <form action="/action_page.php">
  <label for="ques-types">문항종류:</label>
  <select id="ques" name="ques">
    <option value="q-types" selected>===선택하세요===</option>
    <option value="q-type-1">4지선다형</option>
    <option value="q-type-2">5지선다형</option>
    <option value="q-type-3">O/X형</option>
    <option value="q-type-4">주관식</option>
  </select>
  <input type="submit" value="문항추가">
</form> -->

<!-- 4지선다형시작 -->
<!--  완성 후 액션 부분 주소 수정 필요 -->
<form class="" action="test_action.php" method="post">


  <!-- 과목선택: 과목을 끌어올 데이터베이스 하나 필요?? -->
  <label for="n-n-test">과목 선택:</label>
  <select id="tests" name="subject">
    <option value="test-types" selected>===선택하세요===</option>
    <option value="English">영어</option>
    <option value="DB_practice">데이터베이스실습</option>
    <option value="Python">파이썬</option>
    <option value="Java_Basics">자바기초  </option>

    <!-- 이게 왜 작동이 안될까나? -->



  </select>




  <!-- 문항 종류 입력 -->
  <label for="ques-types" hidden>문항종류:</label>
  <select id="ques" name="ques" hidden>
    <option value="q-types">===선택하세요===</option>
    <option value="4choice" selected>4지선다형</option>
    <option value="5choice">5지선다형</option>
    <option value="OX">O/X형</option>
    <option value="subjective">주관식</option>
  </select>



  <h3>4지선다형</h3>
  <p><input type ="text" name="Q" placeholder="문제를 입력하세요" required="required">
  </p>
  <table id="customers">
    <tr>
      <th>정답여부</th>
      <th>번호</th>
      <th>선택지</th>
    </tr>
    <tr>
      <td><input type="checkbox" name="A0" value="A1" ></td>
      <td>1</td>
      <td><input type ="text" name="A1" placeholder="1번 선택지 입력" required="required"></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="A0" value="A2"></td>
      <td>2</td>
      <td><input type ="text" name="A2" placeholder="2번선택지 입력" required="required"></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="A0" value="A3"></td>
      <td>3</td>
      <td><input type ="text" name="A3" placeholder="3번선택지 입력" required="required"></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="A0" value="A4"></td>
      <td>4</td>
      <td><input type ="text" name="A4" placeholder="4번선택지 입력" required="required"></td>
    </tr>
  </table>
  <button>저장</button>
  <style>
  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #customers tr:nth-child(even){background-color: #f2f2f2;}

  #customers tr:hover {background-color: #ddd;}

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }
  </style>
</form>
<!-- 4지선다형끝 -->
<!-- 5지선다시작 -->
<hr>

<br><br><br><br><br><br>
<hr>
<!--  완성 후 액션 부분 주소 수정 필요 -->
<form class="" action="test_action.php" method="post">

  <!-- 과목선택: 과목을 끌어올 데이터베이스 하나 필요?? -->
  <label for="n-n-test">과목 선택:</label>
  <select id="tests" name="subject">
    <option value="test-types" selected>===선택하세요===</option>
    <option value="English">영어</option>
    <option value="DB_practice">데이터베이스실습</option>
    <option value="Python">파이썬</option>
    <option value="Java_Basics">자바기초 </option>
  </select>
  <!-- <select name="DEPT"> <option value="인공지능소프트웨어과"></option> </select> -->

  <!-- 문항 종류 입력 -->
  <label for="ques-types" hidden>문항종류:</label>
  <select id="ques" name="ques" hidden>
    <option value="q-types">===선택하세요===</option>
    <option value="4choice" >4지선다형</option>
    <option value="5choice" selected>5지선다형</option>
    <option value="OX">O/X형</option>
    <option value="subjective">주관식</option>
  </select>


  <h3>5지선다형</h3>
  <p><input type ="text" name="Q" placeholder="문제를 입력하세요" required="required">
  </p>
  <table id="customers">
    <tr>
      <th>정답여부</th>
      <th>번호</th>
      <th>선택지</th>
    </tr>
    <tr>
      <td><input type="checkbox" name="A0" value="A1"></td>
      <td>1</td>
      <td><input type ="text" name="A1" placeholder="1번 선택지 입력" required="required"></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="A0" value="A2"></td>
      <td>2</td>
      <td><input type ="text" name="A2" placeholder="2번 선택지 입력" required="required"></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="A0" value="A3"></td>
      <td>3</td>
      <td><input type ="text" name="A3" placeholder="3번 선택지 입력" required="required"></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="A0" value="A4"></td>
      <td>4</td>
      <td><input type ="text" name="A4" placeholder="4번 선택지 입력" required="required"></td>
    </tr>
      <tr>
      <td><input type="checkbox" name="A0" value="A5"></td>
      <td>5</td>
      <td><input type ="text" name="A5" placeholder="5번 선택지 입력" required="required"></td>
    </tr>
  </table>
  <button>저장</button>
</form>
<!-- 5지선다끝 -->
<!-- OX문제시작 -->
<hr>

<br><br><br><br><br><br>
<hr>


<!--  완성 후 액션 부분 주소 수정 필요 -->
<form class="" action="test_action.php" method="post">

  <!-- 과목선택: 과목을 끌어올 데이터베이스 하나 필요?? -->
  <label for="n-n-test">과목 선택:</label>
  <select id="tests" name="subject">
    <option value="test-types" selected>===선택하세요===</option>
    <option value="English">영어</option>
    <option value="DB_practice">데이터베이스실습</option>
    <option value="Python">파이썬</option>
    <option value="Java_Basics">자바기초 </option>
  </select>




  <!-- 문항 종류 입력 -->
  <label for="ques-types" hidden>문항종류:</label>
  <select id="ques" name="ques" hidden>
    <option value="q-types">===선택하세요===</option>
    <option value="4choice" >4지선다형</option>
    <option value="5choice">5지선다형</option>
    <option value="OX" selected>O/X형</option>
    <option value="subjective">주관식</option>
  </select>


  <h3>OX문제</h3>
  <p><input type ="text" name="Q" placeholder="문제를 입력하세요" required="required">
  </p>
  <table id="customers">
    <tr>
      <th>정답여부</th>
      <th>O / X</th>

    </tr>
    <tr>
      <td><input type="checkbox" name="O_X" value="O"></td>
      <td>O</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="O_X" value="X"></td>
      <td>X</td>
    </tr>
    </table>
  <button>저장</button>
</form>
<!-- 주관식문제시작 -->
<hr>

<br><br><br><br><br><br>
<hr>
<!--  완성 후 액션 부분 주소 수정 필요 -->
<form class="" action="test_action.php" method="post">
  <!-- 과목선택: 과목을 끌어올 데이터베이스 하나 필요?? -->
  <label for="n-n-test">과목 선택:</label>
  <select id="tests" name="subject">
    <option value="test-types" selected>===선택하세요===</option>
    <option value="English">영어</option>
    <option value="DB_practice">데이터베이스실습</option>
    <option value="Python">파이썬</option>
    <option value="Java_Basics">자바기초 </option>
  </select>



  <!-- 문항 종류 입력 -->
  <label for="ques-types" hidden>문항종류:</label>
  <select id="ques" name="ques" hidden>
    <option value="q-types">===선택하세요===</option>
    <option value="4choice">4지선다형</option>
    <option value="5choice">5지선다형</option>
    <option value="OX">O/X형</option>
    <option value="subjective" selected>주관식</option>
  </select>




  <h3>주관식문제</h3>
  <p><input type ="text" name="Q" placeholder="문제를 입력하세요" required="required">
  </p>
  <input type="text" name="A_sub" placeholder="답안작성란" required="required">
  <button>저장</button>
</form>
<!-- 주관식문제끝 -->
</div>
<hr>


<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

</script>

</body>
</html>
