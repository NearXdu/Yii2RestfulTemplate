<?php

namespace backend\models;

use yii\base\Model;
use common\models\Adminuser;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $realname;
    public $email;
    public $password;
    public $password_repeat;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Adminuser', 'message' => '用户名已经存在'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Adminuser', 'message' => '邮件地址已经存在'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码输入不一致'],

            ['realname', 'required'],
            ['realname', 'string', 'max' => 128],
        ];
    }


    public function attributeLabels()
    {
        //   return parent::attributeLabels(); // TODO: Change the autogenerated stub

        return [
            'username' => '用户名',
            'realname' => '姓名',
            'password' => '密码',
            'password_repeat' => '确认密码',
            'email' => '邮箱地址',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        /*
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
        */

        if (!$this->validate()) {
            return null;
        }

        $user = new Adminuser();
        $user->username = $this->username;
        $user->realname = $this->realname;
        $user->email = $this->email;

        $user->setPassword($this->password);
        $user->generateAuthKey();
     //   $user->save(); VarDumper::dump($user->errors);exit(0);


        return $user->save() ? $user : null;

    }
}
