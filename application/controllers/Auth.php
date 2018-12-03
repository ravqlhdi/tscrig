<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('m_user');
  }

  function cekAkun()
  {
    $username = $this->input->get_post('username');
    $password = $this->input->get_post('password');
    $query = $this->m_user->cekAkun($username, $password);

    if(!$query){
      $data['query'] = $query;
      $data['error_message'] = 'Usernama atau password salah';
      $this->load->view('login/login', $data);
    }else{
      var_dump($query);
      $userData = array (
        'id' =>  $query->user_id,
        'username' =>  $query->user_name,
        'email' =>  $query->user_email,
        'status' =>  $query->user_status,
        'group_id' =>  $query->group_id,
        'skpd_id' =>  $query->skpd_id,
        'logged_in' => true
      );
      $this->session->set_userdata($userData);
      redirect('dashboard');
    }

  }

  public function login(){
    if(!$this->session->userdata('logged_in')){
      $this->load->view('login/login');
    }else{
      redirect('dashboard');
    }
  }
  public function register(){
    if(!$this->session->userdata('logged_in')){
      $this->load->view('login/register');
    }else{
      redirect('dashboard');
    }
  }
  public function add_user(){
    $data['user_name'] = $this->input->post('username');
    $data['user_email'] = $this->input->post('email');
    $data['user_password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    $data['user_status'] = 'active';
    $data['group_id'] = 2;
    $this->m_user->add($data);
    redirect('auth/login');
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect('auth/login');
  }

}
