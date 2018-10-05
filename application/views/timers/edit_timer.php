<div class="container">
  <form method="POST" action="">
    <div class="form-group">
      <label for="start">Start</label>
      <input name="start" type="" class="form-control" id="start" value="<?=$timer->start?>" >
    </div>

    <div class="form-group">
      <label for="end">End</label>
      <input name="end" type="" class="form-control" id="end" value="<?=$timer->end?>">
    </div>

    <button type="submit" class="btn btn-secondary">Submit</button>
  </form>

</div>
