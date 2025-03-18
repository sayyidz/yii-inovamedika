<?php
$this->pageTitle = 'Login';
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap.min.css');
?>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 400px;">
        <h3 class="text-center">Login</h3>
        <hr>
        
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array('validateOnSubmit' => true),
            'htmlOptions' => array('class' => 'needs-validation'),
        )); ?>

        <div class="mb-3">
            <?php echo $form->labelEx($model, 'email', array('class' => 'form-label')); ?>
            <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => 'Masukkan email Anda')); ?>
            <?php echo $form->error($model, 'email', array('class' => 'text-danger')); ?>
        </div>

        <div class="mb-3">
            <?php echo $form->labelEx($model, 'password', array('class' => 'form-label')); ?>
            <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => 'Masukkan password Anda')); ?>
            <?php echo $form->error($model, 'password', array('class' => 'text-danger')); ?>
        </div>

        <div class="d-grid">
            <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary')); ?>
        </div>

        <?php $this->endWidget(); ?>

        <div class="text-center mt-3">
            <small>Belum punya akun? <a href="<?php echo Yii::app()->createUrl('site/register'); ?>">Daftar</a></small>
        </div>
    </div>
</div>
