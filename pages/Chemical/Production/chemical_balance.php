<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Production Chemical Balance</title>
  <?php include 'connect.php' ?>
  <?php session_start();       // Start the session ?>   
  <?php
if (!isset($_SESSION['id'])) {         // condition Check: if session is not set. 
  header('location: ../../login.php');   // if not set the user is sendback to login page.
}
?> 
 <?php $session= $_SESSION['role']; ?>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../../index3.html" class="nav-link">
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <li class="breadcrumb-item">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-in">
        <i class="fa fa-cart-plus" aria-hidden="true"></i>In
        </a>
      </i>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Production_history.php" class="nav-link" data-toggle="modal" data-target="#modal-other">
        <i class="fa fa-cart-plus" aria-hidden="true"></i> Other</i>
        </a>
      </li>
     
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Production_history.php" class="nav-link">
        <i class="fa fa-history" aria-hidden="true"> History</i>
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Production_chem_summery.php" class="nav-link">
        <i class="fas fa-anchor"></i>Summery
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="production_summery_history.php" class="nav-link">
        <i class="fas fa-history"></i>Summery History
        </a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link">
         <?php 
          if (isset($_POST['signout'])) {
            session_destroy();            //  destroys session 
            header('location: ../../login.php');
          }
          ?>
            <form action="" method="post">
        <button type="submit" name='signout' class=" btn btn-warning mb-3"> Sign Out</button>
      </form>
      </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../../index3.html" class="brand-link">
      <img src="../../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Super Fiber</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
        </div>
      </div>
      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
               Chemical Store
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../formulation.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Formulation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Production Department
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="chemical_balance.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Chemical Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Fiber_balance.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Fiber Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Production_out.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Production Out</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Genda Department
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../Genda/Chemical_balance.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Chemical Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../Genda/Fiber_balance.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Fiber Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../Genda/Genda_out.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Genda Out</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                 Getema Department
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../Getema/Chemical_balance.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Chemical Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../Getema/Fiber_balance.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Fiber Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../Getema/Getema_out.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Getema Out</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
            </ul>
          </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <!-- in modal -->
  <div class="modal fade" id="modal-in">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="color:blue">
              <h4 class="modal-title">Add Item To Stock</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form class="form-horizontal" action="production_insert.php" method="POST">
              <div class="card-body">
               <div class="form-group row"  id="minimal_div">
                <label for="inputEmail3"class="col-sm-2 col-form-label" id="label_div">Product Name</label>
                 <select  name="ITEM_ID" required id="minimal_input" style="width:83% !important">
                  <option value="">Select...</option>
                  <?php
                   include('connect.php');
                    $query = "SELECT id, ITEM FROM PROCHEM_BALANCE where id!=8";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                    while ($optionData = $result->fetch_assoc()) {
                     $option = $optionData['ITEM'];
                     $id = $optionData['id'];
                     ?>
                     <option value="<?php echo $id; ?>"><?php  echo $id; echo "----"; echo $option?> </option>
                   <div class="form-group">
                   <?php
                   }}
                   ?>
                </select>
              </div>
         
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                 <div class="col-sm-10">
                  <input type="double" required name="STOCK_IN" required class="form-control" id="STOCK_IN" placeholder="Stock in(kg)">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Recieved by</label>
                 <div class="col-sm-10">
                  <input type="text" readonly value="<?php echo $_SESSION['name'] ?>" required name="RECIVED_BY" required class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
                 <div class="col-sm-10">
                  <input type="date" required name="RECIVED_DATE" class="form-control">
                 </div>
              </div>
            </div>
            <div class="card-footer">
             <button type="submit" name="INSERT_STOCK_IN" class="btn btn-block btn-outline-success btn-lg">Stock In</button>
             <button type="submit"  class="btn btn-block btn-outline-danger btn-sm" data-dismiss="modal">Cancel</button>
            </div>
           </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="modal-other">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="color:blue">
              <h4 class="modal-title">Out</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form class="form-horizontal" action="production_insert.php" method="POST">
              <div class="card-body">
               <div class="form-group row"  id="minimal_div">
                <label for="inputEmail3"class="col-sm-2 col-form-label" id="label_div">Product Name</label>
                 <select  name="ITEM_ID" required id="minimal_input" style="width:83% !important">
                  <option value="">Select...</option>
                  <?php
                   include('connect.php');
                    $query = "SELECT id, ITEM FROM PROCHEM_BALANCE where id=1 or id=2 or id=3";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                    while ($optionData = $result->fetch_assoc()) {
                     $option = $optionData['ITEM'];
                     $id = $optionData['id'];
                     ?>
                     <option value="<?php echo $id; ?>"><?php  echo $id; echo "----"; echo $option?> </option>
                   <div class="form-group">
                   <?php
                   }}
                   ?>
                </select>
              </div>
         
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                 <div class="col-sm-10">
                  <input type="double" required name="STOCK_IN" required class="form-control" id="STOCK_IN" placeholder="Stock in(kg)">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Checked by</label>
                 <div class="col-sm-10">
                  <input type="text" readonly value="<?php echo $_SESSION['name'] ?>" required name="RECIVED_BY" required class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
                 <div class="col-sm-10">
                  <input type="date" required name="RECIVED_DATE" class="form-control">
                 </div>
              </div>
              <div class="form-group row"  id="minimal_div">
                <label for="inputEmail3"class="col-sm-2 col-form-label" id="label_div">To</label>
                 <select  name="to" required id="minimal_input" style="width:83% !important">
                  <option value="">Select...</option>
                  <option value="1">Genda</option>
                  <option value="2">Getema</option>
                  <option value="3">ጥገና ኢና ልዩ ልዩ ወጪ</option>
                </select>
              </div>
            </div>
            <div class="card-footer">
             <button type="submit" name="other_out" class="btn btn-block btn-outline-success btn-lg">Stock In</button>
             <button type="submit"  class="btn btn-block btn-outline-danger btn-sm" data-dismiss="modal">Cancel</button>
            </div>
           </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
   <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="process.php" method="POST">
            <div class="modal-body">
                    <div class="modal-body">
                        <input type="text" readonly name="id" id="delete_id">
                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="delete" class="btn btn-danger"> Yes !! Delete it. </button>
                    </div>
                </form>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
   <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Chemical Store Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="production_insert.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <input type="text" readonly name="item_id" id="item_id" class="form-control" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label> Uom </label>
                            <input type="text" readonly name="UOM" id="uom" class="form-control" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label> Balance </label>
                            <input type="text" name="BALANCE" id="qty" class="form-control" >
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatedata" class="btn btn-primary">
                <i class=" ">Save changes</i>
              </button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
   </div>
      <!-- /.modal -->
   <!-- notification modal -->

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chemical Store Balance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"> add
                <i class="fa fa-plus" aria-hidden="true"></i>
                </a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <?php
        $dbName = "ssms";
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
        if (!$conn) {
            die("Something went wrong");
        }
        ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <?php
               $connection = mysqli_connect("localhost", "root", "");
               $db = mysqli_select_db($connection, 'ssms');
               $query = "SELECT * FROM ProChem_Balance where id!=8";
               $query_run = mysqli_query($connection, $query);
               ?>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th scope="col"> ID</th>
                  <th scope="col">ITEM</th>
                  <th scope="col">UOM </th>
                  <th scope="col"> BALANCE </th>
                  <th scope="col"> status </th>
                  <th scope="col"> Edit </th>
                  </tr>
                  </thead>
                  <?php
                   if ($query_run) {
                  foreach ($query_run as $row) {
                    ?>
                <tr>
                  <td> <?php echo $row['ID']; ?> </td>
                   <td> <?php echo $row['ITEM']; ?> </td>
                   <td> <?php echo $row['UOM']; ?> </td>
                   <td>
                    <?php
                    if($row['BALANCE']<0){
                    echo 0 ; 
                     }
                     else{
                     echo $row['BALANCE'];
                     }
                    ?>
                    </td>      
                    <td>
                    <?php  
                    if($row['BALANCE']<=100 ){
                    echo "balance is lower than min stock(100kg)";
                    }
                    if($row['BALANCE']>=100){
                    echo "balance is sufficent";
                     }
                    ?>
                    <td>
                    <button type="button"  class="btn btn-info editbtn" data-toggle="modal" data-target="#modal-edit">
                      <i class="fa fa-pencil-square-o" height:50px !important;></i>
                      </button>
                    </td>
                    </tr>
                <?php           
                }
                }
              ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2016/2024 <a href="www.rodaspaints.com">SDT</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../plugins/jszip/jszip.min.js"></script>
<script src="../../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<!-- Page specific script -->
<!-- Approve button -->
<script>
  {
    document.getElementById("item_name").value=""; //don't forget to set the textbox id
    document.getElementById("category_id").value="";
    document.getElementById("uom").value="";
   }
      $(document).ready(function () {
      $('.approvebtn').on('click', function () {
        $('#modal-approve').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#approve_id').val(data[0]);
        $('#item_id').val(data[3]);
        $('#approve_uom').val(data[4]);
        $('#approve_quantity').val(data[5]);
        $('#received_by').val(data[6]);
        $('#checked_by').val(data[7]);
        $('#approve_date').val(data[8]);
    });
   });
</script>
<!-- modal mini notification  -->
<script>
    $(document).ready(function () {
    $('.editminibtn').on('click', function () {
      $('#modal-chem-editnotification').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function () {
          return $(this).text();
      }).get();
      console.log(data);
      $('#req_id').val(data[0]);
      $('#req_item').val(data[1]);
      $('#req_item_id').val(data[2]);
      $('#req_uom').val(data[3]);
      $('#req_prod').val(data[4]);
      $('#req_get').val(data[5]);
      $('#req_gend').val(data[6]);
      $('#req_qty').val(data[7]);
      $('#req_received').val(data[8]);
      $('#req_checked').val(data[9]);
      $('#req_date').val(data[10]);


    });
  });
</script>
<!-- modal code to display tofication table -->
<script>
        $(document).ready(function () {
            $('.notificationbtn').on('click', function () {
                $('#modal-notification').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#notification_id').val(data[0]);
            });
        });
    </script>
    <!-- modal code to delete -->
<script>
        $(document).ready(function () {
            $('.deletebtn').on('click', function () {
                $('#modal-delete').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
</script>
<script>
        $(document).ready(function () {
            $('.deleteminibtn').on('click', function () {
                $('#modal-deletenotification').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#delete_mininotification').val(data[0]);
            });
        });
</script>
<script>
    $(document).ready(function () {
    $('.editbtn').on('click', function () {
      $('#modal-edit').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function () {
          return $(this).text();
      }).get();
      console.log(data);
      $('#id').val(data[0]);
      $('#item_id').val(data[1]);
      $('#uom').val(data[2]);
      $('#qty').val(data[3]);
    

    });
  });
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
</body>
</html>
