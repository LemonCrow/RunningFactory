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

  $number = $_GET['number'];
  $query = "SELECT  * FROM freeboard WHERE idx = $number";
  $result = $connect->query($query);
  $rows = mysqli_fetch_assoc($result);
 ?>


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
                    <a href="02-classroom.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>강의실</a>
                     <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>자료실</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="03-1-archive.php" class="dropdown-item">자료실</a>
                            <a href="03-2-1-self-test.php" class="dropdown-item">셀프테스트</a>
                        </div>
                    </div>
                    <a href="04-freeboarder.php" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>자유게시판</a>
                    <div class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>마이페이지</a>
                      <div class="dropdown-menu bg-transparent border-0">
                          <a href="404.php" class="dropdown-item">내정보</a>
                          <?php
                          if ($authority === 'm') {
                          ?>
                          <a href="404.php" class="dropdown-item">관리자</a>
                          <?php } ?>
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
                          <?php
                            if($name == $rows['Name']){
                              ?>
                              <a href="04-3-freeboarderReWrite.php?number=<?php echo $rows['idx']; ?>" onclick="fn_board_list(); return false;" style='float: right;'>
                                <span>[수정]</span>
                              </a>
                              <a href="php/fbdelete.php?number=<?php echo $rows['idx']; ?>" onclick="fn_board_list(); return false;" style='float: right;'>
                                <span>[삭제]</span>
                              </a>
                              <?php
                            } else{
                              ?>
                              <a href="04-3-freeboarderReWrite.php?number=<?php echo $rows['idx']; ?>" onclick="fn_board_list(); return false;" style='float: right;' hidden>
                                <span>[수정]</span>
                              </a>
                              <a href="php/fbdelete.php?number=<?php echo $rows['idx']; ?>" onclick="fn_board_list(); return false;" style='float: right;' hidden>
                                <span>[삭제]</span>
                              </a>
                              <?php
                            }
                           ?>

                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td colspan="2" class="txt_area">
                          <form class="txt_area_box">
                            <?php echo $rows['content']; ?>
                          </form>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- tbl view 게시판보기(일반) :: e -->

                  <!-- 학과관련 게시판 댓글 활성화 -->
                  <!--  댓글 영역 -->
                  <div class="comment_box">
                    <p class="cnt_line">댓글<span class="cnt">3</span>개
                    </p>
                    <ul class="comment_list">
                  		<li>
                  				<ul class="comment_item">
                  					<li><span class="name">정재현</span><span class="date">2022-09-13 23:24:08</span></li>
                  					<li class="comment_txt">뽑아 주시면 열심히 하겠습니다!!</li>
                  					<li>
                  						<input type="hidden" name="commentNo" value="18677">
                  						<input type="hidden" name="wrterNm" value="">
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
                						<!-- <input type="text" class="name" value=" " readonly="readonly" title="작성자 이름"> -->
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
                      <a href="04-freeboarder.php" onclick="fn_board_list(); return false;" class="btn_basic">
                        <span>목록으로</span>
                      </a>
                      <a href="404.php" onclick="fn_board_list(); return false;" class="btn_basic" style='float: right;'>
                        <span>추천</span>
                      </a>
                      <a href="404.php" onclick="fn_board_list(); return false;" class="btn_basic" style='float: right;'>
                        <span>신고</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              </section>
            </div>

          <!-- </div>
        </div> -->

            <!-- boarder End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">러닝팩토리 AI+X 프로젝트 TEAM DEEP.INSIGHT</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">Team Deep.Insight</a>
                        </br>
                        Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">한국폴리텍대학 서울정수캠퍼스</a>
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
