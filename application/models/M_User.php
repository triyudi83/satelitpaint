<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

    
    function edit(){
        $user = array(
            'nama' => $this->input->post('nama'),
            'tipeuser' => $this->input->post('tipeuser'),
            'username' => $this->input->post('username'),
            'tgl_update' => date('Y-m-d'), 
            'id_userupdate' => $this->session->userdata('id_user')
            
        );

        $where = array(
            'id_user' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_user',$user);
    }

    function tambahdata(){
        $user = array(
            'nama' => $this->input->post('nama'),
            'tipeuser' => $this->input->post('tipeuser'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'tgl_update' => date('Y-m-d'), 
            'id_userupdate' => $this->session->userdata('id_user')
        );
        
        $this->db->insert('tb_user', $user);
    }
   
}