<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FunctionController extends Controller
{
    public function formatBytes($bytes){
        $units = array('B', 'KB', 'MB', 'GB', 'TB'); 
        $precision = 0;

        $bytes = max($bytes, 0); 
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
        $pow = min($pow, count($units) - 1); 

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow]; 
    }

    public function getIcon($route, $type){
        $icon = 'img/icon_file.png';
        if($type == 'jpg' || $type == 'svg' || $type == 'ico' || $type == 'png' || $type == 'gif' || $type == 'jpeg' || $type == 'webp'){
            $icon = 'uploads/' . $route;
        }
        else if($type == 'docx' || $type == 'doc'){
            $icon = 'img/icon_doc.png';
        }
        else if($type == 'pptx' || $type == 'ppt'){
            $icon = 'img/icon_ppt.png';
        }
        else if($type == 'xlsx' || $type == 'xls'){
            $icon = 'img/icon_exc.png';
        }
        else if($type == 'pdf'){
            $icon = 'img/icon_pdf.png';
        }
        else if($type == 'mp4' || $type == 'avi' || $type == 'mov'){
            $icon = 'img/icon_video.png';
        }
        else if($type == 'mp3' || $type == 'wav' || $type == 'm4a'){
            $icon = 'img/icon_audio.png';
        }
        else if($type == 'rar' || $type == 'zip'){
            $icon = 'img/icon_archive.png';
        }
        return $icon;
    }

    public function getType($type){
        $link = 'notImage';
        if($type == 'jpg' || $type == 'svg' || $type == 'ico' || $type == 'png' || $type == 'gif' || $type == 'jpeg' || $type == 'webp'){
            $link = 'image';
        }
        return $link;
    }

    public function getCard($type){
        $icon = 'bg-light card-img';
        if($type == 'jpg' || $type == 'svg' || $type == 'ico' || $type == 'png' || $type == 'gif' || $type == 'jpeg' || $type == 'webp'){
            
        }
        else{
            $icon .= ' px-5 py-4';
        }
        return $icon;
    }
}
