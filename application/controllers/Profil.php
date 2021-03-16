<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Profil extends CI_Controller{

        public function __construct(){

            parent::__construct();
            $this->load->model('Profil_model');
            $this->load->model('Admin_model');
            $this->load->helper('url_helper');

        }

        public function index(){

            $data['clients'] = $this->Admin_model->getClient();
            $data['resa'] = $this->Admin_model->getResa();
            
            $this->load->view('header.php');
            if(!isset($this->session->mail)){

                $this->load->view('connexion_page');

            }else{

                $this->load->view('profil_page', $data);

            }
            $this->load->view('footer.php');

        }

        public function form_validation(){

            $this->load->library('form_validation');  
            if($this->input->post('submit')){
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
                        var_dump($user);
                        $userData = array(
                            'id' => $user[0]->id,
                            'lastname' => $user[0]->lastname,
                            'firstname' => $user[0]->firstname,
                            'mail' => $user[0]->mail,
                            'password' => $user[0]->password,
                            'address' => $user[0]->address,
                            'city' => $user[0]->city,
                            'zipCode' => $user[0]->zipCode,
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
            
            if($this->input->post('modifProfil')){
               
                $this->form_validation->set_rules("lastname", "lastname", "required", array("required" => "Saisir un nom"));
                $this->form_validation->set_rules("firstname", "firstname", "required", array("required" => "Saisir un prénom"));
                $this->form_validation->set_rules("mail", "mail", "required", array("required" => "Saisir un email"));
                $this->form_validation->set_rules("password", "password", "required", array("required" => "Saisir un mot de passe"));
                $this->form_validation->set_rules("address", "address", "required", array("required" => "Saisir une adresse"));
                $this->form_validation->set_rules("city", "city", "required", array("required" => "Saisir une ville"));
                $this->form_validation->set_rules("zipCode", "zipCode", "required", array("required" => "Saisir une code postal"));
                
                if($this->form_validation->run()){
                    
                    $data = array(  
                        "lastname"  =>$this->input->post("lastname"),
                        "firstname" =>$this->input->post("firstname"),  
                        "mail"      =>$this->input->post("mail"),  
                        "password"  =>$this->input->post("password"),
                        "address"   =>$this->input->post("address"),
                        "city"      =>$this->input->post("city"),
                        "zipCode"   =>$this->input->post("zipCode")
                   ); 

                   $this->Admin_model->updateClient($data, $this->input->post("hid_idCli"));  
                   $this->index();
                }
            }
        }

        public function deleteResa(){

            if($this->input->post('deleteResa')){

                $this->Admin_model->deleteResa($this->input->post('delete_idResa'));
                $this->index();

            }else{

                $this->index();

            }

        }
    }
?>