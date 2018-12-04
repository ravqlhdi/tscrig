    <!-- Jquery Core Js -->
    <script src="<?php echo site_url('assets/admin/')?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo site_url('assets/admin/')?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo site_url('assets/admin/')?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="<?php echo site_url('assets/admin/')?>plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="<?php echo site_url('assets/admin/') ?>plugins/dropzone/dropzone.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo site_url('assets/admin/')?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo site_url('assets/admin/')?>plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo site_url('assets/admin/')?>plugins/jquery-countto/jquery.countTo.js"></script>


    <!-- Custom Js -->
    <script src="<?php echo site_url('assets/admin/')?>js/admin.js"></script>

    <!-- CKeditor -->
    <script type="text/javascript" src="<?php echo site_url('assets/ckeditor/')?>ckeditor.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo site_url('assets/admin/')?>js/demo.js"></script>
    <script type="text/javascript">
      $('#optgroup').multiSelect({ selectableOptgroup: true });
      Dropzone.options.frmFileUpload = {
        autoProcessQueue: false,
        paramName: "file",
        maxFilesize: 1
      };
      console.log();
    </script>
