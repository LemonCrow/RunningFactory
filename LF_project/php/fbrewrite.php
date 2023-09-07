

<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/BBS/css/style.css" />

<?php
// session_start();
// if(!isset($_SESSION['studentID'])) {
//   echo "<script>alert('로그인을 해주세요');</script>";
//   echo "<script>location.replace('../../index.php');</script>";
// }
// $connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die ("connect falied");
// $number = $_GET['number'];
// $query = "SELECT * FROM freeboard WHERE idx = '$number' ";
// $result = $connect->query($query);
// $rows = mysqli_fetch_assoc($result);

$connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime');
$number = $_GET['number'];
session_start();
$query = "SELECT  * FROM freeboard WHERE idx = $number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);
 ?>


</head>
<body>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 작성하는 공간입니다.</h4>
            <div id="write_area">
              <form action="imgupload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="imgFile"> <input type="submit" value="upload">
              </form>
                <form action="fbrewrite_action.php?number=<?php echo $rows['idx']; ?>" method="post">
                    <div id="title">
                        <textarea name="title" id="title" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $rows['title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="content">
                        <textarea name="content" id="content" placeholder="내용" required><?php echo $rows['content']; ?></textarea>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 수정</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
