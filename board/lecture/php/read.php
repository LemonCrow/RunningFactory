<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css" media="screen">
      html, body{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <?php
  		$connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime');
  		$number = $_GET['number'];
  		session_start();
  		$query = "SELECT  title, Name, content, rcontent, date, file, rfile FROM lecture WHERE idx = $number";
  		$result = $connect->query($query);
  		$rows = mysqli_fetch_assoc($result);
      $file = "../text/".$rows['rcontent'];
  		$file2 = "../record/".$rows['rfile'];
  	?>
    <h1 style="margin-top: 5%;"><?php echo $rows['title']; ?></h1>
  	<b style="margin-top: 1%"><?php echo $rows['Name']; ?></b>
  	<div style="margin-top: 1%;margin-bottom: 1%;"><?php echo $rows['date'] ?></div>
  	<hr>
  	<div id="main">
  		<div style="width:100%;height: 95%;text-align: center;">
  			<div style="margin-top: 1%;margin-bottom: 1%;">
  				텍스트파일 : <a href="<?php echo $file; ?>" download="<?php echo $rows['content']; ?>"><?php echo $rows['content']; ?></a><br>
  				녹음파일 : <a href="<?php echo $file2; ?>" download="<?php echo $rows['file']; ?>"><?php echo $rows['file']; ?></a>
  			</div>
  		</div>
  		<div id="allBtn">
  			<button class="logoutBtn" onclick="location.href='../index.php'">목록</button>
  			<?php if(isset($_SESSION['name']) and $_SESSION['name'] == $rows['Name'] or $_SESSION['authority'] === 's' or $_SESSION['authority'] === 'm') { ?>
  			<button class="logoutBtn" onclick="location.href='modify.php?number=<?= $number ?>&id=<?= $_SESSION['studentID'] ?> '">수정</button>
  			<button class="logoutBtn" onclick="ask()">삭제</button>
  			<script>
  				function ask() {
  					if(confirm("게시글을 삭제하시겠습니까?")){
  						window.location = "delete.php?number=<?= $number ?>"
  					}
  				}
  			</script>
  		</div>

  	<?php } ?>
  	</div>
  </body>
</html>
