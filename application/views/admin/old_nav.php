<nav class="navbar topnavbar navbar-expand-lg navbar-light">
   <!-- START navbar header-->
   <div class="navbar-header">
      <a class="navbar-brand" href="">
         <div class="brand-logo">
            <img class="img-fluid" src="<?php echo base_url()?>/assets/admin/img/logo.png" alt="App Logo">
         </div>
         <div class="brand-logo-collapsed">
            <img class="img-fluid" src="<?php echo base_url()?>/assets/admin/img/logo-single.png" alt="App Logo">
         </div>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topnavbar">
         <span class="navbar-toggler-icon"></span>
      </button>
   </div>
   <!-- END navbar header-->
   <!-- START Nav wrapper-->
   <div class="navbar-collapse collapse" id="topnavbar">

      <ul class="nav navbar-nav mr-auto flex-column flex-lg-row">
         <!-- beranda, usulan, user, skpd, log, laporan, userprofile  -->
         <?php
         $nav = $menu;
         foreach ($nav as $key => $value) { ?>
           <?php
            $main_link = site_url(str_replace("#","",$value->menu_link));
             if (strpos($value->menu_link, '#') !== false) { ?>
               <li class="nav-item dropdown">
                 <a id="<?php echo $main_link ?>SubMenu" class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-toggle="dropdown" onclick="getSubmenu('<?php echo $main_link?>',<?php echo $value->menu_id?>)"><?php echo $value->menu_name;?></a>
                  <div class="dropdown-menu animated fadeIn" id='subMenu<?php echo $main_link ?>'>
                    <a class="dropdown-item" href="<?php echo $main_link ?>"><?php echo $value->menu_name;?></a>
                  </div>
               </li>
                <?php
              }else{
              ?>
              <li class="nav-item"><a class="nav-link" href="<?php echo site_url($value->menu_link)?>"><?php echo $value->menu_name?></a></li>
            <?php
                }
              }
            ?>
      </ul>
      <!-- END Left navbar-->
      <!-- START Right Navbar-->
      <ul class="navbar-nav flex-row">
         <!-- START lock screen-->

      <li class="nav-item dropdown dropdown-list">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-toggle="dropdown">
               <em  ></em>&nbsp;<?php echo $this->session->userdata('username');?>
            </a>
      </li>

<!-- 
         <li class="nav-item dropdown dropdown-list">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-toggle="dropdown">
               <em class="icon-bell"></em>&nbsp;Pemberitahuan
               <span class="badge badge-danger">11</span>
            </a>
            <!-- START Dropdown menu-->
            <div class="dropdown-menu dropdown-menu-right animated flipInX">
               <div class="dropdown-item">
                  <!-- START list group-->
                  <div class="list-group">
                     <!-- list item-->
                     <div class="list-group-item list-group-item-action">
                        <div class="media">
                           <div class="align-self-start mr-2">
                              <em class="fa fa-twitter fa-2x text-info"></em>
                           </div>
                           <div class="media-body">
                              <p class="m-0">New followers</p>
                              <p class="m-0 text-muted text-sm">1 new follower</p>
                           </div>
                        </div>
                     </div>
                     <!-- list item-->
                     <div class="list-group-item list-group-item-action">
                        <div class="media">
                           <div class="align-self-start mr-2">
                              <em class="fa fa-envelope fa-2x text-warning"></em>
                           </div>
                           <div class="media-body">
                              <p class="m-0">New e-mails</p>
                              <p class="m-0 text-muted text-sm">You have 10 new emails</p>
                           </div>
                        </div>
                     </div>
                     <!-- list item-->
                     <div class="list-group-item list-group-item-action">
                        <div class="media">
                           <div class="align-self-start mr-2">
                              <em class="fa fa-tasks fa-2x text-success"></em>
                           </div>
                           <div class="media-body">
                              <p class="m-0">Pending Tasks</p>
                              <p class="m-0 text-muted text-sm">11 pending task</p>
                           </div>
                        </div>
                     </div>
                     <!-- last list item-->
                     <div class="list-group-item list-group-item-action">
                        <span class="d-flex align-items-center">
                           <span class="text-sm">More notifications</span>
                           <span class="badge badge-danger ml-auto">14</span>
                        </span>
                     </div>
                  </div>
                  <!-- END list group-->
               </div>
            </div>
            <!-- END Dropdown menu-->
        <!--  </li> -->
         <!-- END Alert menu-->
         <!-- START Offsidebar button-->
         <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('auth/logout')?>" data-toggle-state="offsidebar-open" data-no-persist="true">
               <em class="icon-logout"></em>&nbsp;Keluar
            </a>
         </li>
         <!-- END Offsidebar menu-->
      </ul>
      <!-- END Right Navbar-->
   </div>
   <!-- END Nav wrapper-->
   <!-- START Search form-->
   <form class="navbar-form" role="search" action="http://themicon.co/theme/angle/v3.8.9.1/html5jquery-bs4/app/search.html">
      <div class="form-group">
         <input class="form-control" type="text" placeholder="Type and hit enter ...">
         <div class="fa fa-times navbar-form-close" data-search-dismiss=""></div>
      </div>
      <button class="d-none" type="submit">Submit</button>
   </form>
   <!-- END Search form-->
</nav>
