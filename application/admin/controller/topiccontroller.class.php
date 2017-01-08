<?php
/**
 * @Author: anchen
 * @data:   2016-10-28 23:20:40
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-10-29 14:47:40
 */
namespace admin\controller;
use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Upload;
use framework\tools\Image;

class topiccontroller extends Controller
{
    public function indexAction(){
        $model = Factory::M('topic');
        $topic_list = $model->getAllTopic();

        $this->smarty->assign('topic_list',$topic_list);
        $this->smarty->display('topic/topic.html');
 
    }

    public function addAction(){
        $this->smarty->display('topic/topic_new.html');
    }   
    public function editAction(){
        $id = $_GET['id'];
        $model = Factory::M('topic');
        $topic_list = $model->findOne($id);

        $this->smarty->assign('topic_list',$topic_list);
        $this->smarty->display('topic/topic_edit.html');
    } 
    public function deleteAction(){
        $id = $_GET['id'];
        $model = Factory::M('topic');
        $topic_thumb = $model->findOne($id,array('topic_thumb'));
        $thumb_file = $topic_thumb['topic_thumb'];
        $origin_file = str_replace('thumb_', '', $thumb_file);
        @unlink(UPLOAD_PATH.'topic/'.$origin_file);
        @unlink(THUMB_PATH.$thumb_file);
        $res = $model->delete($id);

        if ($res) {
            $this->jump(2,'?m=admin&c=topic&a=index','删除成功');
        }else{
            $this->jump(2,'?m=admin&c=topic&a=index','删除失败');
        }
    }

    public function updataAction(){
        $topic_id = $_POST['topic_id'];
        $data['topic_title'] = $_POST['topic_title'];
        $data['topic_desc'] = $_POST['topic_description'];

        $model = Factory::M('topic');
        $res = $model->checkData($data);


        if ($res) {
            if (!$_FILES['topic_thumb']['error']) {
                $upload = new Upload();
                $upload->setUploadPath(UPLOAD_PATH.'topic/');
                $path = $upload->doUpload($_FILES['topic_thumb']);

                $image = new Image(UPLOAD_PATH.'topic/'.$path);
                $image->setThumbPath();
                $thumb_path = $image->makeThumb(50,50);

                $old_topic_thumb = $_POST['old_topic_thumb'];
                $old_origin = str_replace('thumb_', '', $old_topic_thumb);

                @unlink(UPLOAD_PATH.'topic/'.$old_origin);
                @unlink(THUMB_PATH.$old_topic_thumb);

                $data['topic_thumb'] = $thumb_path;
            }
        }else{
            $this->jump(2,'?m=admin&c=topic&a=edit&id=$topic_id','数据不合法'.$model->getError());
        }


        $res = $model->update($data,array('topic_id'=>$topic_id));
        if ($res) {
            $this->jump(2,'?m=admin&c=topic&a=index','更新成功');
        }else{
            $this->jump(2,'?m=admin&c=topic&a=edit&id=$topic_id','更新失败');
        }
    }

    public function addHandleAction(){
        $data['topic_title'] = $_POST['topic_title'];
        $data['topic_desc'] = $_POST['topic_description'];

        $model = Factory::M('topic');
        $res = $model->checkData($data);

        if ($res) {
            $upload = new Upload();
            $upload->setUploadPath(UPLOAD_PATH.'topic/');
            $path = $upload->doUpload($_FILES['topic_thumb']);

            $image = new Image(UPLOAD_PATH.'topic/'.$path);
            $image->setThumbPath();
            $thumb_path = $image->makeThumb(50,50);

            $data['topic_thumb'] = $thumb_path;

            $data['user_id'] = 1;
            $data['pub_time'] = time();

            $res = $model->insert($data);
            if ($res) {
                $this->jump(2,'?m=admin&c=topic&a=index','添加成功');
            }else{
                $this->jump(2,'?m=admin&c=topic&a=add','添加失败');
            }
        }else{
            $this->jump(2,'?m=admin&c=topic&a=add','数据不合法'.$model->getError());
        }
    }
}