<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct(){
		parent::__construct();
    $this->load->model("Reports_model");
	}

  public function index(){
    //hours spent in the past week
    $week_start=date("Y-m-d", strtotime(" - 1 weeks "));
    $week_hours= $this->Reports_model->calculate_hours($week_start);
    //hours spent in the past month
    $month_start=date("Y-m-01");
    $month_hours= $this->Reports_model->calculate_hours($month_start);
    // filter tasks by start_date, deadline, status
    $filter=array(
      "start_date"=>$this->input->post("start_date")?$this->input->post("start_date"):NULL,
      "deadline"=>$this->input->post("deadline")?$this->input->post("deadline"):NULL,
      "status"=>$this->input->post("status")?$this->input->post("status"):NULL
    );
    $tasks=$this->Reports_model->get_tasks($filter);

    $data['title']="Reports";
    $data['view_path']="reports/index";
    $data['tasks']= $tasks;
    $data['week_hours']=$week_hours;
    $data['month_hours']=$month_hours;
    $this->load->view("index",$data);
  }
}
