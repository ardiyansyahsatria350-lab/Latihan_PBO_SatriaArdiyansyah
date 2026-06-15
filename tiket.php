<?php

abstract class Tiket {
    // Properti Terenkapsulasi (protected) sesuai struktur tabel
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket;

    // Metode Abstrak (Tanpa Isi/Body)
    // Metode ini wajib diimplementasikan ulang (override) di class turunannya nanti
    abstract public function hitungTotalHarga();
    abstract public function tampilkanInfoFasilitas();
}

?>