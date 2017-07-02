<?php
// 0用户名不存在  1登陆成功 2密码错误 -1数据库连接错误  -2操作错误
$username=$_POST['username'];
$password=md5($_POST['password']);

$result_data=0;//用户名不存在
try {
    $pdo = new  PDO("mysql:host=www.fangyue.site;port=3306;dbname=fun", "root", "123456");
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> query("set names utf8");
}catch(PDOException $e) {
    $result_data=-1;//数据库连接错误
    /*echo "数据库连接错误".$e->getMessage();
    exit;*/
}
try {
    $sql = "select ID from friend_info where username=? or email=? or nickname=?";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute(array($username,$username,$username));
    $stmt -> setFetchMode(PDO::FETCH_NUM);
    $find_result= $stmt->fetchAll();
    if(!empty($find_result)){//用户名存在
        $result_data=1;
        $sql="select * from friend_info where (username=? or email=? or nickname=? ) and password=? ";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute(array($username,$username,$username,$password));
        $stmt -> setFetchMode(PDO::FETCH_NUM);
        if($stmt->rowCount() > 0) {
            session_start();
            $_SESSION=$stmt->fetch(PDO::FETCH_ASSOC);
        }else {
            $result_data=2;//密码错误
        }
    }
}catch(PDOException $e) {
   // echo "����".$e->getMessage();
    $result_data=-2;//操作错误
}
echo $result_data;
?>