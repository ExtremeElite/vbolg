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
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $aid 文章id
 * @property int $author_id 评论者id
 * @property int $postion 评论位置：评论状态为已发布的情况下才有效0：普通位置发布时间先后；1:评论置顶
 * @property string $content 评论内容
 * @property int $status 评论状态0:未发布;1：已发布
 * @property int $create_time
 * @property int $update_time
 */
class Comments extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'author_id', 'postion', 'status', 'create_time', 'update_time'], 'integer'],
            [['content'], 'string', 'max' => 128],
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
            'author_id' => 'Author ID',
            'postion' => 'Postion',
            'content' => 'Content',
            'status' => 'Status',
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
