<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {

    public function __construct() {
             parent::__construct();
             $this->load->model('usermodel');
            
    }

     public function register(){
    	 
         header("Access-Control-Allow-Origin:*");

        $data=array(
		'email' 	       => $this->input->post('email'), 
        'username'         => $this->input->post('username'), 
		'password' 	       => sha1($this->input->post('password')), 
		'confirm_password' => sha1($this->input->post('confirm_password')) 
               
			);
		$this->db->insert('user',$data);
        $result=$this->db->insert_id();
           
             if(!empty($result)){
             	echo 1;
             }
             else {
             	echo 0;
             }  
    }

     public function login(){

         header("Access-Control-Allow-Origin:*");

         $username=$this->input->post('username'); 
         $password=sha1($this->input->post('password'));        
         $userinfo=$this->usermodel->user($username,$password);
         
         if(!empty($userinfo))
         {
          $new=array('valid' => "yes", 'dataes' => $userinfo);
          echo json_encode($new); 
         }
         else{
          $new=array('valid' => "no");
          echo json_encode($new); 
         }

         // json_encode($userinfo);
              
          
      }




}
