<?php
/*
    方倍工作室 http://www.cnblogs.com/txw1958/
    CopyRight 2013 www.doucube.com  All Rights Reserved
*/
//yue_fang_test@163.com  Y9F
define("TOKEN", "itisyue");
$wechatObj = new wechatCallbackapiTest();
if (isset($_GET['echostr'])) {
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}

class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            header('content-type:text');
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                        </xml>";
            if($keyword == "?" || $keyword == "？")
            {
                $msgType = "text";
                $contentStr = date("Y-m-d H:i:s",time());
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }else if($keyword!="琴儿生日"){
                $msgType = "text";
                $contentStr = date("Y-m-d H:i:s",time());
                $contentStr = "【深圳】天气实况 温度：27℃ 湿度：59% 风速：东北风3级
                                11月03日 周日 27℃~23℃ 小雨 东北风4-5级
                                11月04日 周一 26℃~21℃ 阵雨 微风
                                11月05日 周二 27℃~22℃ 阴 微风";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }else{
                $textTpl= "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <PicUrl><![CDATA[%s]]></PicUrl>
                            </xml>";

                $msgType = "image";
                $picurl="http://mmbiz.qpic.cn/mmbiz/L4qjYtOibummHn90t1mnaibYiaR8ljyicF3MW7XX3BLp1qZgUb7CtZ0DxqYFI4uAQH1FWs3hUicpibjF0pOqLEQyDMlg/0";
                $contentStr = "http://www.fangyue.site";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $picurl);
                echo $resultStr;
            }
        }else{
            echo "";
            exit;
        }
    }
}
?>