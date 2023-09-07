<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>러닝팩토리 DeepInsight</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="LF_project/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="LF_project/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="LF_project/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="LF_project/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="LF_project/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
          <form class="" action="php/login.php" method="post">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.php" class="">
                                <h5 class="text-primary">Running Factory<i class="fas fa-running"></i></h5>
                            </a>
                            <h6>로그인</h6>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@kopo.com" name="uname">
                            <label for="floatingInput">아이디</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="psw">
                            <label for="floatingPassword">패스워드</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">아이디 저장</label>
                            </div>
                            <a href="">비밀번호 찾기</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">로그인</button>
                        <p class="text-center mb-0">아직 회원이 아니신가요? <a href="LF_project/05-2-signup.php">회원가입</a></p>
                    </div>
                </div>
            </div>
          </form>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="LF_project/lib/chart/chart.min.js"></script>
    <script src="LF_project/lib/easing/easing.min.js"></script>
    <script src="LF_project/lib/waypoints/waypoints.min.js"></script>
    <script src="LF_project/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="LF_project/lib/tempusdominus/js/moment.min.js"></script>
    <script src="LF_project/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="LF_project/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="LF_project/js/main.js"></script>
</body>

</html>
