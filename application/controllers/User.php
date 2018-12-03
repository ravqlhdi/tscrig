<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller{
  private $name = array('user_id','user_name','user_password', 'user_email', 'user_status','group_id');
  private $current_page = 'user';
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('m_user', 'm_log'));
    $this->cekLogin();
  }

  function index()
  {

    //basic variable
    $crud_data = $this->getCrudData($this->current_page); //get basic data about user
    $base_url = base_url() .$this->current_page.'/index';
    $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
    $total_records = $this->m_user->get_total();
    $limit_per_page = $crud_data->crud_recordlimit;
    $start_record = $page*$limit_per_page;
    $for_table = $this->m_user->get_current($limit_per_page, $start_record); //get record base on pagination

    //get search key if exist
    $key = $this->input->get('key');
    $search_record = $this->m_user->search($key);

    //set pagination
    if ($crud_data->crud_pagination=='true') {
      $for_table = $this->m_user->get_current($limit_per_page, $start_record);
      if ($total_records>0) {
        $data['pagination_link'] = $this->setPagination($base_url, $total_records, $limit_per_page);
      }
    }else{
      $for_table = $this->m_user->get();
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
                              'Nama user' => 'user_name',
                              'Email' => 'user_email',
                              'Last Login' => 'user_lastlogin',
                              'Group Id' => 'group_id',

                            );
    $data['name'] = $this->name;
    $data['breadcrumbs'] = $this->getBreadcrumbs('',$this->current_page,'');

    $this->load->view('admin', $data);
  }
  public function create(){
    $this->load->model(array('m_group'));
    $data['name'] = $this->name;
    $data['menu'] = $this->getMenu();
    $data['current_page'] = 'user';
    $data['select_group'] = $this->m_group->get();
    $data['breadcrumbs'] = $this->getBreadcrumbs('',$this->current_page,'create');
    $this->load->view('admin', $data);
  }
  public function store() {
    $name = $this->name;
    foreach ($name as $key => $value) {
      if($value == 'user_password'){
        $data[$value] = password_hash($this->input->post_get($value), PASSWORD_DEFAULT);
      }else{
        $data[$value] = $this->input->post_get($value);
      }

    }
    $query = $this->m_user->add($data);
    if(!$query){
      $this->session->set_flashdata('status', 'Terjadi Kesalahan');
    }else{
      $this->m_log->add('add data user');
      $status['message'] = 'Data telah ditambah ke database';
      $status['type'] = 'add';
      $status['color'] = 'blue';
      $this->session->set_flashdata('status', $status);
    }

    //$url = $this->url($query);
    redirect('user');
  }

  public function edit(){
    $this->load->model(array('m_group'));
    $data['breadcrumbs'] = $this->getBreadcrumbs('',$this->current_page,'edit');
    $id = $this->input->get('id');
    $where['user_id'] = $id;
    $value = $this->m_user->getWhere($where);
    if (!isset($value[0])) {
      $status['message'] = 'Data tidak ditak di temukan';
      $status['type'] = 'error';
      $status['color'] = 'orange';
      $this->session->set_flashdata('status', $status);
      redirect('user');
    }
    $data['menu'] = $this->getMenu();
    $data['name'] = $this->name;
    $data['select_group'] = $this->m_group->get();
    $data['form_value'] = $value[0];
    $data['current_page'] = 'user';
    $data['id'] = $id;
    $this->load->view('admin', $data);

  }

  public function update(){
    $id = $this->input->get('id');;
    $name = $this->name;
    foreach ($name as $key => $value) {
      if($value != 'user_password') {
        $data[$value] = $this->input->post_get($value);
      }
    }
    //var_dump($data);
    $query = $this->m_user->update($id, $data);
    if($query){
      $this->m_log->add('update data user');
      $status['message'] = 'Data telah diupdate ke database';
      $status['type'] = 'update';
      $status['color'] = 'orange';
      $this->session->set_flashdata('status', $status);
    }
    //$url = $this->url($query);
    redirect('user');
  }


  public function destroy(){
    $data['user_id'] = $this->input->get('id');;
    $query = $this->m_user->delete($data);
    if ($query) {
      $url = $this->url(3);
      $status['message'] = 'Data telah dihapus ke database';
      $status['type'] = 'delete';
      $status['color'] = 'red';
      $this->session->set_flashdata('status', $status);
    }
    redirect('user');
  }

  function url($status){
    $url = 'user?status='.$status.'';
    return $url;
  }




}
