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
                            <label> convertion </label>
                            <input type="text" name="convertion" id="convertion" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Total cost </label>
                            <input type="text" readonly id="total_cost" class="form-control" >
                        </div>
                    </div>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updateminicost" class="btn btn-primary">Save changes</button>
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


      <!-- End of Approve Modal --> 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fiber(Mini Mini) Store Item and Cost List</h1>
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
                $fiber=0;
                $woven=0;
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'ssms');
                $get_balance = "SELECT * FROM getfiber_balance";
                $get_result=mysqli_query($connection,$get_balance);
                $gend_balance = "SELECT * FROM genfiber_balance";
                $gend_result=mysqli_query($connection,$gend_balance);
                $query = "SELECT * FROM profiber_balanceupdated";
                $query_run = mysqli_query($connection, $query);
            ?>
              <div class="card-body">
                <?php
              
                ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Item Name</th>
                    <th>Uom</th>
                    <th>Woven(PCS)</th>
                    <th>Woven(KG)</th>
                    <th>Cost(kg)</th>
                    <th>Total</th>
                    <th>Fiber(PCS)</th>
                    <th>Fiber(Kg)</th>
                    <th>Cost(kg)</th>
                    <th>Total</th>
                    <th>Grand T</th>
                    <th>Edit</th>
                  </tr>
                  </thead>
                  <?php
         if($query_run)
         {
            foreach($query_run as $row)
            {
                $item_id = $row['ITEM_ID'];
                $query ="SELECT * FROM general_formulation WHERE id =$item_id";
                $result = $conn->query($query);
                if($result->num_rows> 0){
                    while($optionData=$result->fetch_assoc()){
                    $name =$optionData['ITEM'];
                }
            }
            //The following code is used to pick the woven unit cost from main store item table
            $query_w ="SELECT * FROM main_store_item WHERE id =5";
            $result_w = $conn->query($query_w);
            if($result_w->num_rows> 0){
                while($optionData=$result_w->fetch_assoc()){
                $w_cost =$optionData['unit_price'];
                $w=$w_cost*$row['WOVEN_BALANCE_KG'];
                $woven+=$w;
            }
           }
          //The end of pick the woven cost from the main store item table
            $query_f ="SELECT * FROM main_store_item WHERE id =4";
            $result_f = $conn->query($query_f);
            if($result_f->num_rows> 0){
                while($optionData=$result_f->fetch_assoc()){
                $f_cost =$optionData['unit_price'];
                $f=$f_cost*$row['FIBER_BALANCE_KG'];
                $fiber+=$f;
            }
          }
            ?>  
          <tr>
            <td> <?php echo $row['ID']; ?> </td>
            <td> <?php echo $name ?> </td>
            <td> <?php echo $row['UNIT']; ?> </td>
            <td> <?php echo $row['WOVEN_BALANCE_PCS']; ?> </td>
            <td> <?php echo $row['WOVEN_BALANCE_KG'];?> </td>
            <td> <?php echo $w_cost ?> </td>
            <td> <?php echo $w_cost*$row['WOVEN_BALANCE_KG']; ?> </td>
            <td> <?php echo $row['FIBER_BALANCE_PCS']; ?> </td>
            <td> <?php echo $row['FIBER_BALANCE_KG']; ?> </td>
            <td> <?php echo $f_cost ?> </td>
            <td> <?php echo $f_cost*$row['FIBER_BALANCE_KG']; ?> </td>
            <td> <?php echo $w_cost*$row['WOVEN_BALANCE_KG']+$f_cost*$row['FIBER_BALANCE_KG'];?> </td>
            <td>
            <button type="button"  class="btn btn-info editbtn" disabled data-toggle="modal" data-target="#modal-edit">
            <i class="fa fa-pencil-square-o" height:50px !important;></i>
            </button>
            </td>
        
            </tr>
            <?php           
            }
        }
        if($get_result)
        {
           foreach($get_result as $row)
           {
               $item_id = $row['ITEM_ID'];
               $query ="SELECT * FROM general_formulation WHERE id =$item_id";
               $result = $conn->query($query);
               if($result->num_rows> 0){
                   while($optionData=$result->fetch_assoc()){
                   $name =$optionData['ITEM'];
               }
           }
           //The following code is used to pick the woven unit cost from main store item table
           $query_w ="SELECT * FROM main_store_item WHERE id =5";
           $result_w = $conn->query($query_w);
           if($result_w->num_rows> 0){
               while($optionData=$result_w->fetch_assoc()){
               $w_cost =$optionData['unit_price'];
               $w=$w_cost*$row['WOVEN_BALANCE_KG'];
                $woven+=$w;
                $f=$f_cost*$row['FIBER_BALANCE_KG'];
                $fiber+=$f;
           }
          }
         //The end of pick the woven cost from the main store item table
           $query_f ="SELECT * FROM main_store_item WHERE id =4";
           $result_f = $conn->query($query_f);
           if($result_f->num_rows> 0){
               while($optionData=$result_f->fetch_assoc()){
               $f_cost =$optionData['unit_price'];
           }
         }
           ?>  
         <tr>
           <td> <?php echo $row['ID']; ?> </td>
           <td> <?php echo $name ?> </td>
           <td> <?php echo $row['UNIT']; ?> </td>
           <td> <?php echo $row['WOVEN_BALANCE_PCS']; ?> </td>
           <td> <?php echo $row['WOVEN_BALANCE_KG'];?> </td>
           <td> <?php echo $w_cost ?> </td>
           <td> <?php echo $w_cost*$row['WOVEN_BALANCE_KG']; ?> </td>
           <td> <?php echo $row['FIBER_BALANCE_PCS']; ?> </td>
           <td> <?php echo $row['FIBER_BALANCE_KG']; ?> </td>
           <td> <?php echo $f_cost ?> </td>
           <td> <?php echo $f_cost*$row['FIBER_BALANCE_KG']; ?> </td>
           <td> <?php echo $w_cost*$row['WOVEN_BALANCE_KG']+$f_cost*$row['FIBER_BALANCE_KG'];?> </td>
           <td>
           <button type="button"  class="btn btn-info editbtn" disabled data-toggle="modal" data-target="#modal-edit">
           <i class="fa fa-pencil-square-o" height:50px !important;></i>
           </button>
           </td>
       
           </tr>
           <?php           
           }
        }
        if($gend_result)
        {
           foreach($gend_result as $row)
           {
               $item_id = $row['ITEM_ID'];
               $query ="SELECT * FROM general_formulation WHERE id =$item_id";
               $result = $conn->query($query);
               if($result->num_rows> 0){
                   while($optionData=$result->fetch_assoc()){
                   $name =$optionData['ITEM'];
               }
           }
           //The following code is used to pick the woven unit cost from main store item table
           $query_w ="SELECT * FROM main_store_item WHERE id =5";
           $result_w = $conn->query($query_w);
           if($result_w->num_rows> 0){
               while($optionData=$result_w->fetch_assoc()){
               $w_cost =$optionData['unit_price'];
               $w=$w_cost*$row['WOVEN_BALANCE_KG'];
                $woven+=$w;
                $f=$f_cost*$row['FIBER_BALANCE_KG'];
                $fiber+=$f;
           }
          }
         //The end of pick the woven cost from the main store item table
           $query_f ="SELECT * FROM main_store_item WHERE id =4";
           $result_f = $conn->query($query_f);
           if($result_f->num_rows> 0){
               while($optionData=$result_f->fetch_assoc()){
               $f_cost =$optionData['unit_price'];
           }
         }
           ?>  
         <tr>
           <td> <?php echo $row['ID']; ?> </td>
           <td> <?php echo $name ?> </td>
           <td> <?php echo $row['UNIT']; ?> </td>
           <td> <?php echo $row['WOVEN_BALANCE_PCS']; ?> </td>
           <td> <?php echo $row['WOVEN_BALANCE_KG'];?> </td>
           <td> <?php echo $w_cost ?> </td>
           <td> <?php echo $w_cost*$row['WOVEN_BALANCE_KG']; ?> </td>
           <td> <?php echo $row['FIBER_BALANCE_PCS']; ?> </td>
           <td> <?php echo $row['FIBER_BALANCE_KG']; ?> </td>
           <td> <?php echo $f_cost ?> </td>
           <td> <?php echo $f_cost*$row['FIBER_BALANCE_KG']; ?> </td>
           <td> <?php echo $w_cost*$row['WOVEN_BALANCE_KG']+$f_cost*$row['FIBER_BALANCE_KG'];?> </td>
           <td>
           <button type="button"  class="btn btn-info editbtn" disabled  data-toggle="modal" data-target="#modal-edit">
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
                $('#uom').val(data[2]);
                $('#quantity').val(data[3]);
                $('#unit_price').val(data[4]);
                $('#convertion').val(data[5]);
                $('#total_cost').val(data[6]);

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
