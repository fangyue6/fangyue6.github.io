<?php
    $ch = curl_init();
    $url = 'http://apis.baidu.com/apistore/mobilephoneservice/mobilephone?tel=15071098070';
    $header = array(
        'apikey: 6c2d3c3c400f06da907e79a19cfd457a',
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);

echo $res;
   // var_dump(json_decode($res));
?>