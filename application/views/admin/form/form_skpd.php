<form  method="post" class='form_<?php echo $source; ?>' accept-charset="utf-8" action="<?php echo $input_action;?>">
  <div class="form-group">
     <label>Kode SKPD</label>
     <input class="form-control" name="<?php echo $name[0];?>" placeholder="Masukan Kode SKPD" type="text">
  </div>
  <div class="form-group">
     <label>Nama</label>
     <input class="form-control" name="<?php echo $name[1];?>" placeholder="Masukan Nama" type="text">
  </div>
  <div class="form-group">
     <label>Alamat</label>
     <input class="form-control" name="<?php echo $name[2];?>" placeholder="Masukan Alamat" type="text">
  </div>

  <div style="float:right">
  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
  </div>

</form>
