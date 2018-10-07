$(document).ready(function(){
  $(".delete_task").click(function(){
    var id = $(this).attr("data-id");
    var conf= confirm("Are you sure you want to delete this task?");
    if(conf){
      window.location= base_url+"Tasks/delete_task/"+id;
    }
  });

  $(document).on("click",".start_timer",function(){
    var current=$(this);
    var task_id= current.attr("task_id");
    $.ajax({
      url: base_url +"Timers/start_timer",
      type: "POST",
      data:{"task_id":task_id},
      success: function(response){
        response= JSON.parse(response);
        if(response.result=="success"){
          current.addClass("stop_timer");
          current.addClass("btn-danger");
          current.removeClass("start_timer");
          current.removeClass("btn-success");
          current.attr("timer_id",response.timer_id);
        }
      }
    });

  });

  $(document).on("click",".stop_timer",function(){
    var current=$(this);
    var timer_id= current.attr("timer_id");
    $.ajax({
      url: base_url +"Timers/stop_timer",
      type: "POST",
      data:{"timer_id":timer_id},
      success: function(response){
        response= JSON.parse(response);
        if(response.result=="success"){
          current.removeClass("stop_timer");
          current.removeClass("btn-danger");
          current.addClass("start_timer");
          current.addClass("btn-success");
        }
      }
    });

  });

  $(".delete_timer").click(function(){
    var id = $(this).attr("data-id");
    var conf= confirm("Are you sure you want to delete this timer?");
    if(conf){
      window.location= base_url+"Timers/delete_timer/"+id;
    }
  });

});
