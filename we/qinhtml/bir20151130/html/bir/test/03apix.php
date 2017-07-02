<?php
// http://apix.cn/
header("Content-type: text/html; charset=utf-8");
function test01(){
    //初始化
    $curl = curl_init();
//设置抓取的url
    curl_setopt($curl, CURLOPT_URL, 'http://www.baidu.com');
//设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 1);
//设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//执行命令
    $data = curl_exec($curl);
//关闭URL请求
    curl_close($curl);
//显示获得的数据
    print_r($data);
}

/**
 * 免费IP地理位置信息
 */
function test02()
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://a.apix.cn/ipipnet/freeapi/?IP=8.8.8.8",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "apix-key:930b87f1f1804e027203c175f9ab2b5c",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}

/**
 * 获取歌曲
 */
function test03(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://a.apix.cn/geekery/music/query?s=江南&limit=10&p=1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "apix-key:a523b6b7c5d94784630f84a01d9f0b71",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}

/**
 * 在线翻译
 *
 * 1，多国语言翻译

支持下列多国语言的互译：中文（zh），英文（en），日文（jp），俄文（ru），意大利语（it），法文（fra），韩语（kor），西班牙语（spa），阿拉伯语（ara），泰国语（th），德语（de），葡萄牙语（pt）等。
2.2，汉语方言转换

支持粤语（yue）和普通话（zh），文言文（wyw）和白话文（zh）的互译
 */
function test04_1(){
//翻译单词
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://a.apix.cn/tongyu/translate/dict?source=zh&goal=en&word=交友",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "apix-key:1e3a343ee249427b448ff42d0f50e77e",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}
test04_1();

function test04_2(){
//翻译句子
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://a.apix.cn/tongyu/translate/translate?source=en&goal=zh&sentence=stayfoolish,stayhungry",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "apix-key:1e3a343ee249427b448ff42d0f50e77e",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}

/**
 * 二维码生成   bc632c08144940f27b77604910ce9357
 */
function test05(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://a.apix.cn/3023/qr/qrcode?format=json&size=20&qr=http://www.baidu.com",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "apix-key:bc632c08144940f27b77604910ce9357",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}

/**
 * 火车票查询   3ab79502729d4f2d540bf4c10b69ac7a
 */
function test06(){
    $curl = curl_init();
    //日期（格式 YY-MM-DD）
    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://a.apix.cn/apixlife/ticket/rest?from=BXP&to=WCN&date=15-10-07",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "apix-key:3ab79502729d4f2d540bf4c10b69ac7a",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}
//test06();
?>