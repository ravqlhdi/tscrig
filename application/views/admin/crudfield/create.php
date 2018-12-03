<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>TAMBAH DATA</h2>
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
                      <form  method="post" class='form_<?php echo $current_page; ?>' accept-charset="utf-8" action="<?php echo site_url(''.$current_page.'/store?id='.$id);?>">
                        <div class="row clearfix">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Variable Name</label>
                                <div class="form-line">
                                    <input type="hidden" class="form-control" name="crud_id" placeholder="Masukan Nama Menu" value="">
                                    <input type="text" class="form-control" name="<?php echo $name[1];?>" placeholder="Masukan Nama Variable">
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Nama Field</label>
                                <div class="form-line">
                                    <input type="hidden" class="form-control" name="crud_id" placeholder="Masukan Nama Menu" value="">
                                    <input type="text" class="form-control" name="<?php echo $name[2];?>" placeholder="Masukan Nama Field">
                                </div>
                            </div>
                          </div>

                        </div>

                        <div class="row clearfix">
                          <div class="col-md-6">
                            <label class="form-label">Type</label>
                            <select class="form-control show-tick" name="<?php echo $name[3] ?>">

                                <?php foreach ($input_type as $key => $value): ?>
                                  <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="form-label">Show</label>
                              <select class="form-control show-tick" name="<?php echo $name[4] ?>">
                                  <option value="true">Show</option>
                                  <option value="false">Matikan</option>
                              </select>
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
