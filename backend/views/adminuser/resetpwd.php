<?php
/**
 * Created by PhpStorm.
 * User: crlt_
 * Date: 2018/5/22
 * Time: 上午11:29
 */

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title='修改管理员密码：'.$userRealName;
$this->params['breadcrumbs'][] = ['label' => '管理员用户', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="adminuser-resetpwd">
    <div class="adminuser-form">

        <?php $form=ActiveForm::begin();?>


        <?=$form->field($model,'password')->passwordInput(['maxLength'=>true])?>
        <?=$form->field($model,'password_repeat')->passwordInput(['maxLength'=>true])?>
        <div class="form-group">
            <?= Html::submitButton('重置',['class'=>'btn btn-success'])?>
        </div>


        <?php ActiveForm::end();?>
    </div>
</div>
