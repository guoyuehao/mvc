<?php
/**
 * @Author: anchen
 * @Date:   2016-10-24 19:15:24
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-03 21:42:16
 */
namespace framework\core;
/**
* 
*/
class Factory
{
    public static function M($classname){
        if (substr($classname, -5)!='model') {
            $classname .='model';
        }
        static $model_list = array();

        if (!strchr($classname,'\\')) {
            $model_name = MODULE.'\\model\\'.$classname;
        }else{
            $model_name = $classname;
        }
        if (!isset($model_list[$classname])) {
            $model_list[$classname] = new $model_name;
        }
        return $model_list[$classname];
    } 
}