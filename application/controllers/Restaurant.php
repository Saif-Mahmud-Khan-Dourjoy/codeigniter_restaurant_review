<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Restaurant extends CI_Controller {

    public function __construct() {
             parent::__construct();
             // $this->load->model('restaurantmodel');
            
    }

    public function add_restaurant(){

    	header("Access-Control-Allow-Origin:*");
          $offer_image=$this->input->post('offer_image');
          $image=$this->input->post('image');
          $userid=$this->input->post('userid');
          $name=$this->input->post('name');
          $country=$this->input->post('country');
          $state=$this->input->post('state');
          $place=$this->input->post('place');
          $food_type=$this->input->post('food_type');
          $bin1  = base64_decode($offer_image);
          $bin2 = base64_decode($image);
          
          $im  = imageCreateFromString($bin1);
          $name1=$name.'.jpg';
          $img_file = 'uploads/offer/restaurant/'.$name1;
          imagejpeg($im, $img_file, 0);

          $im1 = imageCreateFromString($bin2);
          $name2=$name.'.jpg';
          $img_file1 = 'uploads/restaurant/'.$name2;
          imagejpeg($im1, $img_file1, 0);

        $data=array(
		'name' 	       => $name, 
		'user_id' 	       => $userid, 
    'country'         => $country, 
		'state' 	       => $state, 
		'place' => $place,
		'food_type' => $food_type,
		'offer' => $img_file,
		'image' => $img_file1,
               
			);
        $this->db->insert('restaurant',$data);
        $result=$this->db->insert_id();
           
             if(!empty($result)){
             	echo $result;
             }
             else {
             	echo 0;
             }  

          
    }

    public function add_food(){

    	header("Access-Control-Allow-Origin:*");
          $offer_image=$this->input->post('offer_image');
          $image=$this->input->post('image');
          $userid=$this->input->post('userid');
          $restaurant_id=$this->input->post('restaurant_id');
          $name=$this->input->post('name');
          $food_type=$this->input->post('food_type');
          $bin1  = base64_decode($offer_image);
          $bin2 = base64_decode($image);
          
          $im  = imageCreateFromString($bin1);
          $name1=$name.'.jpg';
          $img_file = 'uploads/offer/food/'.$name1;
          imagejpeg($im, $img_file, 0);

          $im1 = imageCreateFromString($bin2);
          $name2=$name.'.jpg';
          $img_file1 = 'uploads/food/'.$name2;
          imagejpeg($im1, $img_file1, 0);

        $data=array(
		'name' 	       => $name, 
		'user_id' 	       => $userid, 
		'res_id' 	       => $restaurant_id, 
		'type' => $food_type,
		'offer' => $img_file,
		'image' => $img_file1,
               
			);
        $this->db->insert('food',$data);
        $result=$this->db->insert_id();
           
             if(!empty($result)){
             	echo $result;
             }
             else {
             	echo 0;
             }  

          
    }




}