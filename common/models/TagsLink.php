<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "tags_link".
 *
 * @property int $id
 * @property string $t_uid 标签英文别名
 * @property int $aid 文章id
 * @property int $create_time
 * @property int $update_time
 */
class TagsLink extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'create_time', 'update_time'], 'integer'],
            [['t_uid'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            't_uid' => 'T Uid',
            'aid' => 'Aid',
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
