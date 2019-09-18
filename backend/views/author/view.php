<?php

use common\models\Author;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Author */

$this->title = $model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="author-view">

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
