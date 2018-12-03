<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller{
  private $name = array('menu_name','menu_link','menu_status', 'menu_icon','menu_description', 'menu_position');
  private $current_page = 'menu';
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('m_menu', 'm_log','m_crud'));
    $this->cekLogin();
  }

  function index()
  {
    //basic variable
    $crud_data = $this->getCrudData($this->current_page); //get basic data about crud
    $base_url = base_url() .$this->current_page.'/index';
    $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
    $total_records = $this->m_menu->get_total();
    $limit_per_page = $crud_data->crud_recordlimit;
    $start_record = $page*$limit_per_page;
    $for_table = $this->m_menu->get_current($limit_per_page, $start_record); //get record base on pagination

    //get search key if exist
    $key = $this->input->get('key');
    $search_record = $this->m_menu->search($key);

    //set pagination
    if ($crud_data->crud_pagination=='true') {
      $for_table = $this->m_menu->get_current($limit_per_page, $start_record);
      if ($total_records>0) {
        $data['pagination_link'] = $this->setPagination($base_url, $total_records, $limit_per_page);
      }
    }else{
      $for_table = $this->m_menu->get();
    }
    //set status interaksi data dengan db
    $status = $this->session->flashdata('status');
    $data['status'] = (isset($status)) ? $status : NULL ;

    //get list of menu
    $data['menu'] = $this->getMenu();
    $data['current_page'] = $this->current_page;

    //set array data for show in table. if search key exist, run search query
    $data['for_table'] = (isset($key)) ? $search_record : $for_table;
    $data['jumlah_data'] = $total_records;
    $data['no_start'] = $start_record;
    $data['limit_per_page'] = $limit_per_page;
    $data['table_header'] = array(
                              'Nama Menu' => 'menu_name',
                              'Link' => 'menu_link',
                              'Status' => 'menu_status',
                              'Icon' => 'menu_icon',
                              'Posisi' => 'menu_position',
                              'Deskripsi' => 'menu_description'
                            );
    $data['name'] = $this->name;
    //set breadcrumb
    $data['breadcrumbs'] = $this->getBreadcrumbs('',$this->current_page,'');
    //load view
    $this->load->view('admin', $data);
  }
  public function create(){
    $data['breadcrumbs'] = $this->getBreadcrumbs('',$this->current_page,'create');
    $data['name'] = $this->name;
    $data['menu'] = $this->getMenu();
    $data['current_page'] = 'menu';
    $this->load->view('admin', $data);
  }
  public function store() {
    $name = $this->name;
    $last = $this->m_menu->get_total();
    foreach ($name as $key => $value) {
        $data[$value] = $this->input->post_get($value);
    }
    $data['menu_position'] = $last+1;
    $query = $this->m_menu->add($data);
    if($query){
      $this->m_log->add('add data menu');
      $status['message'] = 'Data telah ditambah ke database';
      $status['type'] = 'add';
      $status['color'] = 'blue';
      $this->session->set_flashdata('status', $status);
    }else{
      $this->session->set_flashdata('status', 'Terjadi Kesalahan');
    }
    //$url = $this->url($query);
    redirect('menu');
  }

  public function edit(){
    $data['total_records'] = $this->m_menu->get_total();
    $data['breadcrumbs'] = $this->getBreadcrumbs('',$this->current_page,'edit');
    $id = $this->input->get('id');
    $where['menu_id'] = $id;
    $value = $this->m_menu->getWhere($where);

    $data['menu'] = $this->getMenu();
    $data['name'] = $this->name;
    $data['value'] = $value[0];
    $data['current_page'] = 'menu';
    $data['id'] = $id;
    $this->load->view('admin', $data);

  }

  public function update(){
    $id = $this->input->get('id');
    $position = $this->input->get('position');
    $name = $this->name;
    foreach ($name as $key => $value) {
      if($value != 'menu_password') {
        $data[$value] = $this->input->post_get($value);
      }
    }
    if($position!=$data['menu_position']){
      $where['menu_position'] = $data['menu_position'];
      $a = $this->m_menu->getWhere($where)[0];
      $change['menu_position'] = $position;
      $this->m_menu->update($a->menu_id, $change);
    }
    $query = $this->m_menu->update($id, $data);
    if($query){
      $this->m_log->add('update data menu');
      $status['message'] = 'Data telah diupdate ke database';
      $status['type'] = 'update';
      $status['color'] = 'orange';
      $this->session->set_flashdata('status', $status);
    }
    //$url = $this->url($query);
    redirect('menu');
  }


  public function destroy(){
    $data['menu_id'] = $this->input->get('id');;
    $query = $this->m_menu->delete($data);
    if ($query) {
      $url = $this->url(3);
      $status['message'] = 'Data telah dihapus ke database';
      $status['type'] = 'delete';
      $status['color'] = 'red';
      $this->session->set_flashdata('status', $status);
    }
    redirect('menu');
  }

  public function changeLimit(){
    $crud_data = $this->getCrudData($this->current_page);
    $data['crud_recordlimit'] = $this->input->get('value');
    $this->m_crud->update($crud_data->crud_id, $data);
  }


}
