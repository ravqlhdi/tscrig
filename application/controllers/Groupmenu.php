<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groupmenu extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('m_group','m_groupmenu', 'm_log', 'm_crud'));
    $this->cekLogin();
  }

  private $name = array(
                  'groupmenu_id',
                  'group_id',
                  'menu_id',
                  );
  private $current_page = 'groupmenu';

  function index()
  {

    $crud_data = $this->getCrudData($this->current_page);
    $status = $this->session->flashdata('status');
    $key = $this->input->get('key');
    $parent_id = $this->input->get('id');
    $limit_per_page = $crud_data->crud_recordlimit;
    $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
    $where_id['group_id'] = $parent_id;
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

    $where['group_id'] = $parent_id;
    $data['parent_value'] = $this->m_group->getWhere($where)[0];
    $data['parent_id']=$parent_id;
    $data['breadcrumbs'] = $this->getBreadcrumbs('group',$this->current_page,'');
    $data['table_header'] = array(
                              'Nama Menu' => 'menu_name',
                            );

    $this->load->view('admin', $data);
  }


  public function create(){
    $this->load->model(array('m_menu'));
    $parent_id = $this->uri->segment(3);

    //get menu already in db
    $where['group_id'] = $parent_id;
    $menu_exist = $this->m_groupmenu->getWhere($where);
    //get all list menu
    $menu = $this->m_menu->get();

    $data['select_menu'] = $this->removeExistData($menu, $menu_exist, 'menu_id'); //remove menu already exit;
    $data['parent_id'] = $parent_id;
    $data['name'] = $this->name;
    $data['menu'] = $this->getMenu();
    $data['current_page'] = 'groupmenu';
    $this->load->view('admin', $data);
  }

  public function store() {
    $parent_id = $this->uri->segment(3);
    $name = $this->name;
    foreach ($name as $key => $value) {
      $data[$value] = $this->input->post_get($value);
    }
    $data['group_id'] = $parent_id;
    unset($data['menu_id']);
    $count_masuk = 0;
    foreach ($this->input->post_get('menu_id') as $optval) {
      $data['menu_id'] = $optval;
      $query = $this->m_groupmenu->add($data);
      $count_masuk++;
    }
    if($query){
      $this->m_log->add('add data menu');
      $status['message'] = $count_masuk.' Data telah ditambah ke database';
      $status['type'] = 'add';
      $status['color'] = 'blue';
      $this->session->set_flashdata('status', $status);
    }else{
      $this->session->set_flashdata('status', 'Terjadi Kesalahan');
    }
    redirect('groupmenu?id='.$parent_id);
  }

  public function edit(){
    $data['parent_id'] = $this->uri->segment(3);
    $id = $this->input->get('id');
    $where['groupmenu_id'] = $id;
    $value = $this->m_groupmenu->getWhere($where);
    $data['menu'] = $this->getMenu();
    $data['name'] = $this->name;
    if (!empty($value[0])) {
      $data['value'] = json_encode($value[0]);
    }else{
      $status['message'] = 'Data tidak di temukan di database';
      $status['type'] = 'warning';
      $status['color'] = 'orange';
      $this->session->set_flashdata('status', $status);
      redirect('groupmenu?id='.$parent_id);
    }

    $data['current_page'] = 'groupmenu';
    $data['id'] = $id;
    $this->load->view('admin', $data);

  }

  public function update(){
    $parent_id = $this->uri->segment(3);
    $id = $this->input->get('id');;
    $name = $this->name;
    foreach ($name as $key => $value) {
      if($value != 'menu_password') {
        $data[$value] = $this->input->post_get($value);
      }
    }
    $query = $this->m_groupmenu->update($id, $data);
    if($query){
      $this->m_log->add('update data menu');
      $status['message'] = 'Data telah diupdate ke database';
      $status['type'] = 'update';
      $status['color'] = 'orange';
      $this->session->set_flashdata('status', $status);
    }
    //$url = $this->url($query);
    redirect('groupmenu?id='.$parent_id);
  }


  public function destroy(){
    $parent_id = $this->input->get('parent_id');
    $data['groupmenu_id'] = $this->input->get('id');
    $query = $this->m_groupmenu->delete($data);
    if ($query) {
      $url = $this->url(3);
      $status['message'] = 'Data telah dihapus ke database';
      $status['type'] = 'delete';
      $status['color'] = 'red';
      $this->session->set_flashdata('status', $status);
    }else{
      $status['message'] = 'terjadi kesalahan';
      $status['type'] = 'delete';
      $status['color'] = 'red';
      $this->session->set_flashdata('status', $status);
    }
    redirect('groupmenu?id='.$parent_id);
  }

  function url($status){
    $url = 'menu?status='.$status.'';
    return $url;
  }


}
