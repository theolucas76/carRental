<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Register_model extends CI_Model{

        public function __construct(){

            $this->load->database();

        }

        function insert_data($data)  {  


            if($this->db->insert("client", $data)){

                $this->session->set_userdata($data);
                $this->session->userdata();
                redirect(base_url() . 'profilUser');

            }
             
        }



    }