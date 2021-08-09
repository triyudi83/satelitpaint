<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Setting extends CI_Model {
	function getprovinsi(){
		$this->db->select('*');
		$this->db->from('tb_provinsi');
		$query = $this->db->get();
    	return $query->result();
    }

    function getkota($id){
        $this->db->select('*');
        $where = array(
            'id_provinsi' => $id
        );
        $query = $this->db->get_where('tb_kota', $where);
        return $query->result();
    }

    function cekakses($tabel, $where){
        $query = $this->db->get_where($tabel, $where);
        return $query->result();
    }

    function getkec($id){
        $this->db->select('*');
        $this->db->order_by('kecamatan', 'ASC');
        $where = array(
            'id_kota' => $id
        );
        $query = $this->db->get_where('tb_kecamatan', $where);
        return $query->result();
    }

    function getmenumaster($id){
        $this->db->select('tb_menu.*');
        $this->db->join('tb_akses', 'tb_akses.id_menu = tb_menu.id_menu');
        $where = array(
            'tb_akses.tipeuser' => $id, 'tb_akses.view' => '1', 'tb_menu.statusmenu'=>'aktif', 'tb_menu.kat'=>'data master'
        );
        $query = $this->db->get_where('tb_menu', $where);
        return $query->result();
    }

    function getmenusetting($id){
        $this->db->distinct();
        $this->db->select('tb_menu.*');
        $this->db->join('tb_akses', 'tb_akses.id_menu = tb_menu.id_menu');
        $where = array(
            'tb_akses.tipeuser' => $id, 'tb_akses.view' => '1', 'tb_menu.statusmenu'=>'aktif', 'tb_menu.kat'=>'setting'
        );
        $query = $this->db->get_where('tb_menu', $where);
        return $query->result();
    }

    function getmenutransaksi($id){
        $this->db->distinct();
        $this->db->select('tb_menu.*');
        $this->db->join('tb_akses', 'tb_akses.id_menu = tb_menu.id_menu');
        $where = array(
            'tb_akses.tipeuser' => $id, 'tb_akses.view' => '1', 'tb_menu.statusmenu'=>'aktif', 'tb_menu.kat'=>'transaksi'
        );
        $query = $this->db->get_where('tb_menu', $where);
        return $query->result();
    }

    function getmenuproduksi($id){
        $this->db->distinct();
        $this->db->select('tb_menu.*');
        $this->db->join('tb_akses', 'tb_akses.id_menu = tb_menu.id_menu');
        $where = array(
            'tb_akses.tipeuser' => $id, 'tb_akses.view' => '1', 'tb_menu.statusmenu'=>'aktif', 'tb_menu.kat'=>'produksi'
        );
        $query = $this->db->get_where('tb_menu', $where);
        return $query->result();
    }

    function getmenustok($id){
        $this->db->distinct();
        $this->db->select('tb_menu.*');
        $this->db->join('tb_akses', 'tb_akses.id_menu = tb_menu.id_menu');
        $where = array(
            'tb_akses.tipeuser' => $id, 'tb_akses.view' => '1', 'tb_menu.statusmenu'=>'aktif', 'tb_menu.kat'=>'stok'
        );
        $query = $this->db->get_where('tb_menu', $where);
        return $query->result();
    }

    function getmenuacc($id){
        $this->db->distinct();
        $this->db->select('tb_menu.*');
        $this->db->join('tb_akses', 'tb_akses.id_menu = tb_menu.id_menu');
        $where = array(
            'tb_akses.tipeuser' => $id, 'tb_akses.view' => '1', 'tb_menu.statusmenu'=>'aktif', 'tb_menu.kat'=>'accounting'
        );
        $query = $this->db->get_where('tb_menu', $where);
        return $query->result();
    }

    function getmenulaporan($id){
        $this->db->distinct();
        $this->db->select('tb_menu.*');
        $this->db->join('tb_akses', 'tb_akses.id_menu = tb_menu.id_menu');
        $where = array(
            'tb_akses.tipeuser' => $id, 'tb_akses.view' => '1', 'tb_menu.statusmenu'=>'aktif', 'tb_menu.kat'=>'laporan'
        );
        $query = $this->db->get_where('tb_menu', $where);
        return $query->result();
    }



    function editv($iduser,$submenu,$view){
            $where = array(
                'tipeuser' =>  $iduser,
                'id_menu' => $view
            );

            $view = array(
                'view' =>  '1'
            );

            $this->db->where($where);
            $this->db->update('tb_akses',$view);         
        }

    function edita($iduser,$submenu,$add){
        $where = array(
            'tipeuser' =>  $iduser,
            'id_menu' => $add
        );

        $add = array(
            'add' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$add);         
    }

    function edite($iduser,$submenu,$edit){
        $where = array(
            'tipeuser' =>  $iduser,
            'id_menu' => $edit
        );

        $edit = array(
            'edit' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$edit);         
    }


    function editd($iduser,$submenu,$delete){
        $where = array(
            'tipeuser' =>  $iduser,
            'id_menu' => $delete
        );

        $delete = array(
            'delete' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$delete);         
    }

    function refresh($iduser){
        $user = array(
            'view' => '0',
            'add' => '0',
            'edit' => '0',
            'delete' => '0'
        );

        $where = array(
            'tipeuser' =>  $iduser
        );

        $this->db->where($where);                                                            
        $this->db->update('tb_akses',$user);       
    }


    function delete($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
    $this->db->query("ALTER TABLE $table AUTO_INCREMENT 0");
    }

    function getakses($ida){
        $this->db->select('*');
        $this->db->join('tb_menu', 'tb_menu.id_menu = tb_akses.id_menu');
        $where = array(
            'tipeuser' => $ida
        );
        $query = $this->db->get_where('tb_akses', $where);
        return $query->result();

        // return $this->db->get('tb_menu')->result();
    }
 }