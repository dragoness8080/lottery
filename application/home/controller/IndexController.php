<?php
/**
 * Created by PhpStorm.
 * User: appleimac
 * Date: 18/5/8
 * Time: ����4:09
 */

namespace app\home\controller;


use app\home\model\TicketModel;
use think\Config;
use think\Controller;

class IndexController extends Controller {

    protected function _initialize() {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }

    public function indexAction(){
        $url = Config::get('double_chromosphere.curl_url');
        $year = Config::get('double_chromosphere.cur_year');
        $number = Config::get('double_chromosphere.cur_number');

        $ticket = new TicketModel();

        $curYear = date('y', time());
        if($year != $curYear && $year < $curYear){
            for ($year;$year<=$curYear;$year++){
                $curNumber = 1;
                for($curNumber;$curNumber<=160;$curNumber++){
                    $str = substr("0" . $year,-1,2) . substr("0000" . $curNumber,-1,3);
                    $curl_url = $url . $str . "shtml";
                    $ball = file_grabbing($curl_url);
                    if($ball !== false){
                        $list[] = [
                            'issue' => $str,
                            'identifier' => $curNumber,
                            'red_one' => $ball[0],
                            'red_two' => $ball[1],
                            'red_three' => $ball[2],
                            'red_four' => $ball[3],
                            'red_five' => $ball[4],
                            'red_six' => $ball[5],
                            'blue' => $ball[6]
                        ];
                    }else{
                        break 1;
                    }
                }
            }

            $ticket->saveAll($list);
        }else{

        }



        //$ball = file_grabbing("http://kaijiang.500.com/shtml/ssq/03001.shtml");
        //return $this->fetch();
    }
}