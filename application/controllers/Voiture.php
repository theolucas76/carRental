<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Voiture extends CI_Controller{

        public function __construct(){

            parent::__construct();
            $this->load->model('Home_model');
            $this->load->model('Admin_model');
            $this->load->helper('url_helper');

        }

        public function index(){

            $data['cars'] = $this->Home_model->getAllCar();
            $data['available'] = $this->Home_model->getAvailableCar();
            $data['services'] = $this->Admin_model->getService();

            $this->load->view('header.php');
            $this->load->view('voiture_page', $data);
            $this->load->view('footer.php');

        }

        public function form_validation(){

            $this->load->library('form_validation');  

            if($this->input->post('newResa')){

                    
                $this->form_validation->set_rules("date_debut", "date_debut", "required", array('required' => 'Choisir une date'));
                $this->form_validation->set_rules("date_fin", "date_fin", "required", array('required' => 'Choisir une date'));
                $this->form_validation->set_rules("id_service", "id_service", "required", array('required' => 'Choisir un service'));
                $this->form_validation->set_rules("id_voiture", "id_voiture", "required", array('required' => 'Choisir une voiture'));
                $this->form_validation->set_rules("id_client", "id_client", "required", array('required' => 'Choisir un client'));

                if($this->form_validation->run()){

                    $dataResa = array(
                        "date_debut" => $this->input->post('date_debut'),
                        "date_fin" => $this->input->post('date_fin'),
                        "id_service" => $this->input->post('id_service'),
                        "id_voiture" => $this->input->post('id_voiture'),
                        "id_client" => $this->input->post('id_client')
                    );

                    $this->Home_model->insertResa($dataResa);
                    $this->index();
                }else{

                    $this->index();

                }
            }

        }
            

    }

?>