<?php
/**
 * Created by PhpStorm.
 * User: fangyue
 * Date: 2015/10/27
 * Time: 19:09
 */
header("Content-type: text/html; charset=utf-8");
class Message
{
    private $pdo;
    private $result;

    function __construct()
    {
        $result = array();
        try {
            $databaseip="mysql:host=www.fangyue.site;port=3306;dbname=fun";
            $databaseusername="root";
            $databasepassword="123456";
            $this->pdo = new  PDO($databaseip, $databaseusername, $databasepassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->query("set names utf8");
        } catch (PDOException $e) {
            echo "数据库连接错误" . $e->getMessage();
            exit;
        }
    }
    /**
     * @return mixed
     * 得到留言信息
     */
    function getMessage($id){
        try {
            $sql="select * from message where toID=? or formID=? order by datetime desc";
            $stmt = $this->pdo -> prepare($sql);
            $stmt -> execute(array($id,$id));
            $stmt -> setFetchMode(PDO::FETCH_NUM);
            if($stmt->rowCount() > 0) {
                $this->result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $e) {
            echo "查询错误".$e->getMessage();
        }
        return $this->result;
    }
}
/*$mes=new Message();
var_dump($mes->getMessage(1));*/