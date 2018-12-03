
<?php echo form_open_multipart("Pengumuman/input", "class='form_pengumuman'"); ?>

  <div class="form-group">
    <label>Judul Pengumuman</label>
    <input class="form-control" name="<?php echo $name[0];?>" placeholder="Judul Pengumuman" type="text">
  </div>
  <div class="form-group">
     <label>Keterangan Pengumuman</label>
     <input class="form-control" name="<?php echo $name[1];?>" placeholder="Keterangan Pengumuman" type="text">
  </div>
 <div class="form-group">
     <label>File Pengumuman</label>
     <input class="form-control" name="<?php echo $name[2];?>" placeholder="File Pengumuman" type="file">
  </div>


  <div style="float:right">
    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
  </div>
</form>
