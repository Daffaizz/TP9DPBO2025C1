<?php
include("presenter/ProsesMahasiswa.php");

// Jika form disubmit, proses data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prosesMahasiswa = new ProsesMahasiswa();
    $prosesMahasiswa->addMahasiswa(
        $_POST['nim'],
        $_POST['nama'],
        $_POST['tempat'],
        $_POST['tl'],
        $_POST['gender'],
        $_POST['email'],
        $_POST['telepon']
    );
    header("Location: index.php"); // arahkan kembali ke index setelah tambah
    exit();
}

include("templates/form_create.html");