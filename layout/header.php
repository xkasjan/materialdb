<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">  </head>
    <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
  <style>
    html, body{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      
      
    }
    #navbarNav{
      font-family: 'Roboto', sans-serif;
      font-weight: 500;
    }

    #nav_style{
    background-color: rgb(109, 96, 176);
    font-family: 'Open Sans', sans-serif;
    overflow: hidden;
    height: 7vh;
    }

    #nav_style a {
      color: #BFBBDA;
      padding-bottom: 20%;
      border-bottom: 1px #333 solid;
      float: left;
      display: inline;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 100%;
      border-bottom: 3px solid transparent;
      
    }

    #nav_style a:hover {
      color: #F4F8F9;
    }

    #nav_style a:after {
      content: '';
      display: inline;
      margin: auto;
      height: 2px;
      width: 0px;
      background: transparent;
      transition: width .5s ease, background-color .5s ease;
      border-radius: 50px;
    }
    #nav_style a:hover:after {
      width: 100%;
      background: #F4F8F9;
    }
    #panel{
      
    }

  
    </style>
    </head>
  
  <body>


  <nav id="navbarNav" class="navbar navbar-expand-lg navbar-dark bg-dark" style="z-index: 1;">
  <a class="navbar-brand" href="#">Panel administratora</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" >
    <!--
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Zarządzaj produktami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Historia</a>
                </li>
            </ul>
            -->
            <ul class="navbar-nav">
                <li class="nav-item">

                    <a class="nav-link" href="#"><i class="fas fa-sign-in-alt" style="padding-right: 5px;"></i>Logowanie</a>
                </li>
            </ul>
        </div>
</nav>

<script>
$("#navbarNav").on('show.bs.collapse', function() {
    $('a.nav-link').click(function() {
        $("#navbarNav").collapse('hide');
    });
});
</script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>