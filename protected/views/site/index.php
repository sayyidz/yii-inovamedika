<div class="container my-5">
    <h2 class="text-center font-weight-bold mb-4">Rekomendasi Dokter</h2>
    <p class="text-center text-muted">Konsultasi online dengan dokter siaga kami</p>

    <div class="row">
        <?php foreach ($pegawai as $pegawai): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0 rounded-3">
                    <!-- <img src="https://via.placeholder.com/300x200" class="card-img-top rounded-top" alt="Foto Dokter"> -->
                    <div class="card-body text-center">
                        <h5 class="card-title font-weight-bold"><?= $pegawai->nama_pegawai ?></h5>
                        <p class="text-muted mb-1"><i class="fa fa-briefcase"></i> <?= $pegawai->tahun_masuk ?></p>
                        <p class="text-muted"><i class="fa fa-graduation-cap"></i> <?= $pegawai->pendidikan ?></p>
                        <a href="<?= Yii::app()->createUrl('pendaftaran/daftar', array('pegawai_id' => $pegawai->id)) ?>" class="btn btn-primary btn-sm px-4 rounded-pill">
                            <i class="fa fa-user-md"></i> Daftar Konsultasi
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
