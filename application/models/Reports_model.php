<?php

class Reports_model extends CI_Model{
  public function get_tasks($filter){
    $this->db->select("tasks.*, status.name as status_name");
    if($filter['start_date']){
      $this->db->where("tasks.start_date",$filter['start_date']);
    }
    if($filter['deadline']){
      $this->db->where("tasks.deadline",$filter['deadline']);
    }
    if($filter['status']){
      $this->db->where("tasks.status",$filter['status']);
    }
    $this->db->from("tasks");
    $this->db->join("status","status.id = tasks.status","left");
    $query=$this->db->get();
    return $query->result();
  }
  public function calculate_hours($date){
    $this->db->select("SUM(TIMESTAMPDIFF(SECOND,start,end)) as hours");
    $this->db->where("DATE_FORMAT(start,'%Y-%m-%d') >=",$date);
    $this->db->where("end IS NOT NULL");
    $this->db->from("timers");
    $query=$this->db->get();
    return $query->row()->hours;
  }
}
