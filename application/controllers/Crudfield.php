<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crudfield extends MY_Controller{
  private $name = array('crudfield_id','crudfield_varname','crudfield_name','crudfield_type','crudfield_show');
  private $current_page = 'crudfield';
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('m_crudfield','m_log','m_crud'));
    $this->cekLogin();
  }

  function index()
  {
    $crud_data = $this->getCrudData($this->current_page);
    $status = $this->session->flashdata('status');
    $key = $this->input->get('key');
    $parent_id = $this->input->get('id');
    $limit_per_page = $crud_data->crud_recordlimit;
    $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
    $where_id['crud_id'] = $parent_id;
    $total_records = $this->{'m_'.$this->current_page}->get_total($where_id);
    $base_url = base_url() .$this->current_page.'/index';
    $start_record = $page*$limit_per_page;

    if ($crud_data->crud_pagination=='true') {
      $for_table = $this->{'m_'.$this->current_page}->get_current($limit_per_page, $start_record, $where_id);
      if ($total_records>0) {
        $data['pagination_link'] = $this->setPagination($base_url, $total_records, $limit_per_page);
      }
    }else{
      $for_table = $this->{'m_'.$this->current_page}->get();
    }

    $data['status'] = (isset($status)) ? $status : NULL ;
    $data['menu'] = $this->getMenu();
    $data['current_page'] = $this->current_page;
    $data['for_table'] = (isset($key)) ? $this->{'m_'.$this->current_page}->search($key)
                          : $for_table;
    $data['jumlah_data'] =$total_records;
    $data['no_start'] = $start_record;
    $data['limit_per_page'] = $limit_per_page;
    $where['crud_id'] = $parent_id;
    $data['parent_value'] = $this->m_crud->getWhere($where)[0];
    $data['parent_id']=$parent_id;
    $data['breadcrumbs'] = $this->getBreadcrumbs('crud',$this->current_page,'');
    $data['table_header'] = array(
                              'Variable' => 'crudfield_varname',
                              'Nama' => 'crudfield_name',
                              'Tipe' => 'crudfield_type',
                              'Show' => 'crudfield_show',
                            );
    $data['name'] = $this->name;
    if(!$data['for_table']){
        $this->addcrudfield($parent_id, $data['parent_value']->crud_tablename);
    }
    $this->load->view('admin', $data);
  }
  public function create(){
    $data['id'] = $this->uri->segment(3);
    $data['input_type'] = array('text', 'password', 'number', 'textarea','select', 'checkbox');
    $data['parent_id'] = $this->uri->segment(3);
    $data['name'] = $this->name;
    $data['menu'] = $this->getMenu();
    $data['current_page'] = 'crudfield';
    $this->load->view('admin', $data);
  }
  public function store() {
    $id = $this->input->get('id');
    $tablename = $this->input->get('name');
    $name = $this->name;
    $data['crud_id'] = $id;
    foreach ($name as $key => $value) {
        $data[$value] = $this->input->post_get($value);
    }
    $query = $this->m_crudfield->add($data);
    if($query){
      $this->m_log->add('add data crudfield');
      $status['message'] = 'Data telah ditambah ke database';
      $status['type'] = 'add';
      $status['color'] = 'blue';
      $this->session->set_flashdata('status', $status);
    }else{
      $this->session->set_flashdata('status', 'Terjadi Kesalahan');
    }
    //$url = $this->url($query);
    redirect('crudfield?id='.$id);
  }

  public function edit(){
    $id = $this->input->get('id');
    $data['parent_id'] = $this->uri->segment(3);
    $tablename = $this->input->get('name');
    $where['crudfield_id'] = $id;
    $value = $this->m_crudfield->getWhere($where);

    if (!isset($value[0])) {
      $status['message'] = 'Data tidak ditak di temukan';
      $status['type'] = 'error';
      $status['color'] = 'orange';
      $this->session->set_flashdata('status', $status);
      redirect('crudfield?id='.$id);
    }
    $data['input_type'] = array('text', 'password', 'number', 'textarea','select', 'checkbox');
    $data['menu'] = $this->getMenu();
    $data['name'] = $this->name;
    $data['value'] = $value[0];
    $data['current_page'] = 'crudfield';
    $data['id'] = $id;
    $this->load->view('admin', $data);

  }

  public function update(){
    $parent_id = $this->uri->segment(3);
    $id = $this->input->get('id');
    $tablename = $this->input->get('name');

    $name = $this->name;
    foreach ($name as $key => $value) {
      $data[$value] = $this->input->post_get($value);
    }
    unset($data['crudfield_id']);
    $query = $this->m_crudfield->update($id, $data);
    if($query){
      $this->m_log->add('update data crudfield');
      $status['message'] = 'Data telah diupdate ke database';
      $status['type'] = 'update';
      $status['color'] = 'orange';
      $this->session->set_flashdata('status', $status);
    }
    //$url = $this->url($query);
    redirect('crudfield?id='.$parent_id);
  }


  public function destroy(){
    $id = $this->input->get('id');
    $tablename = $this->input->get('name');
    $parent_id = $this->input->get('parent_id');
    $data['crudfield_id'] = $id;
    $query = $this->m_crudfield->delete($data);
    if ($query) {
      $url = $this->url(3);
      $status['message'] = 'Data telah dihapus ke database';
      $status['type'] = 'delete';
      $status['color'] = 'red';
      $this->session->set_flashdata('status', $status);
    }
    redirect('crudfield?id='.$parent_id);
  }

  function url($status){
    $url = 'crudfield?status='.$status.'';
    return $url;
  }

  function addcrudfield($id, $tablename){
    $field = $this->m_crudfield->getField($tablename);
    foreach ($field as $key => $value) {
      $data['crud_id'] = $id;
      $data['crudfield_varname'] = $value->Field;
      $data['crudfield_show'] = 'true';
      $this->m_crudfield->add($data);
    }
    redirect('crudfield?id='.$id.'&name='.$tablename);
  }

}
/*

*/
