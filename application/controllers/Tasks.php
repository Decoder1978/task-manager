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
}
