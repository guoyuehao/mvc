<?php
/**
 * @Author: anchen
 * @Date:   2016-10-24 19:23:35
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-26 15:20:55
 */
namespace framework\core;
use \Smarty;

/**
* 
*/
class Controller
{
    protected $smarty;
    public function __construct(){
        $this->initSmarty();
        $this->initSession();
    }
    private function initSession(){
        session_start();
    }
    private function initSmarty(){
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('./application/'.MODULE.'/view/');
    }

    protected function jump($wait,$url,$mess){
        echo "$mess";
        header("Refresh:$wait;URL=$url"); 
        die;
    }

    protected function isLoginAction(){
        if (isset($_COOKIE['uname'])){
            $model = Factory::M('user');
            $result = $model-> getUser($_COOKIE);
// var_dump($result);
// var_dump($_COOKIE);
// die;
            if ($result['password'] != $_COOKIE['pass']) {
                $this->jump(2,'?a=login&c=user','密码失效，请重新登录');
            }else{
                $_SESSION['user'] = $result;
            }
        }else{
            if (!isset($_SESSION['user'])) {
                $this->jump(2,'?a=login&c=user','请先登录');
            }
        }       
    }

}