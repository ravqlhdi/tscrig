<script type="text/javascript">
    setSeletedLimit();
    function setSeletedLimit(){
      var input = document.getElementById('limit');
      var limit = <?php echo $limit_per_page ?>;
      var option = input.getElementsByTagName('option');
      for(var j=1; j<option.length; j++){
        if(limit==option[j].value){
          option[j].selected = 'selected';
        }
      }
    }
    function changeDeleteUrl(id, recordName){
      var target = document.getElementById('deleteUrl');
      var name = document.getElementById('deleteItem');
      console.log(target);
      console.log(recordName);
      name.innerHTML = "" + recordName;
      target.href = "<?php echo site_url($current_page.'/destroy?id=');?>" + id;
    }
    function changeDeleteUrlChild(id, recordName, parentId){
      var target = document.getElementById('deleteUrl');
      var name = document.getElementById('deleteItem');
      name.innerHTML = "" + recordName;
      target.href = "<?php echo site_url($current_page.'/destroy?id=');?>" + id + '&parent_id=' + parentId;
    }
    function changeLimit(){
      var selectValue = document.getElementById('limit').value;
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
              location.reload();
                //document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "<?php echo site_url($current_page);?>/changeLimit?value="+selectValue, true);
        xmlhttp.send();

    }
</script>
