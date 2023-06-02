<?php

include_once("kontrak/KontrakPasien.php");
include_once("presenter/ProsesPasien.php");

class Form implements KontrakPasienView
{
    private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    // constructor
   
    public function __construct() {
        $this->prosespasien = new ProsesPasien();
    }

    public function tampil() {
    // Membaca template skin.html
		$this->tpl = new Template("templates/form.html");
		// Mengganti kode Data dengan data yang sudah diproses
		$this->tpl->replace("DATA_TITLE", "Add Data Pasien");
		$this->tpl->replace("DATA_LINK", "form.php");
    $this->tpl->replace("DATA_BUTTON","submit");
    $this->tpl->replace("DATA_BTN","Submit");
		// Menampilkan ke layar
		$this->tpl->write();
    }

    public function updateTampil($id) {
    // get the record that user want to edit
    $this->prosespasien->prosesDataPasien();
		// Membaca template skin.html
		$this->tpl = new Template("templates/form.html");
    $form = "<input type='hidden' name='id' value='" . $this->prosespasien->getId($id) . "'>";
		// Mengganti kode Data dengan data yang sudah diproses
		$this->tpl->replace("DATA_TITLE", "Edit Data Pasien");
    // Menampilkan ke layar
		$this->tpl->replace("DATA_NIK", $this->prosespasien->getNik($id));
		$this->tpl->replace("DATA_NAMA", $this->prosespasien->getNama($id));
		$this->tpl->replace("DATA_TEMPAT", $this->prosespasien->getTempat($id));
		$this->tpl->replace("DATA_TL", $this->prosespasien->getTl($id));
		$this->tpl->replace("DATA_EMAIL", $this->prosespasien->getEmail($id));
		$this->tpl->replace("DATA_TELP", $this->prosespasien->getTelepon($id));
    $lk = $this->prosespasien->getGender($id) === "Laki-laki" ? "checked" : "";
    $pr = $this->prosespasien->getGender($id) === "Perempuan" ? "checked" : "";
		$this->tpl->replace("DATA_LK", $lk);
    $this->tpl->replace("DATA_PR", $pr);
    $this->tpl->replace("DATA_HIDDEN", $form);
    $this->tpl->replace("DATA_BUTTON","update");
    $this->tpl->replace("DATA_BTN","Update");
    $this->tpl->write();
    }

    function add($data){
        $this->prosespasien->addPasien($data);
    }
    
    function update($data){
        $this->prosespasien->updatePasien($data);
    }

    function hapus($id)
	{
		$this->prosespasien->deletePasien($id);
	}

}