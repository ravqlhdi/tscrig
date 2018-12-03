<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengumuman extends CI_Model{

  public $table = 'table_pengumuman';

  public function get(){
    $query = $this->db->query("SELECT * FROM table_pengumuman a LEFT JOIN table_user u ON u.user_id = a.user_id
     ");
    return $query->result();
  }
  public function getWhere($data){

    $query = $this->db->where($data)->get($this->table);
    return $query->result();
  }
  public function getWhereEdit($data){
    $pengumuman_id = $data['pengumuman_id'];

    $query = $this->db->query('SELECT *
      FROM table_pengumuman
       WHERE pengumuman_id='.$pengumuman_id.'');
    return $query->result();
  }

  public function add($data){
    $this->db->insert($this->table,$data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }
  public function update($id, $data){
    //run Query to update data
    $query = $this->db->where('pengumuman_id', $id)->update(
      $this->table, $data
    );

    return ($this->db->affected_rows() != 1) ? false : true;

  }
  public function edit(){

  }

  public function delete($data){
    $this->db->delete($this->table, $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function jumlah() {
     return $this->db->count_all($this->table);
  }


}
