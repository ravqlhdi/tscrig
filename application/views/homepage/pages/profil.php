<!-- Breadcrumbs -->
    <section class="g-bg-gray-dark-v1 g-color-white g-py-50">
      <div class="container">
        <div class="d-sm-flex text-center">
          <div class="align-self-center">
            <h2 class="h3 g-font-weight-300 w-100 g-mb-10 g-mb-0--md">Profil</h2>
          </div>

          <div class="align-self-center ml-auto">
            <ul class="u-list-inline">
              <li class="list-inline-item g-mr-5">
                <a class="u-link-v5 g-color-white g-color-primary--hover" href="#!">Home</a>
                <i class="g-color-gray-light-v2 g-ml-5">/</i>
              </li>
              <li class="list-inline-item g-color-primary">
                <span>Profil</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- Figure -->


      <!-- Blog Minimal Blocks -->
      <div class="container g-pt-100 g-pb-20">
        <div class="row justify-content-between">
          <div class="col-lg-9 g-mb-80">
            <div class="g-pr-20--lg">
              <!-- Blog Minimal Blocks -->

                <?php
                  foreach($profil as $p) {
                ?>

              <figure class="row">
                <!-- Figure Image -->

                <!-- End Figure Image -->


                <!-- Figure Body -->
                <div class="col-lg-8">
                  <div class="d-flex justify-content-between g-mb-10">
                    <div class="g-mb-20">
                      <h4 class="h5 g-mb-5"><?php echo $p->profile_title?></h4>
                     
                    </div>

                   
                  </div>

                  <!-- Figure Info -->
                  <div class="g-mb-50">
                    <p><?php echo $p->profile_content?></p>
                  </div>
                  <!-- End Info -->


                </div>
                <!-- End Figure Body -->
              </figure>
              <?php
                  }
                ?>
            </div>
          </div>

          <div class="col-lg-3 g-brd-left--lg g-brd-gray-light-v4 g-mb-80">
            <div class="g-pl-20--lg">
              <!-- Links -->
              <div class="g-mb-50">
                <h3 class="h5 g-color-black g-font-weight-600 mb-4">Navigasi</h3>
                <ul class="list-unstyled g-font-size-13 mb-0">
                  <?php
                    foreach ($profil as $p) {
                  ?>
                   <li><a class="d-block u-link-v5 g-color-gray-dark-v4 rounded g-px-20 g-py-8" href="#!"><i class="mr-2 fa fa-angle-right"></i> <?php echo $p->profile_title ?></a>
                  </li>
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




    <div class="u-ns-bg-v1-bottom g-bg-white"></div>
