<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller{

        public function __construct(){

            parent::__construct();
            $this->load->model('Home_model');
            $this->load->helper('url_helper');

        }

        public function index(){

            $this->load->view('header.php');
            $this->load->view('home_page');
            $this->load->view('footer.php');

        }

        public function form_validation(){

            $this->load->library('form_validation');  
            $this->form_validation->set_rules("mail", "mail", 'required', array('required'=>'Saisir votre mail'));
            $this->form_validation->set_rules("password", "password", 'required', array('required'=>'Saisir votre mot de passe'));  

            if($this->form_validation->run())  
            {  
             
                $data = array(  
                    
                    "mail"      =>$this->input->post("mail"),
                    "password"  =>$this->input->post("password"),

                );
                 //var_dump($data);
                $this->Home_model->connexion($data);  
               // redirect(base_url() . "voiture");  
    
            }else{

                $this->index();

            }
        }

    }

?>