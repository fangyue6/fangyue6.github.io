<?php
//注册
    //header('Content-Type:text/html; charset=utf-8');//ʹ��gb2312���룬ʹ���Ĳ���������
    $username=$_POST['username'];
//$username = json_decode($_POST['username']);
    $password=$_POST['password'];
    $email=$_POST['email'];
    $nickname=$_POST['nickname'];
     echo $username.$password.$email.$nickname;

$result_data=0;
//连接数据库
try {
    $pdo = new  PDO("mysql:host=www.fangyue.site;port=3306;dbname=fun", "root", "123456");
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> query("set names utf8");
}catch(PDOException $e) {
    echo "数据库连接错误 ".$e->getMessage();
    exit;
}
if($result_data!=-1){
    try {
            $sql="insert into friend_info(username,password,email,nickname) values(?,?,?,?) ";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute(array($username,md5($password),$email,$nickname));
            session_start();
            $_SESSION['username']=$username;
            $_SESSION['email']=$email;
            $_SESSION['nickname']=$nickname;
    }catch(PDOException $e) {
        echo "操作错误：".$e->getMessage();
        exit;
    }
}
header("Location: ../index.php");
//确保重定向后，后续代码不会被执行
exit;
 ?>