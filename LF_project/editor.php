

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="smarteditor/js/HuskyEZCreator.js" charset="utf-8"></script>
  </head>
  <body>
    <form action="test/add_db_nse.php" method="post">
      <div id="title">
        <textarea name="title" rows="8" cols="80" placeholder="제목을 입력하세요."></textarea>
      </div>
      <div id="smarteditor">
        <textarea name="ir1" id="ir1" rows="20" cols="10" style="width:500px" placeholder="내용을 입력하세요."></textarea>
      </div>
      <script type="text/javascript">
      var oEditors = [];

      nhn.husky.EZCreator.createInIFrame({
          oAppRef: oEditors,
          elPlaceHolder: "ir1",
          sSkinURI: "smarteditor/SmartEditor2Skin.html",
          fCreator: "createSEditor2"
      });

      function submitContents(elClickedObj){
        oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);

        try{
          elClickedObj.form.submit();
        } catch(e) {}
      }
      </script>
      <input type="submit" value="전송" onclick="submitContents(this)">
    </form>
  </body>
</html>
