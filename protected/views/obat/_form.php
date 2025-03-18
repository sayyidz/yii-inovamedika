<?php
/* @var $this ObatController */
/* @var $model Obat */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'obat-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_obat'); ?>
		<?php echo $form->textField($model,'nama_obat',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama_obat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kadaluwarsa'); ?>
		<?php echo $form->textField($model,'kadaluwarsa'); ?>
		<?php echo $form->error($model,'kadaluwarsa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dosis'); ?>
		<?php echo $form->textField($model,'dosis',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'dosis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'habiskan'); ?>
		<?php echo $form->textField($model,'habiskan'); ?>
		<?php echo $form->error($model,'habiskan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->