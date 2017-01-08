<?php
namespace home\controller;
use framework\core\Controller;
use framework\core\Smarty;
use framework\core\Factory;
/**
 * @Author: anchen
 * @Date:   2016-10-30 17:57:16
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-20 23:24:46
 */
class questioncontroller extends Controller
{
    public function addAction(){

        $model = Factory::M('admin\\model\\topic');
        $topic_list = $model->getAllTopic();

        $category = Factory::M('admin\\model\\admin');
        $category_list = $category->getAllcategory();

        $this->smarty->assign('category_list',$category_list);
        $this->smarty->assign('topic_list',$topic_list);
        $this->smarty->display('./application/home/view/publish.html');
    }

    public function addHandleAction(){

        $data['question_title'] = $_POST['question_title'];
        $data['question_desc'] = $_POST['question_desc'];
        $data['cat_id'] = $_POST['cat_id'];
        $data['user_id'] = $_SESSION['user']['user_id'];
        $data['pub_time'] = time();
        $data['is_pass'] = 0;

        $model = Factory::M('question');
        $res = $model->checkData($data);
        if ($res) {
            $question_id = $model->insert($data);
        

            if (isset($_POST['topic_id'])) {
                $m_tq = Factory::M('TopicQuestion');
                $dd['question_id'] = $question_id;


                $t_id = $_POST['topic_id'];
                foreach ($t_id as $v){
                    $dd['topic_id'] = $v;
                    $tq_id = $m_tq->insert($dd);
                }

            }
            if ($question_id) {
                $this->jump(2,'?c=question&a=add&m=home','添加成功');
            }
        }else{
            $this->jump(2,'?c=question&a=add&m=home','添加失败'.$model->getError());
        }
    }

    
    public function detailAction(){

        $question_id = $_GET['id'];
        $m_q = Factory::M('question');
        $res = $m_q->getDetail($question_id); 
        $answer_count = count($res['answer']);

        $this->smarty->assign('question',$res['question']);   
        $this->smarty->assign('answer',$res['answer']);   
        $this->smarty->assign('answer_count',$answer_count);   
        $this->smarty->display('detail.html');
    }

    public function hotAction(){
        $kw=$_POST['question_name'];
        $hot=Factory::M('question');
        $res = $hot->getHotquestion($kw);

        if ($res) {
            $arr = ['status'=>1,'result'=>$res];
        }else{
            $arr = ['status'=>0];
        }
        echo json_encode($arr);
    }
}