<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->library('pagination');
		$this->load->library('google');
		$this->load->model('m_db');
		$this->load->model('m_feature');
		$this->load->model('m_action');
		$this->load->model('m_user');
	}
	
	function index() {
		if($this->session->userdata('loggedIn') == true ) {
			redirect('home/logged_in_home/');
		}else if($this->session->userdata('logged_admin')  == true ) {
			redirect('admin/');
		}else{
			redirect('home/front');
		}
	}
	
	function page() {
		$data['main_view'] = 'page';
		$data['alumni'] = $this->m_db->get_data();
		$this->load->view('template',$data);
	}
	
	function front() {
		$validated_email = $this->session->flashdata('email');
		if($this->session->userdata('loggedIn') != TRUE || $this->session->userdata('logged_admin') != TRUE){	
			$data['loginURL'] = $this->google->loginURL();
			
			if($validated_email == 1) {
				$data['notif'] = 'Email Not Valid';
			}
			
			$data['background'] = base_url().'assets/img/e88b4a89-349f-425b-a5f9-e2ff685032fb.jpg';
			$data['transparent'] = 'style="background: rgba(0, 0, 0, 0.3); text-shadow: 0px 1px 5px #444;"';
			$data['main_view'] = 'front';
			$this->load->view('template',$data);
		}else{
			redirect('home/logged_in_home/');
		}
	}
	
	function logged_in_home() {
		$data['background'] = base_url().'assets/img/e88b4a89-349f-425b-a5f9-e2ff685032fb.jpg';
		$data['transparent'] = 'style="background: rgba(0, 0, 0, 0.3); text-shadow: 0px 1px 5px #444;"';
        $data['main_view'] = 'redirect';
		$this->load->view('template',$data);
	}
	//end home page
	
	//start account function
	function login() {
		if(isset($_GET['code'])){
			$this->google->getAuthenticate();
			
			$gpInfo = $this->google->getUserInfo();
			
			$userData['oauth_provider'] = 'google';
			$userData['oauth_uid'] 		= $gpInfo['id'];
			$userData['first_name'] 	= $gpInfo['given_name'];
			$userData['last_name'] 		= $gpInfo['family_name'];
			$userData['email'] 			= $gpInfo['email'];
			$userData['gender'] 		= !empty($gpInfo['gender'])?$gpInfo['gender']:'';
			$userData['locale'] 		= !empty($gpInfo['locale'])?$gpInfo['locale']:'';
			$userData['profile_url'] 	= !empty($gpInfo['link'])?$gpInfo['link']:'';
			$userData['picture_url'] 	= !empty($gpInfo['picture'])?$gpInfo['picture']:'';
			
			$userID = $this->m_user->checkUser($userData);
		}
		$validate_email = $gpInfo['email'];
		$corp = stripos( $validate_email , '@student.smktelkom-mlg.sch.id' );
		$guru = stripos( $validate_email , '@smktelkom-mlg.sch.id' );

		if( $validate_email == 'nor.iffat32@gmail.com' || $guru > 0){
			$this->session->set_userdata('logged_admin', true);
			$this->session->set_userdata('userData', $userData);
			$this->session->set_userdata('userDataID', $userData['oauth_uid']);
			redirect('home/logged_in_home/');
		}else{
			if( $corp < 1 ) {
				$this->m_user->UnValidUser($validate_email);
				
				$this->session->set_flashdata('email',1);
				redirect('home/front/');
			}else{
				$this->session->set_userdata('loggedIn', true);
				$this->session->set_userdata('userData', $userData);
				$this->session->set_userdata('userDataID', $userData['oauth_uid']);
				redirect('home/logged_in_home/');
			}
		}
	}

	function logout(){
		if($this->session->userdata('loggedIn') == TRUE) {
			$this->m_user->DelcheckUser($this->session->userdata('userDataID'));
			
			$this->session->unset_userdata('loggedIn');
			$this->session->unset_userdata('userData');
			$this->session->sess_destroy();
		}else{
			if($this->session->userdata('userDataID') == true){
				$this->m_user->DelcheckUser($this->session->userdata('userDataID'));
			}
			$this->session->unset_userdata('logged_admin');
			$this->session->unset_userdata('userData');
			$this->session->sess_destroy();
		}
		redirect('/home/front/');
    }
	
	function user_profile(){
		$data['userData'] = $this->session->userdata('userData');
		$data['main_view'] = 'profile';
		$this->load->view('template', $data);
	}
	//end account function

	//start form function
	function form() {
		$data['main_view'] = 'form_view';
		$data['id_diri'] = $this->m_db->manual_id_diri();
		$data['id_lulus'] = $this->m_db->manual_id_lulus();
		$this->load->view('template',$data);
	}
	
	function form_input() {
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|JPG|png|gif|jpeg';
		$config['max_size'] = 5000;

		$this->load->library('upload', $config);
		if($this->upload->do_upload('foto')) {
			if($this->m_db->insert_data($this->upload->data()) == TRUE ) {
			 redirect(base_url('index.php/home/form/'),'refresh');
			}else{
				echo "aw";
				redirect(base_url('index.php/home/form/'),'refresh');
			}
		}else{
			echo $this->upload->display_errors();
		}
	}
	//end form function
	
	//start data view
	function view_data() {		
		$data['main_view'] = 'data_view';
		$data['angkatan_jurusan'] = $this->m_feature->get_data_angkatan_jurusan();
		$data['alumni'] = $this->m_db->get_data();
		$this->load->view('template',$data);
		
	}
		
	//end data view

	//start action function
	function detail_data() {
		$data['main_view'] = 'detail_view';			
		$id = $this->uri->segment(3);
		$name = $this->uri->segment(4);
		$name = str_replace('%20', ' ', $name);
		$dec_name = $this->encryption->decrypt($name);
		$data['detail'] = $this->m_action->detail_data($id,$dec_name);
		$this->load->view('template', $data);
	}
	
	function delete_data() {
		$id = $this->uri->segment(3);
		$name = $this->uri->segment(4);
		$image = $this->uri->segment(5);
		$name = str_replace('%20', ' ', $name);
		$image = str_replace('%20', ' ', $image);
		$data['detail'] = $this->m_action->delete($id,$name);
		unlink(FCPATH.'uploads/'.$image);
		redirect(base_url('index.php/home/view_data/'));
	}

	//end action function
	
	//start search
	function data_view() {
		$data['main_view'] = 'input';
		$data['angkatan_jurusan'] = $this->m_feature->get_data_angkatan_jurusan();
		$this->load->view('template',$data);
	}
	
	function search(){
		$sn1 = $this->uri->segment(3);
		$snk1 = str_replace("_", "/ ", $this->uri->segment(3));
		$snk2 = str_replace("_", "/ ", $this->uri->segment(4));
		$sn = array($sn1,$snk1,$snk2);
		$data['result'] = $this->m_feature->search($sn);
		$this->load->view('output',$data);
	}
	//end search
}
