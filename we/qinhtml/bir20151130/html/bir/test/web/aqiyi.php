<?php
/**
 * Created by PhpStorm.
 * User: fangyue
 * Date: 2015/11/16
 * Time: 20:36
 */
header("Content-type: text/html; charset=utf-8");
include_once 'simple_html_dom.php';
//获取html数据转化为对象
/*$html = file_get_html('http://www.vip3699.com/forum-iqiyi-1.html');
$listData=$html->find("tobdy:eq(2) .new a",0)->href;//$listData为数组对象*/
echo "<a href='http://www.vip3699.com/forum-36-1.html'>访问网址</a>";
return ;
$html = file_get_html($listData);
$listData=$html->find(".t_f",0)->plaintext;//$listData为数组对象

//$reg="/(VIP会员分享*vip3699\.com)/";
$reg="/vip会员账号(.*?)vip3699\.com/";
if(preg_match_all($reg, $listData, $arr)) {
   // echo "匹配成功<br>";
    //print_r($arr);
} else {
    echo "匹配失败!<br>";
}

echo $arr[0][0]."<br>";
echo $arr[0][1]."<br>";

//var_dump($arr);
