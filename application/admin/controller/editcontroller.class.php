<?php

namespace admin\controller;
use framework\core\Controller;
use framework\core\Factory;
/**
 * @Author: anchen
 * @Date:   2016-10-28 12:15:52
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-10-28 20:03:12
 */
class editcontroller extends Controller
{
    public function editAction(){
        $cat_id = $_GET['id'];
        $model = Factory::M('admin');
        $cat_info = $model->getById($cat_id);
        $cat_list = $model->getAllcategory();
        // var_dump($cat_info);
        // die;

        $this->smarty->assign('cat_info',$cat_info);
        $this->smarty->assign('cat_list',$cat_list);
        $this->smarty->display('category/category_edit.html');
    }
}