<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\3\11 0011
 * Time: 10:30
 */

namespace backend\models;
use Yii;
use yii\base\Model;
use backend\models\Admin;
/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_admin;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            ['username', 'required','message'=>'用户名不能为空'],
            ['password', 'required','message'=>'密码不能为空'],
//            [['username','password'],CheckAbeiValidator::className()],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }
    public function attributeLabels()
    {
        return[
            'username'=>'用户名',
            'password'=>'密码',
            'rememberMe'=>'记住我'
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $admin = $this->getAdmin();
            if (!$admin || !$admin->validatePassword($this->password)) {
                $this->addError($attribute, '用户名或者密码错误！');
            }
        }
    }

    /**
     * Logs in a admin using the provided username and password.
     *
     * @return bool whether the admin is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->admin->login($this->getAdmin(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return admin|null
     */
    protected function getAdmin()
    {
        if ($this->_admin === null) {
            $this->_admin = Admin::findByUsername($this->username);
        }

        return $this->_admin;
    }
}
