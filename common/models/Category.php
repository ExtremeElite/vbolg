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
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $uid 文章英文名
 * @property int $pid
 * @property string $keywords
 * @property string $description
 * @property string $header_img 封面图英文,
 * @property int $create_time
 * @property int $update_time
 */
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'create_time', 'update_time'], 'integer'],
            [['uid'], 'string', 'max' => 20],
            [['keywords'], 'string', 'max' => 32],
            [['description', 'header_img'], 'string', 'max' => 255],
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
            'pid' => 'Pid',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'header_img' => 'Header Img',
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
