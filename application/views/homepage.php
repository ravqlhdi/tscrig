<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $data['source'] = 'beranda';
    $this->load->view('homepage/head', $data);
   ?>
</head>
<body>
  <main>
    <!-- Header -->
    <header id="js-header" class="u-header u-header--static">
      <?php
        $this->load->view('homepage/nav', $data);
       ?>
    </header>
    <!-- End Header -->

    <?php
      $this->load->view('homepage/pages/'.$source.'', $data);
     ?>


    <!-- Call To Action -->
    <section class="g-bg-primary g-color-white g-pa-30" style="background-color: #F15F79!important;background-image: url(<?php echo base_url()?>assets/homepage/img/bg/pattern5.png);">
      <div class="d-md-flex justify-content-md-center text-center">
        <div class="align-self-md-center">
          <p class="lead g-font-weight-400 g-mr-20--md g-mb-15 g-mb-0--md">Untuk Melanjutkan, Silahkan Login</p>
        </div>
        <div class="align-self-md-center">
          <a class="btn btn-lg u-btn-white text-uppercase g-font-weight-600 g-font-size-12" target="_blank" href="<?php echo site_url('auth/login');?>">Login Disini</a>
        </div>
      </div>
    </section>
    <!-- End Call To Action -->

    <!-- Footer -->
    <div id="contacts-section" class="g-bg-black-opacity-0_9 g-color-white-opacity-0_8 g-py-60">
      <div class="container">
        <div class="row">
          <!-- Footer Content -->
          <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">About us</h2>
            </div>

            <p>This is about, change this to a variabla and load data from database</p>
          </div>
          <!-- End Footer Content -->

          <!-- Footer Content -->
          <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">List Post</h2>
            </div>

                <article>
                <h3 class="h6 g-mb-2">
                    <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#">
                      <p>This is post title, change this to a variabla and load data from database</p>
                    </a>
                </h3>
                <div class="small g-color-white-opacity-0_6">
                  post date here
                </div>
                </article>
                 <hr class="g-brd-white-opacity-0_1 g-my-10">

          </div>
          <!-- End Footer Content -->

          <!-- Footer Content -->
          <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Another Web</h2>
            </div>

            <nav class="text-uppercase1">
              <ul class="list-unstyled g-mt-minus-10 mb-0">
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                    <a class="g-color-white-opacity-0_8 g-color-white--hover" target='_blank' href="">Another Web</a>
                    <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                  </h4>
                </li>
              </ul>
            </nav>
          </div>
          <!-- End Footer Content -->

          <!-- Footer Content -->
          <div class="col-lg-3 col-md-6">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Contact Us</h2>
            </div>

            <address class="g-bg-no-repeat g-font-size-12 mb-0" style="background-image: url(<?php echo base_url()?>assets/homepage/img/maps/map2.png);">
          <!-- Location -->
          <div class="d-flex g-mb-20">
            <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-map-marker"></i>
              </span>
            </div>
            <p class="mb-0">Andress Here</p>
          </div>
          <!-- End Location -->

          <!-- Phone -->
          <div class="d-flex g-mb-20">
            <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-phone"></i>
              </span>
            </div>
            <p class="mb-0">Phone here</p>
          </div>
          <!-- End Phone -->

          <!-- Email and Website -->
          <div class="d-flex g-mb-20">
            <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-globe"></i>
              </span>
            </div>
            <p class="mb-0">
              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#">email here</a>
              <br>
              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Web here</a>
            </p>
          </div>
          <!-- End Email and Website -->
        </address>
          </div>
          <!-- End Footer Content -->
        </div>
      </div>
    </div>
    <!-- End Footer -->

    <!-- Copyright Footer -->
    <footer class="g-bg-gray-dark-v1 g-color-white-opacity-0_8 g-py-20">
      <div class="container">
        <div class="row">
          <div class="col-md-8 text-center text-md-left g-mb-10 g-mb-0--md">
            <div class="d-lg-flex">
              <small class="d-block g-font-size-default g-mr-10 g-mb-10 g-mb-0--md">2018 (change get years) &copy; All Rights Reserved.</small>
              <ul class="u-list-inline">
                <li class="list-inline-item">
                  <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Techno's Studio</a>
                </li>
              </ul>
            </div>
          </div>


        </div>
      </div>
    </footer>
    <!-- End Copyright Footer -->
    <a class="js-go-to u-go-to-v1" href="#!" data-type="fixed" data-position='{
       "bottom": 15,
       "right": 15
     }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
        <i class="hs-icon hs-icon-arrow-top"></i>
    </a>
  </main>

  <div class="u-outer-spaces-helper"></div>

<?php
  $this->load->view('homepage/footer', $data);
 ?>

</body>


<!-- Mirrored from htmlstream.com/preview/unify-v2.5.1/unify-main/home/home-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Jul 2018 04:57:40 GMT -->
</html>
