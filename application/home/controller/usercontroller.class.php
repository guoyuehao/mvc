<?php
/**
 * @Author: anchen
 * @Date:   2016-11-02 14:09:56
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-25 17:04:05
 */
namespace home\controller;
use framework\core\Controller;
use framework\tools\Captcha;
use framework\tools\Verify;
use framework\tools\Email;
use framework\core\Factory;
use framework\tools\Mess;


/**
* 
*/
class usercontroller extends Controller
{
    public function registerAction(){
        $this->smarty->display('user/register.html');
    } 
    public function loginAction(){
        $this->smarty->display('user/login.html');
    } 

    public function createCaptchaAction(){
        $captcha = new Captcha();
        $captcha->makeImage();
    }

    public function doRegisterAction(){
        $verify = new Verify(); 
        if (isset($_POST['agreement'])&&$_POST['agreement']=='agree') {
            if ($_POST['seccode_verify']==$_SESSION['captcha_code']) {
                
                $data['username'] = $_POST['user_name'];
                $password = $_POST['password'];
                $data['email'] = $_POST['email'];
                $data['activecode'] = md5($GLOBALS['config']['token'].(mt_rand(1000,9999).time()));
                $data['senttime']  = time();

                $res1 = $verify->verifyUser($data['username'],6,30);
                $res2 = $verify->verifyPass($password,6,20);
                $data['password'] = md5($password);
                $res3 = $verify->verifyEmail($data['email']);

                if ($res1 && $res2 && $res3) {
                    $m_user = Factory::M('user');
                    $u_id = $m_user->insert($data);
                    if ($u_id) {
                        $mail = new Email();
                        $from = '18336069889@163.com';
                        $to = $_POST['email'];

                        $title = '发送一封测试邮件标题';                        
                        $content = <<<BODY
                        <h1>恭喜您注册成功,请点击下面的连接进行激活</h1>
<a href="http://localhost/gyh/MVC/index.php?c=user&a=active&username={$data['username']}&activeCode={$data['activecode']}">点击激活</a>
BODY;
                        $mail -> sendEmail($from, $to, $title, $content);
                $this->jump(2,'?c=user&a=login','注册成功，请到邮箱激活');
                    }else{
                        $this->jump(2,'?c=user&a=register','注册失败'.$verify->showError()); 
                    }
                }else{

                    $this->jump(2,'?c=user&a=register','注册失败'.$verify->showError()); 
                }
            }else{
                $this->jump(2,'?c=user&a=register','验证码错误'.$verify->showError());
            }
        }else{
            $this->jump(2,'?c=user&a=register','请仔细阅读用户协议并同意'.$verify->showError());   
        }
    }

    public function activeAction(){
        $data['username'] = $_GET['username'];
        $data['activecode'] = $_GET['activeCode'];
        
        //去数据库查询一下
        $m_user = Factory::M('user');
        $info = $m_user -> getActiveCode($data);
        
        if(!$info){
            //激活链接无效
            $this -> jump(2,'?c=user&a=register','激活链接无效');
        }        
        //还要判断当前的时间是否超过了7天
        if(time()-$info['senttime']>7*24*3600){
            //激活链接已过期
            $this -> jump(2,'?c=user&a=register','激活链接已过期，您可以再次发送激活链接');
        }else{
            //激活成功
            //修改is_active的值
            $info1['is_active'] = 1;
            $m_user -> update($info1,array('user_id'=>$info['user_id']));

            $this -> jump(2,'?c=user&a=login','激活成功');
        } 
    }

    public function doLoginAction(){
        $data['uname'] = $_POST['user_name'];
        $data['password'] = $_POST['password'];

        //实例化模型对象
        $m_user = Factory::M('User');
        $result = $m_user -> getUser($data);
        if($result){
            //用户名、密码正确
            //再判断是否激活
            if($result['is_active']){
                if (isset($_POST['remerber'])&&$_POST['remerber']==1) {
                    setcookie('uname',$data['uname'],time()+7*24*3600,'');  
                    setcookie('pass',md5($data['password']),time()+7*24*3600,'');   
                    $this -> jump(2,'?c=index&a=index','登录成功'); 
                }else{
                    $_SESSION['user'] = $result; 
                    $this -> jump(2,'?c=index&a=index','登录成功');
                }
                
            }else{
                $this -> jump(2,'?c=user&a=register','请先激活邮件');
            }
        }else{
            $this -> jump(2,'?c=user&a=login','用户名或密码不正确');
        }        
    }

    public function msmRegisterAction(){
        $this->smarty->display('user/msm_register.html');
    }

    public function sendMessageAction(){
        //是否同意协议
        //接收验证码        
        //接收手机号码
        if(isset($_POST['agreement_chk']) && $_POST['agreement_chk']=='agree'){
            //说明同意协议
            if($_SESSION['captcha_code'] == $_POST['seccode_verify']){
                //说明验证码正确
                //发送短息
                $message =  new Mess();
                $code = mt_rand(1000,9999);
                $time = $GLOBALS['config']['expire_time'];
                
                $phone = $_POST['phone'];
                
                $result = $message -> sendTemplateSMS($phone,array($code,$time),1);
                if($result){
                    //发送短信成功，将发送的短信保存到数据库
                    $data['message'] = $code;
                    $data['send_time'] = time();
                    $data['phone'] = $phone;
                    
                    $m_message = Factory::M('message');
                    $m_id = $m_message -> insert($data);
                    
                    if($m_id){
                       $this -> jump(2,'?c=user&a=submitMsm','发送成功，注意查看手机'); 
                    }
                }else{
                    $this -> jump(2,'?c=user&a=msmRegister','发送失败');
                }
            }else{
                $this -> jump(2,'?c=user&a=msmRegister','验证码错误');
            }
        }else{
            $this -> jump(2,'?c=user&a=msmRegister','请仔细阅读用户协议并同意');
        }
    }

    public function submitMsmAction(){
        $this->smarty->display('user/do_register.html');
    }

    public function doSubmitAction(){

        if (isset($_POST['agreement']) && $_POST['agreement'] == 'agree') {
            if ($_SESSION['captcha_code']==$_POST['seccode_verify']) {
                $verify = new Verify();
                $data['username'] = $_POST['user_name'];
                $data['password'] = $_POST['password'];
                $data['phone'] = $_POST['msm'];
                $res1 = $verify->verifyUser($data['username'],6,30);
                $res2 = $verify->verifyPass($data['password'],6,20);
                $res3 = $verify->verifyPhone($data['phone']);

                if ($res1 && $res2 && $res3) {
                    $message = Factory::M('message');
                    $result = $message->checkCode($data['phone'],$_POST['msm_code']); 

                    if ($result) {
                          $days = $GLOBALS['config']['expire_time'];
                          if (time()-$result['send_time']>$days*24*3600) {
                              $this->jump(2,'?c=user&a=submitMsm','验证码过期');
                          }else{
                            $data['is_active'] = 1;
                            $m_user = Factory::M('user');
                            $user_id = $m_user->insert($data); 

                            if ($user_id){
                                $this->jump(2,'?c=user&a=login','注册成功');
                            } else{
                                $this->jump(2,'?c=user&a=submitMsm','注册失败，请重试');
                            }
                                                             
                          }
                      }else{
                            $this->jump(2,'?c=user&a=submitMsm','手机验证码错误');
                      }  
                }else{
                    $this->jump(2,'?c=user&a=submitMsm',$verify->showError());
                }
            }else{
                $this->jump(2,'?c=user&a=submitMsm','验证码错误');   
            }
        }else{
            $this->jump(2,'?c=user&a=submitMsm','请仔细阅读用户协议并同意');
        }
    } 

    public function logoutAction(){
        $_SESSION = array();
        foreach ($_COOKIE as $key => $value) {
            setcookie($key,'',time()-1);
        }
        unset($_COOKIE); 
        $this->jump(2,'?a=login&c=user','退出成功');
    } 

    public function checkAction(){
        $check=$_POST['user'];
        $u = Factory::M('user');
        $res = $u->checkuser($check);
        if ($res) {
            $arr = ['status'=>1,'message'=>'ok'];
        }else{
            $arr=['status'=>0,'message'=>'no'];
        }
        echo json_encode($arr);
    }
    
}