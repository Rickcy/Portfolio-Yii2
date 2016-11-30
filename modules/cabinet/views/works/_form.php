<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Works */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="works-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <?= $form->field($model, 'work_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_tech')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'work_name_image');

    // display the image uploaded or show a placeholder
    // you can also use this code below in your `view.php` file
    $title = isset($model->work_name_image) && !empty($model->work_name_image) ? $model->work_name_image : 'Avatar';
    echo Html::img($model->getImageUrl($model->work_name), [
    'class'=>'img-thumbnail',
    'alt'=>$title,
    'title'=>$title
    ]);


    // your fileinput widget for single file upload
    echo $form->field($model, 'image')->widget(FileInput::classname(), [
    'options'=>['accept'=>'image/*'],
    'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],
    ]]);
//    echo $form->field($model, 'images')->widget(FileInput::classname(), [
//        'options'=>['accept'=>'image/*','multiple'=>true],
//        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],
//        ]]);


    echo Html::label('Images');
    echo FileInput::widget([
        'name' => 'images',
        'options' => ['accept'=>'image/*','multiple'=>true],
        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],
            'uploadUrl' => Url::to(['file-upload-general']),
            'uploadExtraData' => [
                'work_name' => $model->work_name,
                
            ],
        ]]);
  
    /**
    * uncomment for multiple file upload
    echo $form->field($model, 'image[]')->widget(FileInput::classname(), [
    'options'=>['accept'=>'image/*', 'multiple'=>true],
    'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
     * 
    ]);
    */

?>
    <?= $form->field($model, 'showMain')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
