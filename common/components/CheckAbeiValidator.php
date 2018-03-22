<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018/2/11
 * Time: 16:24
 */
namespace common\components;
use yii\validators\Validator;
class CheckAbeiValidator extends Validator{
    public function validateAttribute($model,$attribute)
    {

        if ($model->$attribute!='hotact'){
            $this->addError($model,$attribute,'错误了');
        }else{
            $this->addError($model,$attribute,'厉害了');
        }
    }
}
