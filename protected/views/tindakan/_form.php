<?php
/* @var $this TindakanController */
/* @var $model Tindakan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tindakan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'deskripsi_tindakan'); ?>
		<?php echo $form->textArea($model,'deskripsi_tindakan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'deskripsi_tindakan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dokter_tindakan'); ?>
		<?php echo $form->textField($model,'dokter_tindakan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'dokter_tindakan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'obat_id'); ?>
		<?php echo $form->textField($model,'obat_id'); ?>
		<?php echo $form->error($model,'obat_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->