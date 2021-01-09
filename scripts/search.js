$(document).ready(function() {

        $('#search').keyup(function(){
            var txt = $(this).val();
            if(currentTab == "rusztowania"){
            if(txt != ''){
                $.ajax({    
                    url: "search-rusztowania.php",  
                    method:"post",
                    data:{search:txt},           
                    dataType: "text",               
                    success: function(data){                    
                        $('#db-form').html(data); 
                    }
                });
            }
            else{
                $('#db-form').html('');
                
            }
        }
        });
    
    
});
