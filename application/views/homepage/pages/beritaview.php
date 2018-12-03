<section class="g-bg-gray-dark-v1 g-color-white g-py-50">
  <div class="container">
    <div class="d-sm-flex text-center">
      <div class="align-self-center">
        <h2 class="h3 g-font-weight-300 w-100 g-mb-10 g-mb-0--md">Berita</h2>
      </div>

      <div class="align-self-center ml-auto">
        <ul class="u-list-inline">
          <li class="list-inline-item g-mr-5">
            <a class="u-link-v5 g-color-white g-color-primary--hover" href="<?php echo site_url('homepage'); ?>">Home</a>
            <i class="g-color-gray-light-v2 g-ml-5">/</i>
          </li>
          <li class="list-inline-item g-color-primary">
            <span>Berita</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
    <!-- Blog Minimal Blocks -->
    <div class="container g-pt-100 g-pb-20">
      <div class="row justify-content-between">
        <div class="col-lg-9 g-mb-80">
          <div class="g-pr-20--lg">
            <?php
              foreach($beritaview as $b) {
            ?>  
            <!-- Blog Minimal Blocks -->
            <article class="g-mb-100">
              <div class="g-mb-30">
                <div class="media g-mb-25">
                  <!-- <img class="d-flex g-width-40 g-height-40 rounded-circle mr-2" src="<?php echo base_url('assets/homepage/')?>img-temp/100x100/img7.jpg" alt="Image Description"> -->
                  <div class="media-body">
                    <h4 class="h6 g-color-primary mb-0"><a href="#!"><?php echo $b->user_name?></a></h4>
                    <span class="d-block g-color-gray-dark-v4 g-font-size-12"><?php echo $b->berita_postdate?></span>
                  </div>
                </div>

                <!-- <img class="img-fluid w-100 g-mb-25" src="<?php echo base_url('assets/homepage/')?>img-temp/740x380/img1.jpg" alt="Image Description"> -->
                <h2 class="h4 g-color-black g-font-weight-600 mb-3"><a class="u-link-v5 g-color-black g-color-primary--hover" href="#!"><?php echo $b->berita_title?></a></h2>
                <p class="g-color-gray-dark-v4 g-line-height-1_8">
                  <?php echo $b->berita_content?>
                </p>
              </div>

              <ul class="d-flex justify-content-end list-inline g-brd-y g-brd-gray-light-v3 g-font-size-13 g-py-13 mb-0">
                <li class="list-inline-item mr-auto">
                  <i class="align-middle g-color-primary g-font-size-default mr-1 icon-medical-022 u-line-icon-pro"></i>
                  <a class="g-color-gray-dark-v4 g-color-primary--hover g-transition-0_3 g-text-underline--none--hover" href="#!"></a>
                </li>
                <li class="list-inline-item mr-4">
                  <i class="align-middle g-color-primary g-font-size-default mr-1 icon-finance-206 u-line-icon-pro"></i>
                  <a class="d-inline-block g-color-gray-dark-v4 g-text-underline--none--hover" href="#!">0 Comments</a>
                </li>
                <li class="list-inline-item">
                  <i class="align-middle g-color-primary g-font-size-default mr-1 fa fa-bookmark-o"></i>
                  <a class="d-inline-block g-color-gray-dark-v4 g-text-underline--none--hover" href="#!">Bookmark</a>
                </li>
              </ul>
            </article>
            <!-- End Blog Minimal Blocks -->


            <?php

              }
            ?>
            
           
          </div>
        </div>

        <div class="col-lg-3 g-brd-left--lg g-brd-gray-light-v4 g-mb-80">
          <div class="g-pl-20--lg">
            <!-- Links -->
            <div class="g-mb-50">
              <h3 class="h5 g-color-black g-font-weight-600 mb-4">Kategori</h3>
              <ul class="list-unstyled g-font-size-13 mb-0">
                <?php 
                  foreach($kategoriberita as $k) {
                ?>
                  <li><a class="d-block u-link-v5 g-color-gray-dark-v4 rounded g-px-20 g-py-8" href="<?php echo site_url('homepage/?page=kategoriberita&id='.$k->kategoriberita_id)?>"><i class="mr-2 fa fa-angle-right"></i> <?php echo $k->kategoriberita_name ?></a>
                <?php
                  }
                ?>
               
              </ul>
            </div>
            <!-- End Links -->

            <hr class="g-brd-gray-light-v4 g-mt-50 mb-0">

            <div id="stickyblock-start" class="js-sticky-block g-sticky-block--lg g-pt-50" data-start-point="#stickyblock-start" data-end-point="#stickyblock-end">

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Blog Minimal Blocks -->
