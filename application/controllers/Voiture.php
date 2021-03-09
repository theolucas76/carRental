<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Voiture extends CI_Controller{

        public function __construct(){

            parent::__construct();
            $this->load->model('Home_model');
            $this->load->helper('url_helper');

        }

        public function index(){

            $data['cars'] = $this->Home_model->getCar();
            $data['available'] = $this->Home_model->getAvailableCar();
            $this->load->view('header.php');
            $this->load->view('voiture_page', $data);
            $this->load->view('footer.php');

        }

    }

?>