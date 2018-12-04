<section class="content">
  <div class="container-fluid">
      <div class="block-header row">
        <div class="col-md-6">
          <h2>
              Management <?php echo ucfirst($current_page);?>
              <small>Page untuk crud list <?php echo $current_page?> yang dapat di akses sistem</small>
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
                <div class="body">
                  <table id="mainTable" class="table table-striped table-bordered" style="cursor: pointer;">
                    <thead>
                       <tr>
                         <th>No</th>
                         <?php foreach ($table_header as $key => $value): ?>
                           <th><?php echo $key?></th>
                         <?php endforeach; ?>
                          <th class="text-center">
                            <a href="<?php echo base_url($current_page.'/create');?>"><button class="btn btn-primary btn-sm waves-effect">Tambah</button></a>
                          </th>
                       </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($for_table)): //if array data in not empty, show table?>
                        <?php
                        $no=1;
                        foreach ($for_table as $key => $value): ?>
                          <tr class="">
                            <td><?php echo $no?></td>
                            <?php
                            foreach ($table_header as $k => $v): ?>
                              <?php if ($v=='menu_icon'): ?>
                                  <td><i class="material-icons"><?php echo $value->$v;?></i><span><?php echo $value->$v;?></span></td>
                              <?php else: ?>
                                  <td><?php echo $value->$v;?></td>
                              <?php endif; ?>

                            <?php endforeach; ?>
                            <td style="text-align:center">
                              <div class="dropdown">
                                  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                      <i class="material-icons">settings</i>
                                  </a>
                                  <ul class="dropdown-menu pull-right">
                                      <li><a href="<?php echo site_url('crudfield?id='.$value->{$name[0]})?>" class=" waves-effect waves-block">CRUD Field</a></li>
                                      <li><a href="<?php echo site_url($current_page.'/edit?id='.$value->{$name[0]})?>" class=" waves-effect waves-block">Edit</a></li>
                                      <li><a href="javascript:void(0);" onclick="changeDeleteUrl(<?php echo $value->{$name[0]}.',\''.$value->{$name[1]}.'\'';?>)" class=" waves-effect waves-block" data-toggle="modal" data-target="#deleteModal">Delete</a></li>
                                  </ul>
                              </div>
                            </td>
                          </tr>
                        <?php
                        $no++;
                        endforeach;
                        ?>
                      <?php else: //else echo there is no data?>
                        <h3>Data Tidak Ditemukan</h3>
                      <?php endif; ?>

                    </tbody>
                  </table>

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
