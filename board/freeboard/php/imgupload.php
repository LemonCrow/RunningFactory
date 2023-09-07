<?php
var_dump($_FILES);

//임시 저장된 정보 tmp_name
$imgtempFile = $_FILES['imgFile']['tmp_name'];
//파일 타임 및 확장자 체크
$filetypeExt = explode("/", $_FILES['imgFile']['type']);
//파일 타입
$fileType = $fileTypeExt[0];
//파일 확장자
$fileExt = $fileTypeExt[1];
//확장자 검사
$extStatus = false;

switch($fileExt){
  case 'jpeg':
  case 'jpg':
  case 'gif':
  case 'bmp':
  case 'png':
    $extStatus = true;
    break;

  default:
    echo "이미지 등록 실패";
    exit;
    break;
}

//이미지 파일 확인
if(fileType == 'image'){
  if($extStatus){
    //임시 파일을 옮길 파일명
    $resFile = "../imgs/{$_FILES['imgFile']['name']}";
    //임시 저장된 파일을 저장할 파일로 옮김
    $imageUpload = move_uploaded_file($tempFile, $resFile);

    //업로드 성공 여부 확인
    if($imageUpload == true){
      echo "파일이 업로드 되었습니다. <br>";
      echo "<img src='{$resFile}' width='100' />";
    }else{
      echo "파일 업로드에 실패했습니다.";
    }
  }
} else {
  echo "이미지 파일이 아닙니다.";
  exit;
}
?>
