<html>
<?php
require_once("fun/Connect2.1/API/qqConnectAPI.php");
$qc = new QC();
echo $qc->qq_callback();
echo $qc->get_openid();
//print_r($_SESSION);
if($_SESSION['QC_userData']['openid']){
	//header("Location: http://www.baidu.com"); 
	echo "<script>window.opener.location.reload();window.close();</script>";//刷新父窗口&&关闭弹出的QQ登录窗口
	//echo "<script type='text/javascript'>document.onload = window.close();</script>"; 
	//exit;
}
?>
<script type="text/javascript">
function a(){
window.open('','_parent','');
window.opener = window;
window.close();
}
</script>
</html>