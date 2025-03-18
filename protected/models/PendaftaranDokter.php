<?php

class PendaftaranDokter extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'pendaftaran_dokter'; // Sesuaikan dengan nama tabel di database
    }

    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'), // Relasi ke tabel User
        );
    }
}
