
      function addModal()
      {
        window.location.href = "./modals/addmodal.php";
      }
 
      function setUpdateAction(){
        let $table = document.querySelector('table.table');
        let $selectedCheckboxes = $table.querySelectorAll('input[type="checkbox"]:checked');
        
        let $checkboxCount = 0;
        $checkboxCount = $selectedCheckboxes.length;
        
        var machineArray = [];

        if($checkboxCount > 0){
          for (var i = 0; i < $checkboxCount; i++) {
            machineArray[i] = $selectedCheckboxes[i].getAttribute('data-machine-id');
            console.log(machineArray[i]);
          }
          localStorage.setItem("machineID", machineArray);
          localStorage.setItem("machineCount", $checkboxCount);
          window.location.href = "./modals/deletemodal-machines.php?test=" + machineArray;
        }
      }
