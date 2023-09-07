<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <div id="sns_tit" class="blind">알고리즘실습 교과 안내</div>
    <div class="board_view">
      <div class="board_output"></div>

      <!-- board top 게시판 상단 :: s -->
      <div class="board_top">
        <div class="board_top_right">
          <span class="post_num">게시물번호 : <strong>653598</strong></span>
        </div>
      </div>
      <!-- board top 게시판목록 상단 :: e -->

      <!-- tbl view 게시판보기(일반) :: s -->
      <form id="boardDetail" name="detailfrm" action="/jungsu/board.do?menu=12492&amp;mode=view&amp;post=653598" method="post">
        <input type="hidden" name="pageIndex" value="1">
      </form>
      <table class="tbl_view have_img">
        <caption>게시글 내용</caption>
        <thead>
          <tr>
            <th style="height: 1px;padding: 0;border-bottom-width: 0px;" scope="row"></th>
            <td style="height: 1px;;padding: 0;border-bottom-width: 0px;" class="fst "></td>
          </tr>
          <tr>
            <th colspan="2" scope="col" class="tbl_view_tit">알고리즘실습 교과 안내</th>
          </tr>
          <tr>
            <td colspan="2" class="tbl_view_tititem">
              <span>인공지능소프트웨어과(학.하)</span>
              <span class="bar"> | </span>
              <span>2022-03-02 14:54:28           </span>
            </td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="2" class="txt_area">
              <p class="txt_area_box">
                알고리즘실습 교과목을 담당하는 인공지능소프트웨어과 이영주 교수입니다.<br><br>▶비대면 수업<br>- 코로나19로 인해 학교에 등교하지 않고 온라인 수업, 콘텐츠, 동영상, PPT 등으로 진행하는 비대면 수업을 하게되었습니다.(대면수업 전환시까지 적용)<br><br>[1]수업안내.<br>- 담당교과:알고리즘실습<br>- 교재: 파이썬 자료구조와 알고리즘(우재남, 한빛아카데미)<br>- 수업방식: Microsoft사의 Teams를 활용한 실시간 온라인 수업(Live 방송)<br>- 출석인정: 교수 음성강의 30분 이상 수업시 50분 인정<br>&nbsp; * 온라인 강의 상황에 따라 변경될수 있음<br><br>[2]실시간 온라인 수업 참여방법<br>- 한국폴리텍대학 학사정보시스템 연동된 Microsoft사의 Teams 활용<br>- 참여 팀 코드 :vkxtn7j<br><br>▷ 코로나19가 조속히 종료되고 늘 건강관리 잘하여 건강한 모습으로 학교에서 뵐 수있기를 기대합니다.<br><br>1) young.kopo@gmail.com<br>2)02-2001-413
              </p>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- tbl view 게시판보기(일반) :: e -->

      <!-- 학과관련 게시판 댓글 활성화 -->
      <!--  댓글 영역 -->
      <div class="comment_box">
        <p class="cnt_line">댓글<span class="cnt">0</span>개</p>
        <ul class="comment_list">
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
              <label for="comment_txt" class="blind">댓글</label>
              <input onclick="goLoginforComment();" placeholder="댓글을 작성해보세요." type="text" maxlength="200" class="comment_txt" id="comment_txt">
              <button type="button" class="btn_submit" disabled="disabled">
                <span>댓글등록</span>
              </button>
            </div>
          </div>
        </form>
      </div><!-- btnbox basic 게시판 일반 버튼 :: s -->
      <div class="btnbox_basic">
        <div class="btnbox_basic_left">
          <a href="#" onclick="fn_board_list(); return false;" class="btn_basic">
            <span>목록보기</span>
          </a>
        </div>
        <div class="btnbox_basic_right"></div>
      </div>
      <!-- btnbox basic 게시판 일반 버튼 :: e -->
      <form id="board2" name="board2" action="/jungsu/board.do?menu=12492&amp;mode=view&amp;post=653598" method="post">
        <input type="hidden" name="bbsId" value="cHNpZFpuOXJWYlNGRVBPeTUyOE11Z3d0ZFBlVEg0SFlDbzkrcHBGcDRHdz0=">
        <input type="hidden" name="nttId" value="653598">
      </form>
    </div>
    <!-- board view :: e -->
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
