<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="article-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="title-filed">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="content-filed">

        <?= $form->field($model, 'content')
            ->textarea(['placeholder'=>'请输入文章内容...','class'=>'col-xs-6' ,'rows' => 10, 'id' => 'text-input', 'oninput' => 'this.editor.update()'])
            ->label(false)
           ?>


        <div class="col-xs-6" id="preview"><div/>

        </div>


        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

        <?php ActiveForm::end(); ?>



    <script src="markdown.js"></script>
    <script>
        function Editor(input, preview) {
            this.update = function () {
                preview.innerHTML = markdown.toHTML(input.value);
            };
            input.editor = this;
            console.log(preview.innerHTML);
            this.update();
        }

        var $ = function (id) {
            return document.getElementById(id);
        };
        new Editor($("text-input"), $("preview"));
    </script>

