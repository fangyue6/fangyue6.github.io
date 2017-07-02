<?php
class wechatCallbackapi{
//接收事件消息
function receiveEvent($object)
    {
        $content = "";
        switch ($object['event'])
        {
            case "subscribe":
                $content = "欢迎关注itisYue ";
                $content .= (!empty($object['key']))?("\n来自二维码场景 ".str_replace("qrscene_","",$object['key'])):"";
                break;
            case "unsubscribe":
                $content = "取消关注";
                break;
            case "CLICK":
                switch ($object['key'])
                {
                    case "COMPANY":
                        $content = array();
                        $content[] = array("Title"=>"方倍工作室", "Description"=>"", "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
                        break;
                    default:
                        $content = "点击菜单：".$object['key'];
                        break;
                }
                break;
            case "VIEW":
                $content = "跳转链接 ".$object['key'];
                break;
            case "SCAN":
                $content = "扫描场景 ".$object['key'];
                break;
            case "LOCATION":
                $content = "上传位置：纬度 ".$object->Latitude.";经度 ".$object->Longitude;
                break;
            case "scancode_waitmsg":
                if ($object->ScanCodeInfo->ScanType == "qrcode"){
                    $content = "扫码带提示：类型 二维码 结果：".$object->ScanCodeInfo->ScanResult;
                }else if ($object->ScanCodeInfo->ScanType == "barcode"){
                    $codeinfo = explode(",",strval($object->ScanCodeInfo->ScanResult));
                    $codeValue = $codeinfo[1];
                    $content = "扫码带提示：类型 条形码 结果：".$codeValue;
                }else{
                    $content = "扫码带提示：类型 ".$object->ScanCodeInfo->ScanType." 结果：".$object->ScanCodeInfo->ScanResult;
                }
                break;
            case "scancode_push":
                $content = "扫码推事件";
                break;
            case "pic_sysphoto":
                $content = "系统拍照";
                break;
            case "pic_weixin":
                $content = "相册发图：数量 ".$object->SendPicsInfo->Count;
                break;
            case "pic_photo_or_album":
                $content = "拍照或者相册：数量 ".$object->SendPicsInfo->Count;
                break;
            case "location_select":
                $content = "发送位置：标签 ".$object->SendLocationInfo->Label;
                break;
            default:
                $content = "receive a new event: ".$object['event'];
                break;
        }

        /*if(is_array($content)){
            if (isset($content[0]['PicUrl'])){
                $result = $this->transmitNews($object, $content);
            }else if (isset($content['MusicUrl'])){
                $result = $this->transmitMusic($object, $content);
            }
        }else{
            $result = $this->transmitText($object, $content);
        }
        return $result;*/
        return $content;
    }
}
?>