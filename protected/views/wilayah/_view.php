<?php
/* @var $this WilayahController */
/* @var $data Wilayah */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_wilayah')); ?>:</b>
	<?php echo CHtml::encode($data->nama_wilayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pegawai_id')); ?>:</b>
	<?php echo CHtml::encode($data->pegawai_id); ?>
	<br />


</div>