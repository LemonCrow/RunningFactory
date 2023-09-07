<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
  $connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime');
  $number = $_GET['number'];
  session_start();
  $query = "SELECT  * FROM freeboard WHERE idx = $number";
  $result = $connect->query($query);
  $rows = mysqli_fetch_assoc($result);
  // $file = "../text/".$rows['rcontent'];
  // $file2 = "../record/".$rows['rfile'];
?>

<style>
  @import url("../../../CSS/test.css");
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
    <a href="archive.html">자료실</a>
    <a href="selfTest.html">셀프테스트</a>
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
  <section id="contents">
  <div class="contents_box">
    <!-- board view :: s -->
    <div class="board_view">
      <!-- tbl view 게시판보기(일반) :: s -->

      <table class="tbl_view have_img">
        <caption>게시글 내용</caption>
        <thead>
          <tr>
            <th style="height: 1px;padding: 0;border-bottom-width: 0px;" scope="row"></th>
            <td style="height: 1px;;padding: 0;border-bottom-width: 0px;" class="fst "></td>
          </tr>
          <tr>
            <th colspan="2" scope="col" class="tbl_view_tit"><?php echo $rows['title']; ?></th>
          </tr>
          <tr>
            <td colspan="2" class="tbl_view_tititem">
              <span><?php echo $rows['Name']; ?></span>
              <span class="bar"> | </span>
              <span><?php echo $rows['date']; ?></span>
              <a href="rewrite.php?number=<?php echo $rows['idx']; ?>" onclick="fn_board_list(); return false;" style='float: right;'>
                <span>[수정]</span>
              </a>
              <a href="delete.php?number=<?php echo $rows['idx']; ?>" onclick="fn_board_list(); return false;" style='float: right;'>
                <span>[삭제]</span>
              </a>
            </td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="2" class="txt_area">
              <p class="txt_area_box">
                <?php echo $rows['content']; ?>
              </p>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- tbl view 게시판보기(일반) :: e -->

      <!-- 학과관련 게시판 댓글 활성화 -->
      <!--  댓글 영역 -->
      <div class="comment_box">
        <p class="cnt_line">댓글<span class="cnt">0</span>개
        </p>
        <ul class="comment_list">
      		<li>
      				<ul class="comment_item">
      					<li><span class="name">정재현</span><span class="date">2022-09-13 23:24:08</span></li>
      					<li class="comment_txt">123</li>
      					<li>
      						<input type="hidden" name="commentNo" value="18677">
      						<input type="hidden" name="wrterNm" value="정재현">
      <!-- 				<label for="comment_pw" class="blind">댓글비밀번호</label><input placeholder="댓글 작성시 등록한 확인용번호를 입력하세요." type="text" class="comment_pw" id="comment_pw" /> -->
      						<span class="can on"><a href="#" onclick="commentEditMode(this, true); return false;">수정</a><span class="bar"> | </span></span>
      						<span class="can"><a href="#" onclick="commentEditMode(this, false); return false;">취소</a><span class="bar"> | </span></span>
      						<span class="del"><a href="javascript:fn_comment_delete('18677')">삭제</a></span>
      					</li>
      				</ul>
      			</li>
      		</ul>
          <!-- 작성한 댓글 전송,  -->
        <form id="comment" name="cmtfrm" action="/jungsu/board.do?menu=12492&amp;mode=view&amp;post=653598" method="post"><input type="hidden" name="csrf" value="ec728d6c-fd92-4edd-bebb-e7980a14ff19">
          <input type="hidden" name="lang" value="ko">
          <input type="hidden" name="bbsId" value="cHNpZFpuOXJWYlNGRVBPeTUyOE11Z3d0ZFBlVEg0SFlDbzkrcHBGcDRHdz0=">
          <input type="hidden" name="nttId" value="653598">
          <input type="hidden" name="commentNo">
          <input type="hidden" name="post" value="653598">
          <input type="hidden" name="menu" value="12492">
          <div class="comment_write">
    			<div class="input_box">
    					<div>
    						<input type="text" class="name" value="정재현" readonly="readonly" title="작성자 이름">
    						</div>
    					<input type="hidden" name="commentCn">
    					<label for="comment_txt" class="blind">댓글</label><input placeholder="댓글을 작성 하실 수 있습니다." type="text" maxlength="200" class="comment_txt" id="comment_txt" onkeypress="if(event.keyCode==13) {fn_comment_insert(); return false;}">
    					<button type="button" onclick="fn_comment_insert();" class="btn_submit"><span>댓글등록</span></button>
    				</div>
    			</div>
        </form>
      </div><!-- btnbox basic 게시판 일반 버튼 :: s -->
      <div class="btnbox_basic">
        <div class="btnbox_basic_left">
          <a href="../board.php" onclick="fn_board_list(); return false;" class="btn_basic">
            <span>목록으로</span>
          </a>
          <a href="../board.php" onclick="fn_board_list(); return false;" class="btn_basic" style='float: right;'>
            <span>추천</span>
          </a>
          <a href="../board.php" onclick="fn_board_list(); return false;" class="btn_basic" style='float: right;'>
            <span>신고</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  </section>
</div>


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
