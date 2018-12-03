<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller{
  public $name = array('profile_title','profile_content', 'profile_postdate', 'profile_postime', 'user_id');
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->cekLogin();
    $this->load->model(array('m_profile', 'm_log'));
  }

  function index()
  {
    $status = $this->input->get('status');
    if (isset($status)) {
      $data['status'] = $status;
    }
    $data['menu'] = $this->getMenu();
    $data['source'] = 'profile';
    $data['sourcename'] = 'Profile';
    $data['jumlah'] = $this->m_profile->jumlah();
    $data['for_table'] = $this->m_profile->get();
    $data['table_header'] = array(
                              'Judul' => 'profile_title',
                              'Tanggal' => 'profile_postdate',
                              'Jam' => 'profile_postime'
                            );
    $input_action = site_url('profile/input');
    $edit_action = site_url('profile/update?id=');
    $delete_action = site_url('profile/delete?id=');
    $data['input_action'] = $input_action;
    $data['edit_action'] = $edit_action;
    $data['delete_action'] = $delete_action;
    $data['name'] = $this->name;

    $this->load->view('home', $data);
  }

  public function input() {
    $name = $this->name;
    foreach ($name as $key => $value) {
      $data[$value] = $this->input->post_get($value);
    }
    $query = $this->m_profile->add($data);
    $url = $this->url($query);
    if($query){
      $this->m_log->add('add data profile');
    }
    redirect($url);
  }
  public function update(){
    $id = $this->input->get('id');;
    $name = $this->name;
    foreach ($name as $key => $value) {
      $data[$value] = $this->input->post_get($value);
    }
    $query = $this->m_profile->update($id, $data);
    if($query){
      $this->m_log->add('update data profile');
    }
    $url = $this->url($query);
    redirect($url);
  }
  public function edit(){
    $id = $this->input->get('id');
    $data['profile_id'] = $id;
    $value = $this->m_profile->getWhere($data);
    echo json_encode($value[0]);
  }

  public function delete(){
    $data['profile_id'] = $this->input->get('id');;
    $query = $this->m_profile->delete($data);
    if ($query) {
      $url = $this->url(3);
    }
    redirect($url);
  }


  function url($status){
    $url = 'profile?status='.$status.'';
    return $url;
  }

  public function edit_form($input_action){

  }

}
