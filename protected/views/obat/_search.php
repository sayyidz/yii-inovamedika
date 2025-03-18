<?php
/* @var $this ObatController */
/* @var $model Obat */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_obat'); ?>
		<?php echo $form->textField($model,'nama_obat',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kadaluwarsa'); ?>
		<?php echo $form->textField($model,'kadaluwarsa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dosis'); ?>
		<?php echo $form->textField($model,'dosis',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'habiskan'); ?>
		<?php echo $form->textField($model,'habiskan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->