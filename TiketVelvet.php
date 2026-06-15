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

    // Implementasi abstract method dari class induk
    public function hitungTotalHarga() {
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        $statusBantal = $this->bantalSelimutPack ? "Termasuk Pack Bantal & Selimut" : "Tanpa Bantal & Selimut";
        return "Fasilitas Velvet: " . $statusBantal . ", Layanan Butler: " . $this->layananButler;
    }
}