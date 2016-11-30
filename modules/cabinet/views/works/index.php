<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchWorks */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Works';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="works-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Works', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'work_name',
            'work_description',
            'work_url:url',
            'work_tech',

            [

                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::to(Yii::$app->urlManager->baseUrl . '/uploads/'.$data->work_name.'/'.$data->work_image),[


                       'style'=>'width:50%;text-align:center'

                    ]);
                },
            ],
//             'work_name_image',
//             'showMain',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
