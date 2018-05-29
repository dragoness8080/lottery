<?php

/**
 * Created by PhpStorm.
 * User: appleimac
 * Date: 18/5/8
 * Time: обнГ4:55
 */

namespace app\home\model;

use think\Model;

class TicketModel extends Model {

    protected $table = 'ticket';
    protected $pk = 'id';
    protected $resultSetType = 'collection';
}