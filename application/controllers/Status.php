<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
  public function index(){
    $status= $this->Crud_model->get_all("status");
    $data['title']= "Status";
		$data['view_path']="status/status";
		$data['status']=$status;
		$this->load->view("index",$data);
  }
	public function add_status(){
		$this->form_validation->set_rules("name","Status Name","trim|required");
		if(!$this->form_validation->run()){
			$data['title']= "Add Status";
			$data['view_path']="status/add_status";
			$this->load->view("index",$data);
		}
		else{
			$data=array(
				"name"=>$this->input->post("name")
			);
			$this->Crud_model->insert("status",$data);
			$this->session->set_flashdata("success","Status Added Successfully!");
			redirect(base_url("Status"));
		}
	}

	public function edit_status($id){
		$this->form_validation->set_rules("name","Status Name","trim|required");
		if(!$this->form_validation->run()){
			$status=$this->Crud_model->get_one("status",$id);
			$data['title']= "Edit Status";
			$data['status']= $status;
			$data['view_path']="status/edit_status";
			$this->load->view("index",$data);
		}
		else{
			$data=array(
				"name"=>$this->input->post("name")
			);
			$this->Crud_model->update("status",$id,$data);
			$this->session->set_flashdata("success","Status Updated Successfully!");
			redirect(base_url("Status"));
		}
	}

	public function delete_status($id){
		$this->Crud_model->delete("status",$id);
		$this->session->userdata("success","Status Deleted Successfully!");
		redirect(base_url("Status"));
	}

}
