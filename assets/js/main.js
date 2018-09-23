$(document).ready(function(){
  $(".delete_task").click(function(){
    var id = $(this).attr("data-id");
    var conf= confirm("Are you sure you want to delete this task?");
    if(conf){
      window.location= base_url+"Tasks/delete_task/"+id;
    }
  });

  $(".start_timer").click(function(){
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

});
