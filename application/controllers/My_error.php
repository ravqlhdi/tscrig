<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_error extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    
  }

  public function index()
  {
    $data['tes'] = 'aaa';
    $this->load->view('404', $data);
  }

}
