<div class="container">
  <div class="row">
    <div class="card text-white bg-warning mb-3 mr-1 col-sm-4" >
  <div class="card-body">
    <h6 class="card-title">Time Spent in the Past Week: <?=$week_hours?> hours</h6>
  </div>
</div>
<div class="card text-white bg-info mb-3 col-sm-4" >
  <div class="card-body">
    <h6 class="card-title">Time Spent in the Past Month: <?=$month_hours?> hours</h6>
  </div>
</div>
  </div>
  <div class="row mb-4">
    <div class="col-sm-12">
      <form method="POST" action="" class="form-row">
        <div class="form-group col-sm-4">
          <label for="name">Start Date</label>
          <input name="start_date" type="text" class="form-control" id="start_date" >
        </div>
        <div class="form-group col-sm-4">
          <label for="name">Deadline</label>
          <input name="deadline" type="text" class="form-control" id="deadline" >
        </div>
        <div class="form-group col-sm-4">
          <label for="name">Status</label>
          <select name="status" class="form-control" id="status">

          </select>
        </div>
        <div class="col-sm-12">
          <button type="submit" class="btn btn-secondary float-right">Submit</button>
        </div>
      </form>
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
          Start Date
        </th>
        <th>
          Deadline
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
            <?=$one->start_date ?>
          </td>
          <td>
            <?=$one->deadline ?>
          </td>
        </tr>
        <?php
      }?>
      </tbody>
    </table>
  </div>
</div>
