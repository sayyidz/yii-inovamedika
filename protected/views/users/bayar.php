<?php
$this->pageTitle = 'Pembayaran';
$totalHarga = $_POST['totalHarga'] ?? 0;
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body text-center">
                    <h2 class="card-title mb-4">Pembayaran</h2>
                    
                    <p class="fs-5 fw-bold">Total yang harus dibayar:</p>
                    <h3 class="text-primary fw-bold">Rp<?= number_format($totalHarga, 0, ',', '.') ?></h3>

                    <form action="<?= Yii::app()->createUrl('site/index') ?>" method="get">
                        <button type="submit" class="btn btn-success btn-lg w-100 mt-4">
                            <i class="bi bi-credit-card"></i> Konfirmasi Pembayaran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
