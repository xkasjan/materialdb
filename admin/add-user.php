<?php


include_once('../config/dbconnect.php');
include_once('../config/bootstrap.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../css/admin-panel-css.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">

  </header>

  <main role="main" class="inner cover">

  <?php

  
    do{

      $newnum = rand(1000, 9999);
      $pin = strval($newnum);
      $hash = password_hash($pin, PASSWORD_DEFAULT);

      if ($stmt = $conn->prepare("SELECT pwd FROM users WHERE pwd = ?")) {
        $stmt->bind_param('s', $hash);
        $stmt->execute();

        $stmt->store_result();
      }
    }while($stmt->num_rows == 1);

            $stmt->close();
 
   
  ?>


  <form method="POST" action="">

  <div class="form-group row">
    <label for="fname" class="col-sm-2 col-form-label">Imie</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fname" name="fname" placeholder="Imie">
    </div>
  </div>

  <div class="form-group row">
    <label for="lname" class="col-sm-2 col-form-label">Nazwisko</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lname" name="lname" placeholder="Nazwisko">
    </div>
  </div>

  <div class="form-group row">
    <label for="login" class="col-sm-2 col-form-label">Login</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="login" name="login" placeholder="Login">
    </div>
  </div>

  <div class="form-group row">
    <label for="pwd" class="col-sm-2 col-form-label">Hasło</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="pwd" name="pwd" disabled value='<?php echo $pin; ?>'>
    </div>
  </div>

  <div class="form-group row">
    <label for="permission" class="col-sm-2 col-form-label">Uprawnienia</label>
    <div class="col-sm-10">
    <select class="form-control" id="permission" name="permission">
        <option value="1" selected>Odczytywanie</option>
        <option value="2">Dodawanie</option>
        <option value="3">Edytowanie</option>
        <option value="4">Usuwanie</option>
        <option value="5">Pełne</option>
      </select>
      
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-primary">Dodaj</button>
    </div>
  </div>
</form>
    <small>Dzięki uprawnieniom dany użytkownik może wykonać wyłącznie akcje, na które ma pozwolenie. Nadawanie uprawnień działają w taki sposób, że przy wyborze danej opcji, użytkownik otrzyma możliwość wykonania wybranej akcji</small>
    <small> oraz wszystkich akcji powyższych. Czyli gdy nadamy uprawnienie do "Dodawanie", konto będzie miało dostęp do dodawania danych oraz do uprawnienia "Odczytywanie".</small>
  </main>

  <footer class="mastfoot mt-auto">
    <div class="inner">
    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['login'])) {

    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $log = trim($_POST['login']);
    $per = $_POST['permission'];

    $log = strtolower($log);

    $usern = stripslashes($log);
        $usern = mysqli_real_escape_string($conn, $usern);
    $fn = stripslashes($fname);
        $username = mysqli_real_escape_string($conn, $fn);
    $ln = stripslashes($lname);
        $username = mysqli_real_escape_string($conn, $ln);

    $stmt2 = $conn->prepare("INSERT INTO users(login, pwd, fname, lname, permission) VALUES (?, ?, ?, ?, ?)");
    $stmt2->bind_param('ssssi', $usern, $hash, $fn, $ln, $per);
    $stmt2->execute();
    $stmt2->close();

    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Pomyślnie dodano użytkownika<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button></div>";

  } else {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Wszystkie pola muszą zostać wypełnione<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button></div>";
  }
}

?>
    </div>
  </footer>
</div>


</body>
</html>
