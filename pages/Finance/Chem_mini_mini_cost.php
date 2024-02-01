<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mini Fiber Store Cost List</title>
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
        <a href="../../index3.html" class="nav-link">
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <li class="breadcrumb-item">
        <a href="Cost_dashboard.php" class="nav-link">
        <i class="fa fa-home" aria-hidden="true"></i>Home
        </a>
      </i>
      <li class="breadcrumb-item">
        <a href="Chem_mini_mini_cost.php" class="nav-link">
        <i class="fa fa-list" aria-hidden="true"></i>Fiber Cost
        </a>
      </i>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
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
    </ul>
  </nav>
  <!-- /.navbar -->
  <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Fiber Main Cost</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- here you can edit the data of fiber main store -->
             <form action="process.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label> Item Name </label>
                            <input type="text" readonly name="item_name" id="item_name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Uom </label>
                            <input type="text" readonly name="uom" id="uom" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Quantity </label>
                            <input type="text" readonly name="quantity" id="quantity" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Unit Price </label>
                            <input type="text" name="unit_price" id="unit_price" class="form-control" >
                        </div>
                       
                        <div class="form-group">
                            <label> Total cost </label>
                            <input type="text" readonly id="total_cost" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Remark </label>
                            <input type="text" name="remark" id="remark" class="form-control" >
                        </div>
                    </div>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatechemcost" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Super Fiber Cost</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Session</a>
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
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->


      <!-- End of Approve Modal --> 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chemical Store Item and Cost List</h1>
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
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'ssms');
                $sql = "SELECT * FROM genchem_balance";
                $result=mysqli_query($connection,$sql);
                $getema = "SELECT * FROM getchem_balance";
                $get_result=mysqli_query($connection,$getema);
                $query = "SELECT * FROM ProChem_Balance";
                $query_run = mysqli_query($connection, $query);
            ?>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Item Name</th>
                    <th>Uom</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Total Cost</th>
                    <th>Remark</th>
                    <th>Edit</th>
                  </tr>
                  </thead>
                  <?php
         if($query_run)
         {
            foreach($query_run as $row)
            {
              $department="Production";
            if($row['ID']==4)
            {
              $query ="SELECT * FROM main_store_item WHERE id =1";
              $query_result = $conn->query($query);
              if($query_result->num_rows> 0){
                  while($optionData=$query_result->fetch_assoc()){
                  $option =$optionData['unit_price'];
              }
          }
            }    
            if($row['ID']==5)
            {
              $query ="SELECT * FROM main_store_item WHERE id =2";
              $query_result = $conn->query($query);
              if($query_result->num_rows> 0){
                  while($optionData=$query_result->fetch_assoc()){
                  $option_jel =$optionData['unit_price'];
              }
          }
            }            
        ?>  
       <tr>
         <td> <?php echo $row['ID']; ?> </td>
         <td> <?php echo $row['ITEM'] ?> </td>
         <td> <?php echo $row['UOM']; ?> </td>
         <td> <?php echo $row['BALANCE']; ?> </td>
         <td> <?php 
        if($row['ID']==4){
          echo $option;
         }
        
        else if($row['ID']==5){
         echo $option_jel;
         }
          else 
         echo $row['unit_price'];
          
         ?> 
        </td>
         <td> <?php
          if($row['ID']==4){
            echo (double)$row['BALANCE']*(double)$option ;
          }
          else if($row['ID']==5){
            echo (double)$row['BALANCE']*(double)$option_jel ;
          }
          else
          echo (double)$row['BALANCE']*(double)$row['unit_price'] 
          ?> </td>
         <td> <?php echo $department; ?> </td>
         <td>
         <button type="button"  class="btn btn-info editbtn" data-toggle="modal" data-target="#modal-edit">
         <i class="fa fa-pencil-square-o" height:50px !important;></i>
          </button>
        </td>
        </tr>
        <?php           
        }
           }
            if($get_result)
             {
           foreach($get_result as $res)
            {
             $department="Getema";
             if($res['ID']==12)
             {
               $query1 ="SELECT * FROM main_store_item WHERE id =1";
               $query_result = $conn->query($query1);
               if($query_result->num_rows> 0){
                   while($optionData=$query_result->fetch_assoc()){
                   $get_resin =$optionData['unit_price'];
               }
              }
             }
             if($res['ID']==13)
             {
               $query1 ="SELECT * FROM main_store_item WHERE id =2";
               $query_result = $conn->query($query1);
               if($query_result->num_rows> 0){
                   while($optionData=$query_result->fetch_assoc()){
                   $gel_res =$optionData['unit_price'];
               }
              }
             }
               ?>  
              <tr>
              <td> <?php echo $res['ID']; ?> </td>
              <td> <?php echo $res['ITEM'] ?> </td>
              <td> <?php echo $res['UOM']; ?> </td>
              <td> <?php echo $res['BALANCE']; ?> </td>
              <td> <?php
              if($res['ID']==12){
                  echo $get_resin;
                }
              elseif($res['ID']==13){
                echo $gel_res;
               }
                else 
                  echo $res['unit_price'];
                ?> </td>
              <td> <?php 
              if($res['ID']==12){
                  echo (double)$res['BALANCE']*(double)$get_resin ;
                }
              elseif($res['ID']==13){
                  echo (double)$res['BALANCE']*(double)$gel_res ;
                }
                else
                echo (double)$res['BALANCE']*(double)$res['unit_price']  ?> </td>
              <td> <?php echo $department; ?> </td>
                <td>
                <button type="button"  class="btn btn-info editbtn" data-toggle="modal" data-target="#modal-edit">
                <i class="fa fa-pencil-square-o" height:50px !important;></i>
                 </button>
               </td>
              
               </tr>
               <?php           
               }
                       }
            if($result)
            {
            foreach($result as $row)
            {
            $department="Genda";
              if($row['ID']==20)
            {
              $query ="SELECT * FROM main_store_item WHERE id =1";
              $query_result = $conn->query($query);
              if($query_result->num_rows> 0){
                  while($optionData=$query_result->fetch_assoc()){
                  $option =$optionData['unit_price'];
              }
              }
            } 
            if($row['ID']==21)
            {
              $query ="SELECT * FROM main_store_item WHERE id =2";
              $query_result = $conn->query($query);
              if($query_result->num_rows> 0){
                  while($optionData=$query_result->fetch_assoc()){
                  $gend_gel =$optionData['unit_price'];
              }
              }
            } 
            ?>  
          <tr>
            <td> <?php echo $row['ID']; ?> </td>
            <td> <?php echo $row['ITEM'] ?> </td>
            <td> <?php echo $row['UOM']; ?> </td>
            <td> <?php echo $row['BALANCE']; ?> </td>
            <td> <?php 
            if($row['ID']==20){
                echo $option;
              }
            if($row['ID']==21){
              echo $gend_gel;
            }
            else 
             echo $row['unit_price']; ?> </td>
            <td> <?php
            if($row['ID']==20){
            echo (double)$row['BALANCE']*(double)$option ;
             }
             if($row['ID']==21){
              echo (double)$row['BALANCE']*(double)$gend_gel ;
               }
          else
          echo (double)$row['BALANCE']*(double)$row['unit_price']  ?> </td>
            <td> <?php echo $department; ?> </td>
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
    <strong>Copyright &copy; 2014-2021 <a href="#">SDT</a>.</strong> All rights reserved.
  </footer>

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
                $('#uom').val(data[2]);
                $('#quantity').val(data[3]);
                $('#unit_price').val(data[4]);
                $('#total_cost').val(data[5]);
                $('#remark').val(data[6]);

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
