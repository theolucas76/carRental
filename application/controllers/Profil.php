<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Profil extends CI_Controller{

        public function __construct(){

            parent::__construct();
            $this->load->model('Profil_model');
            $this->load->helper('url_helper');

        }

        public function index(){

            $this->load->view('header.php');
            if(!isset($this->session->mail)){

                $this->load->view('connexion_page');

            }else{

                $this->load->view('profil_page');

            }
            $this->load->view('footer.php');

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
                
                if($this->Profil_model->connexion($data)){

                    $user = $this->Profil_model->connexion($data);  
                    
                    $userData = array(
                        'lastname' => $user[0]->lastname,
                        'firstname' => $user[0]->firstname,
                        'mail' => $user[0]->mail,
                        'password' => $user[0]->password,
                        'userType' => $user[0]->userType
                    );

                    $this->session->set_userdata($userData);
                    $session = $this->session->userdata();
                    var_dump($session);
                    if($session['userType'] == null){

                        redirect(base_url() . 'profilUser');

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