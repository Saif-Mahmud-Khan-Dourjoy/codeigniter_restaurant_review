 <?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Reviewmodel extends CI_Model {

 function get_business_data()
 {

  return $this->db->get('restaurant');
 }

 function get_business_rating($business_id)
 {
  $this->db->select('AVG(rating) as rating');
  $this->db->from(' restaurant_review');
  $this->db->where('res_id', $business_id);
  $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row["rating"];
  }
 }

 function get_business_test($business_id)
 {
  $this->db->select('AVG(test) as test');
  $this->db->from(' restaurant_review');
  $this->db->where('res_id', $business_id);
  $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row["test"];
  }
 }

 function get_business_quantity($business_id)
 {
  $this->db->select('AVG(quantity) as quantity');
  $this->db->from(' restaurant_review');
  $this->db->where('res_id', $business_id);
  $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row["quantity"];
  }
 }


 function get_business_ambience($business_id)
 {
  $this->db->select('AVG(ambience) as ambience');
  $this->db->from(' restaurant_review');
  $this->db->where('res_id', $business_id);
  $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row["ambience"];
  }
 }

 function get_business_service($business_id)
 {
  $this->db->select('AVG(service) as service');
  $this->db->from(' restaurant_review');
  $this->db->where('res_id', $business_id);
  $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row["service"];
  }
 }



 function html_output()
 {
  $data = $this->get_business_data();
  $output = '';
  foreach($data->result_array() as $row)
  {
   $color = '';
   $rating = $this->get_business_rating($row["id"]);
   $service = $this->get_business_service($row["id"]);
   $ambience = $this->get_business_ambience($row["id"]);
   $quantity = $this->get_business_quantity($row["id"]);
   $test = $this->get_business_test($row["id"]);
   $output .= '
    
    <div class="product-grid">
        <div class="product-grid">
            <div class="item">
                <div class="product-thumb  mb_30">
                    <div class="image product-imageblock">
                        
                        <div class="button-group">
                            <div class="ind-rating">
                                <table class="table">
                                    <tr>
                                        <td>
                                            Taste
                                        </td>    
                                        <td class="text-right">
                                         <ul class="list-inline" data-test="'.$test.'" title="Average Test - '.$test.'">
                                                   ';
                                                   for($count = 1; $count <= 5; $count++)
                                                   {
                                                    if($count <= $test)
                                                    {
                                                     $color = 'color:#ffcc00;';
                                                    }
                                                    else
                                                    {
                                                     $color = 'color:#ccc;';
                                                    }

                                                    $output .= '<li title="'.$count.'" id="'.$row['id'].'-'.$count.'" data-index="'.$count.'" data-business_id="'.$row["id"].'" data-test="'.$test.'" class="test" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
                                                   }
                                                   $output .= '</ul>

                                        </td>    
                                            </tr>
                                                </table>
                                     </div>   
                                      <div class="ind-rating">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td>
                                                                            Quantity
                                                                        </td>
                                                                        <td class="text-right">                           

                                                  <ul class="list-inline" data-quantity="'.$quantity.'" title="Average Quantity - '.$quantity.'">
                                                   ';
                                                   for($count = 1; $count <= 5; $count++)
                                                   {
                                                    if($count <= $quantity)
                                                    {
                                                     $color = 'color:#ffcc00;';
                                                    }
                                                    else
                                                    {
                                                     $color = 'color:#ccc;';
                                                    }

                                                    $output .= '<li title="'.$count.'" id="'.$row['id'].'-'.$count.'" data-index="'.$count.'" data-business_id="'.$row["id"].'" data-quantity="'.$quantity.'" class="quantity" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
                                                   }
                                                   $output .= '</ul>
                                                     </td>
                                                        </tr>
                                                             </table>
                                                    </div>

                                                  <div class="ind-rating">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td>
                                                                            Ambiance
                                                                        </td>
                                                                        <td class="text-right">   



                                                               <ul class="list-inline" data-ambience="'.$ambience.'" title="Average Ambience - '.$ambience.'">
                                                               ';
                                                               for($count = 1; $count <= 5; $count++)
                                                               {
                                                                if($count <= $ambience)
                                                                {
                                                                 $color = 'color:#ffcc00;';
                                                                }
                                                                else
                                                                {
                                                                 $color = 'color:#ccc;';
                                                                }

                                                                $output .= '<li title="'.$count.'" id="'.$row['id'].'-'.$count.'" data-index="'.$count.'" data-business_id="'.$row["id"].'" data-ambience="'.$ambience.'" class="ambience" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
                                                               }
                                                               $output .= '</ul>
                                                                </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                              
                                                         <div class="ind-rating">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td>
                                                                            Service
                                                                        </td>
                                                                        <td class="text-right">





                                                                       <ul class="list-inline" data-service="'.$service.'" title="Average Service - '.$service.'">
                                                                       ';
                                                                       for($count = 1; $count <= 5; $count++)
                                                                       {
                                                                        if($count <= $service)
                                                                        {
                                                                         $color = 'color:#ffcc00;';
                                                                        }
                                                                        else
                                                                        {
                                                                         $color = 'color:#ccc;';
                                                                        }

                                                                        $output .= '<li title="'.$count.'" id="'.$row['id'].'-'.$count.'" data-index="'.$count.'" data-business_id="'.$row["id"].'" data-service="'.$service.'" class="service" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
                                                                       }
                                                                       $output .= '</ul>


                                                              </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="caption product-detail text-center">
                                                        <span class="r-name">
                                                           '.$row["name"].'
                                                        </span>
                                                        <div class="rating product-rating">
                                                            <span class="fa fa-stack">
                                                                <i class="fa fa-star fa-stack-1x"></i></span>
                                                            <span class="rating-point">'.$rating.'</span>
                                                        </div>
                                                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">Lorem Ipsum is
                                                                simply dummy text</a></h6>
                                                        <span class="price"><span class="amount"><span
                                                                    class="currencySymbol">৳</span>70.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




 
   ';
  }
  echo $output;
 }
 
 // function insert_rating($data)
 // {
 //  $this->db->insert('rating', $data);
 // }





//food
 
 function get_business_data_food()
 {

    return $this->db->get('food');
 
 }

 function get_business_rating_food($business_id)
 {
  $this->db->select('AVG(rating) as rating');
  $this->db->from(' food_review');
  $this->db->where('food_id', $business_id);

  $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row["rating"];
  }
 }

 function get_business_taste_food($business_id)
 {
  $this->db->select('AVG(taste) as taste');
  $this->db->from(' food_review');
  $this->db->where('food_id', $business_id);
  $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row["taste"];
  }
 }

 function get_business_quantity_food($business_id)
 {
  $this->db->select('AVG(quantity) as quantity');
  $this->db->from(' food_review');
  $this->db->where('food_id', $business_id);
  $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row["quantity"];
  }
 }


 function get_business_ambience_food($business_id)
 {
  $this->db->select('AVG(ambience) as ambience');
  $this->db->from(' food_review');
  $this->db->where('food_id', $business_id);
  $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row["ambience"];
  }
 }

 function get_business_service_food($business_id)
 {
  $this->db->select('AVG(service) as service');
  $this->db->from(' food_review');
  $this->db->where('food_id', $business_id);
  $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row["service"];
  }
 }



 function html_output_food()
 {
  $data = $this->get_business_data_food();
  $output = '';
  foreach($data->result_array() as $row)
  {
   $color = '';
   $rating = $this->get_business_rating_food($row["id"]);
   $service = $this->get_business_service_food($row["id"]);
   $ambience = $this->get_business_ambience_food($row["id"]);
   $quantity = $this->get_business_quantity_food($row["id"]);
   $taste = $this->get_business_taste_food($row["id"]);
   $output .= '
    
    <a href="product_detail_page.html?food_id='.$row["id"].'">
    <div class="product-grid">
        <div class="product-grid">
            <div class="item">
                <div class="product-thumb  mb_30">
                    <div class="image product-imageblock">
                        
                        <div class="button-group">
                            <div class="ind-rating">
                                <table class="table">
                                    <tr>
                                        <td>
                                            Taste
                                        </td>    
                                        <td class="text-right">
                                         <ul class="list-inline" data-taste="'.$taste.'" title="Average Taste - '.$taste.'">
                                                   ';
                                                   for($count = 1; $count <= 5; $count++)
                                                   {
                                                    if($count <= $taste)
                                                    {
                                                     $color = 'color:#ffcc00;';
                                                    }
                                                    else
                                                    {
                                                     $color = 'color:#ccc;';
                                                    }

                                                    $output .= '<li title="'.$count.'" id="'.$row['id'].'-'.$count.'" data-index="'.$count.'" data-business_id="'.$row["id"].'" data-taste="'.$taste.'" class="taste" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
                                                   }
                                                   $output .= '</ul>

                                        </td>    
                                            </tr>
                                                </table>
                                     </div>   
                                      <div class="ind-rating">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td>
                                                                            Quantity
                                                                        </td>
                                                                        <td class="text-right">                           

                                                  <ul class="list-inline" data-quantity="'.$quantity.'" title="Average Quantity - '.$quantity.'">
                                                   ';
                                                   for($count = 1; $count <= 5; $count++)
                                                   {
                                                    if($count <= $quantity)
                                                    {
                                                     $color = 'color:#ffcc00;';
                                                    }
                                                    else
                                                    {
                                                     $color = 'color:#ccc;';
                                                    }

                                                    $output .= '<li title="'.$count.'" id="'.$row['id'].'-'.$count.'" data-index="'.$count.'" data-business_id="'.$row["id"].'" data-quantity="'.$quantity.'" class="quantity" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
                                                   }
                                                   $output .= '</ul>
                                                     </td>
                                                        </tr>
                                                             </table>
                                                    </div>

                                                  <div class="ind-rating">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td>
                                                                            Ambiance
                                                                        </td>
                                                                        <td class="text-right">   



                                                               <ul class="list-inline" data-ambience="'.$ambience.'" title="Average Ambience - '.$ambience.'">
                                                               ';
                                                               for($count = 1; $count <= 5; $count++)
                                                               {
                                                                if($count <= $ambience)
                                                                {
                                                                 $color = 'color:#ffcc00;';
                                                                }
                                                                else
                                                                {
                                                                 $color = 'color:#ccc;';
                                                                }

                                                                $output .= '<li title="'.$count.'" id="'.$row['id'].'-'.$count.'" data-index="'.$count.'" data-business_id="'.$row["id"].'" data-ambience="'.$ambience.'" class="ambience" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
                                                               }
                                                               $output .= '</ul>
                                                                </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                              
                                                         <div class="ind-rating">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td>
                                                                            Service
                                                                        </td>
                                                                        <td class="text-right">





                                                                       <ul class="list-inline" data-service="'.$service.'" title="Average Service - '.$service.'">
                                                                       ';
                                                                       for($count = 1; $count <= 5; $count++)
                                                                       {
                                                                        if($count <= $service)
                                                                        {
                                                                         $color = 'color:#ffcc00;';
                                                                        }
                                                                        else
                                                                        {
                                                                         $color = 'color:#ccc;';
                                                                        }

                                                                        $output .= '<li title="'.$count.'" id="'.$row['id'].'-'.$count.'" data-index="'.$count.'" data-business_id="'.$row["id"].'" data-service="'.$service.'" class="service" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
                                                                       }
                                                                       $output .= '</ul>


                                                              </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="caption product-detail text-center">
                                                        <span class="r-name">
                                                           '.$row["name"].'
                                                        </span>
                                                        <div class="rating product-rating">
                                                            <span class="fa fa-stack">
                                                                <i class="fa fa-star fa-stack-1x"></i></span>
                                                            <span class="rating-point">'.$rating.'</span>
                                                        </div>
                                                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">Lorem Ipsum is
                                                                simply dummy text</a></h6>
                                                        <span class="price"><span class="amount"><span
                                                                    class="currencySymbol">৳</span>70.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>




 
   ';
  }
  echo $output;
 }



}





// <label style="text-danger">'.$row["product"].'</label>


