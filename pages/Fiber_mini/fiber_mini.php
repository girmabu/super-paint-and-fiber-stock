<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Super Fiber Stock</title>
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
  <style>
#hover:hover{
  background-color:cyan;
  text: requested;
}
  </style>
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
        <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-request">
        <i class="fa fa-cart-plus" aria-hidden="true"></i>Request
        </a>
      </i>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-out">
        <i class="fa fa-minus-circle fa-1x"  aria-hidden="true"></i></i>out
        </a>
      </li>
      <?php
        $conn = new mysqli('localhost','root','','ssms');
        $result3 = mysqli_query($conn, "SELECT * FROM notification"); 
        $i=0;
        while( $res4 = mysqli_fetch_assoc($result3) ) { 
        $i++; 
        }
       ?>
      <li class="nav-item dropdown">
        <a class="nav-link notificationbtn" data-toggle="modal" data-target="#modal-mini-notification">Requested
          <i class="far fa-bell" id="hover"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $i?></span>
       </a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
       <?php
        $conn = new mysqli('localhost','root','','ssms');
        $result3 = mysqli_query($conn, "SELECT * FROM mini_notification"); 
        $j=0;
        while( $res4 = mysqli_fetch_assoc($result3) ) { 
        $j++; 
        }
       ?>
      <li class="nav-item dropdown">
        <a class="nav-link notificationbtn" data-toggle="modal" data-target="#modal-chem-notification">
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
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Fiber Mini Store
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
        
              <li class="nav-item">
                <a href="fiber_mini.php" class="nav-link">
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
              <h4 class="modal-title">Fiber mini store item out form</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form class="form-horizontal" action="process.php" method="POST">
              <div class="card-body">
               <div class="form-group row"  id="minimal_div">
                <label for="inputEmail3"class="col-sm-2 col-form-label" id="label_div">Product Name</label>
                 <select name="main_store_item_id" required id="minimal_input" style="width:83% !important">
                  <option value="">Select...</option>
                   <?php 
                   include('connect.php');
                    $query ="SELECT * FROM main_store_item where code=1";
                     $result = $conn->query($query);
                     if($result->num_rows> 0){
                     while($optionData=$result->fetch_assoc()){
                     $option =$optionData['item_name'];
                     $id =$optionData['id'];
                     $uom = $optionData['uom'];
                     ?> 
                     <option value="<?php echo $id; ?>"><?php  echo $id; echo "----"; echo $option;echo "------------"; echo $uom;?> </option>
                     <div class="form-group">
                    <?php
                    }}
                   ?>
                </select>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                 <div class="col-sm-10">
                  <input type="float" required name="outs" required class="form-control" placeholder="Quantity">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Ref_no</label>
                 <div class="col-sm-10">
                  <input type="text" name="ref_no" class="form-control"  placeholder="Reference Number">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
                 <div class="col-sm-10">
                  <input type="date" required name="date" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Checked_by</label>
                 <div class="col-sm-10">
                  <input type="text" value="<?php echo $_SESSION['name']; ?>" readonly name="checked_by" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"> Received_by</label>
                 <select name="received_by" required id="minimal_input" required style="width:83% !important">
                 <option value="">Select......</option>
                  <option value="Electric">Electric</option>
                  <option value="Construction">Construction</option>
                  <option value="Production">Production</option>
                  <option value="Metal">Metal</option>
                  <option value="Flower_pot">Flower_pot</option> 
                  <option value="Genda_getema">Genda_getema</option>
                  <option value="Technic">Technic</option>
                  <option value="Finishing">Finishing</option>
                  <option value="Paint">Paint</option>
                  <option value="Nibret_astedader">Nibret_astedader</option>
                  <option value="Mekanisa">Mekanisa</option>
                  <option value="Transfer">Transfer</option>
                  <option value="other">other</option>
                 </select>
              </div>
            </div>
            <div class="card-footer">
             <button type="submit" name="fiber_mini_out" class="btn btn-block btn-outline-success btn-lg">Out</button>
             <button type="submit"  class="btn btn-block btn-outline-danger btn-sm" data-dismiss="modal">Cancel</button>
            </div>
           </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
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
                <label for="inputEmail3"class="col-sm-2 col-form-label" id="label_div">Product Name</label>
                 <select name="main_store_item_id" required id="minimal_input" style="width:83% !important">
                  <option value="">Select...</option>
                  <?php 
                            
                   $query ="SELECT * FROM main_store_item where code=1";
                   $result = $conn->query($query);
                   if($result->num_rows> 0){
                   while($optionData=$result->fetch_assoc()){
                   $option =$optionData['item_name'];
                   $id =$optionData['id'];
                   $uom = $optionData['uom'];
                   ?> 
                   <option value="<?php echo $id; ?>"><?php  echo $id; echo "----"; echo $option;echo "------------"; echo $uom;?> </option>
                  <div class="form-group">
                    
                   <?php
                   }}
                   ?>
                </select>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                 <div class="col-sm-10">
                  <input type="float" required name="quantity" required class="form-control" id="inputPassword3" placeholder="Quantity">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
                 <div class="col-sm-10">
                  <input type="date" required name="date" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Received By</label>
                 <div class="col-sm-10">
                  <input type="text" name="received_by" readonly value="<?php echo $_SESSION['name']; ?>" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"> Checked by</label>
                 <select name="checked_by" required id="minimal_input" required style="width:83% !important">
                 <option value="">Select...</option>
                 <option value="Yeshalem">Yeshalem</option>
                 <option value="Baharnesh">Beharnash</option>
                 <option value="Biftu">Biftu</option>
                 <option value="Martha">Martha</option>
                 <option value="Haimanot">Haimanot</option> 
                 <option value="Genet">Genet</option>
                 <option value="Kena">Kena</option>
                 <option value="Yenigus">Yenigus</option>
               
                  <option value="other">other</option>
                 </select>
              </div>
            </div>
            <div class="card-footer">
             <button type="submit" name="notification" class="btn btn-block btn-outline-success btn-lg">Send Request</button>
             <button type="submit"  class="btn btn-block btn-outline-danger btn-sm" data-dismiss="modal">Cancel</button>
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
              <h4 class="modal-title">Delete Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="process.php" method="POST">
            <div class="modal-body">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="delete_id">
                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deleteindex" class="btn btn-danger"> Yes !! Delete it. </button>
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
              <h4 class="modal-title">Edit Fiber Mini Store Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="process.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label> Item Name </label>
                            <input type="text" name="main_store_item_id" id="main_store_item_id" class="form-control" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label> Uom </label>
                            <input type="text" name="uom" id="uom" class="form-control" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label> Quantity </label>
                            <input type="text" name="quantity" id="quantity" class="form-control" >
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
  
   <!-- End of Approve Modal -->
   <div class="modal fade" id="modal-chem-notification">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Requested Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- here you can edit the data of fiber main store -->
            <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'ssms');

                $query = "SELECT * FROM mini_notification";
                $query_run = mysqli_query($connection, $query);
            ?>
             <table id="example" class="table table-bordered table-striped">
             <thead>
                <tr>
                  <th scope="col"> ID</th>
                  <th scope="col">Item Name</th>
                  <th scope="col">Item Id</th>
                  <th scope="col">uom</th>

                  <th scope="col">Quantity</th>
                  <th scope="col">Store Qty </th>
                  <th scope="col">Received_by</th>
                  <th scope="col">Checked by</th>
                  <th scope="col">Date </th>
                  <th scope="col">Approve </th>
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
                        $query ="SELECT item_name,id FROM main_store_item WHERE id =$item_id";
                        $result = $conn->query($query);
                        if($result->num_rows> 0){
                            while($optionData=$result->fetch_assoc()){
                            $option =$optionData['item_name'];
                            $main_id=$optionData['id'];
                             }
                           }
                           $query1 ="SELECT quantity FROM fiber_mini_item WHERE main_store_item_id =$main_id";
                           $result1 = $conn->query($query1);
                           if($result1->num_rows> 0){
                               while($optionData=$result1->fetch_assoc()){
                               $min_store =$optionData['quantity'];
                           }
                       }
                   ?>

                        <tbody>
                        <tr>
                                <td> <?php echo $row['id'] ?> </td>
                                <td> <?php echo $option ?></td>
                                <td> <?php echo $row['item_id']; ?> </td>
                                <td> <?php echo $row['uom']; ?> </td>
                                <td> <?php echo $row['quantity']; ?> </td>
                                <td styel="color:green !important"> <?php echo $min_store ?> </td>
                                <td> <?php echo $row['received_by']; ?> </td>
                                <td> <?php echo $row['checked_by']; ?> </td>
                                <td> <?php echo $row['date']; ?> </td>
                                <!-- <td>
                                    <button type="button" class="btn btn-success editbtn"> Edit </button>
                                </td> -->
                                <td>
                                  <?php
                                if((double)$min_store<$row['quantity'])
                                {
                                    ?>
                                  <button data-toggle="modal" href="#modal-approve-chemnotification" disabled class="btn btn-info approvechemnotification">approve
                                </button>
                                      <?php
                                } 
                                else if((double)$row['quantity']<=(double)$min_store)
                                {
                                    ?>
                                 <button data-toggle="modal" href="#modal-approve-chemnotification" class="btn btn-info approvechemnotification">approve
                                 </button>
                                      <?php
                                }
                                ?>
                               
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
   <!-- notification modal -->
   <div class="modal fade" id="modal-mini-notification">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Requisition Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- here you can edit the data of fiber main store -->
            <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'ssms');

                $query = "SELECT * FROM notification where remark=2";
                $query_run = mysqli_query($connection, $query);
            ?>
             <table id="example" class="table table-bordered table-striped">
             <thead>
                <tr>
                  <th scope="col"> ID</th>
                  <th scope="col">Item Name</th>
                  <th scope="col">Item Id</th>
                  <th scope="col">uom</th>
                  <th scope="col">quantity </th>
                  <th scope="col">received_by </th>
                  <th scope="col">checked_by </th>
                  <th scope="col">Date </th>
                  <th scope="col">Edit </th>
                  <th scope="col">Delete </th>
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
                        $query ="SELECT item_name FROM main_store_item WHERE id =$item_id";
                        $result = $conn->query($query);
                        if($result->num_rows> 0){
                            while($optionData=$result->fetch_assoc()){
                            $option =$optionData['item_name'];
                             }
                           }
                    ?>
                        <tbody>
                        <tr>
                                <td> <?php echo $row['id'] ?> </td>
                                <td> <?php echo $option ?></td>
                                <td> <?php echo $row['item_id']; ?> </td>
                                <td> <?php echo $row['uom']; ?> </td>
                                <td> <?php echo $row['quantity']; ?> </td>
                                <td> <?php echo $row['received_by']; ?> </td>
                                <td> <?php echo $row['checked_by']; ?> </td>
                                <td> <?php echo $row['date']; ?> </td>
                                <!-- <td>
                                    <button type="button" class="btn btn-success editbtn"> Edit </button>
                                </td> -->
                                <td>
                                  <a data-toggle="modal" href="#modal-edit-notification" class="btn btn-info editminibtn"><i class="fa fa-pencil-square-o" height:50px !important;></i>
                                  </a>
                                </td>
                                <td>
                                <a data-toggle="modal" href="#modal-deletenotification" class="btn btn-danger deleteminibtn"><i class="fa fa-times"></i>    
                                  </a>
                                   
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
   <div class="modal fade" id="modal-edit-notification" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Requisition</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- here you can edit the data of fiber main store -->
             <form action="process.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="req_id">
                        <div class="form-group">
                            <label> Item_name </label>
                            <input type="text" name="item_name" id="req_item" readonly class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Item_id </label>
                            <input type="text" name="item_id" id="req_item_id" readonly class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> uom </label>
                            <input type="text" name="uom" readonly id="req_uom" class="form-control" disable >
                        </div>
                        <div class="form-group">
                            <label> Quantity </label>
                            <input type="double" name="quantity" id="req_quantity" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Received_by </label>
                            <input type="text" name="received_by" id="req_received" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Checked_by </label>
                            <input type="text" name="checked_by" id="req_checked" class="form-control" >
                        </div>
                        
                        <div class="form-group">
                            <label> date </label>
                            <input type="text" name="date" id="req_date" readonly class="form-control" >
                        </div>
                    </div>
             </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- This is Edit modal not executed at the background -->
              <button type="submit" name="updatenotification" class="btn btn-primary">
                <i class="fa fa-pencil-square-o" height:50px !important;></i></button>
            </div>
            </form>
          </div>
       </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
   </div>
   <div class="modal fade" id="modal-approve-chemnotification">
        <div class="modal-dialog modal-xl">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Approve Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- here you can edit the data of fiber main store -->
             <form action="process.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="chem_id">
                        <div class="form-group">
                            <label> Item_name </label>
                            <input type="text" name="item_name" id="item_name" readonly class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Item_id </label>
                            <input type="text" name="item_id" id="item_id" readonly class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> uom </label>
                            <input type="text" name="uom" readonly id="chem_uom" class="form-control" disable >
                        </div>
                        <div class="form-group">
                            <label>Quantity </label>
                            <input type="double" name="quantity" readonly id="total_quantity" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> ref_no </label>
                            <input type="text" name="ref_no" class="form-control" placeholder="ref_no if any" >
                        </div>
                        <div class="form-group">
                            <label> Approved_by </label>
                            <input type="text" value="<?php echo $_SESSION['name']; ?>" readonly name="approved_by" id="chem_approved" placeholder="will assign login person" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> date </label>
                            <input type="date" name="date" id="date" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Received_by </label>
                            <input type="text" name="received_by" readonly id="received_by" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Checked_by </label>
                            <input type="text" name="checked_by" readonly id="checked_by" class="form-control" >
                        </div>
                       
                    </div>
                </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- This is Edit modal not executed at the background -->
                <button type="submit" name="approve_mininotification" class="btn btn-primary">
                  <i class="fa fa-pencil-square-o" height:50px !important;></i></button>
              </div>
            </form>
          </div>
       </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
   </div>
   <div class="modal fade" id="modal-deletenotification">
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
                        <input type="text" name="item_id" readonly id="delete_mininotification">
                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deleteminiindex" class="btn btn-danger"> Yes !! Delete it. </button>
                    </div>
                </form>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- modal used to add the item -->
  <div class="modal fade" id="modal-add"  tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="color:blue">
              <h4 class="modal-title">Add Item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form class="form-horizontal" action="process.php" method="POST">
              <div class="card-body">
              <div class="form-group row"  id="minimal_div">
                <label for="inputEmail3"class="col-sm-2 col-form-label" id="label_div">Product Name</label>
                 <select  name="main_store_item_id" required id="minimal_input" style="width:83% !important">
                  <option value="">Select...</option>
                  <?php
                   include('connect.php');
                    $query = "SELECT id,item_name,uom FROM main_store_item";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                    while ($optionData = $result->fetch_assoc()) {
                     $option = $optionData['item_name'];
                     $id = $optionData['id'];
                     $uom= $optionData['uom'];
                     ?>
                    <option value="<?php echo $id; ?>"><?php  echo $id; echo "----"; echo $option;echo "------------"; echo $uom;?> </b> </option>
                   <div class="form-group">
                   <?php
                   }}
                   ?>
                </select>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                 <div class="col-sm-10">
                  <input type="float" required name="quantity" required class="form-control" id="inputPassword3" placeholder="Quantity">
                 </div>
              </div>
            </div>
            <div class="card-footer">
             <button type="submit" name="insertdata" class="btn btn-block btn-outline-success btn-lg">Add</button>
             <button type="submit"  class="btn btn-block btn-outline-danger btn-sm" data-dismiss="modal">Cancel</button>
            </div>
           </form>
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
            <h1>Fiber Mini Store Item List</h1>
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
                $sql = "SELECT * FROM fiber_mini_item";
                $result=mysqli_query($connection,$sql);
                $num=mysqli_num_rows($result);
                $query = "SELECT * FROM fiber_mini_item";
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
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <?php
         if($query_run)
         {
            foreach($query_run as $row)
            {
                include('connect.php');
                $item_id = $row['main_store_item_id'];
                $query ="SELECT item_name FROM main_store_item WHERE id =$item_id";
                $result = $conn->query($query);
                if($result->num_rows> 0){
                    while($optionData=$result->fetch_assoc()){
                    $option =$optionData['item_name'];
                }
            }
        ?>  
       <tr>
         <td> <?php echo $row['id']; ?> </td>
         <td> <?php echo $option?> </td>
         <td> <?php echo $row['uom']; ?> </td>
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
         <i class="fa fa-pencil-square-o"></i>
        </button>
        </td>
        <td>
        <button type="button" class="btn btn-danger deletebtn" <?php echo $dis; ?> data-toggle="modal" data-target="#modal-delete">
        <i class="fa fa-minus-circle fa-1x"  aria-hidden="true"></i>
        </a>
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
    <strong>Copyright &copy; 2016-2024 <a href="#">SDT</a>.</strong> All rights reserved.
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
    {
      document.getElementById("item_name").value=""; //don't forget to set the textbox id
      document.getElementById("category_id").value="";
      document.getElementById("uom").value="";
    }
      $(document).ready(function () {
      $('.approvebtn').on('click', function () {
        $('#modal-approve-notification').modal('show');
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
      $('#modal-edit-notification').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function () {
          return $(this).text();
      }).get();
      console.log(data);
      $('#req_id').val(data[0]);
      $('#req_item').val(data[1]);
      $('#req_item_id').val(data[2]);
      $('#req_uom').val(data[3]);
      $('#req_quantity').val(data[4]);
      $('#req_received').val(data[5]);
      $('#req_checked').val(data[6]);
      $('#req_date').val(data[7]);


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
      $('#main_store_item_id').val(data[1]);
      $('#uom').val(data[2]);
      $('#quantity').val(data[3]);
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
<script>
      $(document).ready(function () {
      $('.approvechemnotification').on('click', function () {
        $('#modal-approve-chemnotification').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#chem_id').val(data[0]);
        $('#item_name').val(data[1]);
        $('#item_id').val(data[2]);
        $('#chem_uom').val(data[3]);
        $('#total_quantity').val(data[4]);
        $('#received_by').val(data[6]);
        $('#checked_by').val(data[7]);
        $('#date').val(data[8]);
    });
   });
</script>
</body>
</html>
