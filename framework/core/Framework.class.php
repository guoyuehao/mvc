<?php
/**
 * @Author: anchen
 * @Date:   2016-10-24 23:29:33
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-04 00:59:40
 */
namespace framework\core;
class Framework
{
    public function __construct(){
        $this->initConst();
        $this->initAutoload();

        $config1 = $this->loadFrameworkConfig();
        $config2 = $this->loadCommonConfig();
        $GLOBALS['config'] = array_merge($config1,$config2);
        $this-> initMCA();

        $config3 = $this-> loadModuleConfig();
        $GLOBALS['config'] = array_merge($GLOBALS['config'],$config3);

        $this-> initDispatch();
    }

    public function initConst(){
        define('ROOT_PATH',str_replace('\\','/',getcwd().'/'));
        define('FRAMEWORK_PATH',ROOT_PATH.'framework/');
        define('APP_PATH',ROOT_PATH.'application/'); 
        define('HOME','./application/public/home');
        define('ADMIN','./application/public/admin');  
        define('UPLOAD_PATH', './application/public/uploads/');
        define('THUMB_PATH', './application/public/static/thumb/');          
    }

    public function userAutoload($classname){
        $arr = explode('\\',$classname);


        if ($classname=='Smarty') {
            require './framework/vendor/smarty/Smarty.class.php';
        }

        if ($arr[0]=='framework') {
            $basic = './';
        }else{
            $basic = APP_PATH;
        }

        $sub_path = str_replace('\\', '/',$classname);
        $base_path = $basic.$sub_path;

        if (substr($classname,-5,2)=='I_') {
            $fix = '.interface.php';
        }else{
            $fix = '.class.php';
        }
        $classFile = $base_path.$fix;


        if (file_exists($classFile)) {
            require $classFile;
        }
    }

    public function initAutoload(){
        spl_autoload_register(array($this,'userAutoload'));
    }

    public function initMCA(){
        $c = isset($_GET['c'])?$_GET['c']:$GLOBALS['config']['default_controller'];
        define('CONTROLLER',$c);
        $a = isset($_GET['a'])?$_GET['a']:$GLOBALS['config']['default_action'];
        $a = substr($a,-6)!='Action'?$a.'Action':$a;
        define('ACTION',$a);
        $m = isset($_GET['m'])?$_GET['m']:$GLOBALS['config']['default_module'];
        define('MODULE',$m);

    }

    public function initDispatch(){
        $controller_name = MODULE.'\\controller\\'.CONTROLLER.'controller';
        $controller = new $controller_name;
        $a = ACTION;
        $controller->$a();
    }

    public function loadFrameworkConfig(){
        $config_file = FRAMEWORK_PATH.'conf/config.php';       
        if (file_exists($config_file)) {
            return require $config_file;
        }else{
            return array();
        }
    }

    public function loadCommonConfig(){
        $config_file = APP_PATH.'common/conf/config.php';
        if (file_exists($config_file)) {
                return require $config_file;
           }else{
                require array();
           }
    }

    public function loadModuleConfig(){
        $config_file = APP_PATH.MODULE.'/conf/config.php';
        if (file_exists($config_file)) {
                return require $config_file;
           }else{
                require array();
           }        
    }
}