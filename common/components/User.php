<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018/2/12
 * Time: 17:12
 */

namespace common\components;

use yii\base\BaseObject;
use Yii;
class User extends BaseObject
{
    private $_age;
    public function getAge(){
        return ucfirst($this->_age);
    }
}