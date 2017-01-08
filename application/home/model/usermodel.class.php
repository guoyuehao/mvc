<?php
/**
 * @Author: anchen
 * @Date:   2016-10-30 23:12:21
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-20 20:20:03
 */
namespace home\model;
use framework\core\Model;
use framework\tools\CURL;

class usermodel extends Model
{
    protected $logic_table = 'ask_user';
    public function getHotUser(){
        $sql = "select u.username,u.user_pic,count(q.question_id) as q_num from ask_user as u left join ask_question as q on u.user_id=q.user_id group by q.user_id order by q_num desc limit 0,3 ";

        return $this->dao->getAll($sql);
    }

    public function getActiveCode($data){
       
        $sql = "SELECT * FROM $this->true_table WHERE username='{$data['username']}' and activecode='{$data['activecode']}'";

        return $this -> dao -> getOne($sql);

    }

    public function getUser($data){
        $sql = "SELECT * FROM $this->true_table WHERE username='{$data['uname']}'";  
        return $this -> dao -> getOne($sql);      
    }

    public function checkuser($check){
        $sql = "SELECT 1 FROM $this->true_table WHERE username='{$check}'";  
        return $this -> dao -> getOne($sql);
    }
}
      