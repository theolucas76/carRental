<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Register_model extends CI_Model{

        public function __construct(){

            $this->load->database();

        }

        function insert_data($data)  {  

            $this->db->insert("client", $data); 
             
        }



    }