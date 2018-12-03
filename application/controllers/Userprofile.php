<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userprofile extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('m_userprofile', 'm_log'));
    $this->cekLogin();
  }

  private $name = array(
                    'userprofile_id',
                    'userprofile_surename',
                    'userprofile_birthdate',
                    'userprofile_birthplace',
                    'userprofile_sex',
                    'userprofile_phone',
                    'userprofile_address',
                    'userprofile_photo',
                    'user_id');
  private $current_page = 'userprofile';

  function index()
  {
    //basic variable
    $crud_data = $this->getCrudData($this->current_page); //get basic data about userprofile
    $base_url = base_url() .$this->current_page.'/index';
    $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
    $total_records = $this->m_userprofile->get_total();
    $limit_per_page = $crud_data->crud_recordlimit;
    $start_record = $page*$limit_per_page;
    $for_table = $this->m_userprofile->get_current($limit_per_page, $start_record); //get record base on pagination

    //get search key if exist
    $key = $this->input->get('key');
    $search_record = $this->m_userprofile->search($key);

    //set pagination
    if ($crud_data->crud_pagination=='true') {
      $for_table = $this->m_userprofile->get_current($limit_per_page, $start_record);
      if ($total_records>0) {
        $data['pagination_link'] = $this->setPagination($base_url, $total_records, $limit_per_page);
      }
    }else{
      $for_table = $this->m_userprofile->get();
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
                              'Nama' => 'userprofile_surename',
                              'Alamat' => 'userprofile_address',
                              'Phone' => 'userprofile_phone',
                            );
    $data['name'] = $this->name;
    $data['breadcrumbs'] = $this->getBreadcrumbs('',$this->current_page,'');

    $this->load->view('admin', $data);
  }
  public function create(){
    $data['name'] = $this->name;
    $data['menu'] = $this->getMenu();
    $data['current_page'] = 'userprofile';
    $data['breadcrumbs'] = $this->getBreadcrumbs('',$this->current_page,'create');
    $this->load->view('admin', $data);
  }
  public function store() {
    $name = $this->name;
    foreach ($name as $key => $value) {
        $data[$value] = $this->input->post_get($value);
    }
    $query = $this->m_userprofile->add($data);
    if(!$query){
      $this->session->set_flashdata('status', 'Terjadi Kesalahan');
    }else{
      $this->m_log->add('add data userprofile');
      $status['message'] = 'Data telah ditambah ke database';
      $status['type'] = 'add';
      $status['color'] = 'blue';
      $this->session->set_flashdata('status', $status);
    }

    //$url = $this->url($query);
    redirect('userprofile');
  }

  public function edit(){
    $data['breadcrumbs'] = $this->getBreadcrumbs('',$this->current_page,'edit');
    $id = $this->input->get('id');
    $where['userprofile_id'] = $id;
    $value = $this->m_userprofile->getWhere($where);
    if (!isset($value[0])) {
      $status['message'] = 'Data tidak ditak di temukan';
      $status['type'] = 'error';
      $status['color'] = 'orange';
      $this->session->set_flashdata('status', $status);
      redirect('userprofile');
    }
    $data['menu'] = $this->getMenu();
    $data['name'] = $this->name;
    $data['value'] = json_encode($value[0]);
    $data['current_page'] = 'userprofile';
    $data['id'] = $id;
    $this->load->view('admin', $data);

  }

  public function update(){
    $id = $this->input->get('id');;
    $name = $this->name;
    foreach ($name as $key => $value) {
      if($value != 'userprofile_password') {
        $data[$value] = $this->input->post_get($value);
      }
    }
    //var_dump($data);
    $query = $this->m_userprofile->update($id, $data);
    if($query){
      $this->m_log->add('update data userprofile');
      $status['message'] = 'Data telah diupdate ke database';
      $status['type'] = 'update';
      $status['color'] = 'orange';
      $this->session->set_flashdata('status', $status);
    }
    //$url = $this->url($query);
    redirect('userprofile');
  }


  public function destroy(){
    $data['userprofile_id'] = $this->input->get('id');;
    $query = $this->m_userprofile->delete($data);
    if ($query) {
      $status['message'] = 'Data telah dihapus ke database';
      $status['type'] = 'delete';
      $status['color'] = 'red';
      $this->session->set_flashdata('status', $status);
    }
    redirect('userprofile');
  }

}
