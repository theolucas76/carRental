<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends CI_Controller{
        
        public function __construct(){

            parent::__construct();
            $this->load->model("Admin_model");  
            $this->load->helper('url_helper');

        }

        public function index(){

            $data['carss'] = $this->Admin_model->getAllCar();
            $data['cars'] = $this->Admin_model->getCar();
            $data['available'] = $this->Admin_model->getAvailableCar();
            $data['clicli'] = $this->Admin_model->getClient();
            $data['resa'] = $this->Admin_model->getResa();
            $data['colors'] = $this->Admin_model->getColor();
            $data['brands'] = $this->Admin_model->getBrand();
            $this->load->view('header.php');
            $this->load->view('admin_page', $data);
            $this->load->view('footer.php');

        }

        public function form_validation(){

            $this->load->library('form_validation');  
            
            if($this->input->post('updateClient')){
               
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
                   $this->Admin_model->updateClient($data, $this->input->post("hidden_id"));  
                   $this->index();
                }
            }

            if($this->input->post('updateCar')){

                $this->form_validation->set_rules("matriculation", "matriculation", "required", array('required' => 'Saisir l\'immat'));
                $this->form_validation->set_rules("kms", "kms", "required", array('required' => 'Saisir le nb de km'));
                $this->form_validation->set_rules("transmission", "transmission", "required", array('required' => 'Saisir la transmission'));
                $this->form_validation->set_rules("dayprice", "dayprice", "required", array('required' => 'Saisir le prix à la journée'));
                $this->form_validation->set_rules("id_couleur", "id_couleur", "required", array('required' => 'Saisir la couleur'));

                if($this->form_validation->run()){
                   
                    $data = array(
                        "matriculation" =>$this->input->post("matriculation"),
                        "kms" =>$this->input->post("kms"),
                        "transmission" =>$this->input->post("transmission"),
                        "dayprice" =>$this->input->post("dayprice"),
                        "id_couleur" =>$this->input->post("id_couleur"),
                    );

                    $this->Admin_model->updateCar($data, $this->input->post('hid_idCar'));
                    $this->index();
                }

            }

            if($this->input->post('updateResa')){

                $this->form_validation->set_rules("date_debut", "date_debut", "required", array('required' => 'Saisir une date'));
                $this->form_validation->set_rules("date_fin", "date_fin", "required", array('required' => 'Saisir une date'));
                $this->form_validation->set_rules("id_client", "id_client", "required", array('required' => 'Saisir une date'));
                $this->form_validation->set_rules("id_voiture", "id_voiture", "required", array('required' => 'Saisir une date'));

                if($this->form_validation->run()){

                    $data = array(
                        "date_debut" => $this->input->post('date_debut'),
                        "date_fin" => $this->input->post('date_fin'),
                        "id_client" => $this->input->post('id_client'),
                        "id_voiture" => $this->input->post('id_voiture')
                    );

                    $this->Admin_model->updateResa($data, $this->input->post('hid_idResa'));
                    $this->index();
                }
            }
        }

        public function deleteClient(){

            if($this->input->post('deleteClient')){

                $this->Admin_model->deleteClient($this->input->post('hid_idClient'));
                $this->index();

            }else{
                $this->index();
            }
        }

        public function deleteCar(){

            if($this->input->post('deleteCar')){

                $this->Admin_model->deleteCar($this->input->post('hidden_idCar'));
                $this->index();

            }else{

                $this->index();
            }

        }
        
    }