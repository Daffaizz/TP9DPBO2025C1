<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Kelas yang menggambarkan detail sebuah mahasiswa dengan atribut-atributnya
class Mahasiswa
{
	var $id = '';
	var $nim = '';
	var $nama = '';
	var $tempat = '';
	var $tl = '';
	var $gender = '';
	var $gmail = '';
	var $telepon = '';

	function __construct($id = '', $nim = '', $nama = '', $tempat = '', $tl = '', $gender = '', $gmail = '', $telepon = '')
	{
		$this->id = $id;
		$this->nim = $nim;
		$this->nama = $nama;
		$this->tempat = $tempat;
		$this->tl = $tl;
		$this->gender = $gender;
		$this->gmail = $gmail;
		$this->telepon = $telepon;
	}

	function setId($id)
	{
		$this->id = $id;
	}
	function setNim($nim)
	{
		$this->nim = $nim;
	}
	function setNama($nama)
	{
		$this->nama = $nama;
	}
	function setTempat($tempat)
	{
		$this->tempat = $tempat;
	}
	function setTl($tl)
	{
		$this->tl = $tl;
	}
	function setGender($gender)
	{
		$this->gender = $gender;
	}
	function setGmail($gmail)
	{
		$this->gmail = $gmail;
	}
	function setTelepon($telepon)
	{
		$this->telepon = $telepon;
	}

	function getId()
	{
		return $this->id;
	}
	function getNim()
	{
		return $this->nim;
	}
	function getNama()
	{
		return $this->nama;
	}
	function getTempat()
	{
		return $this->tempat;
	}
	function getTl()
	{
		return $this->tl;
	}
	function getGender()
	{
		return $this->gender;
	}
	function getGmail()
	{
		return $this->gmail;
	}
	function getTelepon()
	{
		return $this->telepon;
	}

}
