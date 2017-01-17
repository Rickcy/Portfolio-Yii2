<?php

use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Works */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="works-form">
    
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'work_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_description')->textarea(['rows'=>6]) ?>

    <?= $form->field($model, 'work_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_tech')->textInput(['maxlength' => true]) ?>
    
    <?if ($model->work_image):?>
    <div class="image<?=$model->id?>" style="position: relative">
    <img class="img-thumbnail" src="/<?=$model->work_image ?>" width="250px" alt="">
        <a href="#" onclick="deleteImage(<?=$model->id ?>)">x</a>
    </div>
    <?endif;?>
    
    <?= $form->field($model, 'image_file')->fileInput() ?>



    <?$images_files =$model->viewsImage($model->work_name);
    ?>
    <?if ($images_files):?>
    <?
    foreach ($images_files as $img):?>
       <span id="image<?=rtrim(basename($img),'.png')?>" > <img class="img-thumbnail" width=200px src="/uploads/<?=str_replace(' ','',$model->work_name);?>/images/<?=basename($img)?>" >
        <a href="javascript:void(0)" onclick='deleteImages(<?=$model->id?>,"<?=rtrim(basename($img),'.png')?>")' >x</a>
       </span>

           <?endforeach;?>
    <?endif;?>
    
    
    <?= $form->field($model, 'image_files[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

<!--    --><?

    //
    //
    //
    //= $form->field($model, 'file')->fileInput()
//    echo $form->field($model, 'file')->widget(FileInput::className(),[
//        'options' => [
//            'accept' => 'image/*',
//        ],
//        'pluginOptions' => [
//            'allowedFileExtensions' =>  ['jpg', 'png','gif'],
//            //'initialPreview' => '<div><img class="img-responsive" width="230px" src=/'.$model->work_image.' alt="">',
//            'showUpload' => true,
//            'showRemove' => false,
//            'dropZoneEnabled' => false
//        ]
//    ]);
//    echo Html::label('Images');
//
//    echo FileInput::widget([
//        'name' => 'files',
//        'options' => [
//            'accept' => 'image/*',
//            'multiple'=>true
//        ],
//        'pluginOptions' => [
//
//
//            'allowedFileExtensions' =>  ['jpg', 'png','gif'],
//
//            'showUpload' => true,
//            'showRemove' => false,
//            'dropZoneEnabled' => false
//        ]
//    ]);
    ?>



    <?= $form->field($model, 'showMain')->radioList(['No','Yes']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
   
</div>
