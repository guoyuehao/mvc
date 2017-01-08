<?php
namespace framework\dao;
interface I_DAO{
    //查询所有数据
    public function getAll($sql);
    //查询一条数据
    public function getOne($sql);
    //查询一个字段
    public function getColumn($sql);
    //执行增删改结果
    public function exec($sql);

}