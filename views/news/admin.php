<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข่าว';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มข่าว', ['create'], ['class' => 'btn btn-success btn-lg btn-block btn-raised']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
              'header' => 'ลำดับ'
            ],

            //'id',
            [
              'attribute'=>'cat_id',
              'value' => function($model){return $model->cat->name;},
            ],
            'title',
            'detail:ntext',
            'post_date',
            // 'update_date',
            // 'view',
            ['class' => 'yii\grid\ActionColumn',
                'header'=>'คลิกดู',
                'headerOptions' => ['style' => 'width:20%'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {detail} {edit} {del} </div>',
                'buttons'=>[
                    'detail' => function($url,$model,$key){
                        return Html::a('รายละเอียด',
                            ['view', 'id' => $model->id],
                            ['class' => 'btn btn-inverse'],
                            $url);
                    },
                    'edit' => function($url,$model,$key){
                        return Html::a('ปรับปรุง',
                            ['update', 'id' => $model->id],
                            ['class' => 'btn btn-success'],
                            $url);
                    },
                    // 'del' => function($url,$model,$key){
                    //     return Html::a('ลบ',
                    //         ['delete', 'id' => $model->id],
                    //         ['class' => 'btn btn-danger'],
                    //         $url);
                    // },
                ],
            ],

            // [
            //   'class' => 'yii\grid\ActionColumn',
            //   'header'=>'คลิกดู',
            //   'buttonOptions'=>['class'=>'btn btn-default'],
            //   'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
            // ],
        ],
    ]); ?>
</div>
