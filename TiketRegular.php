<?php
require_once 'Tiket.php';

class TiketRegular extends Tiket {
    // Properti tambahan khusus TiketRegular
    private $tipeAudio;
    private $lokasiBaris;

    // Constructor untuk menginisialisasi properti induk dan anak
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Overriding method dari class induk
    public function hitungTotalHarga() {
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        return "Fasilitas Regular: Audio " . $this->tipeAudio . ", Kursi di Baris " . $this->lokasiBaris;
    }

    // Fungsi statis untuk mengambil data khusus Regular dari database
    public static function selectWeb($koneksi) {
        $sql = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'regular'";
        return $koneksi->query($sql);
    }
    
}