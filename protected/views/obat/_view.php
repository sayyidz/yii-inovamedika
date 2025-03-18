<?php
/* @var $this ObatController */
/* @var $data Obat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_obat')); ?>:</b>
	<?php echo CHtml::encode($data->nama_obat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kadaluwarsa')); ?>:</b>
	<?php echo CHtml::encode($data->kadaluwarsa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dosis')); ?>:</b>
	<?php echo CHtml::encode($data->dosis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('habiskan')); ?>:</b>
	<?php echo CHtml::encode($data->habiskan); ?>
	<br />


</div>