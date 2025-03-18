<?php
$this->pageTitle = 'Form Pendaftaran Dokter';
?>

<div class="container my-5">
    <h2 class="text-center font-weight-bold mb-4">Form Pendaftaran Dokter</h2>

    <div class="card shadow-lg border-0 p-4">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'pendaftaran-form',
            'enableClientValidation' => true,
            'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'needs-validation'),
        )); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'keluhan', array('class' => 'font-weight-bold')); ?>
            <?php echo $form->textArea($model, 'keluhan', array('class' => 'form-control', 'rows' => 4)); ?>
            <?php echo $form->error($model, 'keluhan', array('class' => 'text-danger')); ?>
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Gejala yang Dialami:</label><br>
            <?php
            $gejalaOptions = array('Demam', 'Batuk', 'Pilek', 'Sakit Kepala', 'Nyeri Otot', 'Diare', 'Sesak Napas');
            foreach ($gejalaOptions as $gejala) {
                echo '<div class="form-check form-check-inline">';
                echo CHtml::checkBox('PendaftaranDokterForm[gejala][]', false, array('value' => $gejala, 'class' => 'form-check-input'));
                echo '<label class="form-check-label">' . $gejala . '</label>';
                echo '</div>';
            }
            ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'riwayat_penyakit', array('class' => 'font-weight-bold')); ?>
            <?php echo $form->textArea($model, 'riwayat_penyakit', array('class' => 'form-control', 'rows' => 2)); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'obat', array('class' => 'font-weight-bold')); ?>
            <?php echo $form->textField($model, 'obat', array('class' => 'form-control')); ?>
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Alergi:</label><br>
            <div class="form-check form-check-inline">
                <?php echo $form->radioButton($model, 'alergi', array('value' => 1, 'class' => 'form-check-input')); ?>
                <label class="form-check-label">Ya</label>
            </div>
            <div class="form-check form-check-inline">
                <?php echo $form->radioButton($model, 'alergi', array('value' => 0, 'class' => 'form-check-input')); ?>
                <label class="form-check-label">Tidak</label>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'durasi_gejala', array('class' => 'font-weight-bold')); ?>
            <?php echo $form->dropDownList($model, 'durasi_gejala', array(
                '1 Hari' => '1 Hari',
                '2-3 Hari' => '2-3 Hari',
                '4-7 Hari' => '4-7 Hari',
                'Lebih dari 1 Minggu' => 'Lebih dari 1 Minggu',
            ), array('class' => 'form-control')); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'file_pemeriksaan', array('class' => 'font-weight-bold')); ?>
            <?php echo $form->fileField($model, 'file_pemeriksaan', array('class' => 'form-control-file')); ?>
        </div>

        <div class="text-center">
            <?php echo CHtml::submitButton('Kirim Pendaftaran', array('class' => 'btn btn-primary btn-lg px-4 rounded-pill')); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>
