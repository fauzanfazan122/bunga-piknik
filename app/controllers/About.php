<?php

class About extends Controller{
   public function index($halaman = 'about'){
      $data['halaman'] = $halaman;

      // judul
      $data['judul'] = 'About';
      
      $this->view('templates/header', $data);
      $this->view('about/index', $data);
      $this->view('templates/footer', $data);
   }
}