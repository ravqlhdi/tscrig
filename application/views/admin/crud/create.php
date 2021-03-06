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
                      <form  method="post" class='form_<?php echo $current_page; ?>' accept-charset="utf-8" action="<?php echo site_url(''.$current_page.'/store');?>">
                        <div class="row clearfix">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Nama CRUD</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="<?php echo $name[1];?>" placeholder="Masukan Nama Menu">
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Nama Table</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="<?php echo $name[2];?>" placeholder="Masukan Nama Menu">
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-md-4">
                            <label class="form-label">Tipe Table</label>
                            <select class="form-control show-tick" name="<?php echo $name[3] ?>">
                                <option value="basic">Basic</option>
                                <option value="relasi">Relasi</option>
                            </select>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label">Limit Data</label>
                            <select class="form-control show-tick" name="<?php echo $name[4]?>">
                              <option value="10">10</option>
                              <option value="20">20</option>
                              <option value="50">50</option>
                              <option value="100">100</option>
                            </select>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label">Pagination</label>
                            <select class="form-control show-tick" name="<?php echo $name[5] ?>">
                                <option value="true">Active</option>
                                <option value="false">Non-Active</option>
                            </select>
                          </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label class="form-label">Catatan</label>
                              <div class="form-line">
                                <textarea rows="4" name="<?php echo $name[6];?>" class="form-control no-resize" placeholder="Masukan Deskripsi"></textarea>
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
                      </form>
                    </div>
            </div>
        </div>
        <!-- #END# Input -->

    </div>
  </section>
