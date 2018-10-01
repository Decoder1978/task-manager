<div class="container">
  <h4 class="text-success mb-4">Task Info</h4>
  <div class="row">
    <div class="col-sm-12">
      <?php if($task->unstopped){ ?>
        <a title="Stop Timer" class="btn btn-sm btn-danger stop_timer float-right" timer_id="<?=$task->timer_id?>"  task_id="<?=$task->id?>" href="#"><i class="fa fa-clock"></i></a>
        <?php
      }
      else{
      ?>
      <a title="Start Timer" class="btn btn-sm btn-success start_timer float-right" task_id="<?=$task->id?>" href="#"><i class="fa fa-clock"></i></a>
    <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <strong>Task</strong>
    </div>
    <div class="col-sm-9">
      <?=$task->task?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
        <strong>Start Date</strong>
    </div>
    <div class="col-sm-9">
      <?=$task->start_date?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <strong>  Deadline</strong>
    </div>
    <div class="col-sm-9">
      <?=$task->deadline?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <strong>Status</strong>
    </div>
    <div class="col-sm-9">
      <?=$task->status?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <strong>Notes</strong>
    </div>
    <div class="col-sm-9">
      <?=$task->notes?>
    </div>
  </div>
  <!-- BEGIN TIMERS -->
  <h4 class="text-success mb-4 mt-4">Task Timers</h4>
  <div class="row">
    <table class="col-sm-12 table table-hover">
      <thead>
        <th>
          #
        </th>
        <th>
          Start
        </th>
        <th>
          End
        </th>
        <th>
          Duration
        </th>
        <th>
          Action
        </th>
      </thead>
      <tbody>
        <?php
  $i=0;
        foreach ($timers as $one) {
          $i++;
          ?>
        <tr>
          <td>
            <?= $i ?>
          </td>
          <td>
            <?=$one->start?>
          </td>
          <td>
            <?=$one->end ?>
          </td>
          <td>
            <?php if($one->stopped){
              $duration= strtotime($one->end)- strtotime($one->start);
              $duration= ceil($duration/60);
              echo $duration." mins";
            }
            else{
              echo "Running...";
            }
            ?>
          </td>
          <td>
            <div class="btn-group">
              <a class="btn btn-sm btn-warning" href="<?=base_url()?>Timers/edit_timer/<?=$one->id?>"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger delete_timer" data-id="<?=$one->id?>" href="#"><i delete_timer" data-id="<?=$one->id?>" class="fa fa-trash"></i></a>
            </div>
          </td>
        </tr>
        <?php
      }?>
      </tbody>
    </table>
  </div>
  <!-- END TIMERS -->

</div>
