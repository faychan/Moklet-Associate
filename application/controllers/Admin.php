<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct() {
        parent::__construct();
//        $this->load->library('form_validation');
//        $this->load->library('encryption');
//        $this->load->library('pagination');
//        $this->load->library('google');
        $this->load->model('m_db');
        $this->load->model('m_feature');
//        $this->load->model('m_action');
//        $this->load->model('m_user');
    }

    function index() {
        $data["main_view"] = 'dashboard_view';
        $this->load->view('admin_side',$data);
    }


    function admin_profile(){
        $data['userData'] = $this->session->userdata('userData');
        $data['main_view'] = 'profile';
        $this->load->view('admin_side', $data);
    }

    function log() {
        $data["main_view"] = 'tables_view';
        $data['angkatan_jurusan'] = $this->m_feature->get_data_angkatan_jurusan();
        $data['alumni'] = $this->m_db->get_data();
        $this->load->view('admin_side',$data);
    }

    function add_temp() {
        $id = $this->uri->segment(3);
        if($this->m_db->temp_insert($id) == TRUE ) {
            //redirect(base_url('index.php/admin/'),'refresh');
        }else{
           echo "aw";
           //redirect(base_url('index.php/admin/stranger_data/'),'refresh');
        }
    }
    //end form function

    //start data view

    function stranger_data() {
        $data["main_view"] = 'temp_view';
        $data['angkatan_jurusan'] = $this->m_feature->get_temp_angkatan_jurusan();
        $data['alumni'] = $this->m_db->get_data_temp();
        $data['temp'] = 'temp';
        $this->load->view('admin_side',$data);
    }
}
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/22/18
 * Time: 12:48 PM
 */