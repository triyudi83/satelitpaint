<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('M_Login');
		$this->load->library('session');
	}

	function index()
	{
		$this->load->view('v_login');
		
	}

	function cek_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->M_Login->get($username,$password);

		if(empty($user)){
			echo "<script>alert('Data yang anda masukkan salah');history.go(-1);</script>";			
		} else {
		    // if(md5($password) == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
        		$session = array(
		          'authenticated'=>true, // Buat session authenticated dengan value true
		          'username'=> $username,  // Buat session nip
		          'nama'=> $user->nama,
		          'id_user'=>$user->id_user, // Buat session authenticated
		          'tipeuser'=>$user->tipeuser,
		          'login' => true
		        );
		        $this->session->set_userdata($session); // Buat session sesuai $session
		        redirect('Welcome'); // Redirect ke halaman welcome
		    // }else{
		        // $this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
		    //     echo "<script>
			// 		alert('Password salah');history.go(-1);
			// 	</script>";
		    //     // redirect('C_Login'); 
		    //     // Redirect ke halaman login
		    // }
   		}
   	}


	public function logout(){
    $this->session->sess_destroy(); // Hapus semua session
    redirect('login'); // Redirect ke halaman login
	}
}
