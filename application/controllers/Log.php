<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends MY_Controller{
  private $name = array('log_action','log_datetime','log_ipaddress', 'user_id');
  private $current_page = 'log';
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('m_log','m_crud'));
    $this->cekLogin();
  }

  function index()
  {
    $crud_data = $this->getCrudData($this->current_page);    
    $status = $this->session->flashdata('status');
    $key = $this->input->get('key');
    $limit_per_page = $crud_data->crud_recordlimit;
    $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
    $total_records = $this->m_log->get_total();
    $base_url = base_url() .$this->current_page.'/index';
    $start_record = $page*$limit_per_page;

    if ($crud_data->crud_pagination=='true') {
      $for_table = $this->m_log->get_current($limit_per_page, $start_record);
      if ($total_records>0) {
        $data['pagination_link'] = $this->setPagination($base_url, $total_records, $limit_per_page);
      }
    }else{
      $for_table = $this->m_log->get();
    }

    $data['status'] = (isset($status)) ? $status : NULL ;
    $data['menu'] = $this->getMenu();
    $data['current_page'] = $this->current_page;
    $data['for_table'] = (isset($key)) ? $this->m_log->search($key)
                          : $for_table;
    $data['jumlah_data'] =$total_records;
    $data['no_start'] = $start_record;
    $data['limit_per_page'] = $limit_per_page;
    $data['table_header'] = array(
                          'Aksi log' => 'log_action',
                          'Waktu' => 'log_datetime',
                          'Alamat IP' => 'log_ipaddress',
                          'User' => 'user_id');
    $data['name'] = $this->name;
    $data['breadcrumbs'] = $this->getBreadcrumbs('',$this->current_page,'');
    $this->load->view('admin', $data);
  }

  public function changeLimit(){
    $crud_data = $this->getCrudData($this->current_page);
    $data['crud_recordlimit'] = $this->input->get('value');
    $this->m_crud->update($crud_data->crud_id, $data);
  }





}
