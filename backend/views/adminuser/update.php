<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = '更新管理员用户：' . $model->realname;
$this->params['breadcrumbs'][] = ['label' => '管理员用户', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->realname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="adminuser-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
