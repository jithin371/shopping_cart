<?php
class Model_api extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		
	}

	

	function subcategory()//category id is passed in var name returns subcategory under that category 
	{
		// echo "model le function ";
		if(isset($_REQUEST['name']))
		{
			//echo $type=gettype($_REQUEST['name']);
              $str =$_REQUEST['name'];

              if (preg_match('/^[0-9]+$/', $str))
               


		{		
               


			$data['fk_int_cat_id']=$this->input->get_post('name');
			$this->db->select('*');
			$this->db->from('tbl_sub_category');
			$where=$this->db->where($data);
			$query=$this->db->get();
	       	if($query->result())
			{
				$response['data'] =$query->result();
				$response['error_code']="200 success";
				 echo  json_encode($response);
				 // echo "if il";

			}

			else
			{
				$response['data']="No matching data found";
				$response['error_code']="500";
				 echo json_encode($response);
				// echo "else il";
			}
		
	}
	else
	{
		$response['data'] ="Invalid input format";
				$response['error_code']="500 error";
				echo json_encode($response);

	}
   }
	else 
	{
		$response['data']="no input provided";
		$response['error_code']="500 ";
		//.echo "last else ";
		  echo json_encode($response);
	}
       // return json_encode($response);

	}



	function insert_category()
	{
		if(isset($_REQUEST['category']))
			{
				 $str=$_REQUEST['category'];
				 if (preg_match('/^[0-9]+$/', $str))
				 {
				 	$response['data'] ="Invalid input format";
				$response['error_code']="500 error";
				echo json_encode($response);


				 }
				 else
				 {
			$data['vchr_cat_name']=$this->input->get_post('category');


			if(	$this->db->query("call csp_insert_category(?)",$data))
				{
				$response['data']="Data successfully inserted";
				$response['error_code']="200";
				 echo json_encode($response);
				}
	  			 else {
	    		$response['data']="Error in data insertion";
				$response['error_code']="500";
				 echo json_encode($response);
	    		} 

	    }
	   
	}
	 else
	    {
         $response['data']="no input provided";
		$response['error_code']="500 ";
		//.echo "last else ";
		  echo json_encode($response);
          
	    }
	    }



		
	function view_category()
	{

		$query=$this->db->query('select * from tbl_category');
		
		if($query->result())
		{
				$response['data']= $query->result();
				$response['error_code']="200";
				 echo json_encode($response);
        }
           else
        {
          $response['data']="error";
				$response['error_code']="500";	
        }

	}


   function editbtnsub()
	{
		if(isset($_REQUEST['id'])&&isset($_REQUEST['subcat_name']))
		{

			$str1=$_REQUEST['id'];
			$str=$_REQUEST['subcat_name'];
			 if (preg_match('/^[0-9]+$/', $str))
				 {
				 	$response['data'] ="Invalid input format for subcat_name";
					$response['error_code']="500 error";
					echo json_encode($response);
                 }
                 if (preg_match('/^[a-z]+$/', $str1))
				 {
				 	$response['data'] ="Invalid input format for id";
					$response['error_code']="500 error";
					echo json_encode($response);
                 }




		$data['cat']=$this->input->post('id');
		$data['name']=$this->input->post('subcat_name'); 
		// echo $this->input->post('didd');

		if($this->db->query('call csp_update_sub_category(?,?)',$data))
		{
			$response['data']="successfully updated";
			$response['error_code']="200";
			echo json_encode($response);

		}

	   }
	   else
	   {
         $response['data']="no input provided";
		$response['error_code']="500 ";
		//.echo "last else ";
		  echo json_encode($response);
          

	   }

	}


function m_delsubcategory()
{
if(isset($_REQUEST['name']))
{
$str=$_REQUEST['name'];
if (preg_match('/^[0-9]+$/', $str))
{

$data['pk_int_sub_id']=$this->input->post('name');
if( $this->db->query('call csp_delete_sub_category(?)',$data))
{

$response['data']="successfully deleted";
$response['error_code']="200";
echo json_encode($response);
}


}
else
{
$response['data'] ="Invalid input format";
$response['error_code']="500 error";
echo json_encode($response);


}
}
else
{
$response['data']="no input provided";
$response['error_code']="500 ";
//.echo "last else ";
 	echo json_encode($response);

}
}



	



}

