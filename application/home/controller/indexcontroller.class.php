<?php
/**
 * @Author: anchen
 * @Date:   2016-10-26 21:30:53
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-22 17:32:48
 */
namespace home\controller;
use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Page;
use framework\tools\CURL;
class indexcontroller extends Controller
{       
    public function indexAction(){
        $this->isLoginAction();
        $model = Factory::M('admin\model\admin');
        $cat_list = $model->getAllcategory();

        $model1 = Factory::M('admin\model\topic');
        $topic_list = $model1->getHotTopic();

        $user = Factory::M('user');
        $hot_user = $user->getHotUser();

        $model2 = Factory::M('home\model\question');



        // $page = new Page();
        // $page->_page_now = isset($_GET['page'])?$_GET['page']:1;
        // $page->_page_size = 3;
        // $total = $model2->getTotle();
        // $page->_total = $total['total'];

        // $page->_url = 'index.php?c=index&a=index';
        // $page_start = ($page->_page_now-1)*$page->_page_size;
        // $page_size = $page->_page_size;
        // $page_html = $page->create();
        // $this->smarty->assign('page_html',$page_html);


        // $question_list = $model2->getAllQuestion($page_start,$page_size);     
        $this->smarty->assign('hot_user',$hot_user);
        // $this->smarty->assign('question_list',$question_list);
        $this->smarty->assign('topic_list',$topic_list);
        $this->smarty->assign('cat_list',$cat_list);
        $this->smarty->display('./application/home/view/index.html');
    }

    public function getPageAction(){

        $q = Factory::M('question');
        $page = new Page();

        $result = $q->getTotle();
        $total_rows=$result['total'];

        $page -> _page_now=$_POST['page'];
        $page -> _page_size=5;
        $page -> _total=$total_rows;

        $page_start = ($page->_page_now-1)*$page->_page_size;
        $page_size = $page->_page_size;
        $page_html = $page->create();

        $res = $q->getAllQuestion($page_start,$page -> _page_size);


        //拼接数据
        if($res){
            $data['status'] = 1;
            $data['result'] = $res;
            $data['page_html'] = $page_html;
        }else{
            $data['status'] = 0;
            $data['result'] = '没有数据了';
        }

        echo json_encode($data);
        }

}