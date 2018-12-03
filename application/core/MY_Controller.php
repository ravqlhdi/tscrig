<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

  public function cekLogin()
  {
    if(!$this->session->userdata('logged_in')){
      redirect('auth/login');
    }
  }

  public function getUserData(){
    $userdata = $this->session->userdata();
    return  $userdata;
  }

  public function userLevel(){
    $userdata = $this->getUserData();
    return $userdata['level'];
  }

  public function getCrudData($crudname){
    $this->load->model(array('m_crud'));
    $where['crud_name'] = $crudname;
    $data = $this->m_crud->getWhere($where);
    if(empty($data)){
      die($this->error_message('register crud first'));
    }else{
      return $data[0];
    }
  }
  function error_message($msg){
    echo $msg;
  }
  public function getMenu(){
    $this->load->model(array('m_menu','m_submenu'));
    $data['group_id'] = $this->session->userdata('group_id');
    $submenu = $this->m_submenu->get();
    $menu = $this->m_menu->get_menu($data);
    foreach ($menu as $key => $value) {
      foreach ($submenu as $k => $v) {
        if($value->menu_id==$v->menu_id){
          if (!isset($value->sub_menu)) {
            $value->sub_menu = array();
          }
          array_push($value->sub_menu, $v);
        }
      }
      if ($value->menu_id==NULL) {
        unset($menu[$key]);
      }
    }

    return $menu;
  }

  public function callCkeditor(){
    $this->load->library('ckeditor');
    //$this->load->library('ckfinder');

    $this->ckeditor->basePath = base_url().'assets/ckeditor/';
    $this->ckeditor->config['toolbar'] = array(
                    array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
                                                        );
    $this->ckeditor->config['language'] = 'it';
    $this->ckeditor->config['width'] = '';
    $this->ckeditor->config['height'] = '300px';
  }

  public function getBreadcrumbs($parent, $current_page, $child){
    //breadcrumbs
    $this->mybreadcrumb->add('Dashboard', base_url('dashboard'));
    if(!empty($parent)) $this->mybreadcrumb->add(ucfirst($parent), base_url($parent));
    $this->mybreadcrumb->add(ucfirst($current_page), base_url($current_page));
    if (!empty($child)) $this->mybreadcrumb->add(ucfirst($child), base_url($current_page.'/'.$child));
        $breadcrumbs = $this->mybreadcrumb->render();
    $breadcrumbs = str_replace('breadcrumb','breadcrumb ',$breadcrumbs);
    //end breadcrumb
    return $breadcrumbs;
  }

  public function setPagination($base_url, $total_records, $limit_per_page){
    $config['base_url'] = $base_url;
    $config['total_rows'] = $total_records;
    $config['per_page'] = $limit_per_page;
    $config["uri_segment"] = 3;

    // custom paging configuration
    $config['num_links'] = $total_records/$limit_per_page;
    $config['use_page_numbers'] = TRUE;
    $config['reuse_query_string'] = TRUE;

    $config['full_tag_open'] = '<div class="btn-group" role="group">';
    $config['full_tag_close'] = '</div>';

    $config['first_link'] = 'First Page';
    $config['first_tag_open'] = '<button type="button" class="btn btn-default waves-effect">';
    $config['first_tag_close'] = '</button>';

    $config['last_link'] = 'Last Page';
    $config['last_tag_open'] = '<button type="button" class="btn btn-default waves-effect">';
    $config['last_tag_close'] = '</button>';

    $config['next_link'] = '>';//next page
    $config['next_tag_open'] = '<button type="button" class="btn btn-default waves-effect">';
    $config['next_tag_close'] = '</button>';

    $config['prev_link'] = '<';//prev page
    $config['prev_tag_open'] = '<button type="button" class="btn btn-default waves-effect">';
    $config['prev_tag_close'] = '</button>';

    $config['cur_tag_open'] = '<button type="button" class="btn btn-default waves-effect">';
    $config['cur_tag_close'] = '</button>';

    $config['num_tag_open'] = '<button type="button" class="btn btn-default waves-effect">';
    $config['num_tag_close'] = '</button>';

    $this->pagination->initialize($config);

    // build paging links
    return $this->pagination->create_links();
  }

  //remove already exit data for select
  public function removeExistData($dataA, $dataB, $var){
    foreach ($dataA as $key => $value) {
      foreach ($dataB as $k => $v) {
        if($value->{$var}==$v->{$var}){
          unset($dataA[$key]);
        }
      }
    }
    return $dataA;
  }

}
