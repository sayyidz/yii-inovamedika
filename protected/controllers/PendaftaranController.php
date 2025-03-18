<?php

class PendaftaranController extends Controller
{
    public function actionDaftar()
    {
        $model = new PendaftaranDokterForm;

        if (isset($_POST['PendaftaranDokterForm'])) {
            $model->attributes = $_POST['PendaftaranDokterForm'];

            if ($model->validate()) {
                // Simpan ke database
                $pendaftaran = new PendaftaranDokter;
                $pendaftaran->user_id = Yii::app()->user->id; // Ambil user yang login
                $pendaftaran->keluhan = $model->keluhan;
                $pendaftaran->gejala = implode(', ', $model->gejala); // Simpan sebagai string
                $pendaftaran->riwayat_penyakit = $model->riwayat_penyakit;
                $pendaftaran->obat = $model->obat;
                $pendaftaran->alergi = $model->alergi;
                $pendaftaran->durasi_gejala = $model->durasi_gejala;

                // Upload File Pemeriksaan (Jika Ada)
                $file = CUploadedFile::getInstance($model, 'file_pemeriksaan');
                if ($file) {
                    $filename = 'uploads/' . time() . '_' . $file->name;
                    $file->saveAs($filename);
                    $pendaftaran->file_pemeriksaan = $filename;
                }

                if ($pendaftaran->save()) {
                    Yii::app()->user->setFlash('success', 'Pendaftaran berhasil! Tunggu konfirmasi dari dokter.');
                    $this->redirect(array('site/index'));
                }
            }
        }

        $this->render('daftar', array('model' => $model));
    }
}
