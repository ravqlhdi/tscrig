<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model{

  public $table = 'table_profile';
  public $base = 'profile';

  public function get(){
    $query = $this->db->get($this->table);
    return $query->result();
  }
  public function getWhere($data){

    $query = $this->db->where($data)->get($this->table);
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
  public function add($data){
    $this->db->insert($this->table,$data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }
  public function update($id, $data){
    //run Query to update data
    unset($data[''.$this->base.'_id']);
    $query = $this->db->where(''.$this->base.'_id', $id)->update(
      $this->table, $data
    );

    return ($this->db->affected_rows() != 1) ? false : true;

  }

  public function delete($data){
    $this->db->delete($this->table, $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function search($key){
    $this->db->like('profile_name', $key);
    $this->db->or_like('profile_notes', $key);
    return $this->db->get($this->table)->result();
  }


}
