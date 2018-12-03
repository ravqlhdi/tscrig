<form  method="post" class='form_<?php echo $source; ?>' accept-charset="utf-8" action="<?php echo $input_action;?>">
  <div class="form-group">
    <label>Username</label>
    <select class="custom-select custom-select-md" name="<?php echo $name[0];?>">
      <option >Pilih Menu</option>
      <?php foreach ($all_menu as $key => $value): ?>
        <option value="<?php echo $value->menu_id?>"><?php echo $value->menu_name ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div style="float:right">
  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
  </div>

</form>
