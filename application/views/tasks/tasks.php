<div class="container">
  <div class="row mb-4">
    <div class="col-sm-12 text-center">
      <a class="btn btn-info" href="<?=base_url()?>Tasks/add_task">Add Task</a>
    </div>
  </div>
  <div class="row">
    <table class="col-sm-12 table table-hover">
      <thead>
        <th>
          #
        </th>
        <th>
          Task
        </th>
        <th>
          Deadline
        </th>
        <th>
          Timer
        </th>
        <th>
          Action
        </th>
      </thead>
      <tbody>
        <?php
$i=0;
        foreach ($tasks as $one) {
          $i++;
          ?>
        <tr>
          <td>
            <?= $i ?>
          </td>
          <td>
            <a href="<?=base_url()?>Tasks/task/<?=$one->id?>"><?= $one->task ?></a>
          </td>
          <td>
            <?=$one->deadline ?>
          </td>
          <td>
            <?php if($one->unstopped){ ?>
              <a title="Stop Timer" class="btn btn-sm btn-danger stop_timer" timer_id="<?=$one->timer_id?>" task_id="<?=$one->id?>" href="#"><i class="fa fa-clock"></i></a>
              <?php
            }
            else{
            ?>
            <a title="Start Timer" class="btn btn-sm btn-success start_timer" task_id="<?=$one->id?>" href="#"><i class="fa fa-clock"></i></a>
          <?php } ?>
          </td>
          <td>
            <div class="btn-group">
              <a class="btn btn-sm btn-warning" href="<?=base_url()?>Tasks/edit_task/<?=$one->id?>"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger delete_task" data-id="<?=$one->id?>" href="#"><i delete_task" data-id="<?=$one->id?>" class="fa fa-trash"></i></a>
            </div>
          </td>
        </tr>
        <?php
      }?>
      </tbody>
    </table>
  </div>
</div>
