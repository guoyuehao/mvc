<?php
/**
 * @Author: anchen
 * @Date:   2016-10-26 22:20:12
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-05 19:03:19
 */
namespace admin\model;
use framework\core\Model;
class adminmodel extends Model
{
    protected $logic_table = 'ask_category';

    // public function index()
    // {
    //     $this->adminAction();
    // }

    public function add($data){
        if ($data['cat_name']=='') {
            $this->error[] = '标题不能为空';
        }elseif((int)$data['cat_name']!=0){
            $this->error[] = '标题不能数字';
        }elseif($this->issame($data['cat_name'],$data['parent_id'])){
            $this->error[] = '不能有重复子类';
        }

        if (!empty($this->error)) {
            return false;
        }

        return $this->insert($data);
    }

    public function issame($cat_name,$parent_id){
        $sql = "select 1 from $this->true_table where cat_name='$cat_name' and parent_id='$parent_id'";
        return $this->dao->getOne($sql);
    }

    public function getAllcategory(){
        $sql = "select * from ask_category order by cat_id";
       $cat_list =  $this->dao->getAll($sql);
       return $this->getLevel($cat_list);
    }

    public function getLevel($cat_list,$p_id=0,$level=0){
        static $arr = array();
        if(!empty($cat_list)){
            foreach($cat_list as $v){
                if ($v['parent_id']==$p_id) {
                    $v['level'] = $level;
                    $arr[] = $v;
                    $this->getLevel($cat_list,$v['cat_id'],$level+1);
                }
            }            
        }


        return $arr;
    }

    public function isLeaf($cat_id){
        $sql = "select 1 from $this->true_table where parent_id=$cat_id";
        $res = $this->dao->getOne($sql);
        return $res;
    }

    public function getLogo($cat_id){
        $sql = "select cat_logo from $this->true_table where cat_id=$cat_id";
        $res = $this->dao->getOne($sql);
        return $res;        
    }

    public function deleteCategory($cat_id){
        $sql = "delete from $this->true_table where cat_id=$cat_id";
        return $this->delete($cat_id);
    }

    public function getById($cat_id){
        $sql = "select * from $this->true_table where cat_id=$cat_id";
        return $this->dao->getOne($sql);
    }

    public function updateCategory($data){
        if ($data['cat_name']=='') {
            $this->error[] = '标题不能为空';
        }elseif((int)$data['cat_name']!=0){
            $this->error[] = '标题不能数字';
        }

        if (!empty($this->error)) {
            return flase;
        }
        return $this->update($data,array('cat_id'=>$data['cat_id']));
    }

}