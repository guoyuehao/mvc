<?php
/**
 * @Author: anchen
 * @Date:   2016-11-02 18:58:32
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-26 09:51:24
 */
namespace framework\tools;

class Verify
{
    private $error = array();

    public function showError(){
        $error_mess = '';
        foreach ($this->error as $key => $value) {
            $error_mess .= $value."<br>";
        }
        return $error_mess;
    }

    public function verifyUser($username,$min,$max){
        $reg = '/^[a-z0-9_-]{'.($min-1).','.($max-1).'}$/';
        preg_match($reg, $username,$match);
        if (!$match) {
            $this->error[] = '<font color="red">用户名必须是：'.$min.'-'.$max.'位字母、数字、_组合，以字母开头</font>';
            return false;
        }else{
            return true;
        }  
    }

    public function verifyPass($pass,$min,$max){
        $reg = '/^[a-z0-9_-]{'.$min.','.$max.'}$/';
        preg_match($reg, $pass,$match);
        if (!$match) {
            $this->error[] = '<font color="red">密码必须是：'.$min.'-'.$max.'位字母、数字或符号</font>';
            return false;
        }else{
            return true;
        }  
    }

    public function verifyEmail($email){
        $reg = '/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/';
        preg_match($reg, $email,$match);
        if (!$match) {
            $this->error[] = '<font color="red">邮箱格式不正确</font>';
            return false;
        }else{
            return true;
        }  
    }

    public function verifyPhone($phone){
        $reg = '/^1[34578]\d{9}$/';
    
        preg_match($reg, $phone,$match);
        if(!$match){
            //说明不符合规则
            $this -> error[] = '<font color="red">手机格式不正确</font>';
            //阻止继续往下执行
            return false;
        }else{
            return true;
        }        
    }
}