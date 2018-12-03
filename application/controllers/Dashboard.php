<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

    $this->cekLogin();
    $this->load->model('m_user');
  }

  function index(){
    $data['current_page'] = 'dashboard';
    $data['menu'] = $this->getMenu();
    $data['jumlahUser'] = $this->m_user->get_total();

    $this->load->view('admin', $data);

  }

}
