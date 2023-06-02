<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getDetailPasien($id)
	{
		// query
		$query = "SELECT * FROM pasien WHERE id='$id'";

		// execute the query
		return $this->execute($query);
	}

	function addPasien($data)
	{
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		$query = "insert into pasien values ('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function updatePasien($data)
	{
		$id = $data['id'];
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		$query = "update pasien set nik = '$nik', nama = '$nama', tempat = '$tempat', tl = '$tl', gender = '$gender', email = '$email', telp = '$telp' where id = '$id'";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function deletePasien($id)
	{
		$query = "delete FROM pasien WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
	}
}
