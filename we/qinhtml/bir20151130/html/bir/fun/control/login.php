<?php

//header('Content-Type:text/html; charset=utf-8');//ʹ��gb2312���룬ʹ���Ĳ���������
$username=$_POST['username'];
//$username = json_decode($_POST['username']);
$password=md5($_POST['password']);
/*echo $password;
echo $username . "...".$password;
return;*/

try {

   $pdo = new  PDO("mysql:host=www.fangyue.site;port=3306;dbname=fun", "root", "123456");

    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> query("set names utf8");
}catch(PDOException $e) {
    echo "数据库连接错误".$e->getMessage();
    exit;
}

try {
    $sql = "select ID from friend_info where username=? or email=? or nickname=?";

    $stmt = $pdo -> prepare($sql);
    $stmt -> execute(array($username,$username,$username));
    $stmt -> setFetchMode(PDO::FETCH_NUM);
    $find_result= $stmt->fetchAll();

    $result_data=0;//用户名不存在
    if(!empty($find_result)){
        $result_data=1;//用户名存在
    }
    if($result_data==1){
        $sql="select * from friend_info where (username=? or email=? or nickname=? ) and password=? ";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute(array($username,$username,$username,$password));
        $stmt -> setFetchMode(PDO::FETCH_NUM);
       // $find_result= $stmt->fetchAll();
        /* $stmt -> bindColumn("ID", $id);
         $stmt -> bindColumn("username", $name);
         $stmt -> bindColumn("password", $password);
         $stmt -> bindColumn("nickname", $nickname);
         $stmt -> bindColumn("email", $email);
         if($stmt->fetch()){
             session_start();
             $_SESSION["username"]=$name;
             $_SESSION["nickname"]=$nickname;
             $_SESSION["email"]=$email;
            // $_SESSION["username"]=$name;
         }else{
             $result_data=2;//密码错误
         }*/
        if($stmt->rowCount() > 0) {
            session_start();
           $_SESSION=$stmt->fetch(PDO::FETCH_ASSOC);

            //var_dump($_SESSION);
            //echo $_SESSION['username'];
           // echo $_SESSION['password'];
           // echo $_SESSION['nickname'];
            //echo $_SESSION['email'];
            //header("Location:../index.php");
        }else {
            $result_data=2;//密码错误
        }
    }
}catch(PDOException $e) {
    echo "����".$e->getMessage();
}
echo $result_data;
?>