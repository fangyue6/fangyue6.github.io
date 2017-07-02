<?php
header("Content-type: text/html; charset=utf-8");
class Fun{
    private $pdo;
    private $result;
    function __construct(){
        $result=array();
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
     * @return mixed
     * 得到最新信息
     */
    function getFun(){
        try {
            $sql="select * from fun order by id desc limit 1 ";
            $stmt = $this->pdo -> prepare($sql);
            $stmt -> execute();
            $stmt -> setFetchMode(PDO::FETCH_NUM);
            if($stmt->rowCount() > 0) {
                $this->result=$stmt->fetch(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $e) {
            echo "查询错误".$e->getMessage();
        }
        return $this->result;
    }
}

//$fun=new Fun();
//var_dump($fun->getFun()) ;
?>
