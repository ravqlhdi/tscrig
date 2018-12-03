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
          <?php echo $breadcrumbs;?>
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
                              <label class="form-label">Nama User</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="<?php echo $name[1];?>" placeholder="Masukan Nama User">
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Password</label>
                                <div class="form-line">
                                    <input type="password" class="form-control" name="<?php echo $name[2];?>" placeholder="Masukan Password">
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Alamat Email</label>
                                <div class="form-line">
                                    <input type="email" class="form-control" name="<?php echo $name[3];?>" placeholder="Masukan Alamat Email">
                                </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label">User Status</label>
                            <select class="form-control show-tick" name="<?php echo $name[4] ?>">
                                <option value="active">Active</option>
                                <option value="non-active">Non Active</option>
                            </select>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label">User Group</label>
                            <select class="form-control show-tick" name="<?php echo $name[5] ?>">
                              <?php foreach ($select_group as $key => $value): ?>
                                <option value="<?php echo $value->group_id ?>"><?php echo $value->group_name; ?></option>
                              <?php endforeach; ?>
                            </select>
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
