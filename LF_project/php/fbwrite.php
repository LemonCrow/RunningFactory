<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/BBS/css/style.css" />
<script src="../smarteditor/js/HuskyEZCreator.js" charset="utf-8"></script>
</head>
<body>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 작성하는 공간입니다.</h4>
            <div id="write_area">
              
                <form action="php/write_action.php" method="post">
                    <div id="title">
                        <textarea name="title" id="title" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="content">
                        <textarea name="content" id="content" rows="20" cols="10" style="width: 500px" placeholder="내용" required></textarea>
                    </div>
                    <script type="text/javascript">
                    var oEditors = [];

                    nhn.husky.EZCreator.createInIFrame({
                        oAppRef: oEditors,
                        elPlaceHolder: "content",
                        sSkinURI: "../smarteditor/SmartEditor2Skin.html",
                        fCreator: "createSEditor2"
                    });

                    function submitContents(elClickedObj){
                      oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);

                      try{
                        elClickedObj.form.submit();
                      } catch(e) {}
                    }
                    </script>
                    <input type="submit" value="전송" onclick="submitContents(this)">
                </form>
            </div>
        </div>
    </body>
</html>
