<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Customer extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Customer');
        $this->load->model('M_Setting');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['activeMenu'] = '3';
        $data['master'] = $this->M_Setting->getmenumaster($id);
        $data['setting'] = $this->M_Setting->getmenusetting($id);
        $data['transaksi'] = $this->M_Setting->getmenutransaksi($id);
        $data['produksi'] = $this->M_Setting->getmenuproduksi($id);
        $data['stok'] = $this->M_Setting->getmenustok($id);
        $data['acc'] = $this->M_Setting->getmenuacc($id);
        $data['laporan'] = $this->M_Setting->getmenulaporan($id);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '3'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '3'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }

         $tambah = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '3'
        );
        $hasiltambah = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasiltambah)!=0){ 
            $tomboltambah = 'aktif';
        } else{
            $tomboltambah = 'tidak';
        }
        $data['aksestambah'] = $tomboltambah;
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $this->load->view('template/sidebar.php', $data);
        $data['customer'] = $this->M_Customer->getall();
        $this->load->view('customer/v_customer',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['activeMenu'] = '3';
        $data['master'] = $this->M_Setting->getmenumaster($id);
        $data['setting'] = $this->M_Setting->getmenusetting($id);
        $data['transaksi'] = $this->M_Setting->getmenutransaksi($id);
        $data['produksi'] = $this->M_Setting->getmenuproduksi($id);
        $data['stok'] = $this->M_Setting->getmenustok($id);
        $data['acc'] = $this->M_Setting->getmenuacc($id);
        $data['laporan'] = $this->M_Setting->getmenulaporan($id);
        $data['provinsi'] = $this->db->get('tb_provinsi')->result();
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('customer/v_addcustomer',$data); 
        $this->load->view('template/footer');
    }

    function cek_username(){
        $tabel = 'tb_customer';
        $cek = 'username';
        $kode = $this->input->post('username');
        $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
         
    }

    public function tambah()
    {   
        $this->M_Customer->tambahdata();

        $this->session->set_flashdata('SUCCESS', "Data Berhasil Di Tambahkan!!");
        redirect('customer');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['activeMenu'] = '3';
        $data['master'] = $this->M_Setting->getmenumaster($id);
        $data['setting'] = $this->M_Setting->getmenusetting($id);
        $data['transaksi'] = $this->M_Setting->getmenutransaksi($id);
        $data['produksi'] = $this->M_Setting->getmenuproduksi($id);
        $data['stok'] = $this->M_Setting->getmenustok($id);
        $data['acc'] = $this->M_Setting->getmenuacc($id);
        $data['laporan'] = $this->M_Setting->getmenulaporan($id);
        $this->load->view('template/sidebar.php', $data);
        $data['customer'] =$this->M_Customer->getspek($ida);
        $data['provinsi'] = $this->db->get('tb_provinsi')->result();
        $this->load->view('customer/v_vcustomer',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['activeMenu'] = '3';
        $data['master'] = $this->M_Setting->getmenumaster($id);
        $data['setting'] = $this->M_Setting->getmenusetting($id);
        $data['transaksi'] = $this->M_Setting->getmenutransaksi($id);
        $data['produksi'] = $this->M_Setting->getmenuproduksi($id);
        $data['stok'] = $this->M_Setting->getmenustok($id);
        $data['acc'] = $this->M_Setting->getmenuacc($id);
        $data['laporan'] = $this->M_Setting->getmenulaporan($id);
        $this->load->view('template/sidebar.php', $data);
        $data['customer'] =$this->M_Customer->getspek($iduser);
        $data['provinsi'] = $this->db->get('tb_provinsi')->result();
        $this->load->view('customer/v_ecustomer',$data); 
        $this->load->view('template/footer');
    }
    
    function editc()
    {   
        $this->M_Customer->edit();
        $this->session->set_flashdata('SUCCESS', "Data Berhasil Di Rubah!!");
        redirect('customer');
    }

    function hapus($id){
        $where = array('id_customer' => $id);

        $this->M_Setting->delete($where,'tb_customer');
        $this->session->set_flashdata('SUCCESS', "Data Berhasil di Hapus!!");
        redirect('customer');
    }

}