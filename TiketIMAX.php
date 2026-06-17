<?php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    // Properti tambahan khusus TiketIMAX
    private $kacamata3did;
    private $efekGerakFitur;

    // Constructor untuk menginisialisasi properti induk dan anak
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3did, $efekGerakFitur) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
        $this->kacamata3did = $kacamata3did;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Overriding method dari class induk dengan tambahan biaya IMAX
    public function hitungTotalHarga() {
        return ($this->hargaDasarTiket * $this->jumlah_kursi) + 35000;
    }

    public function tampilkanInfoFasilitas() {
        return "Fasilitas IMAX: Kacamata 3D ID [" . $this->kacamata3did . "], Fitur Efek Gerak: " . $this->efekGerakFitur;
    }

    // Fungsi statis untuk mengambil data khusus IMAX dari database
    public static function selectWeb($koneksi) {
        $sql = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'imax'";
        return $koneksi->query($sql);
    }

}