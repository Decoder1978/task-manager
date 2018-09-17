<div class="container">
  <form method="POST" action="">
    <div class="form-group">
      <label for="task">Task</label>
      <textarea name="task" class="form-control" id="task" rows="3"><?=$task->task?></textarea>
    </div>
    <div class="form-group">
      <label for="start_date">Start Date</label>
      <input name="start_date" type="start_date" class="form-control" id="start_date"  value="<?=$task->start_date?>">
    </div>
    <div class="form-group">
      <label for="deadline">Deadline</label>
      <input name="deadline" type="deadline" class="form-control" id="deadline"  value="<?=$task->deadline?>" >
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select name="status" class="form-control" id="status">
        <?php foreach ($status as $one) {
          ?>
            <option <?$one->id==$task->status?"selected":""?> value="<?=$one->id?>"><?$one->name?></option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="notes">Notes</label>
      <textarea name="notes" class="form-control" id="notes" rows="5"><?=$task->notes?></textarea>
    </div>
    <button type="submit" class="btn btn-secondary">Submit</button>
  </form>

</div>
