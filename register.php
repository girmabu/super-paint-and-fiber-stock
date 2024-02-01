<?php include "header.php" ?>
<?php include('connect.php')?>
<?php
if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $role = $_POST['role'];
  $dept_id = $_POST['dept_id'];
  $password = $_POST['password'];

  $query = "INSERT INTO users(name,username,role,dept_id,password) VALUES('{$name}','{$username}','{$role}','{$dept_id}','{$password}')";
  $addUser = mysqli_query($conn, $query);

  if (!$addUser) {
    echo "Something went wrong" . mysqli_error($conn);
  } else {
    header('location:login.php');
  }
}
?>


<div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
  <h1 class="text-center">Sign Up</h1>
  <hr>
  <form action="" method="post">
    <div class="mb-3">
      <label for="name" class="form-label">Full name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter your full name" autocomplete="off" required>
    </div>
    <div class="mb-3">
       <label for="inputEmail3"class="col-sm-2 col-form-label" id="label_div">Department</label>
       <select  name="dept_id" class="form-control" required id="minimal_input">
       <option value="">Select...</option>
        <?php
        $query= "SELECT * FROM department";
        $result = $conn->query($query);
        while ($optionData = $result->fetch_assoc()) {
          $dept_name = $optionData['dept_name'];
          $id = $optionData['id'];
        ?>
        <option value="<?php echo $id; ?>"><?php echo $dept_name?> </option>
        <?php
       }
        ?>
       </select>
    </div>
    <div class="mb-3">
       <label for="inputEmail3"class="col-sm-2 col-form-label" id="label_div">Role</label>
       <select  name="role" required class="form-control" required id="minimal_input">
      <option value="">Select...</option>
       <option value="1">Admin</option>
       <option value="2">Users</option>
       </select>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Username</label>
      <input type="text" required class="form-control" name="username" placeholder="Enter your username" autocomplete="off" required>
      <small class="text-muted">Your username is safe with us.</small>
    </div>
    <div class="mb-3">
      <label for="password" required class="form-label">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
      <small class="text-muted">Do not share your password.</small>
    </div>
    <div class="mb-3">
      <input type="submit" name="signup" value="Sign Up" class="btn btn-primary">
    </div>
  </form>
</div>


<?php include "footer.php" ?>