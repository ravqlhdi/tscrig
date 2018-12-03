<form  method="post" class='form_<?php echo $source; ?>' accept-charset="utf-8" action="<?php echo $input_action;?>">
  <div class="form-group">
     <label>Judul Profile</label>
     <input class="form-control" name="<?php echo $name[0];?>" placeholder="Judul Profile" type="text">
  </div>
  <div class="form-group">
     <label>Isi Profile</label>
     <input class="form-control" name="<?php echo $name[1];?>" placeholder="Isi Profile" type="text">
  </div>
  
  <input type="hidden" name="<?php echo $name[2];?>" value="<?php echo date('Y-m-d')?>">
  <input type="hidden" name="<?php echo $name[3];?>" value="<?php echo date('h:i:s')?>">
  <input type="hidden" name="<?php echo $name[4];?>" value="<?php echo $this->session->userdata('id')?>">

  <div style="float:right">
  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
  </div>

</form>
