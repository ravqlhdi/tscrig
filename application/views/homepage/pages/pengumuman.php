<section class="g-bg-gray-dark-v1 g-color-white g-py-50">
  <div class="container">
    <div class="d-sm-flex text-center">
      <div class="align-self-center">
        <h2 class="h3 g-font-weight-300 w-100 g-mb-10 g-mb-0--md">Pengumuman</h2>
      </div>

      <div class="align-self-center ml-auto">
        <ul class="u-list-inline">
          <li class="list-inline-item g-mr-5">
            <a class="u-link-v5 g-color-white g-color-primary--hover" href="<?php echo site_url('homepage'); ?>">Home</a>
            <i class="g-color-gray-light-v2 g-ml-5">/</i>
          </li>
          <li class="list-inline-item g-color-primary">
            <span>Pengumuman</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container" style="padding-top:100px;padding-bottom:100px">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-striped">
          <?php
            $heading = array('Judul Pengumuman','Isi Pengumuman','File');
           ?>
          <thead>
            <tr>
              <th style="width:15px">No</th>
              <?php foreach ($heading as $key => $value) {
                echo "<th>".$value."</th>";
              } ?>
            </tr>
          </thead>
          <tbody>
             <?php
            $i = 0;
            foreach($pengumuman as $a) {
              ?>
              <tr>
                <th scope="row"><?php echo $i+1 ?></th>
                <td><?php echo $a->pengumuman_title ?></td>
                <td><?php echo $a->pengumuman_content ?></td>
                <td><a class="btn btn-lg text-uppercase g-font-weight-600 g-font-size-12" target="_blank" href="<?php echo site_url('file/agenda/'.$a->pengumuman_file);?>">File</a></button></th>
              </tr>
              <?php
              $i++;
            } ?>

          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>
