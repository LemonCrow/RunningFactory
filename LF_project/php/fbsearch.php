<?php

//에러 검출기
/*error_reporting(E_ALL);
ini_set("display_errors", 1);*/



$connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die("connect falied");


// 페이지 설정
$page_set = 10; // 한페이지 줄수
$block_set = 10; // 한페이지 블럭수

/*$query = "SELECT count(idx) as total FROM freeboard";*/
$query = "SELECT * FROM freeboard order by idx desc";
$result = mysqli_query($connect, $query) or die ("쿼리 에러 : ".mysqli_error($connect));


$total = mysqli_num_rows($result); // 전체글수

$total_page = ceil ($total / $page_set); // 총페이지수(올림함수)
$total_block = ceil ($total_page / $block_set); // 총블럭수(올림함수)

$page = isset($_GET["page"])? $_GET["page"] : 1; // 현재페이지(넘어온값)
$block = ceil ($page / $block_set); // 현재블럭(올림함수)

$limit_idx = ($page - 1) * $page_set; // limit시작위치

// 현재페이지 쿼리
$query = "SELECT * FROM freeboard ORDER BY idx DESC LIMIT $limit_idx, $page_set";
$result = mysqli_query($connect, $query);

?>




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
  <section id="contents" class="bbs">
  <div class="contents_box">

    <!-- board_top 게시판목록 상단 :: s -->
<div class="board_top">
  <div class="board_top_left">
    <div class="ts_box">
      <p class="total">게시판 </p> <!-- 게시판 게시물 갯수 -->
    </div>
  </div>

    <!-- board_top_right board_top 토탈 및 게시판 검색과 제목 박스 -->
  <div class="board_top_right">
    <form name="bbsschfrm" method="post" action="search.php">
      <!-- <input type="hidden" name="bbsId" value="cHNpZFpuOXJWYlNGRVBPeTUyOE11Z3d0ZFBlVEg0SFlDbzkrcHBGcDRHdz0="> -->
      <fieldset>
        <legend>자유게시판</legend>
        <div class="bsch_box">
          <label class="blind" for="bsch_item">검색 항목 선택</label>
          <select class="" name="category" id="bsch_item">
            <option value="title">제목</option>
            <option value="Name">작성자</option>
            <option value="content">내용</option>
            </select>
          <label class="blind" for="bsch_txt">검색 내용 입력(검색)</label>

           <!-- 검색박스  -->
          <input type="text" id="bsch_txt" name="searchWrd" required="required">

          <!-- 검색 버튼 -->
          <button class="btn_bsch"><span>검색</span></button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
    <!-- board top 게시판목록 상단 :: e -->



<!-- tbl_list 게시판목록 :: s -->


      <!-- 게시판 전체 -->
      <form id="boardList" name="listfrm" action="/jungsu/board.do?menu=12492" method="post">
        <input type="hidden" name="bbsId" value="cHNpZFpuOXJWYlNGRVBPeTUyOE11Z3d0ZFBlVEg0SFlDbzkrcHBGcDRHdz0=">
        <input type="hidden" name="pageIndex" value="1">
        <input type="hidden" name="withDbAt" value="N">
        <table class="tbl_list">
        <!-- 컨텐츠 게시판 테이블  -->
          <br>
          <!-- 게시판 이름 -->
          <caption>학과게시판 목록</caption>
          <colgroup>
            <col style="width: 6%">
                  <col><col style="width: 13%">
                  <col style="width: 11%">
                  </colgroup>

          <?php
          $category = $_POST['category'];
          $searchWrd = $_POST['searchWrd'];
           ?>
          <!-- thead 게시판 제목, 작성자, 작성일 -->
          <thead>
            <tr>
              <th scope="col">번호</th>
              <th scope="col">제목</th>
              <th scope="col">작성자</th>
              <th scope="col">작성일</th>
            </tr>
          </thead>
          <!-- tbody 작성된 게시글 -->
          <tbody>
            <!-- total이 페이지마다 줄어들지 않고 고정으로 되어있음 수정이 필요 -->
            <?php
            $query = "SELECT * FROM freeboard where $category like '%$searchWrd%' ORDER BY idx DESC LIMIT $limit_idx, $page_set";
            $result = mysqli_query($connect, $query);
            while ($rows = mysqli_fetch_assoc($result)) { //result set에서 레코드(행)를 1개씩 리턴
                ?>
                    <td class="num"><?php echo $page_set ?></td>
                     <td class="b_subject ">
                      <span>
                        <a href="read.php?number=<?php echo $rows['idx'] ?>">
                            <?php echo $rows['title'] ?></a>
                      </span>
                    </td>
                    <td><?php echo $rows['Name'] ?></td>
                    <td><?php echo $rows['date'] ?></td>
                    </tr>
                <?php
                $page_set--;
             }
                ?>
            <!-- 필요한 속성 idx / title / Name / date -->

          </tbody>
        </table>
      </form><!-- board list 게시판목록 :: e -->


      <!-- btnbox basic 게시판 글쓰기 버튼 :: s -->
      <div class="btnbox_basic">
          <div class="btnbox_basic_right">
          <a href="write.php" class="btn_basic"><span>글쓰기</span></a>
          </div>
        </div>
      <!-- btnbox basic 게시판 글쓰기 버튼 :: e -->


      <!-- 게시판 하단 paging 페이징  :: s -->
      <div class="paging">
        <?php
// 페이지번호 & 블럭 설정
          $first_page = (($block - 1) * $block_set) + 1; // 첫번째 페이지번호
          $last_page = min ($total_page, $block * $block_set); // 마지막 페이지번호

          $prev_page = $page - 1; // 이전페이지
          $next_page = $page + 1; // 다음페이지

          $prev_block = $block - 1; // 이전블럭
          $next_block = $block + 1; // 다음블럭

          // 이전블럭을 블럭의 마지막으로 하려면...
          $prev_block_page = $prev_block * $block_set; // 이전블럭 페이지번호
          // 이전블럭을 블럭의 첫페이지로 하려면...
          //$prev_block_page = $prev_block * $block_set - ($block_set - 1);
          $next_block_page = $next_block * $block_set - ($block_set - 1); // 다음블럭 페이지번호

          // 페이징 화면
          echo ($prev_page > 0) ? "<a href='$PHP_SELF?page=1' class='btn_fst'><span>처</span></a>" : "<a href='#' class='btn_fst' style='pointer-events: none';><span>처</span></a>";
          echo ($prev_page > 0) ? "<a href='$PHP_SELF?page=$prev_page' class='btn_pre'><span>이</span></a>" : "<a href='#' class='btn_pre' style='pointer-events: none';><span>이</span></a>";

          for ($i=$first_page; $i<=$last_page; $i++) {
          echo ($i != $page) ? "<a href='$PHP_SELF?page=$i'>$i</a> " : "<a href='#' style='font-weight: bold;'>$i</a> ";
          }

          echo ($next_page <= $total_page) ? "<a href='$PHP_SELF?page=$next_page' class='btn_next'><span>다</span></a>" : "<a href='#' class='btn_next' style='pointer-events: none;'><span>다</span></a>";
          echo ($next_page <= $total_page) ? "<a href='$PHP_SELF?page=$total_page' class='btn_last'><span>맨</span></a>" : "<a href='#' class='btn_last' style='pointer-events: none;'><span>맨</span></a>";


        ?>

      </div>
    </div>
    <!-- board list :: e -->
  </div>
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

/* 게시판 페이지 이동 @param page 페이지번호 */
function fn_board_pageMove(page) {
	document.bschfrm.pageIndex.value = page;
	document.bschfrm.submit();
}
</script>

</body>
</html>
