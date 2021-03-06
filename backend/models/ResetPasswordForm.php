<?php

namespace backend\models;

use common\models\Adminuser;
use yii\base\Model;
use yii\base\InvalidParamException;
use common\models\User;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;
    public $password_repeat;

    /**
     * @return array|void
     */
    public function rules()
    {
        //   return parent::rules(); // TODO: Change the autogenerated stub

        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码输入不一致！'],

        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        //   return parent::attributeLabels(); // TODO: Change the autogenerated stub
        return [
            'password' => '新密码',
            'password_repeat' => '新密码确认',
        ];
    }

    public function resetPassword($id)
    {
        if (!$this->validate()) {
            return null;
        }

        $adminuser = Adminuser::findOne($id);
        $adminuser->setPassword($this->password);
        $adminuser->removePasswordResetToken();
        return $adminuser->save() ? true : false;

    }
}
