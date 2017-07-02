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
$url="http://apps.webofknowledge.com/CitingArticles.do?product=UA&SID=2CbB6svlFUQy1oGE8Fh&search_mode=CitingArticles&parentProduct=UA&parentQid=91&parentDoc=2&REFID=52515278&betterCount=151&excludeEventConfig=ExcludeIfFromNonInterProduct&cacheurlFromRightClick=no";

$html = file_get_html($url);
$listData=$html->find(".search-results #RECORD_1 .search-results-content div div");//$listData为数组对象 
echo $listData->find('a'); 
var_dump($listData);

//echo $listData."<br>";

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
