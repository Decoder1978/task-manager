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
            <?= $one->task ?>
          </td>
          <td>
            <?=$one->deadline ?>
          </td>
          <td>
            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-clock"></i></a>
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
