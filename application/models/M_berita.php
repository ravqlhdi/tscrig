<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model{

  public $table = 'table_berita';

  public function get(){

    $query = $this->db->query("SELECT * FROM table_berita a LEFT JOIN table_user u ON u.user_id = a.user_id
     LEFT JOIN table_kategoriberita k ON k.kategoriberita_id = a.kategoriberita_id");
    return $query->result();
  }

  public function get3(){
    $limit=3;
    $query = $this->db->get($this->table, $limit);
    return $query->result();
  }

  public function getShow3(){
    $query = $this->db->query("SELECT * FROM table_berita a LEFT JOIN table_user u ON u.user_id = a.user_id
     LEFT JOIN table_kategoriberita k ON k.kategoriberita_id = a.kategoriberita_id LIMIT 3");
    return $query->result();
  }

  public function getWhere($data){
    $query = $this->db->where($data)->get($this->table);
    return $query->result();
  }
  public function getWhereEdit($data){
    $berita_id = $data['berita_id'];

    $query = $this->db->query('SELECT *
      FROM table_berita
       WHERE berita_id='.$berita_id.'');
    return $query->result();
  }

  public function add($data){
    $this->db->insert($this->table,$data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }
  public function update($id, $data){
    //run Query to update data
    $query = $this->db->where('berita_id', $id)->update(
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

  public function getView($id){
    $query = $this->db->query("SELECT * FROM table_berita a LEFT JOIN table_user u ON u.user_id = a.user_id
     LEFT JOIN table_kategoriberita k ON k.kategoriberita_id = a.kategoriberita_id WHERE a.berita_id='$id'");
    return $query->result();
  }

  public function getByKategori($id){
    $query = $this->db->query("SELECT * FROM table_berita a LEFT JOIN table_user u ON u.user_id = a.user_id
     LEFT JOIN table_kategoriberita k ON k.kategoriberita_id = a.kategoriberita_id WHERE a.kategoriberita_id='$id'");
    return $query->result();
  }

}
