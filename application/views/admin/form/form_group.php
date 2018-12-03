<form  method="post" class='form_<?php echo $source; ?>' accept-charset="utf-8" action="<?php echo $input_action;?>">
  <div class="form-group">
     <label>Nama Group</label>
     <input class="form-control" name="<?php echo $name[0];?>" placeholder="Masukan Nama" type="text">
  </div>
  <div class="form-group">
     <label>Status</label>
     <select class="form-control" name="<?php echo $name[1];?>" >
        <option value="active">Active</option>
        <option value="non-active">Non-Active</option>
     </select>
  </div>
  <div class="form-group">
     <label>Deskripsi</label>
     <input class="form-control" name="<?php echo $name[2];?>" placeholder="Masukan Deskirpis" type="text">
  </div>
  <div style="float:right">
  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
  </div>

</form>
