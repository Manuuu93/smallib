<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UsersReadedBooks */

$this->title = 'Create Users Readed Books';
$this->params['breadcrumbs'][] = ['label' => 'Users Readed Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-readed-books-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
