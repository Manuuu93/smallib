<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use common\models\Book;

/* @var $this yii\web\View */
/* @var $model common\models\Book */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-view">
    <div class="col-lg-8">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'description:ntext',
                'publish_date',
                [
                    'label' => 'Авторы',
                    'value' => implode(', ', ArrayHelper::map($model->authors, 'id', 'last_name')),
                ],
                [
                    'label' => 'Жанры',
                    'value' => implode(', ', ArrayHelper::map($model->genres, 'id', 'name')),
                ]
            ],
        ]) ?>

        <p>
            <?php if (Book::STATUS_MODERATION == $model->status): ?>
                <?= Html::a('Approve', ['approve', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php endif; ?>
            <?= Html::a('Добавить цитату', ['quote/create', 'book' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <h2>Цитаты</h2>

        <?= GridView::widget([
            'dataProvider' => new ActiveDataProvider([
                'query' => $model->getQuotes(),
            ]),
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'content',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}{delete}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            $url = Url::to(['quote/update', 'id' => $model->id]);
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => 'update']);
                        },
                        'delete' => function ($url, $model) {
                            $url = Url::to(['quote/delete', 'id' => $model->id]);
                            return Html::a(
                                '<span class="glyphicon glyphicon-trash"></span>',
                                $url,
                                ['data-method' => 'POST',
                                    'data-params' => [
                                        'csrf_param' => \Yii::$app->request->csrfParam,
                                        'csrf_token' => \Yii::$app->request->csrfToken,
                                    ],
                                ]
                            );
                        },
                    ],
                ],
            ]
        ])
        ?>

    </div>

</div>
