<form  method="post" class='form_<?php echo $source; ?>' accept-charset="utf-8" action="<?php echo $input_action;?>">
 
  <div class="form-group">
     <label>Nama kategori Berita</label>
     <input class="form-control" name="<?php echo $name[0];?>" placeholder="Nama Kategori" type="text">
  </div>
  <div class="form-group">
     <label>Keterangan Kategori</label>
     <input class="form-control" name="<?php echo $name[1];?>" placeholder="Keterangan Kategori" type="text">
  </div>
  <div class="form-group">
     <label>Status Kategori</label>
     <select class="form-control" name="<?php echo $name[2];?>">
      <option value=1>Aktif</option>
      <option value=2>Tidak Aktif</option>
     </select>
  </div>

  <div style="float:right">
  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
  </div>

</form>
