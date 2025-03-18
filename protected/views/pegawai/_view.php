<?php
/* @var $this PegawaiController */
/* @var $data Pegawai */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_pegawai')); ?>:</b>
	<?php echo CHtml::encode($data->nama_pegawai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_masuk')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_masuk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pendidikan')); ?>:</b>
	<?php echo CHtml::encode($data->pendidikan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_tindakan')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_tindakan); ?>
	<br />

	*/ ?>

</div>