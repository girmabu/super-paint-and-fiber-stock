<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rodas Paint Industry</title>
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
        <a href="#" class="nav-link">
        <form action="save.php" method="POST" style="display:flex">
          <input type="date" name="date"  class="form-control" required>
          <button  type="submit" class="fa fa-save" aria-hidden="true"  style=" border:none" name="save"> save</button>
        </form>
        </a>
      </li>

 
      <li class="breadcrumb-item">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-in">
        <i class="fa fa-cart-plus" aria-hidden="true"></i>In
        </a>
      </i>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-out">
        <i class="fa fa-outdent" aria-hidden="true"></i>out
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">
        <i class="fa fa-history" aria-hidden="true"> History</i>
        </a>
      </li>


    
    </ul>
     

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
       <?php
        $conn = new mysqli('localhost','root','','ssms');
        $result3 = mysqli_query($conn, "SELECT * FROM paint_notification"); 
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
      <span class="brand-text font-weight-light">Rodas Paint Industry</span>
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
                Main Store
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
  <!-- out modal -->
  <div class="modal fade" id="modal-out">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="color:blue">
              <h4 class="modal-title">Item Out from  Paint Main Store</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form class="form-horizontal" action="process.php" method="POST">
              <div class="card-body">
               <div class="form-group row"  id="minimal_div">
                <label for="inputEmail3">Discription of Item</label>
                <select class="form-control" name="id" required id="inputName">
                 
                   <?php 
                   include('connect.php');
                   $query ="SELECT id,itemname,unit FROM msitementry order by id ASC";
                   $result = $conn->query($query);
                   if($result->num_rows> 0){
                   while($optionData=$result->fetch_assoc()){
                    $id =$optionData['id'];
                      $option =$optionData['itemname'];
                      $uom=$optionData['unit'];
                    ?>
                    <option value="<?=$id?>"><?php echo $option;echo " /"; echo $uom;echo "/ id=";echo $id; ?> </b> </option>
                    <?php
                    }}
                   ?>
                </select>
              </div>
              <div class="form-group row" >
              
                 <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                  <input type="float" required name="quantity" required class="form-control" id="inputPassword3" placeholder="Quantity">
               
              </div>
             
              <div class="form-group row">
              
              
                 <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
                  <input type="date" required name="date" class="form-control">
            
              </div>
              <div class="form-group row">
                 <label for="inputPassword3">Approved By</label>
                  <input type="text" name="checked_by" value="<?php echo $_SESSION['name']; ?>" readonly class="form-control">
              </div>
              <div class="form-group row">
              <label for="inputPassword3"> Received Departement</label>
                 <select name="received_by" required id="minimal_input" class="form-control" required >
                 <option value="">Select......</option>
                  <option value="Electric">Electric</option>
                  <option value="Construction">Construction</option>
                  <option value="Production">Production</option>
                  <option value="Metal">Metal</option>
                  <option value="Flower_pot">Flower_pot</option> 
                  <option value="Genda_getema">Genda_getema</option>
                  <option value="Technic">Technic</option>
                  <option value="Finishing">Finishing</option>
                  <option value="sales">sales</option>
                  <option value="Nibret_astedader">Nibret_ stedader</option>
                  <option value="Mekanisa">Mekanisa</option>
                  <option value="Transfer">Transfer</option>
                  <option value="other">other</option>
                 </select>
              </div>
              <div class="form-group row">
               <label for="inputPassword3" class="col-sm-2 col-form-label">Remark</label>
                <input type="text" name="remark" class="form-control"  placeholder="type here ..cause.. and any other reason">
               </div>
               <br>
               <br>
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="main_store_out" class="btn btn-primary float-right">Save changes</button>
            </div>
            
           
           </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- in modal -->
  <div class="modal fade" id="modal-in">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="color:blue">
              <h4 class="modal-title">Item Add</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form class="form-horizontal" action="process.php" method="POST">
              <div class="card-body">
               <div class="form-group row"  id="form-group">
               <label for="inputStatus">Description of Item</label>
                 <select class="form-control" name="id" required id="inputName">
                   <?php 
                   include('connect.php');
                   $query ="SELECT id,itemname,unit FROM msitementry order by id ASC";
                   $result = $conn->query($query);
                   if($result->num_rows> 0){
                   while($optionData=$result->fetch_assoc()){
                    $id =$optionData['id'];
                      $option =$optionData['itemname'];
                      $uom=$optionData['unit'];
                    ?>
                    <option value="<?=$id?>"><?php echo $option;echo " /"; echo $uom;echo "/ id=";echo $id; ?> </b> </option>
                    <?php
                    }
                  }
                   ?>
                </select>
              </div>
              <div class="form-group row">
              <label for="inputStatus">Quantity</label>
                  <input type="number" step="any" required name="quantity" required class="form-control" id="inputName" placeholder="Quantity">
                
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
                  <input type="date" required name="date" class="form-control">
                
              </div>
              <div class="form-group row">
              <label for="inputStatus">Origin</label>
                 <select name="origin" required id="minimal_input" class="form-control" required>
                 <option value="China">China</option>
                   <option value="Dubai">Dubai</option>
                   <option value="India">India</option>
                   <option value="Local">locals</option>
                 </select>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Received by</label>
                  <input type="text" name="received_by" value="<?php echo $_SESSION['name']; ?>" readonly class="form-control">
              
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="savefile" class="btn btn-primary">Save changes</button>
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
   <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Item Edit</h4>
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
                            <label>Description of Item</label>
                            <input type="text" name="itemname" id="category_id" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                        <label>Edited By</label>
                            <input type="text" name="name"  value="<?php echo $_SESSION['name']; ?>" class="form-control"  readonly>
                        </div>
                      
                        <div class="form-group">
                            <label> Uom </label>
                            <input type="text" name="uom" id="uom" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label> Quantity </label>
                            <input type="text" name="quantity" id="quantity" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" id="date" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label>Remark</label>
                            <input type="input" name="remark" id="remark" class="form-control" placeholder="pls type for what you edit"  required>
                        </div>
                    </div>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="update" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
   </div>
      <!-- /.modal -->
   <!-- notification modal -->
   <div class="modal fade" id="modal-notification">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Paint Main Store Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- here you can edit the data of fiber main store -->
            <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'ssms');
                $query = "SELECT * FROM paint_notification";
                $query_run = mysqli_query($connection, $query);
            ?>
             <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Id</th>
                    <th>Item</th>
                    <th>Item_Id</th>
                    <th>Unit</th>
                    <th>Quantity requested</th>
                    <th>Store quantity</th>
                    <th>Checked by</th>
                    <th>Date</th>
                    <th>Approve</th>
                  </tr>
                  </thead>
                  <?php
                if($query_run)
                {
                    $i=1;
                    foreach($query_run as $row)
                    {
                        include('connect.php');
                        $item_id = $row['item_id'];
                        $query ="SELECT * FROM msitementry WHERE id =$item_id";
                        $result = $conn->query($query);
                        if($result->num_rows> 0){
                            while($optionData=$result->fetch_assoc()){
                            $option =$optionData['itemname'];
                            $quantity=$optionData['quantity'];
                        }
                    }
                    ?>
                        <tbody>
                            <tr>
                                <td> <?php echo $row['id'] ?> </td>
                                <td><a href=""> <?php echo $option; ?></a> </td>
                                <td> <?php echo $row['item_id'] ?></td>
                                <td> <?php echo $row['uom']; ?> </td>
                                <td> <?php echo $row['quantity']; ?> </td>
                                <td> <?php echo $quantity; ?> </td>
                                <td> <?php echo $row['checked_by']; ?> </td>
                                <td> <?php echo $row['date']; ?> </td>
                                <td>
                                    <?php
                                if((int)$quantity==0)
                                {
                                    ?>
                                   <button type="button" class="btn btn-success" disabled> Approve </button>
                                      <?php
                                } 
                                else if((int)$quantity!=0)
                                {
                                    ?>
                                   <button type="button" class="btn btn-success approvebtn" data-toggle="modal" data-target="#modal-approve"> Approve </button>
                                   <td>
                                      <?php
                                }
                                ?>
                                </td>
                            </tr>
                        </tbody>
                        <?php    
                        $i++;       
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
      </table>

            </div>
            <div class="modal-footer justify-content-between">
              <a type="button" class="btn btn-default" data-dismiss="modal"></a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
   </div>
     <!-- Approve modal -->
   <div class="modal fade" id="modal-approve" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Approve Requisition of Mini Store</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- here you can edit the data of fiber main store -->
            <form action="process.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="approve_id">
                        <div class="form-group">
                            <label> Item_Id </label>
                            <input type="text" name="item_id" id="item_id" readonly class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Uom </label>
                            <input type="text" name="uom" id="approve_uom" readonly class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Quantity </label>
                            <input type="text" name="quantity" readonly id="approve_quantity" class="form-control" disable >
                        </div>
                        <div class="form-group">
                            <label> Date </label>
                            <input type="date" name="date" id="approve_date" class="form-control" required>
                        </div>
                      
                        <div class="form-group">
                            <label> Approved_by </label>
                            <input type="text" value="<?php echo $_SESSION['name']; ?>"  readonly name="approved_by" id="approved_by" class="form-control" >
                        </div>
                      
                        <div class="form-group">
                            <label> Received_by </label>
                            <input type="text" name="received_by" id="received_by" readonly class="form-control" >
                        </div>
                    </div>
             </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="approve" class="btn btn-primary">Send Changes</button>
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
            <h1>Paint Main Store Raw Material Balance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="add.php"> add
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
        <?php
         $session= $_SESSION['role'];
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
                $sql = "SELECT * FROM msitementry";
                $result=mysqli_query($connection,$sql);
                $query = "SELECT * FROM msitementry";
                $query_run = mysqli_query($connection, $query);
            ?>
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Id</th>
                  <th>Category</th>
                    <th>Discription of Item</th>
                    <th>Unit of Measurement</th>
                    <th>Balance</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>

                  
                  <?php
         if($query_run)
         {
            foreach($query_run as $row)
            {
            
        ?>  
       <tr>
       <td> <?php echo $row['id']; ?> </td>
       <td> <?php echo $row['type']; ?> </td>
         <td> <?php echo $row['itemname'] ?> </td>
         <td> <?php echo $row['unit']; ?> </td>
         <td> <?php echo $row['quantity']; ?> </td>
         <td>
          <?php
          $dis="";
          if($session==2)
          {
            $dis='disabled';
          }
          ?>
         <button type="button"  class="btn btn-info editbtn" <?php echo $dis; ?> data-toggle="modal" data-target="#modal-edit">
         <i class="fa fa-pencil-square-o" height:50px !important;></i>
          </button>
        </td>
        <td>
        <button type="button" class="btn btn-danger deletebtn"<?php echo $dis; ?> data-toggle="modal" data-target="#modal-delete">
        <i class="fa fa-times"></i>
        </a>
          </td>
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


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2024 <a href="#">Stock Management System</a>.</strong> All rights reserved.
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
