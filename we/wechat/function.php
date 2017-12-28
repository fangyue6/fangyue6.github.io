<?php 
/** 
http://139.199.189.112
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
   'appsecret'=>'2383d2a501bf721fd5b2b9dafc444b94' //填写高级调用功能的密钥
 );
$weObj = new Wechat($options);
$weAPI = new wechatCallbackapi();

// 验证 
$weObj->valid(); 
//accessToken
//$accesstoken=$weObj->checkAuth();

// 获取内容 

$weObj->getRev(); 
// 获取用户的OpenID  
$fromUsername = $weObj->getRevFrom(); 
// 获取接受信息的类型 
$type = $weObj->getRev()->getRevType(); 

$postObj = $weObj->getRev()->getRevData();



$test = 0;
if ($test==1) {
  // 获取内容 
  //$weObj->getRev(); 
  // 获取用户的OpenID  
  //$fromUsername = $weObj->getRevFrom(); 
  // 获取接受信息的类型 

  //$type = $weObj->getRev()->getRevType();

  switch($type) {
    case Wechat::MSGTYPE_TEXT:
        $weObj->text("hello, I'm wechat  ".$fromUsername)->reply();
        exit;
        break;
    case Wechat::MSGTYPE_EVENT:
        break;
    case Wechat::MSGTYPE_IMAGE:
        break;
    default:
        $weObj->text("help info")->reply();
  }

}

$common = array
( 
  array
  ( 
    'Title'=>"欢迎光临方月的个人主页", 
    'PicUrl'=>'http://139.199.189.112/fangyue6.github.io/we/wechat/image/welcome.jpg', 
    'Url'=>'http://www.fangyue.xyz'
  ),    
  array
  ( 
    'Title'=>"功能1：发送图片可以查询照片中人脸的年龄和性别信息哦，发送一张两人合影的照片可以计算两人的相似程度", 
    'PicUrl'=>'http://139.199.189.112/fangyue6.github.io/we/wechat/image/sim.jpg', 
    'Url'=>''
  ),  
  array
  ( 
    'Title'=>"功能2：手机归属地查询(手机 12345678900);天气查询(武汉天气 或者 天气武汉)", 
    'PicUrl'=>'http://139.199.189.112/fangyue6.github.io/we/wechat/image/sim.jpg', 
    'Url'=>''
  ),  
  array
  ( 
    'Title'=>"功能3：点击加号，发送地理位置，可以查询天气预报", 
    'PicUrl'=>'http://139.199.189.112/fangyue6.github.io/we/wechat/image/sim.jpg', 
    'Url'=>''
  ),
    array
  ( 
    'Title'=>"功能4：发送 推荐系统   利用投简历模拟推荐系统", 
    'PicUrl'=>'http://139.199.189.112/wechat/image/sim.jpg', 
    'Url'=>'http://www.fangyue.site:8080/Qin/recommend/AdminDeliverAction_check.action?openID='.$fromUsername 
  ),
  array
  ( 
    'Title'=>"获取帮助:    help   或者   帮助 ", 
    'PicUrl'=>'http://139.199.189.112/fangyue6.github.io/we/wechat/image/sim.jpg', 
    'Url'=>''
  ) 
);


if($test==2){
     //$weObj->text($type)->reply(); 
      //**********关注操作则写入数据库**********/ 
      if($weObj->getRevSubscribe()) 
      { 
        // 获取用户OPENID并写入数据库 
        /*$mysql = new SaeMysql(); 
        $sql = "INSERT INTO `users` (`wxid`) VALUES ('" . $fromUsername . "');"; 
        $mysql->runSql($sql); 
        $mysql->closeDb(); */
        // 获得信息的类型 
        $news = $common;
        $weObj->news($news)->reply(); 
      }else{
        $weObj->news("没有消息")->reply();
      } 
      //**********取消关注操作则删除数据库**********/ 
      if($weObj->getRevUnsubscribe()) 
      { 
        // 获取用户OPENID并从数据库删除 
        /*$mysql = new SaeMysql(); 
        $sql = "DELETE FROM `users` WHERE `wxid` = '" . $fromUsername . "'"; 
        $mysql->runSql($sql); 
        $mysql->closeDb(); */
        1+1;
      }
}




switch($type) { 
  case Wechat::MSGTYPE_EVENT: 
      /**********事件信息**********/
      $event=$weObj->getRevEvent();
      switch ($event['event'])
          {
              case "subscribe":
                  $content = $common;
                  //$content .= (!empty($object['key']))?("\n来自二维码场景 ".str_replace("qrscene_","",$object['key'])):"";
                  $weObj->news($content)->reply(); 
      
                  break;
          }
    break; 

  case Wechat::MSGTYPE_TEXT: 
    /**********文字信息**********/
    $news = $common;
    $receiveText=$weObj->getRev()->getRevContent();
/*    if($receiveText=="id"){

      $userinfo=$weObj->getUserInfo($fromUsername);//file_get_contents
      
      $weObj->text($userinfo)->reply(); 
    }*/

    //查询天气   武汉天气    天气武汉
    $weather_res = strstr($receiveText,"天气");
    if(!empty($weather_res)){
      $city=substr_replace($receiveText,"",strpos($receiveText,"天气"),strlen("天气"));
      $weather = new Weather("kdwHadg2uArbzKHMnT0UNIsv",$city,"json");
      $weObj->news($weather->getResult())->reply(); 
    }
    
    //手机归属地    15071098070手机  手机15071098070
    $phone_res = strstr($receiveText,"手机");
    if(!empty($phone_res)){
      $phoneText=substr_replace($receiveText,"",strpos($receiveText,"手机"),strlen("手机"));
      $phone=new Phone($phoneText,"6c2d3c3c400f06da907e79a19cfd457a");
      $weObj->text($phone->getResult())->reply(); 
    }

    //推荐系统  
    $recommend_res = strstr($receiveText,"推荐系统");
    if(!empty($recommend_res)){
      $content = array();
      $content[] = array("Title"=>"利用投简历模拟推荐系统", "Description"=>"", "PicUrl"=>"http://www.fangyue.site/wechat/image/recommend.jpg", "Url" =>'http://www.fangyue.site:8080/Qin/recommend/AdminDeliverAction_check.action?openID='.$fromUsername);
      $weObj->news($content)->reply(); 
    }

    //帮助
    if($receiveText === "help" || $receiveText ==="帮助"){
      $text="①查询天气：武汉天气 或者 天气武汉\n";
      $text.="②手机归属地查询：手机15071098070\n";
      $text.="③发送图片识别人脸信息\n";
      $text.="④点击加号发送地理位置查询天气\n";
      $text.="⑤发送  推荐系统  利用投简历模拟\n";
      $weObj->text($text)->reply(); 
    }

    // 管理员通道 
    if( $receiveText === "admin"){ 
      $news = array
      ( 
        array
        ( 
          'Title'=>'管理员通道--更新简历', 
          'Description'=>'管理员通道', 
          'PicUrl'=>'http://www.fangyue.site/wechat/image/admin.png', 
          'Url'=>'http://www.fangyue.site:8080/Qin/recommend/AdminDeliverAction_check.action?openID='.$fromUsername.'&admin=1'
        ) ,
                array
        ( 
          'Title'=>'管理员通道--初始化', 
          'Description'=>'管理员通道', 
          'PicUrl'=>'http://www.fangyue.site/wechat/image/admin1.png', 
          'Url'=>'http://www.fangyue.site:8080/Qin/recommend/AdminDeliverAction_check.action?openID='.$fromUsername.'&admin=2'
        ) 
      ); 
    } 
    $weObj->news($news)->reply(); 
    exit; 
    break; 

  case Wechat::MSGTYPE_IMAGE: 
    /**********图片信息**********/
    $imgUrl = $weObj->getRev()->getRevPic(); 
    $resultStr = face($imgUrl); 
    $weObj->text($resultStr)->reply(); 
    break; 

  case Wechat::MSGTYPE_LOCATION:
   if($postObj!=null){
      //$content = "你发送的是位置，经度为：".$postObj['Location_Y']."；纬度为：".$postObj['Location_X']."；缩放级别为：".$postObj['Scale']."；位置为：".$postObj['Label'];
      //$content = file_get_contents("http://api.map.baidu.com/telematics/v3/weather?location=".$postObj['Location_Y'].",".$postObj['Location_X']."&output=json&ak=kdwHadg2uArbzKHMnT0UNIsv");

      //$ak,$location,$output
      $info="经度为：".$postObj['Location_Y']."；纬度为：".$postObj['Location_X'];
      $weather = new Weather("kdwHadg2uArbzKHMnT0UNIsv",$postObj['Location_Y'].",".$postObj['Location_X'],"json");
      $weObj->news($weather->getResult())->reply(); 
      //print_r( $weather->getResult());
    }else{
      $weObj->text("null-----")->reply();
    }
     //$weObj->text("sss".$postObj['Location_X']."----")->reply(); 
    break;


/*  case Wechat::MSGTYPE_VOICE:
    break;


  case Wechat::MSGTYPE_VIDEO:
    break;


  case Wechat::MSGTYPE_LINK:
   break;*/
  default: 
    $weObj->text("Default")->reply(); 
} 


// 调用人脸识别的API返回识别结果 
function face($imgUrl) 
{ 
  // face++ 链接 
  $jsonStr = //  ".$imgUrl."
    file_get_contents("http://apicn.faceplusplus.com/v2/detection/detect?url=".$imgUrl['picurl']."&api_key=d88df0fda25bc0f63b8201b921552440&api_secret=mbXTWalkG2IN-SZ1vgAf1fv4ta_0rwr8&attribute=glass,pose,gender,age,race,smiling"); 
  $replyDic = json_decode($jsonStr); 
  $resultStr = ""; 
  $faceArray = $replyDic->{'face'}; 
  $resultStr .= "你发送的图片地址为：".$imgUrl['picurl']."\n图中共检测到".count($faceArray)."张脸！\n"; 
  for ($i= 0;$i< count($faceArray); $i++){ 
    $resultStr .= "第".($i+1)."张脸\n"; 
    $tempFace = $faceArray[$i]; 
    // 获取所有属性 
    $tempAttr = $tempFace->{'attribute'}; 
    // 年龄：包含年龄分析结果 
    // value的值为一个非负整数表示估计的年龄, range表示估计年龄的正负区间 
    $tempAge = $tempAttr->{'age'}; 
    // 性别：包含性别分析结果 
    // value的值为Male/Female, confidence表示置信度 
    $tempGenger = $tempAttr->{'gender'};  
    // 种族：包含人种分析结果 
    // value的值为Asian/White/Black, confidence表示置信度 
    $tempRace = $tempAttr->{'race'};    
    // 微笑：包含微笑程度分析结果 
    //value的值为0-100的实数，越大表示微笑程度越高 
    $tempSmiling = $tempAttr->{'smiling'}; 
    // 眼镜：包含眼镜佩戴分析结果 
    // value的值为None/Dark/Normal, confidence表示置信度 
    $tempGlass = $tempAttr->{'glass'};   
    // 造型：包含脸部姿势分析结果 
    // 包括pitch_angle, roll_angle, yaw_angle 
    // 分别对应抬头，旋转（平面旋转），摇头 
    // 单位为角度。 
    $tempPose = $tempAttr->{'pose'}; 
    //返回年龄 
    $minAge = $tempAge->{'value'} - $tempAge->{'range'}; 
    $minAge = $minAge < 0 ? 0 : $minAge; 
    $maxAge = $tempAge->{'value'} + $tempAge->{'range'}; 
    $resultStr .= "年龄：".$minAge."-".$maxAge."岁\n"; 
    // 返回性别 
    if($tempGenger->{'value'} === "Male") 
      $resultStr .= "性别：男\n";  
    else if($tempGenger->{'value'} === "Female") 
      $resultStr .= "性别：女\n"; 
    // 返回种族 
    if($tempRace->{'value'} === "Asian") 
      $resultStr .= "种族：黄种人\n";   
    else if($tempRace->{'value'} === "Male") 
      $resultStr .= "种族：白种人\n";   
    else if($tempRace->{'value'} === "Black") 
      $resultStr .= "种族：黑种人\n";   
    // 返回眼镜 
    if($tempGlass->{'value'} === "None") 
      $resultStr .= "眼镜：木有眼镜\n";  
    else if($tempGlass->{'value'} === "Dark") 
      $resultStr .= "眼镜：目测墨镜\n";  
    else if($tempGlass->{'value'} === "Normal") 
      $resultStr .= "眼镜：普通眼镜\n";  
    //返回微笑 
    $resultStr .= "微笑：".round($tempSmiling->{'value'})."%\n"; 
  }   
  if(count($faceArray) === 2){ 
    // 获取face_id 
    $tempFace = $faceArray[0]; 
    $tempId1 = $tempFace->{'face_id'}; 
    $tempFace = $faceArray[1]; 
    $tempId2 = $tempFace->{'face_id'}; 
  
    // face++ 链接 
    $jsonStr = 
      file_get_contents("https://apicn.faceplusplus.com/v2/recognition/compare?api_secret=ViX19uvxkT_A0a6d55Hb0Q0QGMTqZ95f&api_key=5eb2c984ad24ffc08c352bdb53ee52f8&face_id2=".$tempId2 ."&face_id1=".$tempId1); 
    $replyDic = json_decode($jsonStr); 
    //取出相似程度 
    $tempResult = $replyDic->{'similarity'}; 
    $resultStr .= "相似程度：".round($tempResult)."%\n"; 
    //具体分析相似处 
    $tempSimilarity = $replyDic->{'component_similarity'}; 
    $tempEye = $tempSimilarity->{'eye'}; 
    $tempEyebrow = $tempSimilarity->{'eyebrow'}; 
    $tempMouth = $tempSimilarity->{'mouth'}; 
    $tempNose = $tempSimilarity->{'nose'}; 
    $resultStr .= "相似分析：\n"; 
    $resultStr .= "眼睛：".round($tempEye)."%\n"; 
    $resultStr .= "眉毛：".round($tempEyebrow)."%\n"; 
    $resultStr .= "嘴巴：".round($tempMouth)."%\n"; 
    $resultStr .= "鼻子：".round($tempNose)."%\n"; 
  } 
  
  //如果没有检测到人脸 
  if($resultStr === "") 
    $resultStr = "照片中木有人脸=.="; 
  return $resultStr; 
}; 
// 写入本地日志文件的函数 
function logdebug($text) 
{ 
  file_put_contents('log.txt', $text."\n", FILE_APPEND);    
};