<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array());
  }

  function index()
  {
    $logged_in = $this->session->userdata('logged_in');  
    $get_page = $this->input->get('page');
    $data['logged_in'] = $logged_in;
    $data['source'] = 'homepage';
    $this->load->view('homepage', $data);
  }

}
