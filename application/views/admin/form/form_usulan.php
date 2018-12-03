<?php echo form_open_multipart('usulan/input'); ?>
  <div class="row">
    <div class="col-md-12">
      <h4>Data Penanggung Jawab</h4>
    </div>
  </div>
  <div class="form-group">
    <label>SKPD</label>
    <select class="custom-select custom-select-md" name="<?php echo $name[0];?>">
      <option >Pilih SKPD</option>
      <?php foreach ($skpd as $key => $value): ?>
        <option value="<?php echo $value->skpd_id?>"><?php echo $value->skpd_name ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
     <label>Alamat</label>
     <input class="form-control" name="<?php echo $name[1];?>" placeholder="Masukan Alamat" type="text">
  </div>

  <div class="form-group row">
    <div class="col-md-6">
      <label>PA/KPA</label>
      <input class="form-control" name="<?php echo $name[2];?>" placeholder="Masukan Nama PA" type="text">
    </div>
    <div class="col-md-6">
      <label>NIP</label>
      <input class="form-control" name="<?php echo $name[3];?>" placeholder="Masukan NIP PA" type="text">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <label>PPK</label>
      <input class="form-control" name="<?php echo $name[4];?>" placeholder="Masukan Nama PPK" type="text">
    </div>
    <div class="col-md-6">
      <label>NIP</label>
      <input class="form-control" name="<?php echo $name[5];?>" placeholder="Masukan NIP PPK" type="text">
    </div>
  </div>
  <div class="form-group">
     <label>File SK PPK</label>
     <input class="form-control" name="<?php echo $name[6];?>" placeholder="" type="file">
  </div>
  <div class="form-group">
     <label>Telepon</label>
     <input class="form-control" name="<?php echo $name[7];?>" placeholder="Masukan Nomor Telepon" type="text">
  </div>

  <hr>
  <div class="row">
    <div class="col-md-12">
      <h4>Data Paket</h4>
    </div>
  </div>
  <div class="form-group">
     <label>Program</label>
     <input class="form-control" name="<?php echo $name[8];?>" placeholder="Masukan Nama Program" type="text">
  </div>
  <div class="form-group">
     <label>Kegiatan</label>
     <input class="form-control" name="<?php echo $name[9];?>" placeholder="Masukan Nama Kegiatan" type="text">
  </div>
  <div class="form-group">
     <label>Paket</label>
     <input class="form-control" name="<?php echo $name[10];?>" placeholder="Masukan Nama Paket" type="text">
  </div>
  <div class="form-group">
     <label>Sumber Dana</label>
     <input class="form-control" name="<?php echo $name[11];?>" placeholder="Masukan Sumber Dana" type="text">
  </div>
  <div class="form-group">
     <label>Tahun Anggaran</label>
     <input class="form-control" name="<?php echo $name[12];?>" placeholder="Masukan Tahun Anggaran" type="text">
  </div>
  <div class="form-group">
     <label>Jenis Kontrak</label>
     <select class="custom-select custom-select-md" name="<?php echo $name[13];?>">
       <option value="Jasa Konstruksi">Jasa Konstruksi</option>
       <option value="Jasa Konsultasi">Jasa Konsultasi</option>
       <option value="Jasa Lainnya">Jasa Lainnya</option>
       <option value="Pengadaan Barang">Pengadaan Barang</option>
     </select>
  </div>
  <div class="form-group">
     <label>Nilai Pagu</label>
     <input class="form-control" name="<?php echo $name[14];?>" placeholder="Masukan Nilai Pagu" type="text">
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <label>Nilai HPS</label>
      <input class="form-control" name="<?php echo $name[15];?>" placeholder="Masukan Nilai HPS" type="text">
    </div>
    <div class="col-md-6">
      <label>File HPS</label>
      <input class="form-control" name="<?php echo $name[16];?>" placeholder="" type="file">
    </div>
  </div>
  <div class="form-group">
     <label>Gambar Kerja</label>
     <input class="form-control" name="<?php echo $name[17];?>" placeholder="" type="file">
  </div>
  <div class="form-group">
     <label>Spesifikasi Teknis</label>
     <input class="form-control" name="<?php echo $name[18];?>" placeholder="" type="file">
  </div>
  <div class="form-group">
     <label>Dokumen KAK</label>
     <input class="form-control" name="<?php echo $name[19];?>" placeholder="" type="file">
  </div>
  <div class="form-group">
     <label>Data Penyusun Dokumen Tender</label>
     <input class="form-control" name="<?php echo $name[20];?>" placeholder="" type="file">
  </div>
  <div style="float:right">
    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
  </div>
</form>
