<?php

class Home extends Controller{

   public function index($user = "pengguna"){
      // kirim judul halaman
      $data['judul'] = "Home";
      $data['user'] = $user;

      // buat halaman
      $this->view('templates/header', $data);
      $this->view('home/index', $data);
      $this->view('templates/footer');
   }
}