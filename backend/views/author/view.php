<?php

use common\models\Author;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Author */

$this->title = $model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="author-view">

    <div class="col-lg-5">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'first_name',
                'second_name',
                'last_name',
                'birth_date',
                'death_date',
                [
                    'label' => 'Cтрана',
                    'attribute' => 'country.name',
                ],
                'status'
            ],
        ]) ?>

        <p>
            <?php if (Author::STATUS_MODERATION == $model->status): ?>
                <?= Html::a('Approve', ['approve', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php endif; ?>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
                'data' => ['confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',],]) ?>
        </p>
    </div>

    <div class="col-lg-7">
        <h2>Книги</h2>
        <?= GridView::widget([
            'dataProvider' => new ActiveDataProvider([
                'query' => $model->getBooks(),
            ]),
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                'publish_date',
                'status',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}{update}{delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            $url = Url::to(['book/view', 'id' => $model->id]);
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => 'view']);
                        },
                        'update' => function ($url, $model) {
                            $url = Url::to(['book/update', 'id' => $model->id]);
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => 'update']);
                        },
                        'delete' => function ($url, $model) {
                            $url = Url::to(['book/delete', 'id' => $model->id]);
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
            ],
        ]); ?>
    </div>

</div>
