<?php

use common\models\Adminuser;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adminuser-form">
    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'realname')->textInput(['maxLength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxLength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(Adminuser::allStatus(), ['prompt' => '请选择状态']) ?>


    <div class="form-group">
        <?= Html::submitButton('修改', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end() ?>

</div>
