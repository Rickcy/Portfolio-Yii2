<?php


use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\captcha\Captcha;

$this->title = 'Feedback | Personal Page Portfolio';
?>
<div class="site-page">
    <section id="contact" class="pfblock">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-sm-offset-3">

                    <div class="pfblock-header wow fadeInUp">
                        <h2 class="pfblock-title ">Drop me a line</h2>
                        <div class="pfblock-line"></div>

                    </div>

                </div>

            </div><!-- .row -->

            <div class="row">

                <div class="col-sm-6 col-sm-offset-3">

                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true,'class'=>'form-control wow fadeInUp'])->label('Name',['class'=>['control-label wow fadeInUp']]) ?>

                    <?= $form->field($model, 'email')->textInput(['class'=>'form-control wow fadeInUp'])->label('E-mail',['class'=>['control-label wow fadeInUp']]) ?>

                    <?= $form->field($model, 'subject')->textInput(['class'=>'form-control wow fadeInUp'])->label('Subject',['class'=>['control-label wow fadeInUp']]) ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6,'class'=>'form-control wow fadeInUp'])->label('Text',['class'=>['control-label wow fadeInUp']]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-lg btn-block wow fadeInUp', 'name' => 'contact-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

            </div><!-- .row -->
        </div><!-- .container -->
    </section>
</div>