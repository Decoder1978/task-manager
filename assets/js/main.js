$(document).ready(function(){
  $(".delete_task").click(function(){
    var id = $(this).attr("data-id");
    var conf= confirm("Are you sure you want to delete this task?");
    if(conf){
      window.location= base_url+"Tasks/delete_task/"+id;
    }
  });
});
