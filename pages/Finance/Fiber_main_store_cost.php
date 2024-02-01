<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Super Fiber Stock</title>
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
                            <label> Unit Price </label>
                            <input type="text" name="unit_price" id="unit_price" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> convertion </label>
                            <input type="text" name="convertion" id="convertion" class="form-control" >
                        </div>
                    </div>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatecost" class="btn btn-primary">Save changes</button>
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
      <span class="brand-text font-weight-light">Super Fiber</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
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
  <div class="modal fade" id="modal-add" >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="color:blue">
              <h4 class="modal-title">Add Item to Cost</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form class="form-horizontal" action="process.php" method="POST">
              <div class="card-body">
              <div class="form-group row"  id="minimal_div">
                <label for="inputEmail3"class="col-sm-2 col-form-label" id="label_div">Product Name</label>
                 <select  name="item_id" required id="minimal_input" style="width:83% !important">
                  <option value="">Select...</option>
                  <?php
                   include('connect.php');
                    $query = "SELECT id,item_name FROM main_store_item";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                    while ($optionData = $result->fetch_assoc()) {
                     $option = $optionData['item_name'];
                     $id = $optionData['id'];
                     $uom= $optionData['uom'];
                     ?>
                     <option value="<?php echo $id; ?>"><?php  echo $id; echo "----"; echo $option?> </option>
                   <div class="form-group">
                   <?php
                   }}
                   ?>
                </select>
              </div>
           
            </div>
            <div class="modal-footer justify-content-between">
             <button type="submit"  class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
             <button type="submit" name="addtocost" class="btn btn-primary btn-sm">Add</button>

            </div>
           </form>
          </div>
          <!-- /.modal-content -->
         </div>
        <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="modal-remove">
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
                        <input type="hidden" name="id" id="delete_id">
                        <h4> Do you want to remove this Data ??</h4>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="updateindex" class="btn btn-danger"> Yes. </button>
                    </div>
                </form>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
      <!-- End of Approve Modal --> 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fiber Main Store Item and Cost List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" data-toggle="modal" data-target="#modal-add"> add
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
              $total_kg=0;
              $total_cost=0;
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'ssms');
                $query = "SELECT * FROM main_store_item where have_cost=1";
                $query_run = mysqli_query($connection, $query);
            ?>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Item Name</th>
                    <th>Uom</th>
                    <th>main Qty</th>
                    <th>Mini Qty</th>
                    <th>mini mini Qty</th>
                    <th>Conversion</th>
                    <th>Unit Price</th>
                    <th>Total(kg,pcs,set)</th>
                    <th>Total Cost</th>
                    <th>Edit</th>
                    <th>Remove</th>
                  </tr>
                  </thead>
                  <?php
         if($query_run)
         {

            foreach($query_run as $row)
            {
              $option=0;
              $option12=0;
                $item_id = $row['id'];
                $query ="SELECT * FROM fiber_mini_item WHERE main_store_item_id =$item_id";
                $result = $conn->query($query);
                if($result->num_rows> 0){
                    while($optionData=$result->fetch_assoc()){
                    $option =$optionData['quantity'];
                }
            }
            $query ="SELECT * FROM chemical_store_item WHERE item_id =$item_id";
            $result = $conn->query($query);
            if($result->num_rows> 0){
                while($optionData=$result->fetch_assoc()){
                $option12 =$optionData['quantity'];
            }
        }
        ?>  
       <tr>
         <td> <?php echo $row['id']; ?> </td>
         <td> <?php echo $row['item_name'] ?> </td>
         <td> <?php echo $row['uom']; ?> </td>
         <td> <?php echo $row['quantity']; ?> </td>
         <td> <?php echo $option ?> </td>
         <td> <?php echo $option12 ?> </td>
         <td> <?php echo $row['convertion']; ?> </td>
         <td> <?php echo $row['unit_price']; ?> </td>
         <?php $total_kg= (double)($row['quantity']+$option+(double)$option12)*(double)$row['convertion'];
          $total_cost=$total_kg*(double)$row['unit_price'];
         ?>
         <td> <?php echo  number_format($total_kg) ?> </td>
         <td> <?php echo  number_format((double)$total_cost) ?> </td>
         <td>
         <button type="button"  class="btn btn-info editbtn" data-toggle="modal" data-target="#modal-edit">
         <i class="fa fa-pencil-square-o" height:50px !important;></i>
          </button>
        </td>
        <td>
         <button type="button"  class="btn btn-danger deletebtn" data-toggle="modal" data-target="#modal-remove">
         <i class="fa fa-minus-circle" aria-hidden="true"></i>
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
<!-- Approve button -->

<!-- modal code to display tofication table -->

    <!-- modal code to delete -->
    <script>
        $(document).ready(function () {
            $('.deletebtn').on('click', function () {
                $('#modal-remove').modal('show');
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
                $('#uom').val(data[2]);
                $('#unit_price').val(data[7]);
                $('#convertion').val(data[6]);

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
