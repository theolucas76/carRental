<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Contact_model extends CI_Model{

        public function __construct(){

            $this->load->database();

        }
        
        public function insertMessage($data){

            if($this->db->insert('message', $data)){
               
                redirect(base_url() . 'profilUser');

            }
            redirect(base_url() . 'contact');

        }
    }
