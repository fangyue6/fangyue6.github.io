<?php
/**
 * Created by PhpStorm.
 * User: fangyue
 * Date: 2015/10/27
 * Time: 19:03
 */
class Friend_info{
    private $id;
    private $username;
    private $password;
    private $email;
    private $name;
    private $nickname;
    private $pdo;
    private $result;
    function __construct($id=0,$username='0',$password='0',$meail='0',$name='0',$nickname='0'){
        $this->$id=$id;
        $this->$username=$username;
        $this->$password=$password;
        $this->$meail=$meail;
        $this->$name=$name;
        $this->$nickname=$nickname;
         try {
            $databaseip="mysql:host=www.fangyue.site;port=3306;dbname=fun";
            $databaseusername="root";
            $databasepassword="123456";
             $this->pdo = new  PDO($databaseip, $databaseusername, $databasepassword);
            $this->pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo -> query("set names utf8");
        }catch(PDOException $e) {
            echo "数据库连接错误".$e->getMessage();
            exit;
        }
    }

    /**
     * @param $id
     * @return mixed|void
     * 通过id查找昵称
     */
    function getNickNameByID($id){
        try {
            $sql = "select nickname from friend_info where id=?";
            $stmt = $this->pdo -> prepare($sql);
            $stmt -> execute(array($id));
            $stmt -> setFetchMode(PDO::FETCH_NUM);
            if($stmt->rowCount() > 0) {
                $this->result=$stmt->fetch(PDO::FETCH_ASSOC);
                return $this->result;
            }
        }catch(PDOException $e) {
            // echo "操作错误：".$e->getMessage();
            echo -2;
            return ;
        }
    } function getAllFriend(){
        try {
            $sql = "select * from friend_info";
            $stmt = $this->pdo -> prepare($sql);
            $stmt -> execute();
            $stmt -> setFetchMode(PDO::FETCH_NUM);
            if($stmt->rowCount() > 0) {
                $this->result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $this->result;
            }
        }catch(PDOException $e) {
            // echo "操作错误：".$e->getMessage();
            echo -2;
            return ;
        }
    }
}
/*$f=new Friend_info();
//$e= $f->getNickNameByID(1);
$e= $f->getAllFriend();
var_dump($e);*/