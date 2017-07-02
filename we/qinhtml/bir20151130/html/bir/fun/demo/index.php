<?php

//sae_set_display_errors(true);
require('../libs/Smarty.class.php');
define("ROOT", str_replace("\\", "/", dirname(__FILE__))."/");
$smarty -> template_dir = ROOT."/views/";
$smarty -> compile_dir = ROOT."/comps/";
$smarty = new Smarty;


//$smarty->compile_dir = 'saemc://smartytpl/';
//$smarty->cache_dir = 'saemc://smartytpl/';
$smarty->compile_locking = false; // 防止调用touch,saemc会自动更新时间，不需要touch

//$smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;


$smarty->assign("Name","Fred Irving Johnathan Bradley Peppergill",true);
$smarty->assign("FirstName",array("John","Mary","James","Henry"));
$smarty->assign("LastName",array("Doe","Smith","Johnson","Case"));
$smarty->assign("Class",array(array("A","B","C","D"), array("E", "F", "G", "H"),
	  array("I", "J", "K", "L"), array("M", "N", "O", "P")));

$smarty->assign("contacts", array(array("phone" => "1", "fax" => "2", "cell" => "3"),
	  array("phone" => "555-4444", "fax" => "555-3333", "cell" => "760-1234")));

$smarty->assign("option_values", array("NY","NE","KS","IA","OK","TX"));
$smarty->assign("option_output", array("New York","Nebraska","Kansas","Iowa","Oklahoma","Texas"));
$smarty->assign("option_selected", "NE");

$smarty->display('index.tpl');
?>
