<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_log extends CI_Model{

  public $table = 'table_log';

  public function get(){
    $query = $this->db->get($this->table);
    return $query->result();
  }
  public function getWhere($data){
    $query = $this->db->where($data)->get($this->table);
    return $query->result();
  }
  public function get_relasi(){
    $query = $this->db->query('SELECT a.*, b.user_name FROM table_log a LEFT JOIN table_user b ON a.user_id=b.user_id');
    return $query->result();
  }

  public function get_current($limit, $start){
    $this->db->limit($limit, $start);
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0){
        return $query->result();
    }
    return false;
  }

  public function get_total(){
    return $this->db->count_all($this->table);
  }

  public function add($msg){
    $data['user_id'] = $this->session->userdata('id');
    $data['log_action'] = $msg;
    $data['log_ipaddress'] = $_SERVER['REMOTE_ADDR'];
    $this->db->insert($this->table,$data);
    //return ($this->db->affected_rows() != 1) ? false : true;
  }
  public function update($id, $data){
    //run Query to update data
    $query = $this->db->where('log_id', $id)->update(
      $this->table, $data
    );


  }

  public function delete($data){
    $this->db->delete($this->table, $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }



}
