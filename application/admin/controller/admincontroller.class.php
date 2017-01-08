<?php
/**
 * @Author: anchen
 * @Date:   2016-10-26 22:20:45
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-10-31 22:43:01
 */
namespace admin\controller;
use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Upload;
use framework\tools\Image;
class admincontroller extends Controller
{
    protected $logic_table = 'ask_category';

    public function adminAction(){

        $model = Factory::M('admin\model\admin');
        $cat_list = $model->getAllcategory();

        $this->smarty->assign('cat_list',$cat_list);
        $this->smarty->display('./application/admin/view/category/category.html');
    }


    public function addAction(){
        $model = Factory::M('adminmodel');
        $cat_list = $model->getAllcategory();

        $this->smarty->assign('cat_list',$cat_list);
        $this->smarty->display('./application/admin/view/category/add.html');
    }

    public function addHandleAction(){

        $upload = new Upload();
        $upload->setUploadPath(UPLOAD_PATH.'category/');
        $path = $upload->doUpload($_FILES['logo']);

        $image = new Image(UPLOAD_PATH.'category/'.$path);
        $image->setThumbPath();
        $thumb_path = $image->makeThumb(100,100);

        $data['cat_logo'] = $path;
        $data['cat_name'] = $_POST['title'];
        $data['parent_id'] = $_POST['parent_id'];
        $data['cat_logo'] = $thumb_path;

        $model = Factory::M('adminmodel');
        $res = $model->add($data);
        if ($res) {
            $this->jump(2,'index.php?m=admin&c=admin&a=admin','添加成功');
        }else{
            $this->jump(2,'index.php?m=admin&c=admin&a=add','添加失败'.$model->getError());
        }

    }

    public function deleteAction(){
        $cat_id = $_GET['id'];
        $model = Factory::M('admin');
        $res = $model->isLeaf($cat_id);
        
        if ($res) {
            $this->jump(2,'?m=admin&c=admin&a=admin','不能直接删除父类');
        }else{
            $cat_logo = $model->getLogo($cat_id);
            @unlink(Upload.'category/'.$cat_logo);
            $result = $model->deleteCategory($cat_id);
            if ($result) {
                $this->jump(2,'?m=admin&c=admin&a=admin','删除成功');
            }
        }
    }

    public function updateAction(){
        if ($_FILES['cat_logo']['error']) {
            $data['cat_logo'] = $_POST['old_cat_logo'];
        }else{
            $upload = new UPload();
            $upload->setUploadPath(UPLOAD_PATH.'category/');
            $path = $upload->doUpload($_FILES['cat_logo']);

            $image = new Image(UPLOAD_PATH.'category/'.$path);
            $image->setThumbPath();
            $thumb_path = $image->makeThumb(50,50);

            @unlink(THUMB_PATH.$path);
            @unlink(UPLOAD_PATH.'category/'.$_POST['old_cat_logo']);

            $data['cat_logo'] = $thumb_path;
        }
        $data['cat_name'] = $_POST['title'];
        $data['cat_id'] = $_POST['cat_id'];
        $data['parent_id'] = $_POST['parent_id'];

        $model = Factory::M('admin');
        $result = $model->updateCategory($data);
        if ($result) {
            $this->jump(2,'?m=admin&c=admin&a=admin','更新成功');
        }else{
            $this->jump(2,'?m=admin&c=edit&a=edit&id='.$_POST['cat_id'],'更新失败'.$model->getError());
        }
    }


}