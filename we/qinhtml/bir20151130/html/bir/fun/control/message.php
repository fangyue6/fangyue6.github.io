<?php
/**
 * Created by PhpStorm.
 * User: fangyue
 * Date: 2015/10/27
 * Time: 19:40
 */
include "../class/class.friend_info.php";
$message=$_POST['message'];
$toID=$_POST['toID'];
$toNickName=$_POST['toNickName'];
try {

    $pdo = new  PDO("mysql:host=www.fangyue.site;port=3306;dbname=fun", "root", "123456");

    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> query("set names utf8");
}catch(PDOException $e) {
    //echo "数据库连接错误".$e->getMessage();
    echo -1;
    exit;
}

try {
    session_start();
    $sql = "insert into message(formID,toID,content,datetime,formNickName,toNickName) values(?,?,?,?,?,?)";
    $formID=$_SESSION['id'];

    $formNickName=$_SESSION['nickname'];

    /*if($_SESSION['username']=='admin'){
        $formID=1;
        $toID=2;
    }else if($_SESSION['username']=='admin1'){
        $formID=2;
        $toID=1;
    }
    $f=new Friend_info();
    $formNickName= $f->getNickNameByID($formID);
    $toNickName= $f->getNickNameByID($toID);*/

    $stmt = $pdo -> prepare($sql);
    $stmt -> execute(array($formID,$toID,$message,time(),$formNickName,$toNickName));
}catch(PDOException $e) {
   // echo "操作错误：".$e->getMessage();
    echo -2;
    return ;
}
echo "1";