<?php
/**
 * @Author: anchen
 * @Date:   2016-11-04 14:26:07
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-11-05 19:54:13
 */
namespace framework\tools;

/**
* 
*/

class CURL
{
    public $display = true;

    public function sendUrl($url,$data=array()){

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);

        if ($this->display) {
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        }
        if (!empty($data)) {
            curl_setopt($curl,CURLOPT_POST,true);
            curl_setopt($curl,CURLOPT_POSTFIELDS, $data);
        }

        if($this->display){
            //直接返回结果
            return curl_exec($curl);
        }else{
            //直接输出
            curl_exec($curl);
        }
        //关闭资源
        curl_close($curl);

    }    

}