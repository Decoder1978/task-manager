<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timers extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
  public function start_timer(){
    $response['result']="success";
    $task= $this->Crud_model->get_one("tasks",$this->input->post("task_id"));
    if(!empty($task)){
      $data=array(){
        "task_id"=>$this->input->post("task_id"),
        "start"=>$this->input->post("start"),
        "end"=>$this->input->post("task_id"),
        "stopped"=>0
      }
      $this->Crud_model->insert("timers",$data);
    }
    else{
      $result['result']="fail";
      $result['error']="Task doesn't exist";
    }
    echo json_encode($response);
  }
}
