<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style type='text/css'>
table, tr, td{margin:0px;}

#page_1{font-family:굴림,돋음,sans-serif; font-size:13px; font-weight:normal; color:#676460; text-align:center;
line-height:50px;
background-color:#FBDAAE;
}
#font1{font-family:굴림,돋음,sans-serif; font-size:15px; font-weight:bold; color:#676460; text-align:center; 
float:left;}

</style>
</head>

<div id='page_1'>
<?
$rr=ceil($totals/$view_total);

$before= $page-1;
if($before<1)($before=1);

$next= $_page + 1;
if($next>$rr)($next=$rr);

if($_page%10){$goto=$_page-$_page%10 + 1;
	}elseif($goto= $_page -9);

$last= $goto + 10;

$before_group= $goto -1;
if($before_group<1)($before_group=1);
if($_page !=1) echo ("<a href=$PHP_SELF?_page=$before_group$href>◀</a>&nbsp;");


for($e=$goto; $e<$last; $e++){
	if($e>$rr) break;
	if($e==$_page)echo ("<strong>$e</strong>");
					else{
						echo ("&nbsp; <a href=$PHP_SELF?_page=$e$href>[$e]</a>&nbsp;");
					}
}

$next_group= $last;
if($next_group > $rr)($next_group=$rr);
if($_page !=$rr)echo ("&nbsp; <a href=$PHP_SELF?_page=$next_group$href>▶</a>");
?>
</div>