<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1 style="margin-top: 5%;">글작성</h1>
  	<a href="javascript:window.history.back();"><button id="logoutBtn" style="width:5%;margin-top: 1%;">뒤로</button></a>
  	<hr>
  	<div id="main">
  		<form name="writeFrm" action="write_action.php" method="post" enctype="multipart/form-data">
  			<input type="text" name="title" placeholder="제목" class="tinput"><br>
        텍스트파일 <input type="file" name="t_file" value="1"><br><br>
        녹음파일 <input type="file" name="r_file" value="1"><br><br>
  			<button type="submit" id="logoutBtn">완료</button>
  		</form>
  	</div>
  </body>
</html>
