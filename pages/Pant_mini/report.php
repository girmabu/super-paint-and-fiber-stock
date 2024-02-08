<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rodas Paint Main Stock</title>
  <?php session_start();       // Start the session ?>   
  <?php
if (!isset($_SESSION['id'])) {         // condition Check: if session is not set. 
  header('location: ../../login.php');   // if not set the user is sendback to login page.
}
?> 
  <?php include 'connect.php' ?>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
      <li class="nav-item d-none d-sm-inline-block">
         <a href="Paint_mini.php" class="nav-link">
        <i class="fa fa-home" aria-hidden="true"></i>home
        </a>
         </li>

 
         <li class="breadcrumb-item">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-request">
        <i class="fa fa-cart-plus" aria-hidden="true"></i>Request
        </a>
      </i>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-out">
        <i class="fa fa-outdent" aria-hidden="true"></i>convert(Kg)
        </a>
      </li>


    
    </ul>
     

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
       <?php
        $conn = new mysqli('localhost','root','','ssms');
        $result3 = mysqli_query($conn, "SELECT * FROM notification"); 
        $j=0;
        while( $res4 = mysqli_fetch_assoc($result3) ) { 
        $j++; 
        }
       ?>
      <li class="nav-item dropdown">
        <a class="nav-link notificationbtn" data-toggle="modal" data-target="#modal-nofitication">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $j?></span>
      </a>
      </li>
     
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
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Rodas Paint</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php echo $_SESSION['name']; ?></a>
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
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Paint Mini Store
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
        
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="report.php" class="nav-link">
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
 <div class="modal fade" id="modal-request">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="color:blue">
              <h4 class="modal-title">Request Item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form class="form-horizontal" action="process.php" method="POST">
              <div class="card-body">
               <div class="form-group row"  id="minimal_div">
                <label for="inputEmail3">Discription of Item</label>
                 <select name="main_store_item_id" required id="minimal_input" class="form-control">
                  <option value="">Choose discription of Item</option>
                  <?php 
                   $query ="SELECT * FROM msitementry where code_mini=1";
                   $result = $conn->query($query);
                   if($result->num_rows> 0){
                   while($optionData=$result->fetch_assoc()){
                   $option =$optionData['itemname'];
                   $id =$optionData['id'];
                   $uom = $optionData['unit'];
                   ?> 
                 <option value="<?=$id?>"><?php echo $option;echo " /"; echo $uom;echo "/ id=";echo $id; ?> </b> </option>
                  <div class="form-group">
                   <?php
                   }}
                   ?>
                </select>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                  <input type="float" required name="quantity" required class="form-control" id="inputPassword3" placeholder="Quantity">
               
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
                  <input type="date" required name="date" class="form-control">
              
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Requested By</label>
                  <input type="text" name="checked_by" readonly value="<?php echo $_SESSION['name']; ?>" class="form-control"  placeholder="checked_by">
              </div>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="notification" class="btn btn-primary float-right">Save changes</button>
            </div>
           </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
   <!-- /.Delete modal -->
   <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Trash Your File</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="process.php" method="POST">
            <div class="modal-body">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="delete_id">
                        <h4> are you sure,you want to delete</h4>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="delete" class="btn btn-danger"> Yes </button>
                    </div>
                </form>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- delete modal -->
   <!-- out modal -->
   <div class="modal fade" id="modal-out">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="color:blue">
              <h4 class="modal-title">Paint Mini store Unit Convertion Pages</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form class="form-horizontal" action="process.php" method="POST">
              <div class="card-body">
               <div class="form-group row"  id="minimal_div">
                <label for="inputEmail3">Discription of Item</label>
                 <select name="main_store_item_id" required id="minimal_input" class="form-control">
                  <option value="">Choose Discription of Item</option>
                   <?php 
                   include('connect.php');
                    $query ="SELECT * FROM msitementry where code_mini='1'";
                     $result = $conn->query($query);
                     if($result->num_rows> 0){
                     while($optionData=$result->fetch_assoc()){
                     $option =$optionData['itemname'];
                     $id =$optionData['id'];
                     $uom = $optionData['unit'];
                     $query1 ="SELECT quantity FROM paint_mini_item where paint_main_id ='$id'";;
                     $result1 = $conn->query($query1);
                    $b1=$result1->fetch_assoc();
                    $b=$b1['quantity'];

                     ?>  
                  
                   <option value="<?=$id?>"><?php echo $option;echo " /";echo "/ id=";echo $id; echo "/ current balance=";echo $b;?> </b> </option>
                     <div class="form-group">
                    <?php
                    }}
                   ?>
                </select>
              </div>
             
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">New Balance</label>
                  <input type="text" name="quantity" class="form-control"  placeholder="New Balalance">
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">New Unit</label> 
                  <input type="float" required name="unit"  value="Kg" readonly class="form-control" placeholder="Balance">
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
                  <input type="date" required name="date" class="form-control">
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Checked_by</label>
                  <input type="text" value="<?php echo $_SESSION['name']; ?>" readonly name="checked_by" class="form-control">
              </div>
              <div class="form-group row">
                <label style=" color:red">Notes,Please don't convert Kg to Kg</label>
                
              </div>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="unitconvert" class="btn btn-primary float-right">Save changes</button>
            
            </div>
            <div class="card-footer">
             
            </div>
           </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
 
   
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <form action="" method="POST">
    <label for="">date</label>
    <input type="date" name="date" required class="form-control">
    <br>
  
  
    <button type="submit" name="choose" class="btn btn-primary float-right" style=" margin-right:15px">choose</button>
  </form>
  <br>
  <br>
  
        <?php
        if(isset($_POST['choose']))
        {
            $date=$_POST['date'];
            ?>
         
            <?php
            $x="SELECT * from paintmini_history WHERE date='$date'";
            $re=mysqli_query($conn,$x) or die(mysqli_error($conn));
            $r=mysqli_fetch_assoc($re);  
            if($r!=null){
                $y="SELECT * from paint_mini_item Order by id Asc";
               $yy= mysqli_query($conn,$y) or die(mysqli_error($conn));
                ?>
                     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=$date?> Paint Raw Material Transaction History </h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
      
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header --> 
              <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'ssms');
                $query = "SELECT * FROM paintmini_history WHERE date='$date'";
                $query_run = mysqli_query($connection, $query);
            ?>
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>No</th>
                  <th>Discription of Item</th>
                    <th>Unit of Measurement</th>
                    <th>In</th>
                    <th>Out</th>
                    <th>Balance</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <?php
         if($query_run)
         {
          $i=1;
            foreach($query_run as $row)
            {
              $item_id = $row['paint_main_id'];
              $unit=$row['unit'];
                        $query ="SELECT * FROM msitementry WHERE id =$item_id";
                        $result = $conn->query($query);
                        if($result->num_rows> 0){
                            while($optionData=$result->fetch_assoc()){
                            $option =$optionData['itemname'];
                            $unit=$optionData['unit'];
                             }
                           }
        ?>  
       <tr>
       <td> <?php echo $i++ ?> </td>
       <td> <?php echo $option ?> </td>
         <td> <?php echo $unit ?> </td>
         <td> <?php echo $row['input']; ?> </td>
         <td> <?php echo $row['output']; ?> </td>
         <td> <?php echo $row['balance']; ?> </td>
         <td> <?php echo $row['date']; ?> </td>
        </tr>
        <?php           
        }
                }
            ?>
                </table>
              </div>
            
            </div>
          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    </div>
                <?php

            }
            else{
                ?>
                <div class="alert alert-danger" role="alert">
  No Record Found here Please Try agian !!
</div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2024 <a href="#">Stock Management System</a>.</strong> All rights reserved.
  </footer>


                <?php
            }

       
            
          }


        

     
        ?>
    <!-- Main content -->


   

    <!-- /.content -->
 
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
        $('#item_id').val(data[2]);
        $('#approve_uom').val(data[3]);
        $('#approve_quantity').val(data[4]);
        $('#received_by').val(data[6]);
        $('#checked_by').val(data[7]);
        $('#approve_date').val(data[8]);
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
            $('.editbtn').on('click', function () {
                $('#modal-edit').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#id').val(data[0]);
                $('#item_name').val(data[1]);
                $('#category_id').val(data[2]);
                $('#uom').val(data[3]);
                $('#quantity').val(data[4]);
                $('#unit_price').val(data[5]);
              
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
