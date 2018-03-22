<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018/2/9
 * Time: 12:34
 */
namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "postion".
 *
 * @property int $id
 * @property int $aid 文章id
 * @property int $postion 文章状态为已发布的情况下才有效0：普通位置发布时间先后；1:文章首页置顶；-1：文章频道置顶；2:文章首页轮播
 * @property int $create_time
 * @property int $update_time
 */
class Postion extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'postion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'postion', 'create_time', 'update_time'], 'integer'],
            [['aid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aid' => 'Aid',
            'postion' => 'Postion',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_time', 'update_time'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_time'],
                ],
            ],
        ];
    }
}
