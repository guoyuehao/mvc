<?php
/**
 * @Author: anchen
 * @Date:   2016-10-24 19:11:52
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-04 01:00:38
 */
namespace framework\core;
use framework\dao\DAOPDO;

/**
* 
*/
class Model
{
    protected $dao;
    protected $true_table;
    protected $field_list = array();
    protected $error = array();

    function __construct()
    {
        $this->initDAO();
        $this->initTable();
        $this->initFields();
    }

    public function getError(){
        $error_str = '';
        foreach ($this->error as $v) {
            $error_str .= $v.'<br>';
        }
        return $error_str;
    }

    private function initFields(){
        $sql = "desc $this->true_table";
        $fields = $this->dao->getAll($sql);

        foreach ($fields as $k => $v){
            if($v['Key']=='PRI'){
                $this->field_list['pk'] = $v['Field'];

            }
        }
    }

    private function initTable(){
        $this->true_table = '`'.$this->logic_table.'`';
    }

    private function initDAO()
    {
        $option = $GLOBALS['config'];
        $this->dao = DAOPDO::getsingleton($option);       
    }

    public function insert($data){
        $sql = "insert into $this->true_table";

        $fields = array_keys($data);
        $fields = array_map(function($v){return '`'.$v.'`'; },$fields);
        $field_list = implode(',',$fields);
        $sql .= '('.$field_list.')';

        $values = array_values($data);
        $values = array_map(function($v){return '"'.$v.'"'; },$values);
        $values = implode(',',$values);
        $sql .= 'values('.$values.')';

       

        $this->dao->exec($sql);
        return $this->dao->lastInsertId();

    }

    public function delete($id){
        $sql = "delete from $this->true_table where {$this->field_list['pk']}=$id";
        return $this->dao->exec($sql);
    }

    public function update($data,$where=null){
        if (!is_null($where)) {
                 foreach ($where as $key => $value) {
                    $where_str = '`'.$key.'`'."='$value'";
                }
            }else{
                return false;
            }          

        foreach ($data as $key => $value) {
            $arr[] = '`'.$key.'`'."='$value'";
        }

        $fields = implode(',', $arr);

        $sql = "update $this->true_table set $fields where $where_str";

        return $this->dao->exec($sql);
    }

    public function findOne($pk_value,$fields=null){
        if (!is_null($fields)) {
            $field_list = array_map(function($v){
                return '`'.$v.'`';
            },$fields);
            $field_list = implode(',',$field_list);
        }else{
            $field_list = '*';
        }

        $pk = $this->field_list['pk'];
        $where_str = '`'.$pk.'`'."=$pk_value";

        $sql = "select $field_list from $this->true_table where $where_str";
        return $this->dao->getOne($sql);

    }
}