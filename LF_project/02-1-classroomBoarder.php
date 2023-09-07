<?php
  session_start();
  if(!isset($_SESSION['studentID'])) {
    echo "<script>alert('로그인을 해주세요');</script>";
    echo "<script>location.replace('../../index.php');</script>";
  }
  $connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die ("connect falied");
  $name = $_SESSION['name'];
  $studentID = $_SESSION['studentID'];
  $authority = $_SESSION['authority'];
  $dept = $_SESSION['DPET'];

  if ($authority === 'u'){
      $authority1 = '학생';
  } elseif ($authority === 'm') {
      $authority1 = '관리자';
  }
 ?>

<!-- 자유게시판 php 시작 -->
 <?php

 //에러 검출기
 /*error_reporting(E_ALL);
 ini_set("display_errors", 1);*/



 $connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die("connect falied");


 // 페이지 설정
 $page_set = 10; // 한페이지 줄수
 $block_set = 10; // 한페이지 블럭수

 /*$query = "SELECT count(idx) as total FROM freeboard";*/
 $query = "SELECT * FROM lecture order by idx desc";
 $result = mysqli_query($connect, $query) or die ("쿼리 에러 : ".mysqli_error($connect));


 $total = mysqli_num_rows($result); // 전체글수

 $total_page = ceil ($total / $page_set); // 총페이지수(올림함수)
 $total_block = ceil ($total_page / $block_set); // 총블럭수(올림함수)

 $page = isset($_GET["page"])? $_GET["page"] : 1; // 현재페이지(넘어온값)
 $block = ceil ($page / $block_set); // 현재블럭(올림함수)

 $limit_idx = ($page - 1) * $page_set; // limit시작위치

 // 현재페이지 쿼리
 $query = "SELECT * FROM lecture ORDER BY idx DESC LIMIT $limit_idx, $page_set";
 $result = mysqli_query($connect, $query);

 ?>
<!-- 자유게시판 php 끝-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>러닝팩토리 Deep.Insight</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style >
      @import url("../CSS/test.css");
    </style>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="01-index.php" class="navbar-brand mx-4 mb-3">
                    <h4 class="text-primary">Running Factory<i class="fas fa-running"></i></h4>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $name ?></h6>
                        <span><?php echo $authority1 ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="01-index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>홈</a>
                    <a href="02-classroom.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>강의실</a>
                     <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>자료실</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="03-1-archive.php" class="dropdown-item">자료실</a>
                            <a href="03-2-1-self-test.php" class="dropdown-item">셀프테스트</a>
                        </div>
                    </div>
                    <a href="04-freeboarder.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>자유게시판</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>설정</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../index.php" class="dropdown-item">로그인</a>
                            <a href="05-2-signup.php" class="dropdown-item">회원가입</a>
                            <a href="404.php" class="dropdown-item">관리자페이지</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="01-index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="검색">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">메시지함</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">강병준님이 메시지를 보냈습니다.</h6>
                                        <small>15분 전</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">이영주님이 메시지를 보냈습니다.</h6>
                                        <small>1시간 전</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">김정수님이 메시지를 보냈습니다.</h6>
                                        <small>2일 전</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">전체보기</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">알림</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">내정보가 수정되었습니다.</h6>
                                <small>1시간 전</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">신고가 접수되었습니다.</h6>
                                <small>4시간 전</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">새 관리자를 등록하였습니다.</h6>
                                <small>1일 전</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">전체보기</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $name ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">내정보</a>
                            <a href="#" class="dropdown-item">설정</a>
                            <a href="../index.php" class="dropdown-item">로그아웃</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- boarder Start -->
            <div class="main">
              <section id="contents" class="bbs">
              <div class="contents_box">

                <!-- board_top 게시판목록 상단 :: s -->
            <div class="board_top">
              <div class="board_top_left">
                <div class="ts_box">
                  <p class="total">게시판 게시물 갯수</p> <!-- 게시판 게시물 갯수 -->
                </div>
              </div>

                <!-- board_top_right board_top 토탈 및 게시판 검색과 제목 박스 -->
              <div class="board_top_right">
                <form name="bbsschfrm" method="post" action="php/search.php">
                  <input type="hidden" name="bbsId" value="cHNpZFpuOXJWYlNGRVBPeTUyOE11Z3d0ZFBlVEg0SFlDbzkrcHBGcDRHdz0=">
                  <fieldset>
                    <legend>자유게시판</legend>
                    <div class="bsch_box">
                      <label class="blind" for="bsch_item">검색 항목 선택</label>
                      <select class="" name="searchCnd" id="bsch_item">
                        <option value="title">제목</option>
                        <option value="name">작성자</option>
                        <option value="conten">내용</option>
                        </select>
                      <label class="blind" for="bsch_txt">검색 내용 입력(검색)</label>

                       <!-- 검색박스  -->
                      <input type="text" class="text" id="bsch_txt" name="searchWrd" value="">

                      <!-- 검색 버튼 -->
                      <button type="submit" class="btn_bsch"><span>검색</span></button>
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
                      <colgroup>
                        <col style="width: 6%">
                              <col><col style="width: 13%">
                              <col style="width: 11%">
                              </colgroup>
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
                        while ($rows = mysqli_fetch_assoc($result)) { //result set에서 레코드(행)를 1개씩 리턴
                            ?>
                                <td class="num">
                                  <a href="02-2-classroomRead.php?number=<?php echo $rows['idx']; ?>" class="a1">
                                  <?php echo $page_set; ?>
                                </td>
                                 <td class="b_subject ">
                                  <span>
                                    <a href="02-2-classroomRead.php?number=<?php echo $rows['idx']; ?>" class="a1">
                                    <?php echo $rows['title']; ?></a>
                                  </span>
                                </td>
                                <td>
                                  <a href="02-2-classroomRead.php?number=<?php echo $rows['idx']; ?>" class="a1">
                                  <?php echo $rows['Name']; ?></td>
                                <td>
                                  <a href="02-2-classroomRead.php?number=<?php echo $rows['idx']; ?>" class="a1">
                                  <?php echo $rows['date']; ?></td>
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
                      <a href="php/write.php" class="btn_basic"><span>글쓰기</span></a>
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
                      /*echo ($prev_page > 0) ? "<a href='$PHP_SELF?page=$prev_page'>[prev]</a> " : "[이전] ";
                      echo ($prev_block > 0) ? "<a href='$PHP_SELF?page=$prev_block_page'>...</a> " : "... ";*/

                      for ($i=$first_page; $i<=$last_page; $i++) {
                      echo ($i != $page) ? "<a href='$PHP_SELF?page=$i'>$i</a> " : "<a href='#' style='font-weight: bold;'>$i</a> ";
                      }

                      echo ($next_page <= $total_page) ? "<a href='$PHP_SELF?page=$next_page' class='btn_next'><span>다</span></a>" : "<a href='#' class='btn_next' style='pointer-events: none;'><span>다</span></a>";
                      echo ($next_page <= $total_page) ? "<a href='$PHP_SELF?page=$total_page' class='btn_last'><span>맨</span></a>" : "<a href='#' class='btn_last' style='pointer-events: none;'><span>맨</span></a>";
                      /*echo ($next_block <= $total_block) ? "<a href='$PHP_SELF?page=$next_block_page'>...</a> " : "... ";
                      echo ($next_page <= $total_page) ? "<a href='$PHP_SELF?page=$next_page'>[next]</a>" : "[next]";*/
                    ?>
                  </div>
                </div>
                <!-- board list :: e -->
              </div>
            <!-- </div>
          </div> -->
<!--
                </div>
            </div> -->
            <!-- boarder End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#" color: "#009CFF";>러닝팩토리 AI+X 프로젝트 TEAM Deep!nsight</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://www.naver.com" color: "#009CFF">Team Deep!nsight</a>
                        </br>
                        Distributed By <a class="border-bottom" href="https://www.naver.com" target="_blank" color: "#009CFF">한국폴리텍대학 서울정수캠퍼스 AISW</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
