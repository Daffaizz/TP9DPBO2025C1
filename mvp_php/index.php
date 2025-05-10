<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("view/TampilMahasiswa.php");

if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    $tabelMahasiswa = new ProsesMahasiswa();
    $tabelMahasiswa->deleteMahasiswa($id);
    header("Location: index.php");

    exit();
}

$tabelMahasiswa = new TampilMahasiswa();
$data = $tabelMahasiswa->tampil();  