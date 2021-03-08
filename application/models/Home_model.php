<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Home_model extends CI_Model{

        public function __construct(){

            $this->load->database();

        }

        public function getAllCar(){

            $this->db->select('*');
            $this->db->from('voiture');
            $query = $this->db->get();
            return $query->result();

        }

        
    }

?>