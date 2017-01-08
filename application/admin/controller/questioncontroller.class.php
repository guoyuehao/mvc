<?php
/**
 * @Author: anchen
 * @Date:   2016-11-05 18:52:35
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-05 21:56:09
 */
namespace admin\controller;
use framework\core\Controller;
use framework\core\Factory;
use framework\tools\CURL;
/**
* 
*/
class questioncontroller extends Controller
{
    protected $url = 'http://www.gyh.com/php%20-%20%E6%90%9C%E7%B4%A2%E7%BB%93%E6%9E%9C%20-%20%E7%9F%A5%E4%B9%8E.html';

    public function collectAction(){
        $http = new CURL();
        $result = $http->sendUrl($this->url);

        $reg = '/<a[^>]*class="js-title-link">(.+?)<\/a>.+?<script[^>]*class="content">(.+?)<\/script>/su';
        preg_match_all($reg, $result,$match);

        $question = $match[1];
        $answer = $match[2];


        foreach ($question as $key => $value) {
            $data['question_title'] = $value;
            $data['cat_id'] = 1;
            $data['user_id'] = $_SESSION['user']['user_id'];
            $data['pub_time'] = time();

            $m_q = Factory::M('question');
            $question_id = $m_q->insert($data);

            if ($question_id) {
                $d['question_id'] = $question_id;
                $d['answer_content'] = $answer[$key];
                $d['answer_time'] = time();
                $d['user_id'] = $_SESSION['user']['user_id'];

                $m_a = Factory::M('answer');
                $answer_id = $m_a->insert($d);
            }        
        }

    }


}