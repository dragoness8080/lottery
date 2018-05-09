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

function file_grabbing($url){
    //方法一
    //$html = file_get_contents($url);
    //$html = iconv("gbk","utf-8", $html);    //转换为utf-8

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
    $html = curl_exec($ch);
    curl_close($ch);

    if(!empty($html)){
        $i = preg_match_all('/<table\s+class="kj_tablelist02"\s+width="100%"\s+cellspacing="0"\s+cellpadding="0"\s+bordercolor="#ADD3EF"\s+border="1">(.*)<\/table>/',$html,$out);
        var_dump($out);exit();
    }
}