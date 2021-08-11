<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Customer extends CI_Model {
    function getall(){
        $this->db->select('tb_customer.*, tb_provinsi.*, tb_kota.*, tb_kecamatan.*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_customer.id_prov');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_customer.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_customer.id_kecamatan');
        $query = $this->db->get('tb_customer');
        return $query->result();
    }

    function getspek($id){
        $this->db->select('tb_customer.*, tb_provinsi.*, tb_kota.*, tb_kecamatan.*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_customer.id_prov');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_customer.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_customer.id_kecamatan');
        $this->db->where('id_customer', $id);
        $query = $this->db->get('tb_customer');
        return $query->result();
    }

    function edit(){
        $sisa = preg_replace('/([^0-9]+)/','',$this->input->post('limit')) - $this->input->post('hutang');
        $user = array(
            'namacustomer' => $this->input->post('namacustomer'),
            'alamat' => $this->input->post('alamat'),
            'id_prov' => $this->input->post('prov'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'id_kota' => $this->input->post('kota'),
            'tlp' => $this->input->post('tlp'),
            'hp' => $this->input->post('hp'),
            'limit' => preg_replace('/([^0-9]+)/','',$this->input->post('limit')),
            'sisalimit' => $sisa,
            'tgl_update' => date('Y-m-d'), 
            'id_user' => $this->session->userdata('id_user')
            
        );

        $where = array(
            'id_customer' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_customer',$user);
    }

    function tambahdata(){
        $user = array(
            'namacustomer' => $this->input->post('namacustomer'),
            'alamat' => $this->input->post('alamat'),
            'id_prov' => $this->input->post('prov'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'id_kota' => $this->input->post('kota'),
            'tlp' => $this->input->post('tlp'),
            'hp' => $this->input->post('hp'),
            'limit' => preg_replace('/([^0-9]+)/','',$this->input->post('limit')),
            'hutang' => '0',
            'sisalimit' => preg_replace('/([^0-9]+)/','',$this->input->post('limit')),
            'tgl_update' => date('Y-m-d'), 
            'id_user' => $this->session->userdata('id_user')
        );
        
        $this->db->insert('tb_customer', $user);
    }
   
}