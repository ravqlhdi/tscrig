<div class="content-wrapper">
  <div class="row">
    <div class="col-xl-12">
      <div class="content-heading" style="display:block">
         <div><span> Menu Navigasi</span>
            <small class="padding-top">Manajemen data <?php echo $source?></small>
         </div>
      </div>
    </div>
  </div>
  <div class="row">
     <div class="col-xl-3">
       <div class="card">
        <div class="car-header">
          <div class="card-title">
          </div>
          <div class="text-sm">
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-xl-12">
              <!-- START card-->
              <div class="card border-0">
                 <div class="row row-flush">
                    <div class="col-4 bg-info text-center d-flex align-items-center justify-content-center rounded-left">
                       <em class="fa fa-list fa-2x"></em>
                    </div>
                    <div class="col-8">
                       <div class="card-body">
                          <h4 class="mt-0"><?php echo sizeof($for_table); ?></h4>
                          <p class="mb-0 text-muted">Jumlah <?php echo $source;?></p>
                       </div>
                    </div>
                 </div>
              </div>
              <!-- END card-->
            </div>
            <div class="col-xl-12">
              <button class="btn btn-primary btn-lg col-xl-12" type="button"
                data-toggle="modal" data-target="#<?php echo $source?>ModalInput">
                <i class="fa fa-plus"></i>&nbsp;Tambah <?php echo $source;?>
              </button>
            </div>
          </div>
        </div>

       </div>
       <?php
        if (isset($status)) {
          if ($status==1) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
              </button>
             <strong>1 Data Masuk Ke Database</strong>
           </div>
        <?php
          }elseif ($status==3) {
          ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
           <strong>1 Data Telah Di Hapus</strong>
         </div>
         <?php
          }else{
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
              </button>
             <strong>Error</strong> Terjadi Kesalahan
           </div>
        <?php
          }
        }
        ?>

     </div>
     <div class="col-xl-9">
       <div class="card">
         <div class="card-header">
            <div class="card-title"><b>Tabel Data <?php echo $source;?></b></div>
            <div class="text-sm">Untuk merubah data silahkan mencari data yg
              akan di ubah dan gunakan tombol aksi untuk merubah data</div>
         </div>
         <div class="card-body">
            <table class="table table-striped my-4 w-100" id="datatable1">
               <thead>
                  <tr>
                    <?php foreach ($table_header as $key => $value): ?>
                      <th><?php echo $key?></th>
                    <?php endforeach; ?>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                 <?php
                 foreach ($for_table as $key => $value): ?>
                   <tr class="gradeA">
                     <?php
                     foreach ($table_header as $k => $v): ?>
                       <td><?php echo $value->$v;?></td>
                     <?php endforeach; ?>
                     <td>
                       <div class="btn-group">
                           <a href="<?php echo site_url('submenu?id='.$value->menu_id)?>"><button class="btn btn-primary" type="button">Sub Menu</button></a>
                           <button class="btn btn-warning" type="button" onclick="changeForm(<?php echo $value->menu_id?>)">Edit</button>
                           <button class="btn btn-danger" type="button"
                           data-toggle="modal" data-target="#<?php echo $source?>ModalDelete"
                           onclick="changeUrl(<?php echo $value->menu_id?>)">Hapus</button>

                        </div>

                     </td>
                   </tr>
                 <?php endforeach; ?>
               </tbody>
            </table>

         </div>
      </div>
     </div>
  </div>
</div>
