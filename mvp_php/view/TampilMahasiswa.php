<?php

/******************************************
 Asisten Pemrogaman 13 & 14
 ******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = '';

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$id = $this->prosesmahasiswa->getId($i);
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGmail($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTelepon($i) . "</td>
			<td>
				<a href='update.php?id={$id}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='index.php?hapus=true&id={$id}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus ini?\")'>Delete</a>
			</td>
			</tr>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function update()
	{
		if (isset($_POST['submit'])) {
			// Ambil data dari form
			$id = $_POST['id'];
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$tempat = $_POST['tempat'];
			$tl = $_POST['tl'];
			$gender = $_POST['gender'];
			$gmail = $_POST['email'];
			$telepon = $_POST['telp'];

			// Proses update ke database
			$this->prosesmahasiswa->updateMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $gmail, $telepon);

			// Redirect ke halaman utama
			header("Location: index.php");
			exit();
		} else {
			// Ambil data berdasarkan id
			$id = $_GET['id'];
			$this->prosesmahasiswa->prosesDataMahasiswa();
			$data = $this->prosesmahasiswa->getMahasiswaById($id);

			if (!$data) {
				echo "Data tidak ditemukan.";
				return;
			}

			// Load form update
			$this->tpl = new Template("templates/form_update.html");

			// Replace placeholder dengan data
			$this->tpl->replace("DATA_ID", htmlspecialchars($data['id']));
			$this->tpl->replace("DATA_NIM", htmlspecialchars($data['nim']));
			$this->tpl->replace("DATA_NAMA", htmlspecialchars($data['nama']));
			$this->tpl->replace("DATA_TEMPAT", htmlspecialchars($data['tempat']));
			$this->tpl->replace("DATA_TL", htmlspecialchars($data['tl']));
			$this->tpl->replace("DATA_GENDER_L", $data['gender'] === 'Laki-laki' ? 'selected' : '');
			$this->tpl->replace("DATA_GENDER_P", $data['gender'] === 'Perempuan' ? 'selected' : '');
			$this->tpl->replace("DATA_GMAIL", htmlspecialchars($data['gmail']));
			$this->tpl->replace("DATA_TELEPON", htmlspecialchars($data['telp']));

			// Tampilkan ke layar
			$this->tpl->write();
		}
	}
}