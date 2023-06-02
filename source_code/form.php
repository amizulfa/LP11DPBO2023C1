<?php
include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/form.php");


$tp = new form();

if (isset($_POST['submit'])) {
    $tp->add($_POST);
} else if (isset($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $tp->updateTampil($id); // nampilin form update
} else if (isset($_POST['update'])) {
    $tp->update($_POST);
}else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $tp->hapus($id);
} else {
    $data = $tp->tampil();
}

