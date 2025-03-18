<?php

class PendaftaranDokterForm extends CFormModel
{
    public $keluhan;
    public $gejala = [];
    public $riwayat_penyakit;
    public $obat;
    public $alergi;
    public $durasi_gejala;
    public $file_pemeriksaan;

    public function rules()
    {
        return array(
            array('keluhan, gejala, durasi_gejala', 'required'),
            array('riwayat_penyakit, obat', 'safe'),
            array('alergi', 'boolean'),
            array('file_pemeriksaan', 'file', 'types' => 'jpg, png, pdf', 'allowEmpty' => true),
        );
    }

    public function attributeLabels()
    {
        return array(
            'keluhan' => 'Keluhan Utama',
            'gejala' => 'Gejala yang Dialami',
            'riwayat_penyakit' => 'Riwayat Penyakit Sebelumnya',
            'obat' => 'Obat yang Sedang Dikonsumsi',
            'alergi' => 'Apakah Anda Memiliki Alergi?',
            'durasi_gejala' => 'Sudah Berapa Lama Mengalami Gejala Ini?',
            'file_pemeriksaan' => 'Unggah Hasil Pemeriksaan (Opsional)',
        );
    }
}
