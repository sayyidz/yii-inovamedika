<?php
$this->pageTitle = 'Register';
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap.min.css');
?>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 450px;">
        <h3 class="text-center">Register</h3>
        <hr>

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'register-form',
            'enableClientValidation' => true,
            'clientOptions' => array('validateOnSubmit' => true),
            'htmlOptions' => array('class' => 'needs-validation'),
        )); ?>

        <div class="mb-3">
            <?php echo $form->labelEx($model, 'name', array('class' => 'form-label')); ?>
            <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'placeholder' => 'Masukkan nama lengkap Anda')); ?>
            <?php echo $form->error($model, 'name', array('class' => 'text-danger')); ?>
        </div>

        <div class="mb-3">
            <?php echo $form->labelEx($model, 'email', array('class' => 'form-label')); ?>
            <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => 'Masukkan email Anda')); ?>
            <?php echo $form->error($model, 'email', array('class' => 'text-danger')); ?>
        </div>

        <div class="mb-3">
            <?php echo $form->labelEx($model, 'password', array('class' => 'form-label')); ?>
            <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => 'Buat password')); ?>
            <?php echo $form->error($model, 'password', array('class' => 'text-danger')); ?>
        </div>

        <div class="mb-3">
            <?php echo $form->labelEx($model, 'confirmPassword', array('class' => 'form-label')); ?>
            <?php echo $form->passwordField($model, 'confirmPassword', array('class' => 'form-control', 'placeholder' => 'Konfirmasi password')); ?>
            <?php echo $form->error($model, 'confirmPassword', array('class' => 'text-danger')); ?>
        </div>

        <div class="mb-3">
            <?php echo $form->labelEx($model, 'gender', array('class' => 'form-label')); ?>
            <?php echo $form->dropDownList($model, 'gender', array('Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'gender', array('class' => 'text-danger')); ?>
        </div>

        <div class="mb-3">
            <?php echo $form->labelEx($model, 'tanggal_lahir', array('class' => 'form-label')); ?>
            <?php echo $form->textField($model, 'tanggal_lahir', array('class' => 'form-control', 'placeholder' => 'YYYY-MM-DD')); ?>
            <?php echo $form->error($model, 'tanggal_lahir', array('class' => 'text-danger')); ?>
        </div>

        <div class="d-grid">
            <?php echo CHtml::submitButton('Register', array('class' => 'btn btn-primary')); ?>
        </div>

        <?php $this->endWidget(); ?>

        <div class="text-center mt-3">
            <small>Sudah punya akun? <a href="<?php echo Yii::app()->createUrl('auth/login'); ?>">Login</a></small>
        </div>
    </div>
</div>
