<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_submenu extends CI_Model{

  public $table = 'table_submenu';

  public function get(){
    $query = $this->db->get($this->table);
    return $query->result();
  }
  public function getWhere($data){
    $query = $this->db->where($data)->get($this->table);
    return $query->result();
  }

  public function get_current($limit, $start, $where){
    $this->db->where($where);
    $this->db->limit($limit, $start);
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0){
        return $query->result();
    }
    return false;
  }

  public function get_total($where){
    $this->db->where($where);
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

  public function add($data){
    $this->db->insert($this->table,$data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }
  public function update($id, $data){
    //run Query to update data
    $query = $this->db->where('submenu_id', $id)->update(
      $this->table, $data
    );

    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function search($key){
    $this->db->like('menu_name', $key);
    return $this->db->get($this->table)->result();
  }
  public function searchWhere($key, $where){
    $this->db->like('menu_name', $key);
    $this->db->where($where);
    return $this->db->get($this->table)->result();

  }

  public function delete($data){
    $this->db->delete($this->table, $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function getField(){
    return $this->db->query('DESC '.$this->table.'')->result();
  }





}
