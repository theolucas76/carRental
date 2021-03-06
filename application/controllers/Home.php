<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller{

        public function __construct(){

            parent::__construct();
            $this->load->model('Home_model');
            $this->load->model("Admin_model");  
            $this->load->helper('url_helper');

        }

        public function index(){
                
            $data['cars'] = $this->Home_model->getCar();
            $this->load->view('header.php');
            $this->load->view('home_page', $data);
            $this->load->view('footer.php');

        }

        public function logOut(){

            if($this->input->post('logOut') || $this->input->post('logOutAdmin') ){

                $this->session->sess_destroy();
                redirect(base_url() ,'refresh');
                
            }
        }

        public function form_validation(){

            $this->load->library('form_validation');  
            $this->form_validation->set_rules("mail", "mail", 'required', array('required'=>'Saisir votre mot de passe'));
            $this->form_validation->set_rules("password", "password", 'required', array('required'=>'Saisir votre mot de passe'));  

            if($this->form_validation->run())  
            {  
             
                $data = array(  
                    
                    "mail"      =>$this->input->post("mail"),
                    "password"  =>$this->input->post("password")

                );
                
                if($this->Home_model->connexion($data)){

                    $user = $this->Home_model->connexion($data);  
                    
                    $userData = array(
                        'lastname' => $user[0]->lastname,
                        'firstname' => $user[0]->firstname,
                        'mail' => $user[0]->mail,
                        'password' => $user[0]->password,
                        'userType' => $user[0]->userType
                    );

                    $this->session->set_userdata($userData);
                    $session = $this->session->userdata();
                    
                    if($session['userType'] == null){

                        redirect(base_url() . 'profil');

                    }else{

                        redirect(base_url() . 'admin');

                    }
                }
                
            }else{

                $this->index();

            }
        }

    }

?>