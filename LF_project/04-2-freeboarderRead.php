<?php
  session_start();
  if(!isset($_SESSION['studentID'])) {
    echo "<script>alert('로그인을 해주세요');</script>";
    echo "<script>location.replace('../../index.php');</script>";
  }
  $connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die ("connect falied");
  $name = $_SESSION['name'];
  $id = $_SESSION['studentID'];
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

  $liked_query = "SELECT COUNT(*) as cnt FROM liked_name WHERE liked_num = $number";
  $result2 = mysqli_query($connect, $liked_query);
  $rows2 = mysqli_fetch_assoc($result2);

  $reported_query = "SELECT COUNT(*) as cnt FROM reported_name WHERE reported_num = $number";
  $result3 = mysqli_query($connect, $reported_query);
  $rows3 = mysqli_fetch_assoc($result3);


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
    <script type="text/javascript">
    function btn(){
      alert('이미 추천하셨습니다.');
    }

    function btn2(){
      alert('이미 신고하셨습니다.');
    }
    </script>
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
                        <th>추천수: <?php echo $rows2['cnt']; ?> 신고수: <?php echo $rows3['cnt']; ?></th>

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
                  <!--- 댓글 불러오기 -->

                  <div class="comment_box">
                    <p class="cnt_line"> <span class="cnt">댓글목록</span> </p>
                    <?php
                      $query = "SELECT * FROM reply WHERE con_num=$rows[idx] ORDER BY idx DESC";
                      $r = mysqli_query($connect, $query);
                      while($reply=mysqli_fetch_array($r)){
                    ?>

                    <ul class="comment_list">
                      <li>
                        <ul class="comment_item">
                          <li>
                            <span class="name"><?php echo $reply['name'];?></span>
                            <span class="date"><?php echo $reply['date']; ?></span>
                          </li>
                          <li class="comment_txt"><?php echo nl2br("$reply[content]"); ?></li>
                          <li>
                            <?php
                            if($name == $reply['name']) {
                             ?>
                            <form class="" action="reply_delete.php" method="post" id="del_a">
                                <input type="hidden" name="commentNo" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="wrterNm" value="<?php echo $rows['idx']; ?>">
                                <span class="del"><a href="#" onclick="document.getElementById('del_a').submit();">삭제</a></span>
                                <button type="submit" name="button" style="border:0;background-color:white;color:red;">삭제</button>
                            </form>
                          </li>
                        </ul>
                      </li>
                    </ul>
                      <?php } ?>
                    <?php } ?>

                    <div class="comment_write">
                      <div class="input_box">
                        <form action="reply_ok.php?idx=<?php echo $rows['idx']; ?>" method="post">
                          <input type="hidden" name="commentCn" value="">
                          <label for="comment_txt" class="blind">댓글</label>
                          <input placeholder="댓글을 작성 하실 수 있습니다." type="text" maxlength="200" class="comment_txt" id="re_content">
                          <button type="submit" onclick="fn_comment_insert();" class="btn_submit" id="rep_bt"><span>댓글등록</span></button>
                        </form>
                      </div>
                    </div>











                  <div class="reply_view">
                  	<h1>댓글목록</h1><br>
                  		<?php
                        $query = "SELECT * FROM reply WHERE con_num=$rows[idx] ORDER BY idx DESC";
                        $r = mysqli_query($connect, $query);
                  			while($reply=mysqli_fetch_array($r)){
                  		?>
                  		<div class="dap_lo">
                  			<div><b><?php echo $reply['name'];?></b></div>
                  			<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
                  			<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
                  			<div class="rep_me rep_menu">
                          <?php
                          if($name == $reply['name']) {
                           ?>
                          <form action="reply_delete.php" method="post">
					                       <input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" />
                                 <input type="hidden" name="b_no" value="<?php echo $rows['idx']; ?>">
			 		                       <button type="submit" name="button" style="border:0;background-color:white;color:red;">삭제</button>
				                  </form>
                          <?php } ?>
                  			</div><br>
                  	<?php } ?>

                    <br><br><hr>
                      <div class="dap_ins">
                          <form action="reply_ok.php?idx=<?php echo $rows['idx']; ?>" method="post">
                            <span name="dat_user"><?php echo $name ?></span>
                            <div style="margin-top:10px; ">
                              <textarea name="content" class="reply_content" id="re_content" ></textarea>
                              <button id="rep_bt" class="re_bt">댓글</button>
                            </div>
                          </form>
                      </div>
                  </div>









                  <div class="btnbox_basic">
                    <div class="btnbox_basic_left">
                      <a href="04-freeboarder.php" onclick="fn_board_list(); return false;" class="btn_basic">
                        <span>목록으로</span>
                      </a>
                      <?php
                      $like_q = "SELECT * FROM liked_name WHERE id='$id' AND liked_num = $rows[idx]";
                      $like_r = mysqli_query($connect, $like_q);
                      $like_row = mysqli_fetch_assoc($like_r);
                      if($like_row){
                       ?>
                       <a href="#" onclick="javascript:btn();" class="btn_basic" style='float: right;background-color:red'>
                         <span>추천</span>
                       </a>
                     <?php }else{ ?>
                      <a href="liked_ok.php?idx=<?php echo $rows['idx']; ?>" onclick="fn_board_list(); return false;" class="btn_basic" style='float: right;'>
                        <span>추천</span>
                      </a>
                    <?php }
                    $report_q = "SELECT * FROM reported_name WHERE id='$id' AND reported_num = $rows[idx]";
                    $report_r = mysqli_query($connect, $report_q);
                    $report_row = mysqli_fetch_assoc($report_r);
                    if($report_row){
                     ?>
                      <a href="#" onclick="javascript:btn2();" class="btn_basic" style='float: right;background-color:yellow'>
                        <span>신고</span>
                      </a>
                    <?php }else{ ?>
                      <a href="reported_ok.php?idx=<?php echo $rows['idx']; ?>" onclick="fn_board_list(); return false;" class="btn_basic" style='float: right;'>
                        <span>신고</span>
                      </a>
                    <?php } ?>
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
