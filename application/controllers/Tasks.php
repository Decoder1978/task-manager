<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Tasks_model");
	}
	public function index(){
		$tasks= $this->Crud_model->get_all("tasks");
		foreach ($tasks as $one) {
			$one->unstopped=false;
			$unstopped= $this->Tasks_model->get_unstopped_timer($one->id);
			if(!empty($unstopped)){
				$one->unstopped=true;
				$one->timer_id= $unstopped->id;
			}
		}
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
			$status= $this->Crud_model->get_all("status");
			$data['title']= "Add Task";
			$data['view_path']="tasks/add_task";
			$data['status']=$status;
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
	public function edit_task($id){
		$this->form_validation->set_rules("task","Task","trim|required");
		$this->form_validation->set_rules("start_date","Start Date","trim");
		$this->form_validation->set_rules("deadline","Deadline","trim");
		$this->form_validation->set_rules("status","Status","trim");
		$this->form_validation->set_rules("notes","Notes","trim");
		if(!$this->form_validation->run()){
			$task=$this->Crud_model->get_one("tasks",$id);
			$data['title']= "Edit Task";
			$data['task']=$task;
			$data['view_path']="tasks/edit_task";
			$this->load->view("index",$data);
		}
		else{
			$data=array(
				"task"=>$this->input->post("task"),
				"start_date"=>$this->input->post("start_date")?date("Y-m-d H:i:s",strtotime($this->input->post("start_date"))):"",
				"deadline"=>$this->input->post("deadline")?date("Y-m-d H:i:s",strtotime($this->input->post("deadline"))):"",
				"status"=>$this->input->post("status"),
				"notes"=>$this->input->post("notes")
			);
			$this->Crud_model->update("tasks",$id,$data);
			$this->session->set_flashdata("success","Task Updated Successfully!");
			redirect(base_url("Tasks"));
		}
	}

	public function delete_task($id){
		$this->Crud_model->delete("tasks",$id);
		$this->session->userdata("success","Task Deleted Successfully!");
		redirect(base_url("Tasks"));
	}

	public function task($task_id){
		$task= $this->Crud_model->get_one("tasks",$task_id);
		$task->unstopped=false;
		$unstopped= $this->Tasks_model->get_unstopped_timer($task->id);
		if(!empty($unstopped)){
			$task->unstopped=true;
			$task->timer_id= $unstopped->id;
		}
		$timers= $this->Tasks_model->get_task_timers($task_id);
		$time=$this->Tasks_model->get_task_time($task_id)->time;
		$data['title']="Task Info";
		$data['view_path']="tasks/task";
		$data['task']=$task;
		$data['timers']=$timers;
		$data['time']=$time;
		$this->load->view("index",$data);
	}

}
