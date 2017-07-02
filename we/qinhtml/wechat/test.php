<?php
include "myAPI.php"; 
function weather(){
	
//$ak,$location,$output
$weather = new Weather("kdwHadg2uArbzKHMnT0UNIsv","116.305145,39.982368","json");
print_r( $weather->getResult());
/*$content = file_get_contents("http://api.map.baidu.com/telematics/v3/weather?location=116.305145,39.982368&output=json&ak=kdwHadg2uArbzKHMnT0UNIsv");
echo $content;
print_r(json_decode($content));
echo "------------------------------------------------------------------------------------------------";
$str=json_decode($content);

echo $str->error."\n";

echo $str->status."\n";

echo $str->date."\n";

$result=($str->results);
	echo $result[0]->currentCity."\n";
	echo $result[0]->pm25."\n";

	$index=($result[0]->index)."\n";
	echo count($index); 

	$weather_data=$result[0]->weather_data;
	echo count($weather_data);*/
}
function text(){
	$receiveText="天气武汉天气武汉";
	 if(!empty(strstr($receiveText,"天气1"))){
	 	echo "不为空";
    }
	//echo strpos($info,"天气");
	$city=substr_replace($receiveText,"",strpos($receiveText,"天气"),strlen("天气"));
	echo $city;
}
function phone(){
	$phone=new Phone("15071098070","6c2d3c3c400f06da907e79a19cfd457a");
	print_r($phone->getResult());
}
  function trims($content){
    return preg_replace("/[\s]{1,}/", "", $content);
}
phone();
// 
/*$url="http://tingapi.ting.baidu.com/v1/restserver/ting?from=webapp_music&method=baidu.ting.search.catalogSug&format=json&callback=&query=";
$world="爱";

$url=$url.$world;
echo $url;
$content = file_get_contents($url);
$results=(json_decode($content));//
echo $result;*/
function song(){
    $curl = curl_init();
    $world="爱";
    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://tingapi.ting.baidu.com/v1/restserver/ting?from=webapp_music&method=baidu.ting.search.catalogSug&format=json&callback=&query=".$world,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "UTF-8",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "content-type: application/json"
        ),
    ));
    $response = curl_exec($curl);
    $response= substr($response,1,-2);

    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        echo -1;
    } else {
       $str=json_decode($response);
        echo count($str->song);
       // $songs=$str->song;
        //return $songs;

        return null;
    }
}

//$songs=song();
function userInfo(){
    /** 
 * WeeGo工作室微信公众平台接口源码 
 * @author CallMeWhy <wanghaiyang@139.me> 
 * @version 1.0 
 */
include "wechat-php-sdk-master/wechat.class.php"; 
include "wechatCallbackapi.php";
include "myAPI.php"; 

/*$options = array
( 
  'token'=>'weego', 
  'debug'=>true, 
  'logcallback'=>'logdebug'
);*/ 
$options = array(
   'token'=>'itisyue', //填写你设定的key
   'encodingaeskey'=>'VYsFSxoLhicWa402JqvDS8q5v9rU5fVoqWzlc60Tg3P', //填写加密用的EncodingAESKey
   'appid'=>'wx19a00dfc26b462ca', //填写高级调用功能的app id
   'appsecret'=>'42c2acf7763f692a51e502ace814801a' //填写高级调用功能的密钥
 );
$weObj = new Wechat($options);
$weAPI = new wechatCallbackapi();

// 验证 
$weObj->valid(); 

// 获取内容 

$weObj->getRev(); 
// 获取用户的OpenID  
$fromUsername = $weObj->getRevFrom(); 
// 获取接受信息的类型 
$type = $weObj->getRev()->getRevType(); 

$postObj = $weObj->getRev()->getRevData();

$userinfo=$weObj->getUserInfo($fromUsername);
print_r($userinfo);
}
//userinfo();
?>