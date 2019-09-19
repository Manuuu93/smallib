<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Book;

/* @var $this yii\web\View */
/* @var $model common\models\Quote */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quote-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'book_id')->dropDownList(ArrayHelper::map(Book::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
