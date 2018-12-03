<form  method="post" class='form_<?php echo $source; ?>' accept-charset="utf-8" action="<?php echo $input_action;?>">
  <div class="form-group">
     <label>Username</label>
     <input class="form-control" name="<?php echo $name[0];?>" placeholder="Masukan Nama" type="text">
  </div>
  <div class="form-group">
     <label>Email</label>
     <input class="form-control" name="<?php echo $name[1];?>" placeholder="Masukan email" type="email">
  </div>
  <div class="form-group">
     <label>Password</label>
     <input class="form-control" name="<?php echo $name[2];?>" placeholder="Password" type="password">
  </div>
  <div class="form-group">
     <label>Grup User</label>
     <select class="custom-select custom-select-md" name="<?php echo $name[3];?>">
       <option >Pilih Grup User</option>
       <?php foreach ($group as $key => $value): ?>
         <option value="<?php echo $value->group_id?>"><?php echo $value->group_name ?></option>
       <?php endforeach; ?>
     </select>
  </div>
  <div class="form-group">
    <label>SKPD</label>
    <select class="custom-select custom-select-md" name="<?php echo $name[4];?>">
      <option >Pilih SKPD</option>
      <?php foreach ($skpd as $key => $value): ?>
        <option value="<?php echo $value->skpd_id?>"><?php echo $value->skpd_name ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div style="float:right">
  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
  </div>

</form>
