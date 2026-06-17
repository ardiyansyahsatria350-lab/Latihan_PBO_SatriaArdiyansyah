<?php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    // Properti tambahan khusus TiketVelvet
    private $bantalSelimutPack;
    private $layananButler;

    // Constructor untuk menginisialisasi properti induk dan anak
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Overriding method dari class induk dengan surcharge premium 50%
    public function hitungTotalHarga() {
        return ($this->hargaDasarTiket * $this->jumlah_kursi) * 1.50;
    }

    public function tampilkanInfoFasilitas() {
        $statusBantal = $this->bantalSelimutPack ? "Termasuk Pack Bantal & Selimut" : "Tanpa Bantal & Selimut";
        return "Fasilitas Velvet: " . $statusBantal . ", Layanan Butler: " . $this->layananButler;
    }

    // Fungsi statis untuk mengambil data khusus Velvet dari database
    public static function selectWeb($koneksi) {
        $sql = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'velvet'";
        return $koneksi->query($sql);
    }

}