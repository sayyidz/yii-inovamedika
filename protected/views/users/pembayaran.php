<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h4 class="card-title text-primary">Menu Pembayaran</h4>
                    <hr>

                    <?php if (!empty($tindakan)): ?>
                        <div class="mb-3">
                            <p class="mb-1">
                                <i class="fas fa-calendar-alt text-primary"></i> 
                                <strong>Tanggal:</strong> <?= date('d M Y', strtotime($tindakan->created_at)) ?>
                            </p>
                            <p class="mb-1">
                                <i class="fas fa-clock text-secondary"></i> 
                                <strong>Jam:</strong> <?= date('H:i', strtotime($tindakan->created_at)) ?>
                            </p>
                            <p class="mb-3">
                                <i class="fas fa-user-md text-success"></i> 
                                <strong>Nama Pegawai:</strong> <?= htmlspecialchars($tindakan->pegawai->nama ?? 'Tidak diketahui') ?>
                            </p>
                        </div>

                        <a href="<?= Yii::app()->createUrl('/users/hasilTindakan?id=7',) ?>" class="btn btn-primary btn-block">
                            <i class="fas fa-file-invoice"></i> Detail Pembayaran
                        </a>
                    <?php else: ?>
                        <p class="text-muted">Tidak ada tindakan yang perlu dibayar.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
