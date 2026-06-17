<?php
// Memanggil file koneksi dan semua class
require_once 'database.php'; // Sesuaikan path jika ada di dalam folder koneksi/
require_once 'TiketRegular.php';
require_once 'TiketIMAX.php';
require_once 'TiketVelvet.php';

// Menjalankan fungsi SELECT untuk masing-masing jenis tiket
$dataRegular = TiketRegular::selectWeb($koneksi);
$dataIMAX = TiketIMAX::selectWeb($koneksi);
$dataVelvet = TiketVelvet::selectWeb($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pemesanan Tiket Bioskop</title>
    <style>
        /* TEMA BLUEBERRY PHYMYADMIN */
        body { 
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            background-color: #f2f5f9; 
            color: #333; 
        }
        .navbar {
            background: linear-gradient(to bottom, #4a7ebb, #305f97); 
            color: white;
            padding: 15px 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            text-align: center;
        }
        .navbar h1 {
            margin: 0;
            font-size: 1.5em;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        /* --- MENU INTERAKTIF --- */
        .menu-bar {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 25px;
        }
        .btn-menu {
            background: linear-gradient(to bottom, #fdfdfd, #eff3f8);
            border: 1px solid #c5d5e6;
            color: #305f97;
            padding: 10px 20px;
            font-size: 1em;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 2px 3px rgba(0,0,0,0.05);
        }
        .btn-menu:hover {
            background: #dcedff;
            border-color: #4a7ebb;
        }
        /* Style untuk tombol yang sedang aktif */
        .btn-menu.active {
            background: linear-gradient(to bottom, #4a7ebb, #305f97);
            color: white;
            border-color: #305f97;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.2);
        }

        /* --- TABEL PANEL --- */
        .tabel-panel {
            background-color: #fff;
            border: 1px solid #c5d5e6;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 40px;
            overflow: hidden;
            /* Efek transisi saat panel muncul/hilang */
            animation: fadeIn 0.4s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 { 
            background-color: #e5ebf2; 
            color: #2b578c; 
            margin: 0; 
            padding: 12px 15px; 
            font-size: 1.2em;
            border-bottom: 1px solid #c5d5e6;
            border-left: 5px solid #305f97; 
        }
        table { border-collapse: collapse; width: 100%; }
        th, td { 
            border: 1px solid #e1e7ee; 
            padding: 12px 15px; 
            text-align: left; 
            font-size: 0.95em;
        }
        th { 
            background: linear-gradient(to bottom, #fdfdfd, #eff3f8);
            color: #305f97; 
            font-weight: 600;
        }
        tr { transition: background-color 0.2s ease; }
        tr:hover td { background-color: #dcedff; cursor: pointer; }
        
        .total-harga { font-weight: bold; color: #b33c3c; }
        .fasilitas { font-style: italic; color: #5a738e; }
        .id-badge {
            background-color: #305f97;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 0.85em;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>Sistem Pemesanan Tiket Penonton</h1>
    </div>

    <div class="container">
        
        <div class="menu-bar">
            <button class="btn-menu active" onclick="filterTabel('semua', this)">Tampilkan Semua</button>
            <button class="btn-menu" onclick="filterTabel('panel-regular', this)">Studio Regular</button>
            <button class="btn-menu" onclick="filterTabel('panel-imax', this)">Studio IMAX</button>
            <button class="btn-menu" onclick="filterTabel('panel-velvet', this)">Studio Velvet</button>
        </div>

        <div id="panel-regular" class="tabel-panel">
            <h2>Studio Regular</h2>
            <table>
                <tr>
                    <th>ID</th><th>Nama Film</th><th>Jadwal Tayang</th><th>Kursi</th><th>Harga Dasar</th><th>Spesifikasi Fasilitas</th><th>Total Harga</th>
                </tr>
                <?php 
                if ($dataRegular && $dataRegular->num_rows > 0) {
                    while($row = $dataRegular->fetch_assoc()) {
                        $tiket = new TiketRegular(
                            $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                            $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                            $row['tipe_audio'], $row['lokasi_baris']
                        );
                ?>
                <tr>
                    <td><span class="id-badge">#<?= $row['id_tiket'] ?></span></td>
                    <td><?= $row['nama_film'] ?></td>
                    <td><?= $row['jadwal_tayang'] ?></td>
                    <td><?= $row['jumlah_kursi'] ?></td>
                    <td>Rp <?= number_format($row['harga_dasar_tiket'], 0, ',', '.') ?></td>
                    <td class="fasilitas"><?= $tiket->tampilkanInfoFasilitas() ?></td>
                    <td class="total-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.') ?></td>
                </tr>
                <?php } } else { echo "<tr><td colspan='7' style='text-align:center;'>Tidak ada data</td></tr>"; } ?>
            </table>
        </div>

        <div id="panel-imax" class="tabel-panel">
            <h2>Studio IMAX</h2>
            <table>
                <tr>
                    <th>ID</th><th>Nama Film</th><th>Jadwal Tayang</th><th>Kursi</th><th>Harga Dasar</th><th>Spesifikasi Fasilitas</th><th>Total Harga</th>
                </tr>
                <?php 
                if ($dataIMAX && $dataIMAX->num_rows > 0) {
                    while($row = $dataIMAX->fetch_assoc()) {
                        $tiket = new TiketIMAX(
                            $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                            $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                            $row['kacamata_3d_id'], $row['efek_gerak_fitur']
                        );
                ?>
                <tr>
                    <td><span class="id-badge">#<?= $row['id_tiket'] ?></span></td>
                    <td><?= $row['nama_film'] ?></td>
                    <td><?= $row['jadwal_tayang'] ?></td>
                    <td><?= $row['jumlah_kursi'] ?></td>
                    <td>Rp <?= number_format($row['harga_dasar_tiket'], 0, ',', '.') ?></td>
                    <td class="fasilitas"><?= $tiket->tampilkanInfoFasilitas() ?></td>
                    <td class="total-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.') ?></td>
                </tr>
                <?php } } else { echo "<tr><td colspan='7' style='text-align:center;'>Tidak ada data</td></tr>"; } ?>
            </table>
        </div>

        <div id="panel-velvet" class="tabel-panel">
            <h2>Studio Velvet</h2>
            <table>
                <tr>
                    <th>ID</th><th>Nama Film</th><th>Jadwal Tayang</th><th>Kursi</th><th>Harga Dasar</th><th>Spesifikasi Fasilitas</th><th>Total Harga</th>
                </tr>
                <?php 
                if ($dataVelvet && $dataVelvet->num_rows > 0) {
                    while($row = $dataVelvet->fetch_assoc()) {
                        $tiket = new TiketVelvet(
                            $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                            $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                            $row['bantal_selimut_pack'], $row['layanan_butler']
                        );
                ?>
                <tr>
                    <td><span class="id-badge">#<?= $row['id_tiket'] ?></span></td>
                    <td><?= $row['nama_film'] ?></td>
                    <td><?= $row['jadwal_tayang'] ?></td>
                    <td><?= $row['jumlah_kursi'] ?></td>
                    <td>Rp <?= number_format($row['harga_dasar_tiket'], 0, ',', '.') ?></td>
                    <td class="fasilitas"><?= $tiket->tampilkanInfoFasilitas() ?></td>
                    <td class="total-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.') ?></td>
                </tr>
                <?php } } else { echo "<tr><td colspan='7' style='text-align:center;'>Tidak ada data</td></tr>"; } ?>
            </table>
        </div>

    </div>

    <script>
        function filterTabel(idPanel, elemenTombol) {
            // 1. Sembunyikan semua tabel terlebih dahulu
            let panels = document.querySelectorAll('.tabel-panel');
            panels.forEach(panel => {
                panel.style.display = 'none';
            });

            // 2. Hapus class 'active' dari semua tombol
            let buttons = document.querySelectorAll('.btn-menu');
            buttons.forEach(btn => {
                btn.classList.remove('active');
            });

            // 3. Tampilkan tabel yang dipilih (atau tampilkan semua)
            if (idPanel === 'semua') {
                panels.forEach(panel => {
                    panel.style.display = 'block';
                });
            } else {
                document.getElementById(idPanel).style.display = 'block';
            }

            // 4. Tambahkan class 'active' pada tombol yang sedang di-klik
            elemenTombol.classList.add('active');
        }
    </script>

</body>
</html>