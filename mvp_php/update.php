<?php
include("presenter/ProsesMahasiswa.php");

$prosesMahasiswa = new ProsesMahasiswa();

$id = $_GET['id'] ?? null;

$mahasiswa = $prosesMahasiswa->getMahasiswaById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debugging untuk memeriksa data yang diterima dari form
    var_dump($_POST); // Periksa data POST

    $id = $_POST['id'] ?? null; // Pastikan ID diambil dari POST
    $prosesMahasiswa->updateMahasiswa(
        $id,
        $_POST['nim'],
        $_POST['nama'],
        $_POST['tempat'],
        $_POST['tl'],
        $_POST['gender'],
        $_POST['email'],
        $_POST['telp']
    );

    // Debugging untuk memastikan query update berjalan
    echo "Update berhasil untuk ID: $id";

    header("Location: index.php");
    exit();
}

// Load template form_update.html
include("model/Template.class.php");
$template = new Template("templates/form_update.html");

// Replace placeholder dengan data mahasiswa
$template->replace("DATA_ID", htmlspecialchars($mahasiswa['id']));
$template->replace("DATA_NIM", htmlspecialchars($mahasiswa['nim']));
$template->replace("DATA_NAMA", htmlspecialchars($mahasiswa['nama']));
$template->replace("DATA_TEMPAT", htmlspecialchars($mahasiswa['tempat']));
$template->replace("DATA_TL", htmlspecialchars($mahasiswa['tl']));
$template->replace("DATA_GENDER_L", $mahasiswa['gender'] === 'Laki-laki' ? 'selected' : '');
$template->replace("DATA_GENDER_P", $mahasiswa['gender'] === 'Perempuan' ? 'selected' : '');
$template->replace("DATA_GMAIL", htmlspecialchars($mahasiswa['email']));
$template->replace("DATA_TELEPON", htmlspecialchars($mahasiswa['telp']));

// Tampilkan template
$template->write();
