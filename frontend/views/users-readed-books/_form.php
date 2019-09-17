<?php

use common\models\Book;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UsersReadedBooks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-readed-books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_id')->dropDownList(ArrayHelper::map(Book::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
