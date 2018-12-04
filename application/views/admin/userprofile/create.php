<section class="content">
    <div class="container-fluid">
      <div class="block-header row">
        <div class="col-md-6">
          <h2>
              Tambah Data <?php echo ucfirst($current_page);?>
              <small>Page isian form  <?php echo $current_page?></small>
          </h2>
        </div>
        <!-- breadcrumb -->
        <div class="col-md-6" style="text-align: right">
          <?php if(isset($breadcrumbs)) echo $breadcrumbs;?>
        </div>
      </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            INPUT <?php echo strtoupper($current_page); ?>
                            <small></small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                      <?php
                      $action = base_url(''.$current_page.'/store');
                      $attributes = [];
                      echo form_open_multipart($action,$attributes)
                      ?>
                        <div class="row clearfix">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="form-label">Nama User</label>
                                <div class="form-line">
                                  <select class="form-control show-tick" name="<?php echo $name[8] ?>">
                                      <?php foreach ($select_user as $key => $user): ?>
                                        <option value="<?php echo $user->user_id ?>"><?php echo $user->user_name ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="form-label">Nama Lengkap</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="<?php echo $name[1];?>" placeholder="Masukan Nama Lengkap">
                                </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="form-label">Tempat Lahir</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="<?php echo $name[2];?>" placeholder="Masukan Tempat">
                                </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="form-label">Tanggal Lahir</label>
                                <div class="form-line">
                                    <input type="date" data-date-format="DD MMMM YYYY" class="form-control" name="<?php echo $name[3];?>" placeholder="">
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-md-6">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-control show-tick" name="<?php echo $name[4] ?>">
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Nomor Telepon</label>
                                <div class="form-line">
                                    <input type="number" class="form-control" name="<?php echo $name[5];?>" placeholder="Masukan Nama Grup">
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="form-label">Alamat</label>
                              <div class="form-line">
                                <textarea rows="4" name="<?php echo $name[6];?>" class="form-control no-resize" placeholder="Masukan Alamat"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="forn-group">
                              <label for="">Foto</label>
                              <div class="form-line">
                                <input name="userfile" type="file">

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-md-3 col-md-offset-9 col-xs-12">
                            <button class="btn btn-sm btn-warning" type="button" onclick="window.history.back();">Kembali</button>
                            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                          </div>
                        </div>
                      <?php echo form_close() ?>
                    </div>
            </div>
        </div>
        <!-- #END# Input -->

    </div>
  </section>
