<?php

use common\models\Author;
use common\models\Genre;
use common\models\PictureForm;
use dosamigos\fileupload\FileUpload;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Book */
/* @var $form yii\widgets\ActiveForm */
/* @var $modelPicture PictureForm */
?>

<img src="<?=$model->getPicture()?>" id="book-picture">

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publish_date')->widget(DatePicker::className(), [
        'options' => ['placeholder' => 'Enter publish date ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
        ]
    ]) ?>

    <?= $form->field($model, 'author_ids')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Author::find()->all(), 'id', 'last_name'),
        'options' => [
            'multiple' => true, 'value' => ArrayHelper::getColumn($model->authors, function ($element) {
                return $element->id;
            })
        ]
    ]) ?>

    <?= $form->field($model, 'genre_ids')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Genre::find()->all(), 'id', 'name'),
        'options' => [
            'multiple' => true, 'value' => ArrayHelper::getColumn($model->genres, function ($element) {
                return $element->id;
            })
        ]
    ]) ?>

    <?= FileUpload::widget([
        'model' => $modelPicture,
        'attribute' => 'picture',
        'url' => ['/book/upload-picture'], // your url, this is just for demo purposes,
        'options' => ['accept' => 'image/*'],
        'clientOptions' => [
            'maxFileSize' => 2000000
        ],
        // Also, you can specify jQuery-File-Upload events
        // see: https://github.com/blueimp/jQuery-File-Upload/wiki/Options#processing-callback-options
        'clientEvents' => [
            'fileuploaddone' => 'function(e, data) {
                                $("#book-picture").attr("src", data.result.pictureUri);
                            }',
            'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
