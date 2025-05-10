<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Mahasiswa.class.php");
include("model/TabelMahasiswa.class.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Interface atau gambaran dari presenter akan seperti apa
interface KontrakPresenter
{
	public function prosesDataMahasiswa();
	public function getId($i);
	public function getNim($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getGmail($i);
	public function getTelepon($i);
	public function getSize();
	public function addMahasiswa($nim, $nama, $tempat, $tl, $gender, $gmail, $telepon);
	public function updateMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $gmail, $telepon);
	public function deleteMahasiswa($id);
	public function getMahasiswaById($id);
}