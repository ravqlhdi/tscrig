
<?php echo form_open_multipart("agenda/input", "class='form_agenda'"); ?>
  <div class="form-group">
    <label>Judul Agenda</label>
    <input class="form-control" name="<?php echo $name[0];?>" placeholder="Judul Agenda" type="text">
  </div>
  <div class="form-group">
     <label>Tanggal Agenda</label>
     <input class="form-control" name="<?php echo $name[1];?>" placeholder="Tanggal Agenda" type="date">
  </div>
  <div class="form-group">
    <label>Tempat Agenda</label>
    <input class="form-control" name="<?php echo $name[2];?>" placeholder="Tempat Agenda" type="text">
  </div>
  <div class="form-group">
    <label>Detail Agenda</label>
    <input class="form-control" name="<?php echo $name[3];?>" placeholder="Detail Agenda" type="text">
  </div>
 <div class="form-group">
     <label>File Agenda</label>
     <input class="form-control" name="<?php echo $name[4];?>" placeholder="File Agenda" type="file">
  </div>


  <div style="float:right">
    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
  </div>
</form>
