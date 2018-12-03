<form  method="post" class='form_<?php echo $source; ?>' accept-charset="utf-8" action="<?php echo $input_action;?>">
  <div class="form-group">
     <label>Kategori Berita</label>
     <select class="form-control" name="<?php echo $name[0];?>" >
        <?php
        foreach($kategoriberita as $k) {

          echo "<option value='$k->kategoriberita_id'>$k->kategoriberita_name</option>";
        }
        ?>
      </select>
    </div>
  <div class="form-group">
     <label>Judul Berita</label>
     <input class="form-control" id='babi' name="<?php echo $name[1];?>" placeholder="Judul Profile" type="text">
  </div>
  <div class="form-group">
     <label>Isi Berita</label>
     <?php echo $this->ckeditor->editor($name[2],"form-control",""); ?>
  </div>
  <div class="form-group">
     <label>File Berita</label>
     <input class="form-control" name="<?php echo $name[3];?>" type="file">
  </div>

  <div class="form-group">
     <label>Gambar Berita</label>
     <input class="form-control" name="<?php echo $name[4];?>" type="file">
  </div>

  <input type="hidden" name="<?php echo $name[3];?>" value="aaa">
  <input type="hidden" name="<?php echo $name[4];?>" value="bbbb">
  <input type="hidden" name="<?php echo $name[5];?>" value="<?php echo date('Y-m-d')?>">
  <input type="hidden" name="<?php echo $name[6];?>" value="<?php echo date('h:i:s')?>">
  <input type="hidden" name="<?php echo $name[7];?>" value="<?php echo $this->session->userdata('id')?>">

  <div style="float:right">
  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
  </div>

</form>
