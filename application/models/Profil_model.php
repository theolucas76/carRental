<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Profil_model extends CI_Model{

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

        
    }
?>