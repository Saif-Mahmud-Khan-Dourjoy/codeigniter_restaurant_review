<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Review extends CI_Controller {

    public function __construct() {
             parent::__construct();
             $this->load->model('reviewmodel');
            
    }

    function fetch()
 {
 	header("Access-Control-Allow-Origin:*");
  echo $this->reviewmodel->html_output();
 }

 // function insert()
 // {
 //  if($this->input->post('business_id'))
 //  {
 //   $data = array(
 //    'business_id'  => $this->input->post('business_id'),
 //    'rating'   => $this->input->post('index')
 //   );
 //   $this->star_rating_model->insert_rating($data);
 //  }
 // }




 //food

   function fetch_food()
 {
 	header("Access-Control-Allow-Origin:*");
  echo ($this->reviewmodel->html_output_food())  ;
 }

}





