 <?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_Model {

    public function saveUser(){
    	$data=array(
		'email' 	       => $this->input->post('email'), 
        'username'         => $this->input->post('username'), 
		'password' 	       => sha1($this->input->post('password')), 
		'confirm_password' => sha1($this->input->post('confirm_password')), 
               
			);
		$this->db->insert('user',$data);
        $result=$this->db->insert_id();
		return $result;
    }

    public function user($username,$password){  
            
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $qu=$this->db->get('user');
        if($qu->num_rows()>0){   
        return $qu->result();
        }
     }



}
