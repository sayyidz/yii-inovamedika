<?php

class DokterController extends Controller
{
    public function filters()
    {
        return array('accessControl');
    }

    public function accessRules()
    {
        
        return array(
            array('allow',
            'actions' => array('index', 'view', 'dokter', 'detail'),
            'users' => array('@'),
            'expression' => 'Yii::app()->user->role === "dokter"',
        ),
        array(
            'deny',
            'users' => array('*'),
        ),
        );
    }

    public function actionIndex()
    {
        echo "Halaman Dokter: Lihat Daftar Pasien";
    }

    public function actionDetail($id) {
		$pendaftaran = PendaftaranDokter::model()->findByPk($id);
		$user = User::model()->findByPk($pendaftaran->user_id);
		$obat = Obat::model()->findAll();
		
		$this->render('detail', compact('pendaftaran', 'user', 'obat'));
	}

    public function actionDokter()
	{
		$pendaftaran = PendaftaranDokter::model()->findAll();
		// Kirim data ke view index.php
		$this->render('dokter', array('pendaftaran' => $pendaftaran));
	}

    public function actionSimpanTindakan() {
		if (isset($_POST['pendaftaran_id'], $_POST['tindakan'], $_POST['obat_id'])) {
			$tindakan = new Tindakan();
			$tindakan->pendaftaran_id = $_POST['pendaftaran_id'];
			$tindakan->deskripsi_tindakan = $_POST['tindakan'];
			$tindakan->obat_id = $_POST['obat_id'];
			$tindakan->save();
		}
		$this->redirect(['dokter/dokter']);
	}
}
