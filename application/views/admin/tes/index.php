<section class="content">
  <div class="container-fluid">
    <div class="block-header row">
      <div class="col-md-6">
        <h2>
          TES
        </h2>
      </div>
      <!-- breadcrumb -->
      <div class="col-md-6" style="text-align: right">
        <?php if(isset($breadcrumbs)) echo $breadcrumbs;?>
      </div>
    </div>
    <!-- Alert for or status data change -->
      <?php if (isset($status)): ?>
        <div class="alert bg-<?php echo $status['color'] ?> alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <?php echo $status['message']; ?>
        </div>
      <?php endif; ?>

      <!-- Table card section -->
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                    <div class="row clearfix" style="margin-bottom:-30px">
                      <div class="col-md-6">
                        <h2>
                            TABLE <?php echo strtoupper($current_page)?>
                            <small>Klik Tombol Action untuk aksi lebih lanjut</small>
                        </h2>
                      </div>
                      <!-- search form -->
                      <div class="col-md-6">
                        <div class="row clearfix">
                          <div class="col-md-2">
                            <?php if (isset($pagination_link)): ?>
                              <div class="row clearfix">
                                <select class="form-control show-tick" id="limit" name="" onchange="changeLimit()">
                                  <option value="10">10</option>
                                  <option value="20">20</option>
                                  <option value="50">50</option>
                                  <option value="100">100</option>
                                </select>
                              </div>
                            <?php endif; ?>
                          </div>
                          <div class="col-md-10">
                            <form method="get" action="<?php echo site_url($current_page)?>">
                              <div class="row clearfix">
                                  <div class="col-lg-8 col-md-6 col-sm-8 col-xs-12" style="margin-bottom:0px!important">
                                      <div class="form-group">
                                          <div class="form-line">
                                              <input type="text" name="key" required class="form-control" placeholder="Pencarian">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="btn-group">
                                      <button type="submit" class="btn btn-primary btn-md m-l-15 waves-effect"><i class="material-icons">search</i></button>
                                      <a href="<?php echo site_url($current_page); ?>" type="button"  class="btn btn-warning btn-md m-l-15 waves-effect"><i class="material-icons">refresh</i></a>
                                    </div>
                                  </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="body table-responsive">
                    <?php echo $this->ckeditor->editor("textarea name","default textarea value");  ?>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Default Size -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h4 class="modal-title" id="defaultModalLabel">Delete <span id='deleteItem'></span></h4>
            </div>
            <div class="modal-body">
              Apakah anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <a href="" id="deleteUrl"><button type="button" class="btn btn-link btn-danger waves-effect" style="color:white">DELETE</button></a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/script'); ?>
