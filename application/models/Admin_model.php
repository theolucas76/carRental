<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin_model extends CI_Model{

        public function __construct(){

            $this->load->database();

        }

        public function getAllCar(){

            
            $this->db->from('voiture');
            $query = $this->db->get();
            return $query->result();

        }

        public function getCar(){

            $this->db->from('voiture');
            $this->db->join('couleur', 'couleur.id = voiture.id_couleur');
            $this->db->join('marque', 'marque.id = voiture.id_marque');
            $this->db->join('modele', 'modele.id = voiture.id_modele');
            $this->db->join('carburant', 'carburant.id = voiture.id_carburant');
            $query = $this->db->get();
            return $query->result();

        }

        public function getAvailableCar(){

         
            $date = date('Y-m-d');
            $this->db->select('voiture.id, voiture.matriculation');
            $this->db->from('voiture');
            $this->db->join('contrat', 'voiture.id = contrat.id_voiture', 'left');
            $this->db->join('marque', 'marque.id = voiture.id_marque');
            $this->db->join('modele', 'modele.id = voiture.id_modele');
            $this->db->join('carburant', 'carburant.id = voiture.id_carburant');
            $this->db->join('couleur', 'couleur.id = voiture.id_couleur');
            $this->db->where('date_fin = ', null);
            $this->db->or_where('date_fin < ', $date);
            
            $query = $this->db->get();
            return $query->result();

        }

        public function searchCar($data){
            
            if(!empty($data)){

                $this->db->select('*');
                $this->db->from('voiture');
            
                if($data['matriculation'] != "null"){

                    $this->db->where('matriculation', $data['matriculation']);
                }
                if($data['transmission'] != "null"){

                    $this->db->where('transmission', $data['transmission']);
                }
                if($data['id_couleur'] != "null"){

                    $this->db->where('id_couleur', $data['id_couleur']);
                }
                if($data['id_marque'] != "null"){

                    $this->db->where('id_marque', $data['id_marque']);
                }
                if($data['id_modele'] != "null"){

                    $this->db->where('id_modele', $data['id_modele']);
                }
                if($data['id_carburant'] != "null"){

                    $this->db->where('id_carburant', $data['id_carburant']);
                }

                $query = $this->db->get();
                return $query->result();

            }
           
        }

        public function searchClient($data){

            if(!empty($data)){

                $this->db->select('*');
                $this->db->from('client');

                if($data['mail'] != "null"){

                    $this->db->where('mail', $data['mail']);
                }
                if($data['city'] != "null"){

                    $this->db->where('city', $data['city']);
                }
                if($data['zipCode'] != "null"){

                    $this->db->where('zipCode', $data['zipCode']);
                }

                $query = $this->db->get();
                return $query->result();

            }
        }

        public function searchResa($data){

            if(!empty($data)){
              
                $this->db->select('*');
                $this->db->from('contrat');

                if($data['id_client'] != "null"){
                    $this->db->where('id_client', $data['id_client']);
                }
                if($data['id_voiture'] != "null" ){

                    $this->db->where('id_voiture', $data['id_voiture']);
                }
                if($data['id_service'] != "null"){

                    $this->db->where('id_service', $data['id_service']);
                }
                if($data['date_fin'] != "null"){
                    $date = date('Y-m-d');
                    if($data['date_fin'] == "nonDispo" ){

                        $this->db->where('date_fin >', $date);
                    }elseif($data['date_fin'] == "dispo"){

                        $this->db->where('date_fin <', $date);
                    }
                }

                $query = $this->db->get();
                return $query->result();

            }
        }
        public function getClient(){

            $this->db->select('*');
            $this->db->from('client');
            $query = $this->db->get();
            return $query->result();

        }

        public function getCliGroup(){

            $this->db->select('*');
            $this->db->from('client');
            $this->db->group_by(array('city', 'zipCode'));
            $query = $this->db->get();
            return $query->result();
        }

        public function getResa(){

            $this->db->select('contrat.id, contrat.id_voiture, contrat.id_client, client.mail, client.lastname, client.firstname, date_debut, date_fin, voiture.matriculation, voiture.dayprice');
            $this->db->from('contrat');
            $this->db->join('voiture', 'voiture.id = contrat.id_voiture');
            $this->db->join('marque', 'marque.id = voiture.id_marque');
            $this->db->join('modele', 'modele.id = voiture.id_modele');
            $this->db->join('client', 'client.id = contrat.id_client');
            $query = $this->db->get();
            return $query->result();

        }

        public function getColor(){

            $this->db->select('*');
            $this->db->from('couleur');
            $query = $this->db->get();
            return $query->result();

        }

        public function getBrand(){

            $this->db->select('*');
            $this->db->from('marque');
            $query = $this->db->get();
            return $query->result();

        }

        public function getModel(){

            $this->db->select('*');
            $this->db->from('modele');
            $query = $this->db->get();
            return $query->result();
        }

        public function getCarbu(){

            $this->db->select('*');
            $this->db->from('carburant');
            $query = $this->db->get();
            return $query->result();

        }
        public function getService(){

            $this->db->select('*');
            $this->db->from('service');
            $query = $this->db->get();
            return $query->result();

        }

        public function updateClient($data, $id){
           
            $this->db->where("id", $id);  
            $this->db->update("client", $data); 

        }

        public function deleteClient($id){

            $this->db->where('id_client', $id);
            $this->db->delete('contrat');
            $this->db->where("id", $id);
            $this->db->delete("client");

        }  

        public function updateCar($data, $id){

            $this->db->where('id', $id);
            $this->db->update('voiture', $data);


        }

        public function deleteCar($id){

            $this->db->where('id_voiture', $id);
            $this->db->delete('contrat');
            $this->db->where('id', $id);
            $this->db->delete('voiture');

        }

        public function updateResa($data, $id){

            $this->db->where('id', $id);
            $this->db->update('contrat', $data);
        }

        public function deleteResa($id){

            $this->db->where('id', $id);
            $this->db->delete('contrat');

        }

        public function insertCar($data){
           
            if($this->db->insert('voiture', $data)){
               
                redirect(base_url() . 'admin');

            }
            redirect(base_url() . 'admin');

        }

        public function insertResa($data){

            if($this->db->insert('contrat', $data)){

                redirect(base_url(). 'admin');

            }
        }
    }
