<?php
/**
 * @Author: anchen
 * @Date:   2016-11-07 19:44:44
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-07 20:08:19
 */
namespace home\controller;
use framework\core\Controller;
use framework\core\Factory;

class answercontroller extends Controller{
    public function getAnswerAction(){

        $data['question_id'] = $_POST['question_id'];
        $data['answer_content'] = $_POST['answer_content'];
        $data['answer_time'] = time();
        $data['user_id'] = $_SESSION['user']['user_id'];

        $answer = Factory::M('answer');
        $res = $answer->insert($data);
        if ($res) {
            $this->jump(2,"?a=detail&c=question&id={$data['question_id']}",'回复成功');
        }
    }
}