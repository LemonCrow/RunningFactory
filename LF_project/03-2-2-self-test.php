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

  $numbers = $_POST['numbers'];
  $ques = $_POST['ques'];
  $subject = $_POST['subject'];

  $query = "SELECT * FROM $subject order by rand() desc limit $numbers";
  $result = mysqli_query($connect, $query);

  $total = mysqli_num_rows($result);
  // if(isset($_GET['page']))
  //   $page = $_GET['page'];
  // else
  //   $page = 1;
  // }
  //
  if ($authority === 'u'){
      $authority1 = '학생';
  } elseif ($authority === 'm') {
      $authority1 = '관리자';
  }


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>러닝팩토리 Deep Insight</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywor99ds">
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
                    <a href="04-freeboarder.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>자유게시판</a>
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



            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <form class="" action="checkScore.php" method="post">
                  <div class="row g-4">
                    <?php
                      for($i = 1; $i <= $numbers; $i++){
                        ?>
                          <input type="text" name="Q[<?php echo $i ?>]" value="" hidden>
                        <?php
                      }

                      $a = 1; //while 순차 상승값
                      while($rows = mysqli_fetch_assoc($result)){
                        $c = $rows['A0'];
                        $answer[$a-1] = "$c";
                        if($rows['category'] == '4choice'){
                          ?>
                            <div class="col-12">
                                <div class="bg-light rounded h-100 p-4">
                                    <h4 class="mb-4"><?php echo $a?>번 문제</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="50"></th>
                                                    <th scope="col"> <pre style="white-space: pre-wrap;"><?php echo nl2br($rows['Q']); ?></pre> </th>
                                                    <th scope="col"></th>
                                                    <th scope="col" width="60">정답</th>
                                                    <!-- <th scope="col">Country</th>
                                                    <th scope="col">ZIP</th>
                                                    <th scope="col">Status</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td><?php echo $rows['A1'] ?></td>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                            name="Q[<?php echo $a?>]" id="flexRadioDefault2" value="1">
                                                        </div>
                                                    </td>
                                                    <!-- <td>USA</td>
                                                    <td>123</td>
                                                    <td>Member</td> -->
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td><?php echo $rows['A2'] ?></td>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                            name="Q[<?php echo $a?>]" id="flexRadioDefault2" value="2">
                                                        </div>
                                                    </td>
                                                    <!-- <td>UK</td>
                                                    <td>456</td>
                                                    <td>Member</td> -->
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td><?php echo $rows['A3'] ?></td>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                            name="Q[<?php echo $a?>]" id="flexRadioDefault2" value="3">
                                                        </div>
                                                    </td>
                                                    <!-- <td>AU</td>
                                                    <td>789</td>
                                                    <td>Member</td> -->
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td><?php echo $rows['A4'] ?></td>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                            name="Q[<?php echo $a?>]" id="flexRadioDefault2" value="4">
                                                        </div>
                                                    </td>
                                                    <!-- <td>AU</td>
                                                    <td>789</td>
                                                    <td>Member</td> -->
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                          <?php
                        }elseif ($rows['category'] == '5choice') {
                          ?>
                          <div class="col-12">
                              <div class="bg-light rounded h-100 p-4">
                                  <h4 class="mb-4"><?php echo $a?>번 문제</h4>
                                  <div class="table-responsive">
                                      <table class="table">
                                          <thead>
                                              <tr>
                                                  <th scope="col" width="50"></th>
                                                  <th scope="col"><pre style="white-space: pre-wrap;"><?php echo nl2br($rows['Q']); ?></pre></th>
                                                  <th scope="col"></th>
                                                  <th scope="col" width="60">정답</th>
                                                  <!-- <th scope="col">Country</th>
                                                  <th scope="col">ZIP</th>
                                                  <th scope="col">Status</th> -->
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <th scope="row">1</th>
                                                  <td><?php echo $rows['A1'] ?></td>
                                                  <td>

                                                  </td>
                                                  <td>
                                                      <div class="form-check">
                                                          <input class="form-check-input" type="radio"
                                                          name="Q[<?php echo $a?>]" id="flexRadioDefault2" value="1">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">2</th>
                                                  <td><?php echo $rows['A2'] ?></td>
                                                  <td>

                                                  </td>
                                                  <td>
                                                      <div class="form-check">
                                                          <input class="form-check-input" type="radio"
                                                          name="Q[<?php echo $a?>]" id="flexRadioDefault2" value="2">
                                                      </div>
                                                  </td>
                                                  <!-- <td>UK</td>
                                                  <td>456</td>
                                                  <td>Member</td> -->
                                              </tr>
                                              <tr>
                                                  <th scope="row">3</th>
                                                  <td><?php echo $rows['A3'] ?></td>
                                                  <td>

                                                  </td>
                                                  <td>
                                                      <div class="form-check">
                                                          <input class="form-check-input" type="radio"
                                                          name="Q[<?php echo $a?>]" id="flexRadioDefault2" value="3">
                                                      </div>
                                                  </td>
                                                  <!-- <td>AU</td>
                                                  <td>789</td>
                                                  <td>Member</td> -->
                                              </tr>
                                              <tr>
                                                  <th scope="row">4</th>
                                                  <td><?php echo $rows['A4'] ?></td>
                                                  <td>

                                                  </td>
                                                  <td>
                                                      <div class="form-check">
                                                          <input class="form-check-input" type="radio"
                                                          name="Q[<?php echo $a?>]" id="flexRadioDefault2" value="4">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">5</th>
                                                  <td><?php echo $rows['A5'] ?></td>
                                                  <td>

                                                  </td>
                                                  <td>
                                                      <div class="form-check">
                                                          <input class="form-check-input" type="radio"
                                                          name="Q[<?php echo $a?>]" id="flexRadioDefault2" value="5">
                                                      </div>
                                                  </td>
                                                  <!-- <td>AU</td>
                                                  <td>789</td>
                                                  <td>Member</td> -->
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <?php
                        }elseif ($rows['category'] == 'OX') {
                          ?>
                          <div class="col-12">
                              <div class="bg-light rounded h-100 p-4">
                                  <h4 class="mb-4"><?php echo $a?>번 문제</h4>
                                  <div class="table-responsive">
                                      <table class="table">
                                          <thead>
                                              <tr>
                                                  <th scope="col" width="50"></th>
                                                  <th scope="col"><pre style="white-space: pre-wrap;"><?php echo nl2br($rows['Q']); ?></pre></th>
                                                  <th scope="col"></th>
                                                  <th scope="col" width="60">정답</th>
                                                  <!-- <th scope="col">Country</th>
                                                  <th scope="col">ZIP</th>
                                                  <th scope="col">Status</th> -->
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <th scope="row">1</th>
                                                  <td>O (그렇다)</td>
                                                  <td>

                                                  </td>
                                                  <td>
                                                      <div class="form-check">
                                                          <input class="form-check-input" type="radio"
                                                          name="Q[<?php echo $a?>]" id="flexRadioDefault2" value="O">
                                                      </div>
                                                  </td>
                                                  <!-- <td>USA</td>
                                                  <td>123</td>
                                                  <td>Member</td> -->
                                              </tr>
                                              <tr>
                                                  <th scope="row">2</th>
                                                  <td>X (아니다)</td>
                                                  <td>

                                                  </td>
                                                  <td>
                                                      <div class="form-check">
                                                          <input class="form-check-input" type="radio"
                                                          name="Q[<?php echo $a?>]" id="flexRadioDefault2" value="X">
                                                      </div>
                                                  </td>
                                                  <!-- <td>UK</td>
                                                  <td>456</td>
                                                  <td>Member</td> -->
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <?php
                        }elseif ($rows['category'] == 'subjective') {
                          ?>
                          <div class="col-12">
                              <div class="bg-light rounded h-100 p-4">
                                  <h4 class="mb-4"><?php echo $a?>번 문제</h4>
                                  <div class="table-responsive">
                                      <table class="table">
                                          <thead>
                                              <tr>
                                                <th scope="col"></th>
                                                <th scope="col"><pre style="white-space: pre-wrap;"><?php echo nl2br($rows['Q']); ?></pre></th>
                                                <th scope="col" width="60"></th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <th scope="col" width="80">정답</th>
                                                  <td>
                                                    <input class="form-control form-control-sm" type="text"
                                                    placeholder="답안을 작성하세요." aria-label=".form-control-sm example" name="Q[<?php echo $a?>]">
                                                  </td>
                                                  <td>

                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <?php
                        }
                        ?>
                        <input type="text" name="q_idx[<?php echo $a ?>]" value="<?php echo $rows['idx'] ?>" hidden>
                        <?php
                        $a++;
                      }

                      ?>
                      <!-- 문제 개수 -->
                      <select class="" name="count" hidden>
                        <option value="<?php echo $a ?>" selected><?php echo $a ?></option>
                      </select>
                      <!-- 과목전달 -->
                      <select class="" name="subject" hidden>
                        <option value="<?php echo $subject ?>" selected><?php echo $a ?></option>
                      </select>

                      <!-- test input -->






                          <div class="btn-group" role="group">
                                  <button type="button" class="btn btn-danger" onclick="location.href='03-2-1-self-test.php'">뒤로</button>
                                  <button type="button" class="btn btn-warning">저장</button>
                                  <button type="submit" class="btn btn-success">제출</button>
                          </div>
                  </div>
                </form>
            </div>
            <!-- Table End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">러닝팩토리 AI+X 프로젝트 TEAM Deep!nsight</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://www.naver.com">Team Deep!nsight</a>
                        </br>
                        Distributed By <a class="border-bottom" href="https://www.naver.com" target="_blank">한국폴리텍대학 서울정수캠퍼스 AISW</a>
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
