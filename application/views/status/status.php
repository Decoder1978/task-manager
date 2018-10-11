<div class="container">
  <div class="row mb-4">
    <div class="col-sm-12 text-center">
      <a class="btn btn-info" href="<?=base_url()?>Status/add_status">Add Status</a>
    </div>
  </div>
  <div class="row">
    <table class="col-sm-12 table table-hover">
      <thead>
        <th>
          #
        </th>
        <th>
          Status
        </th>
        <th>
          Action
        </th>
      </thead>
      <tbody>
        <?php
$i=0;
        foreach ($status as $one) {
          $i++;
          ?>
        <tr>
          <td>
            <?= $i ?>
          </td>
          <td>
          <?=$one->name?>
          </td>
          <td>
            <div class="btn-group">
              <a class="btn btn-sm btn-warning" href="<?=base_url()?>Tasks/edit_status/<?=$one->id?>"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger delete_status" data-id="<?=$one->id?>" href="#"><i delete_status" data-id="<?=$one->id?>" class="fa fa-trash"></i></a>
            </div>
          </td>
        </tr>
        <?php
      }?>
      </tbody>
    </table>
  </div>
</div>
