<?php
// 에러 검출기
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

  $subject = $_POST['subject'];
  $ques = $_POST['ques'];
  $numbers = $_POST['numbers'];

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>selftest</title>
  </head>
  <body>
    <?php
    session_start();
    $authority = $_SESSION['authority'];

    if($authority === 'u' or $authority === 's' or $authority === 'm' or $authority === 'g'){
      $connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die("connect falied");
      if ($ques == 'type_random'){
        $query = "SELECT * FROM $subject order by rand() desc limit $numbers";
      }else {
        $query = "SELECT * FROM $subject WHERE category = '$ques' order by rand() desc limit $numbers";
      }


      $result = mysqli_query($connect, $query);

      $total = mysqli_num_rows($result);
      if(isset($_GET['page']))
        $page = $_GET['page'];
      else
        $page = 1;
      }
    ?>
    <h1>셀프 테스트 기능 구현 사이트(title 바꿀 것)</h1>
    <form class="" action="./selftest.php" method="post">
          <label for="n-n-test">과목 선택:</label>
          <select id="tests" name="subject">
            <option value="test-types" selected>===선택하세요===</option>
            <option value="English">영어</option>
            <option value="DB_practice">데이터베이스실습</option>
            <option value="Python">파이썬</option>
            <option value="Java_Basics">자바기초 </option>
          </select>

          <label for="ques-types">문항종류:</label>
          <select id="ques" name="ques">
            <option value="q-types" selected>===선택하세요===</option>
            <option value="4choice">4지선다형</option>
            <option value="5choice">5지선다형</option>
            <option value="OX">O/X형</option>
            <option value="subjective">주관식</option>
            <option value="type_random">랜덤</option>
          </select><br>

          <label for="ques-numbers">문제 갯수:</label>
          <select id="ques" name="numbers">
            <option value="q-numbers" selected>===선택하세요===</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="4000">모두</option>
          </select><br>
        <input type="submit" name="" value="문제 불러오기">
      </form>
      <?php
        if($subject != null && $ques != null && $numbers != null){
          switch ($subject) {
            case 'test-types':
              echo "<script>";
              echo "alert('과목을 선택해주세요.');";
              echo "location.replace('selftest.php');";
              echo "</script>";
              break;
            case 'English':
              $condition1 = 'S1';
              break;
            case 'DB_practice':
              $condition1 = 'S2';
              break;
            case 'Python':
              $condition1 = 'S3';
              break;
            case 'Java_Basics':
              $condition1 = 'S4';
              break;
            default:
              echo "<script>";
              echo "alert('올바르지 않는 값이 입력되었습니다.');";
              echo "location.replace('selftest.php');";
              echo "</script>";
              break;
          }
          switch ($ques) {
            case 'q-types':
              echo "<script>";
              echo "alert('문항종류를 선택해주세요.');";
              echo "location.replace('selftest.php');";
              echo "</script>";
              break;
            case '4choice':
              $condition2 = 'Q1';
              break;
            case '5choice':
              $condition2 = 'Q2';
              break;
            case 'OX':
              $condition2 = 'Q3';
              break;
            case 'subjective':
              $condition2 = 'Q4';
              break;
            case 'type_random':
              $condition2 = 'Q5';
              break;
            default:
              echo "<script>";
              echo "alert('옳바르지 않는 값이 입력되었습니다.');";
              echo "location.replace('selftest.php');";
              echo "</script>";
              break;
          }

          switch ($numbers) {
            case 'q-numbers':
              echo "<script>";
              echo "alert('문제 갯수를 선택해주세요.');";
              echo "location.replace('selftest.php');";
              echo "</script>";
              break;
            case '5':
              $condition3 = 5;
              break;
            case '10':
              $condition3 = 10;
              break;
            case '15':
              $condition3 = 15;
              break;
            case '20':
              $condition3 = 20;
              break;
            case '4000':
              $condition3 = 4000;
              break;
            default:
              echo "<script>";
              echo "alert('바르지 않는 값이 입력되었습니다.');";
              echo "location.replace('selftest.php');";
              echo "</script>";
              break;
          }

      ?>
      <table>
  			<tbody>
  				<?php
          $a =0;
              while ($rows = mysqli_fetch_assoc($result)) { //result set에서 레코드(행)를 1개씩 리턴
                      ?>
                      <td width="50" align="center"><?php echo $total ?></td> <!-- 문제 번호 -->
                      <td width="500" align="center"><?php echo $rows['Q'] ?></td> <!-- 문제 제목 -->
                      <td width="100" align="center"><?php echo $rows['category'] ?></td>
                      <td width="200" align="center"><?php echo $rows['date'] ?></td>
                      </tr>
                  <?php
                  $total--;
               }
                  ?>
  			</tbody>
  		</table>
<?}?>
  </body>
</html>
