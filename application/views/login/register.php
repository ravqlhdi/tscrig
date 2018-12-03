<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $data['source'] = 'login';
  $this->load->view('admin/head', $data);
  ?>
  <style>
    body {
          background: #f15f79;
          background: linear-gradient(to bottom, #f15f79 0%,#b24592 100%);
          height: 100vh;
    }
  </style>
</head>
<body class="login-page">
  <div class="login-box ">
      <div class="logo">
          <a href="<?php echo site_url() ?>">Core<b>Igniter</b></a>
          <small>One Core To Rule Them All</small>
      </div>
      <div class="card animated fadeIn">
          <div class="body ">
              <?php
               $attributes = array('id' => 'sign_in');
               echo form_open('auth/add_user', $attributes);
              ?>

                  <div class="msg">Register For Make Account</div>
                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">person</i>
                      </span>
                      <div class="form-line">
                          <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                      </div>
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">email</i>
                      </span>
                      <div class="form-line">
                          <input type="email" class="form-control" name="email" placeholder="email" required autofocus>
                      </div>
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">lock</i>
                      </span>
                      <div class="form-line">
                          <input type="password" id="txtNewPassword" class="form-control" name="password" placeholder="Password" required>
                      </div>
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">lock</i>
                      </span>
                      <div class="form-line">
                          <input type="password" id="txtConfirmPassword" onchange="checkPasswordMatch()" class="form-control" name="password" placeholder="Re-Enter Password" required>
                      </div>
                  </div>
                  <div class="registrationFormAlert" id="divCheckPasswordMatch">
                  </div>
                  <div class="row">
                      <div class="col-xs-8 p-t-5">
                          <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                          <label for="rememberme">Remember Me</label>
                      </div>
                      <div class="col-xs-4">
                          <button id="btnSubmit" class="btn btn-block bg-pink waves-effect"  type="submit">SIGN UP</button>
                      </div>
                  </div>
                  <div class="row m-t-15 m-b--20">
                      <div class="col-xs-6">
                          <a href="<?php echo site_url('auth/login') ?>">Login!</a>
                      </div>
                      <div class="col-xs-6 align-right">
                          <a href="#">Forgot Password?</a>
                      </div>
                  </div>
              </form>
          </div>
          <?php
            if(isset($query) && !$query) { ?>
              <div class="block-center mt-4 wd-xl">
                <div class="alert alert-danger" role="alert">
                   <strong>Error! </strong><?php echo $error_message?></div>
                  <!--
                   <span class="mr-2">&copy;</span>
                   <span>2018</span>
                   <span class="mr-2">-</span>
                   <span>Angle</span>
                   <br>
                   <span>Bootstrap Admin Template</span>
                 -->
              </div>
            <?php } ?>
      </div>
  </div>
   <?php
    $this->load->view('admin/footer', $data);
    ?>
    <script type="text/javascript">
      function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();

        if (password != confirmPassword){
            $("#divCheckPasswordMatch").html("Passwords do not match!");
            document.getElementById('btnSubmit').setAttribute('disabled', 'disabled')
          }
        else{
            $("#divCheckPasswordMatch").html("Passwords match.");
            document.getElementById('btnSubmit').removeAttribute('disabled', 'disabled')
            }
      }

      $(document).ready(function () {
       $("#txtConfirmPassword").keyup(checkPasswordMatch);
      });
    </script>
</body>



</html>
