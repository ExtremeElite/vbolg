<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018/2/8
 * Time: 16:21
 */
namespace common\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $uid 随机字符串
 * @property int $cid 文章分类
 * @property int $admin_id 作者id
 * @property string $keywords
 * @property string $header_img 封面图英文,分割
 * @property string $description
 * @property string $title
 * @property string $content
 * @property int $views
 * @property int $faker_views
 * @property int $status 文章状态0:未发布;1：已发布
 * @property int $create_time
 * @property int $update_time
 */
class Article extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'admin_id', 'views', 'faker_views', 'status', 'create_time', 'update_time'], 'integer'],
            [['content'], 'required'],
            [['content'], 'string'],
            [['uid'], 'string', 'max' => 10],
            [['keywords', 'title'], 'string', 'max' => 32],
            [['header_img', 'description'], 'string', 'max' => 255],
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
            'uid' => '随机字符串',
            'cid' => '分类id',
            'admin_id' => '作者id',
            'keywords' => '关键字',
            'header_img' => '头图',
            'description' => '描述',
            'title' => '标题',
            'content' => '内容',
            'views' => 'views',
            'faker_views' => 'Faker Views',
            'status' => '状态',
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
