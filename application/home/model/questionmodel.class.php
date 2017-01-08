<?php
/**
 * @Author: anchen
 * @Date:   2016-10-30 17:58:44
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-22 20:08:27
 */
namespace home\model;
use framework\core\Model;


class questionmodel extends Model
{
    protected $logic_table = 'ask_question';
    public function checkData($data){
        if ($data['question_title']=='') {
            $this->error[] = '标题不能为空';
        }elseif ($data['question_desc']=='') {
            $this->error[] = '内容不能为空';
        }
        if (empty($this->error)) {
            return true;
        }else{
            return false;
        }
    }

    public function getAllQuestion($page_start,$page_size){
        $sql = "select u.username,u.user_pic,c.cat_name,q.* from $this->true_table as q left join ask_user as u on q.user_id=u.user_id left join ask_category as c on q.cat_id=c.cat_id limit $page_start,$page_size";
        return $this->dao->getAll($sql);
    }

    public function getTotle(){
        $sql = "select count(*) as total from $this->true_table";
        return $this->dao->getOne($sql);
    }

    public function getDetail($id){
        $sql = "select q.question_title,q.question_id,q.pub_time,q.view_count,q.focus_count,c.cat_name,u.username,u.user_pic from ask_question as q left join ask_category as c on q.cat_id=c.cat_id left join ask_user as u on q.user_id=u.user_id where q.question_id=$id";
        $question = $this->dao->getOne($sql);

        $sql = "select u.username,u.user_pic,a.answer_content,a.answer_time from ask_question as q right join ask_answer as a on q.question_id=a.question_id left join ask_user as u on a.user_id=u.user_id where q.question_id=$id";
        $answer = $this->dao->getAll($sql);
        
        return array(
            'question' => $question,
            'answer' => $answer
            );
    }

    public function getHotquestion($kw){
        $sql="select question_title from $this->true_table where question_title like'%$kw%' limit 0,5 "; 
        return $this->dao->getAll($sql);
    }
}