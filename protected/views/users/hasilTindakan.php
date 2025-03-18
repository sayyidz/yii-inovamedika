<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center text-primary">Hasil Tindakan</h2>

        <!-- Informasi Keluhan dan Gejala -->
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">Informasi Pasien</h4>
                <p><strong>Keluhan:</strong> <?= CHtml::encode($pendaftaran->keluhan) ?></p>
                <p><strong>Gejala:</strong> <?= CHtml::encode($pendaftaran->gejala) ?></p>
            </div>
        </div>

        <!-- Informasi Tindakan -->
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">Tindakan Dokter</h4>
                <p><strong>Deskripsi Tindakan:</strong> <?= CHtml::encode($tindakan->deskripsi_tindakan) ?></p>
            </div>
        </div>

        <!-- Informasi Obat -->
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">Obat yang Diresepkan</h4>
                <p><strong>Nama Obat:</strong> <?= CHtml::encode($obat->nama_obat) ?></p>
                <p><strong>Dosis:</strong> <?= CHtml::encode($obat->dosis) ?></p>
            </div>
        </div>

        <!-- Pilihan Pembelian Obat -->
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">Pembelian Obat</h4>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="beliObat" onclick="toggleAlamat()" checked>
                    <label class="form-check-label" for="beliObat">
                        Saya ingin membeli obat ini
                    </label>
                </div>
                <p id="alamatPengiriman" class="mt-2 text-muted">Obat akan dikirimkan ke alamat.</p>
            </div>
        </div>

        <!-- Informasi Harga -->
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">Rincian Biaya</h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Harga Obat:</span>
                        <strong>Rp<?= number_format($hargaObat, 0, ',', '.') ?></strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Biaya Konsultasi Dokter:</span>
                        <strong>Rp<?= number_format($hargaJasaDokter, 0, ',', '.') ?></strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <span>Total Biaya:</span>
                        <strong class="text-success">Rp<?= number_format($totalHarga, 0, ',', '.') ?></strong>
                    </li>
                </ul>
            </div>
        </div>


        <!-- Tombol Bayar -->
        <div class="text-center mt-4">
            <form action="<?= Yii::app()->createUrl('users/bayar') ?>" method="post">
                <input type="hidden" name="totalHarga" value="<?= $totalHarga ?>">
                <button type="submit" class="btn btn-success btn-lg">Bayar Sekarang</button>
            </form>
        </div>
    </div>
</div>

<script>
function toggleAlamat() {
    var checkbox = document.getElementById("beliObat");
    var alamatText = document.getElementById("alamatPengiriman");

    if (checkbox.checked) {
        alamatText.style.display = "block";
    } else {
        alamatText.style.display = "none";
    }
}
</script>
