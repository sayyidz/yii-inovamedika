<div class="container mt-4">
    <h2 class="mb-3">Detail Pasien</h2>
    <div class="card p-3">
        <h5>Informasi Pasien</h5>
        <p><strong>Nama:</strong> <?= htmlspecialchars($user->nama) ?></p>
        <p><strong>Tanggal Lahir:</strong> <?= htmlspecialchars($user->tanggal_lahir) ?></p>
        <p><strong>Gender:</strong> <?= htmlspecialchars($user->gender) ?></p>
    </div>

    <div class="card p-3 mt-3">
        <h5>Informasi Penyakit</h5>
        <p><strong>Keluhan:</strong> <?= htmlspecialchars($pendaftaran->keluhan) ?></p>
        <p><strong>Gejala:</strong> <?= htmlspecialchars($pendaftaran->gejala) ?></p>
        <p><strong>Riwayat Penyakit:</strong> <?= htmlspecialchars($pendaftaran->riwayat_penyakit) ?></p>
    </div>

    <form action="<?= Yii::app()->createUrl('dokter/simpanTindakan') ?>" method="post" class="mt-4">
        <input type="hidden" name="pendaftaran_id" value="<?= $pendaftaran->id ?>">
        <div class="form-group">
            <label>Tindakan:</label>
            <textarea name="tindakan" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Obat yang Diresepkan:</label>
            <select name="obat_id" class="form-control" required>
                <?php foreach ($obat as $o): ?>
                    <option value="<?= $o->id ?>"><?= htmlspecialchars($o->nama_obat) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= Yii::app()->createUrl('dokter/dokter') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>