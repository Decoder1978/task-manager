<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$tasks= $this->Crud_model->get_all("tasks");
		$data['title']= "Tasks";
		$data['view_path']="tasks/tasks";
		$data['tasks']=$tasks;
		$this->load->view("index",$data);
	}
	public function add_task(){
		$this->form_validation->set_rules("task","Task","trim|required");
		$this->form_validation->set_rules("start_date","Start Date","trim");
		$this->form_validation->set_rules("deadline","Deadline","trim");
		$this->form_validation->set_rules("status","Status","trim");
		$this->form_validation->set_rules("notes","Notes","trim");
		if(!$this->form_validation->run()){
			$data['title']= "Add Task";
			$data['view_path']="tasks/add_task";
			$this->load->view("index",$data);
		}
		else{
			$data=array(
				"task"=>$this->input->post("task"),
				"start_date"=>$this->input->post("start_date")?date("Y-m-d H:i:s",strtotime($this->input->post("start_date"))):"",
				"deadline"=>$this->input->post("deadline")?date("Y-m-d H:i:s",strtotime($this->input->post("deadline"))):"",
				"status"=>$this->input->post("status"),
				"notes"=>$this->input->post("notes"),
				"date_added"=> date("Y-m-d H:i:s")
			);
			$this->Crud_model->insert("tasks",$data);
			$this->session->set_flashdata("success","Task Added Successfully!");
			redirect(base_url("Tasks"));
		}
	}
}
