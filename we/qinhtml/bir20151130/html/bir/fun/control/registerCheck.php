<?php
//验证用户名、邮箱、昵称是否可用
    //header('Content-Type:text/html; charset=utf-8');//ʹ��gb2312���룬ʹ���Ĳ���������
    $username=$_POST['username'];
//$username = json_decode($_POST['username']);
    $password=$_POST['password'];
    $email=$_POST['email'];
    $nickname=$_POST['nickname'];
     //echo $uername.$password.$email.$nickname;

$result_data=0;
//连接数据库
try {
    $pdo = new  PDO("mysql:host=www.fangyue.site;port=3306;dbname=fun", "root", "123456");
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> query("set names utf8");
}catch(PDOException $e) {
    //echo "数据库连接错误 ".$e->getMessage();
    //exit;
    $result_data=-1;//数据库连接错误
}
if($result_data!=-1){
    try {
        ////查询用户名是否可用
        $sql = "select ID from friend_info where username=?";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute(array($username));
        $stmt -> setFetchMode(PDO::FETCH_NUM);
        $find_result= $stmt->fetchAll();
        if(!empty($find_result)){
            $result_data=1;//用户名已经存在
        }else{
            //验证邮箱是否存在
            $sql="select ID from friend_info where email=? ";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute(array($email));
            $stmt -> setFetchMode(PDO::FETCH_NUM);
            $find_result= $stmt->fetchAll();
            if(!empty($find_result)){
                $result_data=2;//邮箱已经存在
            }else{
                //验证昵称是否存在
                $sql="select ID from friend_info where nickname=? ";
                $stmt = $pdo -> prepare($sql);
                $stmt -> execute(array($nickname));
                $stmt -> setFetchMode(PDO::FETCH_NUM);
                $find_result= $stmt->fetchAll();
                if(!empty($find_result)){
                    $result_data=3;//昵称已经存在
                }
            }
        }
        /*    if($result_data==0){
                $sql="insert into friend_info(username,password,email,nickname) values(?,?,?,?) ";
                $stmt = $pdo -> prepare($sql);
                $stmt -> execute(array($username,md5($password),$email,$nickname));
                session_start();
                $_SESSION['username']=$username;
                $_SESSION['email']=$email;
                $_SESSION['nickname']=$nickname;
            }*/
    }catch(PDOException $e) {
        // echo "操作错误：".$e->getMessage();
        $result_data=-2;//操作错误
    }
}
echo $result_data;
 ?>