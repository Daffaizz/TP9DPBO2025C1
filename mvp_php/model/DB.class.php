<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class DB
{
	var $db_host = ''; // host
	var $db_user = ''; // user basis data
	var $db_password = ''; // password
	var $db_name = ''; // nama basis data
	var $db_link = null; // nama basis data
	var $result = null;

	function __construct($db_host = 'localhost', $db_user = 'root', $db_password = '', $db_name = 'mvp_php')
	{
		// konstruktor
		$this->db_host = $db_host;
		$this->db_user = $db_user;
		$this->db_password = $db_password;
		$this->db_name = $db_name;
	}

	function open()
	{
		// membuka koneksi
		$this->db_link = mysqli_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);

		if (!$this->db_link) {
			die("Koneksi gagal: " . mysqli_connect_error());
		}
	}

	function execute($query = "")
	{
		// mengeksekusi query
		$this->result = mysqli_query($this->db_link, $query);

		if (!$this->result) {
			die("Query gagal: " . mysqli_error($this->db_link));
		}

		return $this->result;
	}

	function getResult()
	{
		// mengambil ekseskusi query
		return mysqli_fetch_array($this->result, MYSQLI_ASSOC);
	}

	function close()
	{
		// menutup koneksi
		mysqli_close($this->db_link);
	}
}
