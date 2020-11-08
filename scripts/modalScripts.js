      function addModal()
      {
        window.location.href = "./modals/addmodal.php";
      }

      function setEditAction(){

        let $t = document.querySelector('table.table');
        let $sCheckboxes = $t.querySelectorAll('input[type="checkbox"]:checked');

        let $checkCount;
        $checkCount = $sCheckboxes.length;

        var idsArray = [];
        
        // TOOLS edit
        if($sCheckboxes[0].getAttribute('data-table-name') == "tools"){
          if($checkCount > 0){
            for (var x = 0; x < $checkCount; x++) {
              idsArray[x] = $sCheckboxes[x].getAttribute('data-tools-id');
            }
          window.location.href = "./modals/editmodal-tools.php?ids=" + idsArray;
        }
        else{
          window.location.href = "/error.php";
        }
      }


      } 

      function setUpdateAction(){
        let $table = document.querySelector('table.table');
        let $selectedCheckboxes = $table.querySelectorAll('input[type="checkbox"]:checked');

        let $checkboxCount;
        $checkboxCount = $selectedCheckboxes.length;
        
        var array = [];
          
        if($selectedCheckboxes[0].getAttribute('data-table-name') == "tools"){
            if($checkboxCount > 0){
              for (var i = 0; i < $checkboxCount; i++) {
                array[i] = $selectedCheckboxes[i].getAttribute('data-tools-id');
              }
              localStorage.setItem("array", array);
              localStorage.setItem("checkboxCount", $checkboxCount);
    
            window.location.href = "./modals/deletemodal-tools.php?test=" + array;
          }
          else{
            window.location.href = "/error.php";
          }
        }

      else if($selectedCheckboxes[0].getAttribute('data-table-name') == "machines"){
        if($checkboxCount > 0){
          for (var i = 0; i < $checkboxCount; i++) {
            array[i] = $selectedCheckboxes[i].getAttribute('data-machine-id');
          }
          localStorage.setItem("array", array);
          localStorage.setItem("checkboxCount", $checkboxCount);

        window.location.href = "./modals/deletemodal-machines.php?test=" + array;
      }
      else{
        window.location.href = "/error.php";
      }
    }

    else if($selectedCheckboxes[0].getAttribute('data-table-name') == "rusztowania"){
      if($checkboxCount > 0){
        for (var i = 0; i < $checkboxCount; i++) {
          array[i] = $selectedCheckboxes[i].getAttribute('data-product-id');
        }
        localStorage.setItem("array", array);
        localStorage.setItem("checkboxCount", $checkboxCount);

      window.location.href = "./modals/deletemodal-product.php?test=" + array;
    }
    else{
      window.location.href = "/error.php";
    }
  }
  }
