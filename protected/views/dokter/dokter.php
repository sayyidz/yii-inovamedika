<div class="container mt-4">
    <h2 class="mb-4 text-center fw-bold">Daftar Pasien</h2>
    <p class="text-muted text-center">Berikut adalah daftar pasien yang telah mendaftar:</p>

    <div class="row">
        <?php foreach ($pendaftaran as $pendaftar): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= htmlspecialchars($pendaftar->user->nama) ?></h5>
                        <p class="card-text">
                            <i class="bi bi-chat-left-text"></i> 
                            <strong>Keluhan:</strong> <?= htmlspecialchars($pendaftar->keluhan) ?>
                        </p>
                        <p class="card-text">
                            <i class="bi bi-exclamation-circle"></i> 
                            <strong>Gejala:</strong> <?= htmlspecialchars($pendaftar->gejala) ?>
                        </p>
                        <a href="<?= Yii::app()->createUrl('dokter/detail', ['id' => $pendaftar->id]) ?>" class="btn btn-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
