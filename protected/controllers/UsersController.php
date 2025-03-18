<?php

class UsersController extends Controller
{
    public function filters()
    {
        return array('accessControl');
    }

    public function accessRules()
    {
        return array(
            array('allow',
            'actions' => array('index', 'view', 'riwayat', 'hasilTindakan', 'bayar', 'pembayaran'),
            'users' => array('@'),
            'expression' => 'Yii::app()->user->role === "pasien"',
        ),
        array(
            'deny',
            'users' => array('*'), // '*' berarti semua pengguna (termasuk yang belum login) akan ditolak
        ),
        );
    }

    public function actionIndex()
    {
        echo "Halaman User: Lihat Riwayat Berobat";
    }

    public function actionHasilTindakan($id)
{
    $tindakan = Tindakan::model()->findByPk($id);
    $pendaftaran = PendaftaranDokter::model()->findByPk($tindakan->pendaftaran_id);
    $obat = Obat::model()->findByPk($tindakan->obat_id);
    $pegawai = Pegawai::model()->findByPk($tindakan->pegawai_id);

    if (!$tindakan || !$pendaftaran || !$obat || !$pegawai) {
        throw new CHttpException(404, 'Data tidak ditemukan.');
    }

    $hargaObat = $obat->harga;
    $hargaJasaDokter = $pegawai->harga;
    $totalHarga = $hargaObat + $hargaJasaDokter;

    $this->render('hasilTindakan', [
        'tindakan' => $tindakan,
        'pendaftaran' => $pendaftaran,
        'obat' => $obat,
        'pegawai' => $pegawai,
        'hargaObat' => $hargaObat,
        'hargaJasaDokter' => $hargaJasaDokter,
        'totalHarga' => $totalHarga,
    ]);
}


    public function actionBayar()
    {
        if (isset($_POST['totalHarga'])) {
            $totalHarga = $_POST['totalHarga'];
            $this->render('bayar', ['totalHarga' => $totalHarga]);
        } else {
            throw new CHttpException(400, 'Permintaan tidak valid.');
        }
    }

    public function actionRiwayat()
    {
        $userId = Yii::app()->user->id; // Ambil ID user yang sedang login

        // Ambil data riwayat berdasarkan user yang login
        $history = Yii::app()->db->createCommand("
            SELECT p.created_at, p.keluhan, p.gejala, t.deskripsi_tindakan 
            FROM pendaftaran_dokter p
            LEFT JOIN tindakan t ON p.id = t.pendaftaran_id
            WHERE p.user_id = :user_id
            ORDER BY p.created_at DESC
        ")->bindParam(':user_id', $userId, PDO::PARAM_INT)->queryAll();

        // Hitung jumlah kunjungan per bulan berdasarkan user yang login
        $kunjunganPerBulan = [];
        foreach ($history as $h) {
            $bulan = date('Y-m', strtotime($h['created_at']));
            if (!isset($kunjunganPerBulan[$bulan])) {
                $kunjunganPerBulan[$bulan] = 0;
            }
            $kunjunganPerBulan[$bulan]++;
        }

        // Render ke view dengan data yang sesuai dengan user login
        $this->render('riwayat', [
            'history' => $history,
            'kunjunganPerBulan' => $kunjunganPerBulan
        ]);
    }

    public function actionPembayaran()
{
    $userId = Yii::app()->user->id;

    // Ambil tindakan terakhir user berdasarkan created_at
    $tindakan = Tindakan::model()->find(array(
        'condition' => 'user_id=:user_id',
        'params' => array(':user_id' => $userId),
        'order' => 'created_at DESC',
    ));

    // Pastikan bahwa data tidak null sebelum me-render
    if (!$tindakan) {
        Yii::app()->user->setFlash('error', 'Tidak ada tindakan terbaru.');
        $this->redirect(array('site/index')); // Redirect ke halaman utama atau yang sesuai
    }

    $this->render('pembayaran', array(
        'tindakan' => $tindakan,
    ));
}


}
