<form  method="post" class='form_<?php echo $source; ?>' accept-charset="utf-8" action="<?php echo $input_action;?>">
  <div class="form-group">
    <label>Username</label>
    <select class="custom-select custom-select-md" name="<?php echo $name[0];?>" readonly>
        <option value="<?php echo $for_table[0]->user_id?>"><?php echo $for_table[0]->user_name ?></option>
      </select>
  </div>
  <div class="form-group">
     <label>Nama Lengkap</label>
     <input class="form-control" name="<?php echo $name[1];?>" placeholder="Masukan Nama" type="text">
  </div>
  <div class="form-group">
     <label>Alamat</label>
     <input class="form-control" name="<?php echo $name[2];?>" placeholder="Masukan Alamat" type="text">
  </div>
  <div class="form-group">
     <label>Telepon</label>
     <input class="form-control" name="<?php echo $name[3];?>" placeholder="Telepon" type="text">
  </div>
  <div class="form-group">
     <label>NIP</label>
     <input class="form-control" name="<?php echo $name[4];?>" placeholder="Masukan Grub" type="text">
  </div>
  
  <div style="float:right">
  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
  </div>

</form>
