<?php

class Tasks_model extends CI_Model{
  function get_unstopped_timer($task_id){
    $this->db->where("task_id",$task_id);
    $this->db->where("stopped",0);
    $query=$this->db->get("timers");
    return $query->row();
  }

  function get_task_timers($task_id){
    $this->db->where("task_id",$task_id);
    $query= $this->db->get("timers");
    return $query->result();
  }

  function get_task_time($task_id){
    $this->db->select("SUM(TIMEDIFF(end,start)) as time");
    $this->db->where("task_id",$task_id);
    $this->db->where("end IS NOT NULL");
    $query= $this->db->get("timers");
    return $query->row();
  }


}
