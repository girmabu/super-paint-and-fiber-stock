<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class=' bg-secondary text-dark' style='--bs-bg-opacity: .5;'>
<h2 class="text-center mt-3">login to SSMS</h2>
<hr>

<div class="container">
  <div class="row">

    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">Login</h3>
        </div>
        <div class="card-body">
          <a href="login.php"> <img src="images/login.jpg" alt="login image" width="53%" height="53%"></a>
          <p class="card-text text-muted">Never share your password with anyone.</p>
          <a href="login.php" class="btn btn-primary"> Sign In</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">Register</h3>
        </div>
        <div class="card-body">
          <a href="login.php"><img src="images/registration.png" alt="register image" width="54%" height="54%"></a>
          <p class="card-text text-muted">Always use different password for different site.</p>
          <button class="btn btn-primary" disabled>  <a href="register.php" class="btn btn-primary"> Sign Up </a> </button>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="container  fixed-bottom ">
</div>

</body>
</html>