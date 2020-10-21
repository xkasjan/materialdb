
$(document).ready(function() {

    $("#maszynyb").click(function() {    
      $("#maszynyb").addClass("btn-success");
      $("#narzedziab").removeClass("btn-success");
      $("#rusztowaniab").removeClass("btn-success");           
      $.ajax({    
        type: "GET",
        url: "machinesdb.php",             
        dataType: "html",               
        success: function(response){                    
            $("#db-form").html(response); 
        }
    });
    });
    });
    
     $(document).ready(function() {
    
        $("#rusztowaniab").click(function() {    
          $("#rusztowaniab").addClass("btn-success");
          $("#narzedziab").removeClass("btn-success");
          $("#maszynyb").removeClass("btn-success");         
          $.ajax({    
            type: "GET",
            url: "rusztowaniadb.php",             
            dataType: "html",               
            success: function(response){                    
                $("#db-form").html(response); 
            }
        });
    });
    });
    
    $(document).ready(function() {
    
    $("#narzedziab").click(function() {    
      $("#narzedziab").addClass("btn-success");
      $("#rusztowaniab").removeClass("btn-success");
      $("#maszynyb").removeClass("btn-success");           
      $.ajax({    
        type: "GET",
        url: "narzedziadb.php",             
        dataType: "html",               
        success: function(response){                    
            $("#db-form").html(response); 
        }
    });
    });
    });

    $(document).ready(function() {
    
        $("#dodajb").click(function() {    
          
          $.ajax({    
            type: "GET",
            url: "./modals/addmodal.php",             
            dataType: "html",               
            success: function(response){                    
                $("body").html(response); 
            }
        });
        });
        });