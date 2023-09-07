<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="imgs/con.ico">
<style type="text/css">
  @import url("CSS/01.css");
</style>
</head>

<body>

<h2>HKK팩토리에 오신것을 환영합니다!!!!!</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">로그인</button>

<div id="id01" class="modal">

  <form class="modal-content animate" action="php/login.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="imgs/symbol.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>ID</b></label>
      <input type="text" placeholder="학번을 입력하세요" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="비밀번호를 입력하세요." name="psw" required>

      <button type="submit">로그인하기</button>

    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">취소</button>
      <span class="psw"> <a href="#">비밀번호 찾기</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<!-- 회원가입 -->
<button id="button02" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">회원가입</button>

<div id="id02" class="modal02">
  <span onclick="document.getElementById('id02').style.display='none'" class="close02" title="Close Modal">&times;</span>
  <form class="modal-content02" action="php/join.php" method="post">
    <div class="container02">
      <h1>회원가입</h1>
      <p>아래 항목을 작성 후 계정생성 버튼을 눌러주세요.</p>
      <hr id="hr">

      <label for="name"><b>이름</b></label>
      <input id="name" type="text" placeholder="이름을 입력하세요" name="name" required>

      <label for="shcoolName02"><b>학과</b></label>
      <br>
      <!-- <input id="shcoolName02" type="text" placeholder="학과 입력" name="shcoolName02" required> -->
      <select id="ques" name="shcoolName02">
        <option value="q-types" selected>===선택하세요===</option>
        <option value="인공지능소프트웨어과" >인공지능소프트웨어과</option>
        <option value="전기과">전기과</option>
        <option value="메타버스콘텐츠과">메타버스콘텐츠과</option>
        <option value="컴퓨터응용기계설비과">컴퓨터응용기계설비과</option>
      </select>

      <br><br>
      <label for="schoolCode02"><b>학번</b></label>
      <input id="schoolCode02" type="text" placeholder="학번을 입력하세요" name="schoolCode02" required>

      <label for="psw02"><b>비밀번호</b></label>
      <input id="password02" type="password" placeholder="비밀번호를 입력하세요. 비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 8자리에서 최대 16자리 이내로 입력해주세요." name="psw02" required>

      <label for="password03"><b>비밀번호확인</b></label>
      <input id="password03" type="password" placeholder="비밀번호 재입력" name="psw03" required>
      <br>
      <div class="clearfix02">
        <button id="button" type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn02">취소</button>
        <button id="button" type="submit" class="signupbtn02">계정생성</button>
      </div>
    </div>
  </form>
</div>

<script>

var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal02) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
