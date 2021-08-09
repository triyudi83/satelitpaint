<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Setting');
        // $this->load->model('M_Berita');
        // $this->load->model('M_User');
        // $this->load->model('M_Donasi');
        // $this->load->model('M_Level');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

	public function index()
	{
		$this->load->view('template/header.php');
		$id = $this->session->userdata('tipeuser');
        $data['activeMenu'] = '0';
        $data['master'] = $this->M_Setting->getmenumaster($id);
        $data['setting'] = $this->M_Setting->getmenusetting($id);
        $data['transaksi'] = $this->M_Setting->getmenutransaksi($id);
        $data['produksi'] = $this->M_Setting->getmenuproduksi($id);
        $data['stok'] = $this->M_Setting->getmenustok($id);
        $data['acc'] = $this->M_Setting->getmenuacc($id);
        $data['laporan'] = $this->M_Setting->getmenulaporan($id);
		$this->load->view('template/sidebar.php', $data);
		$this->load->view('template/index.php');
		$this->load->view('template/footer.php');
	}
}
