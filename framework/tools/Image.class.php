<?php

namespace framework\tools;
/**
 * @Author: anchen
 * @Date:   2016-10-28 18:18:13
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-10-28 18:59:58
 */
class Image 
{
    private $mime;
    private $thumb_path;
    private $src_file;

    private $create_func = array(
        'image/png' => 'imagecreatefrompng',
        'image/jpeg' => 'imagecreatefromjpeg',
        'image/gif' => 'imagecreatefromgif'
        );
    private $output_func = array(
        'image/png' => 'imagepng',
        'image/jpeg' => 'imagejpeg',
        'image/gif' => 'imagegif'       
        );

    public function __construct($src_file){
        if (!file_exists($src_file)) {
            die('文件不存在');
        }else{
            $this->getMime($src_file);
            $this->src_file = $src_file;
        }
    }

    private function getMime($src_file){
        $info = getimagesize($src_file);
        $this->mime = $info['mime'];
    }

    private function get_create_func(){
        return $this->create_func[$this->mime];
    }

    private function get_output_func(){
        return $this->output_func[$this->mime];
    }

    public function setThumbPath($path=''){
        if (!is_dir($path)) {
            $this->thumb_path = APP_PATH.'public/static/thumb/';
        }else{
            $this->thumb_path = $path;
        }
    }

    public function makeThumb($area_w,$area_h){
        $create_func = $this->get_create_func();
        $src_image = $create_func($this->src_file);
        $dst_x = 0;
        $dst_y = 0;
        $src_x = 0;
        $src_y = 0;
        $src_w = imagesx($src_image);
        $src_h = imagesy($src_image);

        if ($src_w>=$src_h) {
            $dst_w = $area_w;
            $dst_h = (int)$src_h/($src_w/$area_w);
        }else{
            $dst_h = $area_h;
            $dst_w = (int)$src_w/($dst_w/$area_h);
        }

        $dst_image = imagecreatetruecolor($dst_w, $dst_h);

        if ($this->mime=='image/png') {
            $color = imagecolorallocate($dst_image, 255, 255, 255);
            imagecolortransparent($dst_image,$color);
            imagefill($dst_image,0,0,$color);
        }

        imagecopyresampled($dst_image,$src_image,$dst_x,$dst_y,$src_x,$src_y,$dst_w,$dst_h,$src_w,$src_h);

        $output_func = $this->get_output_func();
        $sub_path = date('Ymd').'/';

        if (!is_dir($this->thumb_path.$sub_path)) {
            mkdir($this->thumb_path.$sub_path,0777,true);
        }

        $filename = basename($this->src_file);
        $output_func($dst_image,$this->thumb_path.$sub_path.'thumb_'.$filename);

        imagedestroy($src_image);
        imagedestroy($dst_image);

        return $sub_path.'thumb_'.$filename;
    }
}