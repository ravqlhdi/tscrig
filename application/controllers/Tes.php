<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['menu'] = $this->getMenu();
    $data['current_page'] = 'tes';
    $this->load->library('ckeditor');
    $this->ckeditor->basePath = base_url().'assets/ckeditor/';

    $this->ckeditor->config['language'] = 'en';
    $this->ckeditor->config['width'] = '730px';
    $this->ckeditor->config['height'] = '300px';
    $this->load->view('admin', $data);
  }

}
