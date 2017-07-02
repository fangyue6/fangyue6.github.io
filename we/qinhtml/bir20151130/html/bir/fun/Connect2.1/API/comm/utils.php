<?php
/**
 * PHP SDK for QQ登录 OpenAPI
 *
 * @version 2.0
 * @author connect@qq.com
 * @copyright © 2013, Tencent Corporation. All rights reserved.
 */

/**
 * @brief 本文件包含了OAuth认证过程中会用到的公用方�?
 */

require_once("config.php");

function do_post($url, $data)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    curl_setopt($ch, CURLOPT_POST, TRUE); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
    curl_setopt($ch, CURLOPT_URL, $url);
    $ret = curl_exec($ch);

    curl_close($ch);
    return $ret;
}

/*function get_url_contents($url)
{
    if (ini_get("allow_url_fopen") == "1")
        return file_get_contents($url);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result =  curl_exec($ch);
    curl_close($ch);

    return $result;
}*/
function get_url_contents($url)
{
     $ch = curl_init();    
     curl_setopt($ch, CURLOPT_URL,$url);    
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);    
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
     $result = curl_exec($ch);    
     return $result;
}

?>
