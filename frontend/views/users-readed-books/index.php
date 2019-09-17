<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UsersReadedBooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Прочитанные книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-readed-books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'book.name',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        $url = Url::to(['book/view', 'id' => $model->book_id]);
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => 'view']);
                    }
                ],
            ],
        ],
    ]); ?>


</div>
