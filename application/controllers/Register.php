<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Register extends CI_Controller{
        
        public function __construct(){

            parent::__construct();
            $this->load->model("Register_model");  
            $this->load->helper('url_helper');

        }

        public function index(){

            $this->load->view('header.php');
            $this->load->view('register_page');
            $this->load->view('footer.php');

        }

        public function form_validation(){
            
            $this->load->library('form_validation');  
            $this->form_validation->set_rules("lastname", "lastname", 'required', array('required'=>'Saisir votre nom'));
            $this->form_validation->set_rules("firstname", "firstname", 'required', array('required'=>'Saisir votre prénom'));  
            $this->form_validation->set_rules("mail", "mail", 'required|is_unique[client.mail]',array('required'=>'Saisir votre email','is_unique'=>'déjà utilisé'));   
            $this->form_validation->set_rules("password", "password", "required", array('required'=>'Saisir un mot de passe'));
            $this->form_validation->set_rules("address", "address", "required", array('required'=>'Saisir votre adresse'));
            $this->form_validation->set_rules("city", "city", "required", array('required'=>'Saisir une ville'));
            $this->form_validation->set_rules("zipCode", "zipCode", "required", array('required'=>'Saisir un code postal')); 

            if($this->form_validation->run())  
            {  
             
                $data = array(  
                    "firstname" =>$this->input->post("firstname"),  
                    "lastname"  =>$this->input->post("lastname"),
                    "mail"      =>$this->input->post("mail"),
                    "password"  =>$this->input->post("password"),
                    "address"   =>$this->input->post("address"),
                    "city"      =>$this->input->post("city"),
                    "zipCode"   =>$this->input->post("zipCode") 
                );
               
                    $this->Register_model->insert_data($data);  
                    
                    redirect(base_url() . "profilUser");  
    
            }else{

                $this->index();

            }
           
        }
    }