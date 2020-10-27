
      function addModal()
      {
        window.location.href = "./modals/addmodal.php";
      }
 
      function setUpdateAction(){
        let $table = document.querySelector('table.table');
        let $selectedCheckboxes = $table.querySelectorAll('input[type="checkbox"]:checked');
        
        let $checkboxCount = 0;
        $checkboxCount = $selectedCheckboxes.length;
        
        var array = [];

        //let element = document.querySelector("#usun");

        
          
          if(currentTab == "narzedzia"){
            if($checkboxCount > 0){
              for (var i = 0; i < $checkboxCount; i++) {
                array[i] = $selectedCheckboxes[i].getAttribute('data-tools-id');
                console.log(array[i]);
              }
              localStorage.setItem("array", array);
              localStorage.setItem("checkboxCount", $checkboxCount);
    
            window.location.href = "./modals/deletemodal-tools.php?test=" + array;
          }
          else{
            window.location.href = "/error.php";
          }

         
          
        }
      }
