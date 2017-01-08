<?php
/**
 * @Author: anchen
 * @data:   2016-10-28 22:09:24
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-07 20:50:34
 */
namespace admin\model;
use framework\core\Model;
class topicModel extends Model
{   
    protected $logic_table = 'ask_topic';
    public function checkData($data){
        if ($data['topic_title']=='') {
            $this->error[] = '话题标题不能为空';
        }elseif ($data['topic_desc']=='') {
            $this->error[] = '话题内容不能为空';
        }
        if (empty($this->error)) {
            return true;
        }else{
            return false;
        }
    }

    public function getAllTopic(){
        $sql = "select * from $this->true_table";
        return $this->dao->getAll($sql);
    }

    public function getHotTopic(){


        $sql = "select * from $this->true_table order by talk_count desc limit 3 ";
        return $this->dao->getAll($sql);
    }
}