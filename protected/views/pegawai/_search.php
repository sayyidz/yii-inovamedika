<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
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
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_pegawai'); ?>
		<?php echo $form->textField($model,'nama_pegawai',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tahun_masuk'); ?>
		<?php echo $form->textField($model,'tahun_masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_lahir'); ?>
		<?php echo $form->textField($model,'tanggal_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pendidikan'); ?>
		<?php echo $form->textField($model,'pendidikan',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jumlah_tindakan'); ?>
		<?php echo $form->textField($model,'jumlah_tindakan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->