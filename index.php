<?php
/*
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
*/

//include_once('./query/mquery.php');
include_once(dirname(__FILE__) . '/config/dbconnect.php');
include_once(dirname(__FILE__) . '/query/mquery.php');
//include_once(dirname(__FILE__) . '/query/chartsquery.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Index CSS -->
    <link rel="stylesheet" href="css/index-css.css">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
    

    <!-- Embedded Style -->
    <style>
    html, body{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    .to-pdf{
      position: fixed;
      bottom: 2%;
      right: 2%;
      background: #343a40;
      color: white;
      font-size: 24px;
      padding:25px;
      border-radius: 50%;
    }

    .to-pdf:hover{
      color: tomato;
      transition: all 0.2s ease;
    }

    td:last-child{
      text-align: center;
      width:12%;
    }
    #db-form td a i{
      margin-left: 8px;
    }
    #db-form td i{
      margin-left: 6px;
    }

    tr:hover td{  
        background-color: #cccccc;  
    }     

    #db-form::-webkit-scrollbar {
    width: 1em;
    }
    #db-form::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }
    #db-form::-webkit-scrollbar-thumb {
    background-color: darkgrey;
    outline: 1px solid slategrey;
    }

    @media only screen and (max-width: 767px) {
    #panel-menu{
      overflow-x: scroll;
    }

    #dodajb i {
      display:inline;
    }
  }
    </style>

  </head>
  <body>
    <?php
      require_once('./layout/header.php');
    ?>

<div id="test" class="container-fluid" style="position: absolute; top: 7vh;">

  <div id="panel-menu" class="row" style="margin: 10px; padding: 10px 10px; background-color: white; margin-top: 2%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

    

    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-1 text-center">
    <div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" id="rusztowaniab" class="btn">Deskowania/Rusztowania</button>
    <button type="button" id="narzedziab" class="btn">Elektronarzędzia</button>
    <button type="button" id="maszynyb" class="btn">Maszyny</button>
    </div>
	</div>
	
  <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-1 text-center" style="">
    <form>
      <input type="text" id="search" class="form-control" />
    </form>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-1 text-center">
    <div class="btn-group" role="group" aria-label="Basic example">
    <a id="edytuj" class="btn" onClick="setEditAction()"><i class='fas fa-edit' style="padding-right: 6px; color: #FFDC00;"></i>Edytuj</a>
    <a id="usun" class="btn" onClick="setUpdateAction()"><i class="fas fa-trash-alt" style="margin-left: 50px; padding-right: 6px; color: #FF4136;"></i>Usuń</a>
    <button type="button" id="dodajb" class="btn" onClick="addModal()" style="margin-left: 50px;"><i class="fas fa-plus" style="padding-right: 5px; color: #2ECC40;"></i>Dodaj</button>
    </div>
	</div>
	</div>

			<div class="" id="db-form" style="background-color: white; margin-top: 1%; min-height: 75vh; max-height: 75vh; overflow-y: scroll; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

			</div>
    </div>

  
  <i class="fas fa-file-alt to-pdf"></i>

  
    <script src="./scripts/modalScripts.js"></script>
    <script src="./scripts/indexscript.js"></script>
    <script src="./scripts/search.js"></script>

    <!-- D_IMAGE MODAL -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>