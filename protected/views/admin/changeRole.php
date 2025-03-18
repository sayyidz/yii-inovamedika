<h2>Ubah Role User</h2>

<p>Nama: <?php echo CHtml::encode($user->nama); ?></p>
<p>Email: <?php echo CHtml::encode($user->email); ?></p>

<form method="post">
    <label>Pilih Role:</label>
    <select name="role">
        <option value="admin" <?php echo $user->role == 'admin' ? 'selected' : ''; ?>>Admin</option>
        <option value="dokter" <?php echo $user->role == 'dokter' ? 'selected' : ''; ?>>Dokter</option>
        <option value="pasien" <?php echo $user->role == 'pasien' ? 'selected' : ''; ?>>Pasien</option>
    </select>
    <button type="submit">Simpan</button>
</form>
