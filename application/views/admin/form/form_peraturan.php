
<?php echo form_open_multipart("peraturan/input", "class='form_peraturan'"); ?>

  <div class="form-group">
    <label>Nama Peraturan</label>
    <input class="form-control" name="<?php echo $name[0];?>" placeholder="Nama Peraturan" type="text">
  </div>
  <div class="form-group">
     <label>Keterangan Peraturan</label>
     <input class="form-control" name="<?php echo $name[1];?>" placeholder="Keterangan Peraturan" type="text">
  </div>
 <div class="form-group">
     <label>File Peraturan</label>
     <input class="form-control" name="<?php echo $name[2];?>" placeholder="File Peraturan" type="file">
  </div>


  <div style="float:right">
    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
  </div>
</form>
