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
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string $uid 随机字符串唯一
 * @property string $name 标签中文名
 * @property int $status 评论状态0:未发布;1：已发布
 * @property int $create_time
 * @property int $update_time
 */
class Tags extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'create_time', 'update_time'], 'integer'],
            [['uid', 'name'], 'string', 'max' => 20],
            [['uid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'name' => 'Name',
            'status' => 'Status',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
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
