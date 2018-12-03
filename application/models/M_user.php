<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_Model{

  public $table = 'table_user';
  public $base = 'user';

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
    $this->db->like('user_name', $key);
    $this->db->or_like('user_email', $key);
    return $this->db->get($this->table)->result();
  }

  public function cekAkun($username, $password){
   //check if there is Username in database
   $this->db->where('user_name', $username);

   //run query and get data from database

   $query = $this->db->get($this->table)->row();

   //if query error and not found user return false value
   if(!$query) return false;

   // take password from database
   $hash = $query->user_password;

   //if password is wrong return false value
   if(!password_verify($password, $hash)) return false;

   //update last login

   $last_login = $this->update($query->user_id, array('user_lastlogin' => date('Y-m-d H:i:s')));
   return $query;
 }


}
