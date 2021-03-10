<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends CI_Controller{
        
        public function __construct(){

            parent::__construct();
            $this->load->model("Admin_model");  
            $this->load->helper('url_helper');

        }

        public function index(){

            $data['cars'] = $this->Admin_model->getCar();
            $data['available'] = $this->Admin_model->getAvailableCar();
            $data['clicli'] = $this->Admin_model->getClient();
            $data['resa'] = $this->Admin_model->getResa();
            $this->load->view('header.php');
            $this->load->view('admin_page', $data);
            $this->load->view('footer.php');

        }
    }