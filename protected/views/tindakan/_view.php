<?php
/* @var $this TindakanController */
/* @var $data Tindakan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi_tindakan')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi_tindakan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dokter_tindakan')); ?>:</b>
	<?php echo CHtml::encode($data->dokter_tindakan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obat_id')); ?>:</b>
	<?php echo CHtml::encode($data->obat_id); ?>
	<br />


</div>