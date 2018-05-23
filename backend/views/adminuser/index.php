<?php

use common\models\Adminuser;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员用户';
$this->params['breadcrumbs'][] = $this->title;

$this->params['createString'] = '<a href="'.Yii::$app->urlManager->createUrl(['adminuser/create']).'"><i class=" fa fa-fw fa-plus-circle"></i></a>';



?>
<div class="adminuser-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'contentOptions' => ['width' => '20px'],
            ],

            'username',
            'realname',
            'email:email',
            [
                'attribute' => 'status',
                'value' => 'statusStr',
                'filter' => Adminuser::allStatus(),
            ],

            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],


            //'status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {resetpwd}',
                'buttons' => [
                    'resetpwd' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '重置密码'),
                            'aria-label' => Yii::t('yii', '重置密码'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-lock"></span>', $url, $options);
                    },
                ],
            ],

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
