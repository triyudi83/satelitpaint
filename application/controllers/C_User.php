<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_User extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_User');
        $this->load->model('M_Setting');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['activeMenu'] = '1';
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
            'id_menu' => '1'
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
            'id_menu' => '1'
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
            'id_menu' => '1'
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
        $data['user'] = $this->db->get('tb_user')->result();
        $this->load->view('user/v_user',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['activeMenu'] = '1';
        $data['master'] = $this->M_Setting->getmenumaster($id);
        $data['setting'] = $this->M_Setting->getmenusetting($id);
        $data['transaksi'] = $this->M_Setting->getmenutransaksi($id);
        $data['produksi'] = $this->M_Setting->getmenuproduksi($id);
        $data['stok'] = $this->M_Setting->getmenustok($id);
        $data['acc'] = $this->M_Setting->getmenuacc($id);
        $data['laporan'] = $this->M_Setting->getmenulaporan($id);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('user/v_adduser',$data); 
        $this->load->view('template/footer');
    }

    function cek_username(){
        $tabel = 'tb_user';
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
        $this->M_User->tambahdata();

        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('user');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['activeMenu'] = '1';
        $data['master'] = $this->M_Setting->getmenumaster($id);
        $data['setting'] = $this->M_Setting->getmenusetting($id);
        $data['transaksi'] = $this->M_Setting->getmenutransaksi($id);
        $data['produksi'] = $this->M_Setting->getmenuproduksi($id);
        $data['stok'] = $this->M_Setting->getmenustok($id);
        $data['acc'] = $this->M_Setting->getmenuacc($id);
        $data['laporan'] = $this->M_Setting->getmenulaporan($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($ida);
        $this->load->view('user/v_vuser',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['activeMenu'] = '1';
        $data['master'] = $this->M_Setting->getmenumaster($id);
        $data['setting'] = $this->M_Setting->getmenusetting($id);
        $data['transaksi'] = $this->M_Setting->getmenutransaksi($id);
        $data['produksi'] = $this->M_Setting->getmenuproduksi($id);
        $data['stok'] = $this->M_Setting->getmenustok($id);
        $data['acc'] = $this->M_Setting->getmenuacc($id);
        $data['laporan'] = $this->M_Setting->getmenulaporan($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] =$this->db->get_where('tb_user', ['id_user' => $iduser])->result();
        $this->load->view('user/v_euser',$data); 
        $this->load->view('template/footer');
    }

    function edittipe($tipe)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['activeMenu'] = '1';
        $data['master'] = $this->M_Setting->getmenumaster($id);
        $data['setting'] = $this->M_Setting->getmenusetting($id);
        $data['transaksi'] = $this->M_Setting->getmenutransaksi($id);
        $data['produksi'] = $this->M_Setting->getmenuproduksi($id);
        $data['stok'] = $this->M_Setting->getmenustok($id);
        $data['acc'] = $this->M_Setting->getmenuacc($id);
        $data['laporan'] = $this->M_Setting->getmenulaporan($id);
        $this->load->view('template/sidebar.php', $data);
        $data['tipeedit'] = $this->M_User->gettipe($tipe);
        $data['tipe'] = $this->M_User->gettipeuser();
        $this->load->view('user/v_etipeuser',$data); 
        $this->load->view('template/footer');
    }

    function edituser()
    {   
        $this->M_User->edit();
        $this->session->set_flashdata('SUCCESS', "Record Update Successfully!!");
        redirect('user');
    }

    function hapus($id){
        $where = array('id_user' => $id);

        $this->M_Setting->delete($where,'tb_user');
        $this->session->set_flashdata('SUCCESS', "Record Delete Successfully!!");
        redirect('user');
    }

}