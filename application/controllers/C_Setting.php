<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Setting extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Setting');
    }
    
    public function get_kota(){
            // Ambil data ID Provinsi yang dikirim via ajax post
            $id = $this->input->post('id_provinsi');
            
            $kota = $this->M_Setting->getkota($id);
            
            // Buat variabel untuk menampung tag-tag option nya
            // Set defaultnya dengan tag option Pilih
            $lists = "<option value=''>Pilih</option>";
            
            foreach($kota as $data){
              $lists .= "<option value='".$data->id_kota."'>".$data->name_kota."</option>"; // Tambahkan tag option ke variabel $lists
            }
            
            $callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function get_kecamatan(){
            // Ambil data ID Provinsi yang dikirim via ajax post
            $id = $this->input->post('id_kota');
            
            $kec = $this->M_Setting->getkec($id);
            
            // Buat variabel untuk menampung tag-tag option nya
            // Set defaultnya dengan tag option Pilih
            $lists = "<option value=''>Pilih</option>";
            
            foreach($kec as $data){
              $lists .= "<option value='".$data->id_kecamatan."'>".$data->kecamatan."</option>"; // Tambahkan tag option ke variabel $lists
            }
            
            $callback = array('list_kec'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }



    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['activeMenu'] = '7';
        $data['master'] = $this->M_Setting->getmenumaster($id);
        $data['setting'] = $this->M_Setting->getmenusetting($id);
        $data['transaksi'] = $this->M_Setting->getmenutransaksi($id);
        $data['produksi'] = $this->M_Setting->getmenuproduksi($id);
        $data['stok'] = $this->M_Setting->getmenustok($id);
        $data['acc'] = $this->M_Setting->getmenuacc($id);
        $data['laporan'] = $this->M_Setting->getmenulaporan($id);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('setting/v_akses',$data); 
        $this->load->view('template/footer');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['activeMenu'] = '7';
        $data['master'] = $this->M_Setting->getmenumaster($id);
        $data['setting'] = $this->M_Setting->getmenusetting($id);
        $data['transaksi'] = $this->M_Setting->getmenutransaksi($id);
        $data['produksi'] = $this->M_Setting->getmenuproduksi($id);
        $data['stok'] = $this->M_Setting->getmenustok($id);
        $data['acc'] = $this->M_Setting->getmenuacc($id);
        $data['laporan'] = $this->M_Setting->getmenulaporan($id);
        $this->load->view('template/sidebar.php', $data);
        $akses['akses'] = $this->M_Setting->getakses($ida);
        $akses['tipeuser']= $ida;
        $this->load->view('setting/v_vakses',$akses); 
        $this->load->view('template/footer');
    }

    public function edit()
    { 
        if(isset($_POST['save']))
        {

            $iduser= $this->input->post('id');
            $this->M_Setting->refresh($iduser);//Call the modal
        
            $submenu = $this->input->post('submenu');//Pass the userid here
            $checkbox = $this->input->post('view'); 
            for($i=0;$i<count($checkbox);$i++){
                $sub = $submenu[$i];
                $view = $checkbox[$i];
                $this->M_Setting->editv($iduser,$sub,$view);//Call the modal
                
            }

            $addbox = $this->input->post('add'); 
            for($i=0;$i<count($addbox);$i++){
                $sub = $submenu[$i];
                $add = $addbox[$i];
                $this->M_Setting->edita($iduser,$sub,$add);//Call the modal
                
            }

            $editbox = $this->input->post('edit'); 
            for($i=0;$i<count($editbox);$i++){
                $sub = $submenu[$i];
                $edit = $editbox[$i];
                $this->M_Setting->edite($iduser,$sub,$edit);//Call the modal
                
            }

            $deletebox = $this->input->post('delete'); 
            for($i=0;$i<count($deletebox);$i++){
                $sub = $submenu[$i];
                $delete = $deletebox[$i];
                $this->M_Setting->editd($iduser,$sub,$delete);//Call the modal
                
            }
            $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
            redirect('setting');
        }
    }
}
