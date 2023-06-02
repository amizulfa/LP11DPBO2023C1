<?php

  interface KontrakPasienView {
      public function tampil();
  }

  interface KontrakPasienPresenter {
      public function prosesDataPasien();
      public function addPasien($data);
      public function updatePasien($data);
      public function deletePasien($id);
      public function getId($i);
      public function getNik($i);
      public function getNama($i);
      public function getTempat($i);
      public function getTl($i);
      public function getGender($i);
      public function getEmail($i);
	  public function getTelepon($i);
      public function getSize();
  }
