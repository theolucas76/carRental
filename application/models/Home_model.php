<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Home_model extends CI_Model{

        public function __construct(){

            $this->load->database();

        }

        public function connexion($data){

            $array = array('mail' => $data['mail']);
            $this->db->select('*');
            $this->db->from('client');
            $this->db->where($array);
            $co = $this->db->get();
            $queryMail =  $co->result();

            if(!$queryMail){

                echo 'Mauvaise adresse email';

            }elseif($queryMail[0]->password != $data['password']){

                echo 'Mauvais mot de passe';

            }else{

                echo 'Vous êtes connecté';
                return $co->result();
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
            $this->db->group_by('marque.brand');
            $query = $this->db->get();
            return $query->result();

        }

        public function getAvailableCar(){
            
            $date = date('Y-m-d');
            $this->db->from('voiture');
            $this->db->join('contrat', 'voiture.id = contrat.id_voiture', 'left');
            $this->db->join('marque', 'marque.id = voiture.id_marque');
            $this->db->join('modele', 'modele.id = voiture.id_modele');
            $this->db->join('carburant', 'carburant.id = voiture.id_carburant');
            $this->db->join('couleur', 'couleur.id = voiture.id_couleur');
            $this->db->where('date_fin = ', null);
            $this->db->or_where('date_fin < ', $date);
            $this->db->group_by('voiture.id');
    
            $query = $this->db->get();
            return $query->result();


        }
        public function insertResa($data){

            if($this->db->insert('contrat', $data)){

                redirect(base_url(). 'profilUser');

            }

        }

        
    }

?>