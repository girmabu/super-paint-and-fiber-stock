<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Super Fiber Stock</title>
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
        <a href="chem_index.php" class="nav-link" >
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
                <a href="formulation.php" class="nav-link">
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
                    <a href="Production/chemical_balance.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Production Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Production/Fiber_balance.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Fiber Balance</p>
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
                    <a href="Genda/Chemical_balance.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Chemical Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Genda/Fiber_balance.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Fiber Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Genda/Genda_out.php" class="nav-link">
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
                    <a href="Getema/Chemical_balance.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Chemical Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Getema/Fiber_balance.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Fiber Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Getema/Getema_out.php" class="nav-link">
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
  <!-- modal add formulation -->
  <div class="modal fade" id="modal-add"  tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="color:blue">
              <h4 class="modal-title">Add Formulation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form class="form-horizontal" action="process.php" method="POST">
              <div class="card-body">
               <div class="form-group row"  id="minimal_div">
                <label for="inputEmail3"class="col-sm-2 col-form-label" id="label_div">Item:</label>
                <div class="col-sm-10">
                  <input type="float" required name="ITEM" required class="form-control" id="ITEM">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">UNIT:</label>
                 <div class="col-sm-10">
                  <input type="text" value="KG" readonly required name="UNIT" required class="form-control" id="UNIT">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">F_450:</label>
                 <div class="col-sm-10">
                  <input type="double" required name="F_450" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">W_400:</label>
                 <div class="col-sm-10">
                  <input type="text" name="W_400" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"> GP_RESIN:</label>
                <div class="col-sm-10">
                  <input type="text" name="GP_RESIN" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"> N_RESIN:</label>
                <div class="col-sm-10">
                  <input type="text" name="N_RESIN" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"> SP_GEL:</label>
                <div class="col-sm-10">
                  <input type="text" name="SP_GEL" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"> GP_GEL:</label>
                <div class="col-sm-10">
                  <input type="text" name="GP_GEL" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"> CALCIUM:</label>
                <div class="col-sm-10">
                  <input type="text" name="CALCIUM" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"> HARDNER:</label>
                <div class="col-sm-10">
                  <input type="text" name="HARDNER" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"> PIGMENT:</label>
                <div class="col-sm-10">
                  <input type="text" name="PIGMENT" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"> MAJ:</label>
                <div class="col-sm-10">
                  <input type="text" name="MAJ" class="form-control">
                 </div>
              </div>
              <div class="form-group row"  id="minimal_div">
                <label for="inputEmail3"class="col-sm-2 col-form-label" id="label_div">Dept:</label>
                 <select name="PREFIX" required id="minimal_input" style="width:83% !important">
                  <option value="">Select...</option>
                  <option value="PRO">Production</option>
                  <option value="GET">Getema</option>
                  <option value="GEN">Genda</option>
                </select>
              </div>
            </div>
            <div class="card-footer">
             <button type="submit" name="insertformulation" class="btn btn-block btn-outline-success btn-lg">Add Formulation</button>
             <button type="submit"  class="btn btn-block btn-outline-danger btn-sm" data-dismiss="modal">Cancel</button>
            </div>
           </form>
          </div>
          <!-- /.modal-content -->
         </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- modal edit formulation -->
  <div class="modal fade" id="modal-edit-formulation" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><a style="color:blue!important">Edit Formulation</a></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- here you can edit the data of fiber main store -->
             <form action="db/production_insert.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id"id="formulation_id">
                        <div class="form-group">
                            <label> Product Type </label>
                            <input type="text" name="PRODUCT_TYPE" id="product_type" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Unit </label>
                            <input type="text" name="UNIT" id="unit" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> F_450 </label>
                            <input type="double" name="F_450" id="f_450" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> W_400 </label>
                            <input type="double" name="W_400" id="w_400" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> GP_Resin </label>
                            <input type="double" name="GP_RESIN" id="gp_resin" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>N_Resin </label>
                            <input type="double" name="N_RESIN" id="n_resin" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> SP_Gel </label>
                            <input type="double" name="SP_GEL" id="sp_gel" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> GP_GEL </label>
                            <input type="text" name="GP_GEL" id="gp_gel" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Calcium </label>
                            <input type="double" name="CALCIUM" id="calcium" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> hardner </label>
                            <input type="double" name="HARDNER" id="hardner" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Pigment </label>
                            <input type="double" name="PIGMENT" id="pigment" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Maj </label>
                            <input type="double" name="MAJ" id="maj" class="form-control" >
                        </div>
                    </div>
             </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- This is Edit modal not executed at the background -->
              <button type="submit" name="UpdateFormulation" class="btn btn-primary">
                <i class="fa fa-pencil-square-o" height:50px !important;></i></button>
            </div>
            </form>
          </div>
       </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
  </div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Formulation</h1>
          </div>
          <?php
             $dis="";
              if($session==2)
               {
                $dis='disabled';
             }
            ?>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><button class="btn btn-primary" data-toggle="modal" <?php echo $dis; ?> data-target="#modal-add"> add
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button></li>
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
               $query = "SELECT * FROM General_Formulation";
               $query_run = mysqli_query($connection, $query);
              ?>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                <th scope="col">ID</th>
                <th scope="col">ITEM</th>
                <th scope="col"> UNIT </th>
                <th scope="col">F_450 </th>
                <th scope="col">W_400 </th>
                <th scope="col"> GP_RESIN</th>
                <th scope="col"> N_RESIN </th>
                <th scope="col">SP_GEL</th>
                <th scope="col">GP_GEL </th>
                <th scope="col"> CALCIUM </th>
                <th scope="col"> HARDNER</th>
                <th scope="col"> PIGMENT</th>
                <th scope="col"> MAJ</th>
                <th scope="col"> EDIT </th>
                <!-- <th scope="col"> DELETE </th> -->
                </tr>
                </thead>
                <?php
                 if ($query_run) {
                   foreach ($query_run as $row) {
                ?>  
                <tr>
                <td> <?php echo $row['ID']; ?> </td>
                <td> <?php echo $row['ITEM']; ?> </td>
                <td> <?php echo $row['UNIT']; ?> </td>
                <td> <?php echo $row['F_450']; ?> </td>
                <td> <?php echo $row['W_400']; ?> </td>
                <td> <?php echo $row['GP_RESIN']; ?> </td>
                <td> <?php echo $row['N_RESIN']; ?> </td>
                <td> <?php echo $row['SP_GEL']; ?> </td>
                <td> <?php echo $row['GP_GEL']; ?> </td>
                <td> <?php echo $row['CALCIUM']; ?> </td>
                <td> <?php echo $row['HARDNER']; ?> </td>
                <td> <?php echo $row['PIGMENT']; ?> </td>
                <td> <?php echo $row['MAJ']; ?> </td>
                <td>
                <?php
                $dis="";
                if($session==2)
                {
                  $dis='disabled';
                }
                ?>
                  <button data-toggle="modal" href="#modal-edit-formulation" <?php echo $dis; ?> class="btn btn-info editbtn">
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

<!-- jQuery -->
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
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#modal-edit-formulation').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#formulation_id').val(data[0]);
                $('#product_type').val(data[1]);
                $('#unit').val(data[2]);
                $('#f_450').val(data[3]);
                $('#w_400').val(data[4]);
                $('#gp_resin').val(data[5]);
                $('#n_resin ').val(data[6]);
                $('#sp_gel').val(data[7]);
                $('#gp_gel').val(data[8]);
                $('#calcium').val(data[9]);
                $('#hardner').val(data[10]);
                $('#pigment').val(data[11]);
                $('#maj').val(data[12]);
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
