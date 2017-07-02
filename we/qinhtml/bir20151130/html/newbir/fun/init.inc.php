<?php
    error_reporting(E_ALL^E_NOTICE^E_WARNING);
    header("Content-type: text/html; charset=utf-8");
    //error_reporting(E_ALL^E_NOTICE^E_WARNING);
	define("ROOT", str_replace("\\", "/", dirname(__FILE__))."/");
    define("isSina","0");
    if(isSina=="0"){
        include ROOT."/libs/Smarty.class.php";
    }else{
        sae_set_display_errors(true);
        require('libs/sina/Smarty.class.php');
    }


	$smarty = new Smarty;

    if(isSina=="0"){
        //      这是smarty2时期的用�?
        //	$smarty -> template_dir = "./views/";
         //	$smarty -> compile_dir = "./comps/";

        // 	以下是smarty3时期用法
        $smarty -> setTemplateDir(ROOT."/templates/");
        $smarty -> setCompileDir(ROOT."/comps/");
         //	$smarty -> addTemplateDir("./home/");

        //4.2指定配置文件所在的目录
        $smarty -> setConfigDir(ROOT.'/configs/');

        //5.4 添加一个插件的目录
        $smarty -> addPluginsDir(ROOT."/myplugins/");

        //开启缓存的功能
        $smarty -> caching = false;
        //缓存时间
        $smarty->cache_lifetime = 10;
        //缓存的位�?
        $smarty->setCacheDir(ROOT."/cache/");
    }else{
        $smarty->compile_dir = 'saemc://smartytpl/';
        $smarty->cache_dir = 'saemc://smartytpl/';
        $smarty->compile_locking = false; // 防止调用touch,saemc会自动更新时间，不需要touch

        $smarty->force_compile = true;
        $smarty->debugging = false;
        $smarty->caching = true;
        $smarty->cache_lifetime = 120;
    }



	//就可以让定界符号使用空格
	$smarty -> auto_literal = false;
	//设置定界符号
	$smarty -> left_delimiter = "<{";
	$smarty -> right_delimiter = "}>";

