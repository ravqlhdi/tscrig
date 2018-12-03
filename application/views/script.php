<script type="text/javascript">
  <?php if (isset($delete_action)) { ?>
    function changeUrl(id){
      var target = document.getElementById('deleteUrl');
      console.log(target);
      target.href = '<?php echo $delete_action;?>' + id;
    }
  <?php
  } ?>
  <?php if (isset($name)) { ?>
    function changeForm(id){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200 ) {
            var name = <?php echo json_encode($name);?>;
            var value = JSON.parse(this.responseText);
            var form = document.getElementsByClassName('form_<?php echo $source;?>')[1];
            form.action = '<?php echo $edit_action;?>' + id;
            for(var i=0;i<name.length;i++){
              var key = name[i];
              var input = document.getElementsByName(key)[1];
              console.log(input);
              if(name[i]=='user_password'){
                input.setAttribute('readonly','readonly');
                input.setAttribute('type','hidden');
              }else if(input.nodeName == 'SELECT'){
                var option = input.getElementsByTagName('option');
                for(var j=0; j<option.length; j++){
                  if(value[''+key]==option[j].value){
                    option[j].selected = 'selected';
                  }
                }
              }else if(input.nodeName == 'TEXTAREA'){
                input.innerHTML = value[''+key];

              }else{
                console.log(value[""+key]);
                input.setAttribute('value','' + value[''+key]);
              }
            }
            console.log(name);
            console.log(value);

            //document.getElementById('editForm').innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET", "<?php echo site_url(''.$source.'/edit?id=');?>" + id, true);
      xmlhttp.send();
      $('#<?php echo $source?>ModalEdit').modal('show');
    }
    function changeView(to){
      if (to=='input') {
         document.getElementById('<?php echo $source?>Table').style.display = "none";
         document.getElementById('<?php echo $source?>Form').style.display = "block";

         document.getElementById('btnInput').style.display = "none";
         document.getElementById('btnTable').style.display = "block";

      }else{
         document.getElementById('<?php echo $source?>Table').style.display = "block";
         document.getElementById('<?php echo $source?>Form').style.display = "none";

         document.getElementById('btnInput').style.display = "block";
         document.getElementById('btnTable').style.display = "none";
      }

    }
    function getSubmenu(mainLink,id){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200 ) {
          var div = document.getElementById('subMenu'+mainLink);
          var sub = JSON.parse(this.responseText);
          for(var i=0;i<sub.length;i++){
            var node = document.createElement("A");
            var link = '<?php echo site_url();?>/'+ sub[i].submenu_link ;
            node.setAttribute('href', link);
            node.setAttribute('class', 'dropdown-item');
            var textnode = document.createTextNode(sub[i].submenu_name);
            node.appendChild(textnode);
            div.appendChild(node);
          }
          document.getElementById( mainLink +'SubMenu').removeAttribute('onclick');
          console.log(JSON.parse(this.responseText));

            //document.getElementById('editForm').innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET", "<?php echo site_url('submenu/get?id=');?>" + id, true);
      xmlhttp.send();
    }
  <?php } ?>
  function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("<span style='color:red'>Passwords Tidak Sama!</span>");
    else
        $("#divCheckPasswordMatch").html("<span style='color:green'>Passwords Sama</span>");
  }

  $(document).ready(function () {
     $("#txtConfirmPassword").keyup(checkPasswordMatch);
  });

</script>
