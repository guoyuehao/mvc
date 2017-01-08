<?php
/**
 * @Author: anchen
 * @Date:   2016-10-26 21:37:33
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-04 00:37:36
 */
namespace home\model;
use framework\core\Model;
class indexmodel extends Model
{
    public function index()
    {   
        $this->indexAction();
    }

}