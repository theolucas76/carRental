<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Contact extends CI_Controller{

        public function __construct(){

            parent::__construct();
            $this->load->model('Home_model');
            $this->load->model('Admin_model');
            $this->load->model('Contact_model');
            $this->load->helper('url_helper');

        }

        public function index(){

            $this->load->view('header.php');
            $this->load->view('contact_page');
            $this->load->view('footer.php');
        }

        public function form_validation(){

            $this->load->library('form_validation');  

            if($this->input->post('insertMessage')){

                
                $this->form_validation->set_rules("email_client", "email_client", "required", array("required" => "Saisir un mail"));
                $this->form_validation->set_rules("msg", "msg", "required", array("required" => "Saisir un message"));
                $this->form_validation->set_rules("sujet", "sujet", "required", array("required" => "Saisir un sujet"));
                

                if($this->form_validation->run()){

                    $dataMsg = array(
                        "email_client" => $this->input->post('email_client'),
                        "message" => $this->input->post('msg'),
                        "sujet" => $this->input->post('sujet')
                        
                    );

                    $this->Contact_model->insertMessage($dataMsg);
                  
                }
            }


        }
    }