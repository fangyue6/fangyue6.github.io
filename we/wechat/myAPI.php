<?php
/**
百度的天气预报接口   


http://api.map.baidu.com/telematics/v3/weather?location=北京&output=json&ak=kdwHadg2uArbzKHMnT0UNIsv
百度ak申请地址：http://lbsyun.baidu.com/apiconsole/key

接口参数说明
参数类型	参数名称	是否必须	具体描述
String	ak	true	开发者密钥
String	sn	false	若用户所用ak的校验方式为sn校验时该参数必须。 
String	location	true	输入城市名或经纬度，城市名称如:北京，经纬度格式为lng,lat坐标如: location=116.305145,39.982368;城市天气预报中间"|"分隔,location=116.305145,39.982368| 122.305145,36.982368|….
String	output	false	输出的数据格式，默认为xml格式，当output设置为’json’时，输出的为json格式的数据;
String	coord_type	false	请求参数坐标类型，默认为gcj02经纬度坐标。允许的值为bd09ll、bd09mc、gcj02、wgs84。bd09ll表示百度经纬度坐标，bd09mc表示百度墨卡托坐标，gcj02表示经过国测局加密的坐标。wgs84表示gps获取的坐标。
 

返回结果
参数名称	含义	说明
currentCity	当前城市	返回城市名
status	返回结果状态信息	 
date	当前时间	年-月-日
results	天气预报信息	白天可返回近期3天的天气情况（今天、明天、后天）、晚上可返回近期4天的天气情况（今天、明天、后天、大后天）
results.currentCity	当前城市	 
results.weather_data	weather_data.date	天气预报时间	 
weather_data.dayPictureUrl	白天的天气预报图片url	 
weather_data.nightPictureUrl	晚上的天气预报图片url	 
weather_data.weather	天气状况	所有天气情况（”|”分隔符）：晴|多云|阴|阵雨|雷阵雨|雷阵雨伴有冰雹|雨夹雪|小雨|中雨|大雨|暴雨|大暴雨|特大暴雨|阵雪|小雪|中雪|大雪|暴雪|雾|冻雨|沙尘暴|小雨转中雨|中雨转大雨|大雨转暴雨|暴雨转大暴雨|大暴雨转特大暴雨|小雪转中雪|中雪转大雪|大雪转暴雪|浮尘|扬沙|强沙尘暴|霾
weather_data.wind	风力	 
weather_data.temperature	温度

*/
error_reporting(0);//禁用错误报告
class Weather{
	private $ak;
	private $location;
	private $output="json";

	public $error;
	public $status;
	public $date;

	public $content=array();

	public function __construct($ak,$location,$output){
		$this->ak=$ak;
		$this->location=$location;
		$this->output=$output;
	}
	function getResult(){
		$content = file_get_contents("http://api.map.baidu.com/telematics/v3/weather?location=".$this->location."&output=".$this->output."&ak=".$this->ak);
		$results=(json_decode($content));

		if(/*!empty($results->error) && */$results->error >=0){
			//echo "http://api.map.baidu.com/telematics/v3/weather?location=".$this->location."&output=".$this->output."&ak=".$this->ak;
			$error=$results->error;
			$status=$results->status;
			$date=$results->date;

			$result=($results->results);
			$result=$result[0];

			$index=$result->index;
			$weather_data=$result->weather_data;

			$content = array();
            $content[] = array("Title"=>$result->currentCity."天气预报", "Description"=>"", "PicUrl"=>"", "Url" =>"");
            for ($i=0 ; $i<count($weather_data) ; $i++){
            	$title=$weather_data[$i]->date."\n  ".$weather_data[$i]->weather."  ".$weather_data[$i]->wind."  ".$weather_data[$i]->temperature;
            	if($i==0){
            			$title=$title ."\n";
            			for($j=0;$j<count($index);$j++){
            				$title=$title.$index[$j]->title.":".$index[$j]->zs."  ".$index[$j]->tipt.":".$index[$j]->des."\n\n";
            			}
            	}
            	
            	
            	$content[] = array("Title"=>$title, "Description"=>"", "PicUrl"=>$weather_data[$i]->dayPictureUrl, "Url" =>"");
            }
            return $content;
		}
		
	}
}

class Phone{
	private $telString;
	private $apikey;

	public function __construct($telString,$apikey){
	$this->telString=$telString;
	$this->apikey=$apikey;
	}
	function getResult(){
	$ch = curl_init();
    $url = 'http://apis.baidu.com/apistore/mobilephoneservice/mobilephone?tel='.$this->telString;
    $header = array(
        'apikey: '.$this->apikey,
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);
    $result=json_decode($res);

    $errNum=$result->errNum;
    $errMsg=$result->errMsg;

    $retData=$result->retData;

//print_r($result);
    //$content =array();
    //$content[] = array("Title"=>"电话:".$retData->telString."\n省份:".$retData->province."\n运营商:".$retData->carrier, "Description"=>"", "PicUrl"=>"", "Url" =>"");
   // return $content;
    return "电话:".$retData->telString."\n省份:".$retData->province."\n运营商:".$retData->carrier;

    //echo $res;

    //var_dump(json_decode($res));
}
}
?>