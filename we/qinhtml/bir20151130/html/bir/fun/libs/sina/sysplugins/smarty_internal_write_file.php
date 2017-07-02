<?php

/**
* Smarty write file plugin
* 
* @package Smarty
* @subpackage PluginsInternal
* @author Monte Ohrt 
*/
/**
* Smarty Internal Write File Class
*/
class Smarty_Internal_Write_File {
    /**
    * Writes file in a save way to disk
    * 
    * @param string $_filepath complete filepath
    * @param string $_contents file content
    * @return boolean true
    */
    public static function writeFile($_filepath, $_contents, $smarty)
    {
    	//echo " write file  ".$_filepath.'<br/>';
    	//if('saemc://' != substr($_filepath,0,8))
        //{
		//	$_filepath = $smarty->compile_dir.$_filepath;
		//}
        if (!file_put_contents($_filepath, $_contents)) {
            throw new Exception("unable to write file {$_filepath}");
            return false;
        }
        return true;
    } 
} 

?>
