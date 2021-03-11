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

            $this->db->from('contrat');
            $this->db->join('voiture', 'voiture.id = contrat.id_voiture');
            $this->db->join('marque', 'marque.id = voiture.id_marque');
            $this->db->join('modele', 'modele.id = voiture.id_modele');
            $this->db->join('carburant', 'carburant.id = voiture.id_carburant');
            $this->db->join('couleur', 'couleur.id = voiture.id_couleur');
            $date = date('Y-m-d');
            $this->db->where('date_fin <', $date);
            $query = $this->db->get();
            return $query->result();

        }

        public function getClient(){

            $this->db->select('*');
            $this->db->from('client');
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
    }
