<?php
$this->pageTitle = 'History Berobat';

// Format data untuk Chart.js
$labels = array_keys($kunjunganPerBulan);
$data = array_values($kunjunganPerBulan);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">History Berobat</h2>

    <!-- Grafik Kunjungan Per Bulan -->
    <div class="card shadow-lg border-0 rounded-3 mb-4">
        <div class="card-body">
            <h4 class="card-title text-center">Grafik Kunjungan Per Bulan</h4>
            <canvas id="historyChart"></canvas>
        </div>
    </div>

    <!-- Tabel History Berobat -->
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body">
            <h4 class="card-title text-center">Detail History Berobat</h4>

            <?php if (empty($history)): ?>
                <p class="text-center text-muted">Belum ada riwayat berobat.</p>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Keluhan</th>
                                <th>Gejala</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($history as $h): ?>
                                <tr>
                                    <td><?= CHtml::encode(date('d-m-Y', strtotime($h['created_at']))) ?></td>
                                    <td><?= CHtml::encode($h['keluhan']) ?></td>
                                    <td><?= CHtml::encode($h['gejala']) ?></td>
                                    <td><?= CHtml::encode($h['deskripsi_tindakan']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Chart.js untuk menampilkan grafik -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('historyChart').getContext('2d');
    var historyChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($labels) ?>,
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: <?= json_encode($data) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
