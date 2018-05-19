<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 获取号码
 * @param $url
 * @return array|bool
 */
function file_grabbing($url){
    //方法一
    //$html = file_get_contents($url);
    //$html = iconv("gbk","utf-8", $html);    //转换为utf-8

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
    //curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
    $html = curl_exec($ch);
    curl_close($ch);

    if(!empty($html)){
        $ball = array();
        preg_match_all('/<li[^>]*class="ball_red".*?>.*?<\/li>/ism',$html,$red);
        preg_match('/<li[^>]*class="ball_blue".*?>.*?<\/li>/ism',$html,$blue);

        $red = array_merge($red,$blue);

        foreach ($red as $item){
            $item = preg_replace('/<(\/?li.*?)>/si',"",$item);
            if(!is_array($item)){
                $item = array($item);
            }
            $ball = array_merge($ball,$item);
        }

        unset($html);

        return $ball;
    }else{
        return false;
    }
}

/**
 * 设置配置文件
 * @param $path
 * @param $params
 * @return bool
 */
function set_config($path,$params){
    if(empty($path)){
        return false;
    }

    if(is_array($params)){
        $keys = array();
        $vals = array();
        foreach ($params as $key => $item){
            $keys[] = '/\'' . $key . '\'(.*?),/';
            $vals[] = "'" . $key . "' => '" . $item . "'";
        }

        $string = file_get_contents($path);
        $string = preg_replace($keys, $vals, $string);
        file_put_contents($path, $string);
        return true;
    }else{
        return false;
    }
}