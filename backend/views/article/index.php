<?php

use common\models\Adminuser;
use common\models\Article;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
$this->params['createString'] = '<a href="' . Yii::$app->urlManager->createUrl(['article/create']) . '"><i class=" fa fa-fw fa-plus-circle"></i></a>';

?>
<div class="article-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',

            [
                'attribute' => 'category_id',
                'value' => 'CateStr',
                'filter' => Article::allCategory()
            ],
            [
                'attribute' => 'status',
                'value' => 'StatusStr',
                'filter' => Article::allStatus(),
            ],
            [
                'attribute' => 'created_by',
                'value' => 'createdBy.realname',
                'filter' => Adminuser::find()
                    ->select(['realname', 'id'])
                    ->indexBy('id')
                    ->column(),
            ],

            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
