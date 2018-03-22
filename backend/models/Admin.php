<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018/2/9
 * Time: 12:34
 */
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string $uname 登陆名
 * @property string $nick_name 昵称
 * @property string $password 密码
 * @property int $status 管理员状态0:不允许登陆;1：允许登陆
 * @property int $create_time
 * @property int $update_time
 * @property int $last_time 最后一次登陆时间
 * @property string $ip 最后一次登陆地址
 */
class Admin extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    const STATUS_DENY=0;
    const STATUS_ACTIVE=1;
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'create_time', 'update_time', 'last_time'], 'integer'],
            [['uname'], 'string', 'max' => 10],
            [['nick_name'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 32],
            [['ip'], 'string', 'max' => 15],
            [['uname'], 'unique'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DENY]]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uname' => '登录名',
            'nick_name' => '昵称',
            'password' => '密码',
            'status' => '状态',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'last_time' => '最后一次登录时间',
            'ip' => '登录ip',
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

    public static function findByUsername($uname)
    {
        return self::findOne(['uname' => $uname, 'status' => self::STATUS_ACTIVE]);
    }

    public function validatePassword($password)
    {
        //return Yii::$app->security->validatePassword($password, $this->password_hash);
        if(md5($password.Yii::$app->request->cookieValidationKey)==$this->password){
            return true;
        }
        return false;
    }
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }
    public static function findIdentity($id)
    {
        return self::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
}
