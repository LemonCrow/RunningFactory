<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
  	session_start();
  	$authority = $_SESSION['authority'];

  	if($authority === 'u' or $authority === 's' or $authority === 'm' or $authority === 'g'){
  		$connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die("connect falied");
  		$query = "SELECT * FROM lecture order by idx desc";
  		$result = mysqli_query($connect, $query);
  		$total = mysqli_num_rows($result);
  		if(isset($_GET['page']))
  			$page = $_GET['page'];
  		else
  			$page = 1;
      }
  	?>
    <form class="search" action="php/search.php" method="post">
      <select name="category">
        <option value="title">제목</option>
        <option value="user">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" value="" size="40" required>
      <button type="button" name="button" >검색</button>
      <!-- 날짜 검색 기능 추가할 것 -->
    </form>
    <?php if ($authority === 's' or $authority === 'm') { ?>
      <a href="php/write.php"><button id="logoutBtn" >글쓰기</button></a>
    <?php } ?>
    <a href="php/edit.php"><button id="editUserBtn" >정보수정</button></a>
    <a href="http://192.168.25.181"><button id="onlineRecordBtn" >원격녹음</button></a>
    <table>
			<thead>
				<tr>
					<th width="70">번호</th>
					<th width="500">제목</th>
					<th width="120">글쓴이</th>
					<th width="100">작성일</th>
				</tr>
			</thead>
			<tbody>
				<?php
            while ($rows = mysqli_fetch_assoc($result)) { //result set에서 레코드(행)를 1개씩 리턴
                if ($total % 2 == 0) {
            ?>
                    <tr class="even">
                        <!--배경색 진하게-->
                    <?php } else {
                    ?>
                    <tr>
                        <!--배경색 그냥-->
                    <?php } ?>
                    <td width="50" align="center"><?php echo $total ?></td>
                    <td width="500" align="center">
                        <a style="color: black;" href="php/read.php?number=<?php echo $rows['idx'] ?>">
                            <?php echo $rows['title'] ?>
                    </td>
                    <td width="100" align="center"><?php echo $rows['Name'] ?></td>
                    <td width="200" align="center"><?php echo $rows['date'] ?></td>
                    </tr>
                <?php
                $total--;
             }
                ?>
			</tbody>
		</table>
  </body>
</html>
