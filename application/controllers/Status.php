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
}
