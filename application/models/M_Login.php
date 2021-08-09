<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model{

public function get($username,$password){
    $where = array('username' => $username,'password'=>md5($password));
    $result = $this->db->get_where('tb_user', $where)->row();
    return $result;
}
}
?>