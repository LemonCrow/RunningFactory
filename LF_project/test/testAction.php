<?php
// 에러 검출기
error_reporting(E_ALL);
ini_set("display_errors", 1);

$subject = $_POST['subject'];

$numbers = $_POST['numbers'];
session_start();
$authority = $_SESSION['authority'];

if($authority === 'u' or $authority === 's' or $authority === 'm' or $authority === 'g'){
  $connect = mysqli_connect('localhost', 'zerosugarlime', 'poly2305', 'zerosugarlime') or die("connect falied");
    $query = "SELECT * FROM $subject order by rand() desc limit $numbers";



  $result = mysqli_query($connect, $query);

  $total = mysqli_num_rows($result);
  if(isset($_GET['page']))
    $page = $_GET['page'];
  else
    $page = 1;
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      if($subject != null  && $numbers != null){
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



    ?>
    <table>
      <tbody>
        <?php
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
