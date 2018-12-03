<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model{

  public $table = 'table_menu';



  public function get(){
    $this->db->order_by('menu_position','ASC');
    $query = $this->db->get($this->table);
    return $query->result();
  }
  public function getWhere($data){
    $query = $this->db->where($data)->get($this->table);
    return $query->result();
  }
  public function get_current($limit, $start){
    $this->db->limit($limit, $start);
    $this->db->order_by('menu_position','ASC');
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
    $query = $this->db->where('menu_id', $id)->update(
      $this->table, $data
    );

    return ($this->db->affected_rows() != 1) ? false : true;

  }
  public function search($key){
    $this->db->like('menu_name', $key);
    return $this->db->get($this->table)->result();

  }

  public function delete($data){
    $this->db->delete($this->table, $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function get_menu($id){
    //var_dump($id);
    $id_g = $id['group_id'];
    $query = $this->db->query('SELECT b.* FROM table_groupmenu a LEFT JOIN table_menu b ON a.menu_id=b.menu_id WHERE a.group_id='.$id_g.'');
    return $query->result();
  }



}
