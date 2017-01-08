<?php
/**
 * @Author: anchen
 * @Date:   2016-11-03 20:58:28
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-03 22:06:25
 */
namespace home\model;
use framework\core\Model;
/**
* 
*/
class MessageModel extends Model
{
    protected $logic_table = 'ask_message';
    public function checkCode($phone,$code){
        $sql = "select * from $this->true_table where message='$code' and phone='$phone'";
        return $this->dao->getOne($sql);
    }
}