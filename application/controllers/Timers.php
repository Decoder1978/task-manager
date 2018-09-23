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
      $data=array(
        "task_id"=>$this->input->post("task_id"),
        "start"=>$this->input->post("start"),
        "stopped"=>0
			);
      $timer_id=$this->Crud_model->insert("timers",$data);
			$response['timer_id']=$timer_id;
    }
    else{
      $response['result']="fail";
      $response['error']="Task doesn't exist";
    }
    echo json_encode($response);
  }

	public function stop_timer(){
    $response['result']="success";
    $timer= $this->Crud_model->get_one("timers",$this->input->post("timer_id"));
    if(!empty($timer)){
      $data=array(
        "end"=>$this->input->post("end"),
        "stopped"=>1
      );
      $this->Crud_model->update("timers",$this->input->post("timer_id"),$data);
    }
    else{
      $result['result']="fail";
      $result['error']="Timer doesn't exist";
    }
    echo json_encode($response);
  }

}
