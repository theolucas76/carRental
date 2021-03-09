<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Home_model extends CI_Model{

        public function __construct(){

            $this->load->database();

        }

        public function connexion($data){

           var_dump($data);
           echo $data['mail'];
           if(  ){
           }
        }

        public function getAllCar(){

            $this->db->select('*');
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

        
    }

?>