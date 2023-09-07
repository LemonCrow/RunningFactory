



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="123.php" method="post">
      <textarea name="change" rows="8" cols="80">
        <?php
        // 파일 열기

        $file = "texttest";
        $fp = fopen("$file", "r") or die("파일을 열 수 없습니다！");

        // 파일 내용 출력
        while( !feof($fp)){
        echo fgets($fp);
        }

        // 파일 닫기
        fclose($fp);
        ?>
      </textarea>
      <button type="submit" name="button">버튼</button>
    </form>
  </body>
</html>
