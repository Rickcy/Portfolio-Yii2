<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Works */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="works-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'work_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'work_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_tech')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_main_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'showMain')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
