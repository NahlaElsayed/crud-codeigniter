<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {


	public function __construct() {
		parent::__construct(); 
		$this->load->model('Employee_model');
	}

	public function index(){
		
		$this->load->view('layout/header');   
		 $this->load->view('Employee');
		 $this->load->view('layout/footer');  
	}

	
	public function getRecord(){
		$result = $this->Employee_model->getAll();
		 echo json_encode($result) ;
		
	}


	public function dataInsert(){
	

		$data= array(
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password'),
			'remarks'=>$this->input->post('remarks'),
			'status'=>$this->input->post('status'),	
		);

		$result = $this->Employee_model->insertData($data);
		echo $result;

		
	}

	public function dataDelete(){
		$ID=$this->input->post('id');
		$this->db->delete('employees', array('id'=>$ID));

	

	}


  public function getRecordById(){
		$ID=$this->input->post('id');
		 $resultID= $this->Employee_model->getById($ID);
		echo json_encode($resultID) ;
		

	}
	
	public function dataUpdate(){
		$ID=$this->input->post('id');

		$data= array(
			'first_name'=>$this->input->post('frist_name'),
			'last_name'=>$this->input->post('last_name'),
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password'),
			'remarks'=>$this->input->post('remarks'),
			'status'=>$this->input->post('status'),	
		);

	echo $result = $this->Employee_model->updateData($data ,$ID);
	
		
		

	

	}



}
