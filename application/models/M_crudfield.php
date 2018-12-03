<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_crudfield extends CI_Model{

  public $table = 'table_crudfield';

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
    $query = $this->db->where('crudfield_id', $id)->update(
      $this->table, $data
    );
    return ($this->db->affected_rows() != 1) ? false : true;

  }

  public function delete($data){
    $this->db->delete($this->table, $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function getField($tablename){
    return $this->db->query('DESC '.$tablename.'')->result();
  }

}
