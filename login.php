<?php session_start(); ?>
<?php include "header.php" ?>
<?php include "connect.php" ?>
<?php
  $userError="";
  $passwordError="";
  $invalid="";
if (isset($_POST['signin'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if(empty($username))
  {
    $userError="User name is required";
  }
  else{
    $username= trim($username);
    $username=htmlspecialchars($username);
    if(!preg_match("/^[a-zA-Z]+$/",$username))
    {
   $userError="Username must contain only char and space";
    }
  }
  if(empty($password))
  {
    $passwordError="Password is required";
  }
  else{
  if(strlen($password)>=5)
  {
    $passwordError="Enter atleast 5 digits";
  }
  }
  $query = "SELECT * from users WHERE username = '$username' AND password = '$password'";
  $user = mysqli_query($conn, $query);
  if (!$user) {
    die('query Failed' . mysqli_error($conn));
  }
  if ($row = mysqli_fetch_array($user)) {

    $user_id = $row['id'];
    $full_name = $row['name'];
    $user_name = $row['username'];
    $user_password = $row['password'];
    $department= $row['dept_id'];
    $role= $row['role'];
  }
  else {
    $user_name="";
    $user_password="";
  }
  if($user_name!=$username)
  {
    $userError="Invalid Credentials";
  }
  elseif($user_password!=$password)
  {
    $passwordError="Incorrect Password";
  }
  elseif ($user_name == $username  &&  $user_password == $password) {
  if($department==1)// Fiber Main Store
  {
    $_SESSION['id'] = $user_id;       // Storing the value in session
    $_SESSION['name'] = $full_name;   // Storing the value in session
    $_SESSION['username'] = $user_name; // Storing the value in session
    $_SESSION['role'] = $role; // Storing the value in session

    //! Session data can be hijacked. Never store personal data such as password, security pin, credit card numbers other important data in $_SESSION
    header('location: pages/Fiber_main/fiber_main.php?user_id=' . $user_id);
  } 
  else if($department==2)//Fiber mini store
   {
  $_SESSION['id'] = $user_id;       // Storing the value in session
    $_SESSION['name'] = $full_name;   // Storing the value in session
    $_SESSION['username'] = $user_name; // Storing the value in session
    $_SESSION['role'] = $role; // Storing the value in session
    //! Session data can be hijacked. Never store personal data such as password, security pin, credit card numbers other important data in $_SESSION
    header('location: pages/Fiber_mini/fiber_mini.php?user_id=' . $user_id);
  }
  else if($department==3)
  {
    $_SESSION['id'] = $user_id;       // Storing the value in session
    $_SESSION['name'] = $full_name;   // Storing the value in session
    $_SESSION['username'] = $user_name; // Storing the value in session
    $_SESSION['role'] = $role; // Storing the value in session
     //! Session data can be hijacked. Never store personal data such as password, security pin, credit card numbers other important data in $_SESSION
     header('location: pages/Chemical/chem_index.php?user_id=' . $user_id);
   }
   else if($department==4)
  {
    $_SESSION['id'] = $user_id;       // Storing the value in session
    $_SESSION['name'] = $full_name;   // Storing the value in session
    $_SESSION['username'] = $user_name; // Storing the value in session
    $_SESSION['role'] = $role; // Storing the value in session
     //! Session data can be hijacked. Never store personal data such as password, security pin, credit card numbers other important data in $_SESSION
     header('location: pages/Paint_main/Paint_main.php?user_id=' . $user_id);
   }
   else if($department==5)
   {
     $_SESSION['id'] = $user_id;       // Storing the value in session
     $_SESSION['name'] = $full_name;   // Storing the value in session
     $_SESSION['username'] = $user_name; // Storing the value in session
     $_SESSION['role'] = $role; // Storing the value in session
      //! Session data can be hijacked. Never store personal data such as password, security pin, credit card numbers other important data in $_SESSION
      header('location: pages/Pant_mini/Paint_mini.php?user_id=' . $user_id);
    }
    else if($department==6)
    {
      $_SESSION['id'] = $user_id;       // Storing the value in session
      $_SESSION['name'] = $full_name;   // Storing the value in session
      $_SESSION['username'] = $user_name; // Storing the value in session
      $_SESSION['role'] = $role; // Storing the value in session
       //! Session data can be hijacked. Never store personal data such as password, security pin, credit card numbers other important data in $_SESSION
       header('location: pages/Pant_mini_mini/Paint_mini_mini.php?user_id=' . $user_id);
     }
     else if($department==7)
     {
       $_SESSION['id'] = $user_id;       // Storing the value in session
       $_SESSION['name'] = $full_name;   // Storing the value in session
       $_SESSION['username'] = $user_name; // Storing the value in session
       $_SESSION['role'] = $role; // Storing the value in session
        //! Session data can be hijacked. Never store personal data such as password, security pin, credit card numbers other important data in $_SESSION
        header('location: pages/PaintRMbalance/rmbalalnce.php?user_id=' . $user_id);
      }
  else {
    header('location: login.php');
  }
}

else {
 $invalid="Invalid Credentials";
}
}
?>

<div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
  <h1 class="text-center">Sign In</h1>
  <hr>
  <form action="" method="post"onSubmit="return validate();" id="frmLogin">
  <span style="color:red;"> <?php echo $userError?></span>

    <div class="mb-3">
      <label for="email" class="form-label">Username</label>
      <input type="text" class="form-control" name="username" id="user_name"placeholder="Enter your username" autocomplete="off">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" >
    </div>
    <div class="mb-3">
      <input type="submit" name="signin" value="Sign In" class="btn btn-primary">
    </div>
  </form>
</div>

<?php include "footer.php" ?>

<script>
    function validate() {
        var $valid = true;
        document.getElementById("user_info").innerHTML = "";
        document.getElementById("password_info").innerHTML = "";
        
        var userName = document.getElementById("user_name").value;
        var password = document.getElementById("password").value;
        if(userName == "") 
        {
            document.getElementById("user_info").innerHTML = "required";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("password_info").innerHTML = "required";
            $valid = false;
        }
        return $valid;
    }
    </script>