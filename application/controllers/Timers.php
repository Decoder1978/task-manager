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
        "start"=>date("Y-m-d H:i:s"),
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
        "end"=>date("Y-m-d H:i:s"),
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

	function add_timer($task_id){
		$this->form_validation->set_rules("start","Start","trim|required");
		$this->form_validation->set_rules("end","End","trim");
		if(!$this->form_validation->run()){
			$data['title']="Add Timer";
			$data['view_path']="timers/add_timer";
			$this->load->view("index",$data);
		}
		else{
			$data=array(
				"task_id"=>$task_id,
				"start"=>$this->input->post("start")?date("Y-m-d H:i:s",strtotime($this->input->post("start"))):NULL,
				"end"=>$this->input->post("end")?date("Y-m-d H:i:s",strtotime($this->input->post("end"))):NULL,
				"stopped"=>$this->input->post("end")?1:0
			);
			$this->Crud_model->insert("timers",$data);
			$this->session->set_flashdata("success","Timer Added Successfully!");
			redirect(base_url("Tasks/task/$task_id"));
		}
	}

	function edit_timer($timer_id){
		$this->form_validation->set_rules("start","Start","trim|required");
		$this->form_validation->set_rules("end","End","trim");
		$timer= $this->Crud_model->get_one("timers",$timer_id);
		if(!$this->form_validation->run()){
			$data['title']="Edit Timer";
			$data['timer']=$timer;
			$data['view_path']="timers/edit_timer";
			$this->load->view("index",$data);
		}
		else{
			$data=array(
				"start"=>$this->input->post("start")?date("Y-m-d H:i:s",strtotime($this->input->post("start"))):NULL,
				"end"=>$this->input->post("end")?date("Y-m-d H:i:s",strtotime($this->input->post("end"))):NULL,
				"stopped"=>$this->input->post("end")?1:0
			);
			$this->Crud_model->update("timers",$timer_id,$data);
			$this->session->set_flashdata("success","Timer Updated Successfully!");
			redirect(base_url("Tasks/task/$timer->task_id"));
		}
	}

	public function delete_timer($timer_id){
		$timer= $this->Crud_model->get_one("timers",$timer_id);
		$this->Crud_model->delete("timers",$timer_id);
		$this->session->userdata("success","Timer Deleted Successfully!");
		redirect(base_url("Tasks/task/$timer->task_id"));
	}

}
