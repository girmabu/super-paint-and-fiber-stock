<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Super Fiber Stock</title>
  <?php include 'connect.php' ?>
  <?php session_start();?>         
  <?php
  if (!isset($_SESSION['id'])) {         // condition Check: if session is not set. 
    header('location: ../../../login.php');   // if not set the user is sendback to login page.
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
  <style>
        #datatableid:hover {
            box-shadow: 10px 10px 8px 10px #888888;
        }
        .book-details {
            background-color: #f5f5f5;
        }
        * Dropdown styles */ .dropdown {
            max-width: 13em;
            margin: 80px auto 0;
            position: relative;
            width: 100%;
        }
        .dropdown-btn {
            background: none;
            font-size: 18px;
            width: 100%;
            border: none;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.7em 0.5em;
            border-radius: 0.5em;
            cursor: pointer;
        }
        .arrow {
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 6px solid #fff;
            transition: transform ease-in-out 0.3s;
        }
        .dropdown-btn:focus {
            --blue: #0046fd;
        }
        .dropdown-content {
            list-style: none;
            position: absolute;
            top: 3.2em;
            width: 100%;
            visibility: hidden;
            overflow: hidden;
        }
        .dropdown-content li {
            background: white;
            color: black;
            border-radius: 0.5em;
            position: relative;
            left: 100%;
            transition: 0.5s;
            transition-delay: calc(60ms * var(--delay));
        }
        .dropdown-btn:focus+.dropdown-content li {
            left: 0;
        }
        .dropdown-btn:focus+.dropdown-content {
            visibility: visible;
        }
        .dropdown-btn:focus>.arrow {
            transform: rotate(180deg);
        }
        .dropdown-content li:hover {
            background: #7d2ae8;
            color: white;
        }
        .dropdown-content li a {
            list-style: none;
            color: black;
        }
        #bt {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 5px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            height: 30px;
            margin-top: 2%;
            font-weight: bolder;
            color: while;
        }
        #bt a {
            list-style: none;
            text-decoration: none;
        }
        #bt:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
        #production {
            margin-left: 50px;
            margin-top: 30px;
        }
        #genda {
            margin-left: 700px;
            margin-top: -480px;
        }
        #getema {
            margin-left: 1350px;
            margin-top: -480px;
        }
        #out_form {
            width: 800px;
            height: 700px;
        }
        #item,
        #batch,
        #out_by,
        #UOM {
            width: 100px;
            height: 30px;
            margin-left: 100px;
        }
        #batch {
            margin-top: 10px;
            margin-left: 10px;
        }
        #out_by {
            margin-top: 20px;
            margin-left: 10px;
        }
        #header_or {
            margin-left: 150px;
        }
        #UOM {
            margin-left: 10px;
            margin-right: 10px;
        }
        #check {
            background-color: green;
            margin-left: -200px;
        }
        #To_Chemist {
            height: 700px;
            width: 400px;
            background-color: white;
        }
        #GP_RESIN,
        #GP_GEL,
        #um,
        #DATE,
        #NAME {
            width: 200px;
            height: 30px;
            margin-top: 20px;
        }
        #form_div {
            width: auto;
            height: auto;
            border-color: red;
            border-width: 100px;
            border: 1px solid black;
            margin-left: 10px;
            margin-right: 80px;
            border-radius: 10px;
        }
        #GP_RESIN {
            margin-left: 50px;
        }
        #GP_GEL {
            margin-left: 50px;
        }
        #um {
            margin-left: 50px;
        }
        #DATE {
            margin-left: 50px;
        }
        #NAME {
            margin-left: 50px;
        }
        #res {
            width: 800px;
            height: 50px;
            background-color: ivory;
            border: 1px solid black;
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
        <a href="../../../index3.html" class="nav-link">
        </a>
      </li>
     
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-outPaint">
        <i class="fa fa-outdent" aria-hidden="true"></i>To Paint
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Gen_chem_history.php" class="nav-link">
        <i class="fa fa-history" aria-hidden="true"> History</i>
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
                    <a href="../Production/chemical_balance.php.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Chemical Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../Production/Fiber_balance.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Fiber Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../Production/Production_out.php" class="nav-link">
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
                    <a href="Chemical_balance.php" class="nav-link">
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
                    <a href="Genda_out.php" class="nav-link">
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
                    <a href="#" class="nav-link">
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
  <!-- out modal -->
  <div class="modal fade" id="modal-outPaint">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="color:blue">
              <h4 class="modal-title">Out to Paint Mini Mini Store</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form class="form-horizontal" action="Genda_insert.php" method="POST">
              <div class="card-body">
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">GP Resin</label>
                 <div class="col-sm-10">
                  <input type="int" required name="GP_RESIN" required class="form-control" placeholder="Gp Resin (Drum)">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
                 <div class="col-sm-10">
                  <input type="date" required name="DATE" class="form-control">
                 </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Sent </label>
                 <div class="col-sm-10">
                  <input type="text" readonly value="<?php echo $_SESSION['name']; ?>" name="NAME" class="form-control">
                 </div>
              </div>
            <div class="card-footer">
             <button type="submit" name="GEN_PAINT" class="btn btn-block btn-outline-success btn-lg">Out</button>
             <button type="submit"  class="btn btn-block btn-outline-danger btn-sm" data-dismiss="modal">Cancel</button>
            </div>
           </form>
          </div>
          <!-- /.modal-content -->
        </div>
    </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- in modal -->

      <!-- /.modal -->
   <!-- notification modal -->
        <div class="card" style="margin-left:300px">
            <form action="Genda_out.php" method="POST" id="out_form">
                <select name="ITEM_ID" id="item">
                    <option value="">ITEM</option>
                    <?php
                    include('connect.php');
                    $query = "SELECT id, ITEM FROM General_Formulation WHERE PREFIX='GEN'";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($optionData = $result->fetch_assoc()) {
                            $option = $optionData['ITEM'];
                            $id = $optionData['id'];
                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $option; ?> </option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <input type="number" id="batch" name="BATCH" placeholder="batch" min="1" required></input>
                <input type="date" name="DATE" id="date_picker" required></input>
                <input type="TEXT" readonly value="<?php echo $_SESSION['name']; ?>" id="out_by" name="NAME" placeholder="sent by" required></input>
                <!-- <input type="TEXT" id="UOM" name="UOM" placeholder="UOM" required></input> -->
                <button type="submit" name="CHECK" id="checkk" class="btn btn-success">Check</button>
                <card-body">
                
                <?php
                            include("connect.php");
                            if (isset($_POST['CHECK'])) {

                                $UOM ="KG";
                                $DATE = $_POST['DATE'];
                                $NAME = $_POST['NAME'];

                                $BATCH = $_POST['BATCH'];
                                $ITEM_ID = $_POST['ITEM_ID'];

                                $connection = mysqli_connect("localhost", "root", "");
                                $db = mysqli_select_db($connection, 'ssms');

                                $query = "SELECT * FROM General_Formulation WHERE ID= '$ITEM_ID'";;
                                $query_run = mysqli_query($connection, $query);
                                $query1 = "SELECT WOVEN_BALANCE_KG,FIBER_BALANCE_KG,WOVEN_BALANCE_PCS,FIBER_BALANCE_PCS 
                                FROM genfiber_balance WHERE item_id='$ITEM_ID'";
                                $result1 = $conn->query($query1);
                                $query_run1 = mysqli_query($connection, $query1);

                                $sp_gel = "SELECT BALANCE FROM genchem_balance WHERE ID='17'";
                                $query_run2 = mysqli_query($connection, $sp_gel);

                                $pigment = "SELECT BALANCE FROM genchem_balance WHERE ID='18'";
                                $query_run3 = mysqli_query($connection, $pigment);

                                $n_resin = "SELECT BALANCE FROM genchem_balance WHERE ID='19'";
                                $query_run4 = mysqli_query($connection, $n_resin);

                                $gp_resin = "SELECT BALANCE FROM genchem_balance WHERE ID='20'";
                                $query_run5 = mysqli_query($connection, $gp_resin);


                                $gp_gel = "SELECT BALANCE FROM genchem_balance WHERE ID='21'";
                                $query_run6 = mysqli_query($connection, $gp_gel);

                              

                                $hardner = "SELECT BALANCE FROM genchem_balance WHERE ID='23'";
                                $query_run8 = mysqli_query($connection, $hardner);

                                $maj = "SELECT BALANCE FROM genchem_balance WHERE ID='24'";
                                $query_run9 = mysqli_query($connection, $maj);

                                                   // --------------------------VVVVVVVV----------------------------
                                                   $SP_GEL_SUMMARY = "SELECT * FROM summary  WHERE ID='17'";
                                                   $query_run12 = mysqli_query($connection, $SP_GEL_SUMMARY);
                                                   $PIGMENT_SUMMARY = "SELECT * FROM summary  WHERE ID='18'";
                                                   $query_run13 = mysqli_query($connection, $PIGMENT_SUMMARY);
                                                   $SP_RESIN_SUMMARY = "SELECT * FROM summary  WHERE ID='19'";
                                                   $query_run14 = mysqli_query($connection, $SP_RESIN_SUMMARY);
                                                   $GP_RESIN_SUMMARY = "SELECT * FROM summary  WHERE ID='20'";
                                                   $query_run15 = mysqli_query($connection, $GP_RESIN_SUMMARY);
                                                   $GP_GEL_SUMMARY = "SELECT * FROM summary  WHERE ID='21'";
                                                   $query_run16 = mysqli_query($connection, $GP_GEL_SUMMARY);
                                              
                                                   $HARDNER_SUMMARY = "SELECT * FROM summary  WHERE ID='23'";
                                                   $query_run18 = mysqli_query($connection, $HARDNER_SUMMARY);
                                                   $MAJ_SUMMARY = "SELECT * FROM summary  WHERE ID='24'";
                                                   $query_run19 = mysqli_query($connection, $MAJ_SUMMARY);
                                                   // --------------------------VVVVVVVV----------------------------  
                            ?>
                                <table id="datatableid" class="table table-bordered table-black">
                                    <thead>
                                        <tr>
                                            <th>product_type</th>
                                            <th>formulation</th>
                                            <th>formulation*batch</th>
                                            <th>NEW BALANCE</th>
                                            <th>status</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    //  if($query_run)
                                    //  {
                                    foreach ($query_run as $row)
                                    foreach ($query_run1 as $row1) {
                                    foreach ($query_run2 as $row2) {
                                    foreach ($query_run5 as $row5) {
                                    foreach ($query_run4 as $row4) {
                                    // foreach ($query_run7 as $row7) {
                                    foreach ($query_run6 as $row6) {
                                    foreach ($query_run3 as $row3) {
                                    foreach ($query_run9 as $row9) {
                                    foreach ($query_run8 as $row8) { {
                                    foreach($query_run12 as $row12){
                                    foreach($query_run13 as $row13){
                                    foreach($query_run14 as $row14){
                                    foreach($query_run15 as $row15){
                                    foreach($query_run16 as $row16){
                                    // foreach($query_run17 as $row17){
                                    foreach($query_run18 as $row18){
                                    foreach($query_run19 as $row19){
                                        $stock_in = 0;
                                        $F_OUT = $BATCH;
                                        $DEPARTMENT = "GEN";
                                        $fbk = $row1['FIBER_BALANCE_KG'];
                                        $FBP = $row1['FIBER_BALANCE_PCS'];
                                        $REMARK = $row['ITEM'];
                                        $f_450 = $row['F_450'];
                                        $f_t_pc = $FBP - $BATCH;                                      
                                        $f_450_x_batch = (double)$f_450  * (double)$BATCH;
                                        $TOTAL_BALANCE = (double)$fbk - (double)$f_450_x_batch;
                                        $W_OUT = $BATCH;
                                        $WBP = $row1['WOVEN_BALANCE_PCS'];
                                        $wbk = $row1['WOVEN_BALANCE_KG'];
                                        $w_t_pc = $WBP - $W_OUT;
                                        $w_400 = $row['W_400'];
                                        $w_400_x_batch = (double)$row['W_400'] *(double) $BATCH;   
                                        $TOTAL_BALANCE1 = $wbk - $w_400_x_batch;
                                        $hardner_x_batch =(double) $row['HARDNER'] *(double) $BATCH;
                                        $hbk = $row8['BALANCE'];
                                        $maj_x_batch = (double)$row['MAJ'] *(double) $BATCH;
                                        $mbk = $row9['BALANCE'];
                                        $pigment_x_batch =(double) $row['PIGMENT'] *(double) $BATCH;
                                        $pbk = $row3['BALANCE'];
                                 
                                         $gp_gel_x_batch =(double) $row['GP_GEL'] *(double) $BATCH;
                                        $gpbk = $row6['BALANCE'];
                                        $sp_gel_x_batch =(double) $row['SP_GEL'] *(double) $BATCH;
                                        $spbk = $row2['BALANCE'];
                                        $n_resin_x_batch =(double) $row['N_RESIN'] *(double) $BATCH;
                                        $nrbk = $row4['BALANCE'];  
                                        $gp_resin_x_batch =(double) $row['GP_RESIN'] *(double) $BATCH;
                                        $gprbk = $row5['BALANCE'];
                                        if ($f_450_x_batch > $fbk || $gp_resin_x_batch > $gprbk || $n_resin_x_batch > $nrbk
                                        ||$sp_gel_x_batch > $spbk|| $gp_gel_x_batch > $gpbk|| $pigment_x_batch > $pbk || 
                                        $maj_x_batch > $mbk ||$hardner_x_batch >$hbk||$w_400_x_batch>$wbk ){
                                            //=----------------------F_450-------------------------
                                                $F_OUT = 0;
                                                $f_t_pc = $FBP;
                                                $TOTAL_BALANCE = $fbk;
                                                $f_450_query = "UPDATE genfiber_balance SET FIBER_BALANCE_KG = '$TOTAL_BALANCE',FIBER_BALANCE_PCS ='$w_t_pc'
                                                WHERE ITEM_ID ='$ITEM_ID'";
                                              //=----------------------F_450-------------------------
                                            //----------------------W-450--------------------------
                                            $w_t_pc = 0;
                                            $W_OUT=0;
                                            $TOTAL_BALANCE1 =0;
                                          $w_400_query = "UPDATE genfiber_balance SET WOVEN_BALANCE_KG = '$TOTAL_BALANCE1',WOVEN_BALANCE_PCS='$w_t_pc' WHERE ITEM_ID ='$ITEM_ID'";
                                          $query_run = mysqli_query($conn, $w_400_query);
                                            //----------------------W-450--------------------------
                                            //    -----------------GP_RESIN----------------
                                           $GP_RESIN_ITEM = "GP_RESIN";
                                           $gp_resin = $row['GP_RESIN'];
                                           $gprbk = $row5['BALANCE'];
                                           $gp_resin_x_batch = 0;
                                           $TOTAL_BALANCE3 = $gprbk;
                                           $gp_resin_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE3' WHERE id='20'";
                                           $query_run1 = mysqli_query($conn, $gp_resin_query);
                                        //    ---------------GP_RESIN-------------------
                                            // ------------hardner-------------------
                                        $H_ITEM = "HARDNER";
                                        $hardner_x_batch = 0;
                                        $hardner = $row['HARDNER'];
                                        $hbk = $row8['BALANCE'];
                                        $TOTAL_BALANCE11 =$hbk;
                                        $hardner_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE11' WHERE id='23'";
                                        $query_run1 = mysqli_query($conn, $hardner_query);
                                        // ------------hardner----------------
                                        // -------------------maj-------------
                                        $maj = $row['MAJ'];
                                        $M_ITEM = "MAJ";
                                        $maj_x_batch =0;
                                        $mbk = $row9['BALANCE'];
                                        $TOTAL_BALANCE9 = $mbk;
                                        $maj_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE9' WHERE id='24'";
                                        $query_run1 = mysqli_query($conn, $maj_query);
                                        // -------------------maj-------------
                                         // -------------------pigment-------------
                                         $pigment = $row['PIGMENT'];
                                         $P_ITEM = "PIGMENT";
                                         $pigment_x_batch =0;
                                         $pbk = $row3['BALANCE'];
                                         $TOTAL_BALANCE8 =$pbk; 
                                         $pigment_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE8' WHERE id='18'";
                                         $query_run1 = mysqli_query($conn, $pigment_query);
                                        // -------------------pigment-------------
                                      
                                        // -------------------gp_gel-------------------
                                        $gp_gel = $row['GP_GEL'];
                                        $GEL_ITEM = "GP_GEL";
                                        $gp_gel_x_batch = 0;
                                        $gpbk = $row6['BALANCE'];
                                        $TOTAL_BALANCE6 = $gpbk;
                                        $gp_gel_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE6' WHERE id='21'";
                                        $query_run1 = mysqli_query($conn, $gp_gel_query);
                                        // -------------------gp_gel-------------------
                                        // ---------------------sp_gel-------------------
                                        $sp_gel = $row['SP_GEL'];
                                        $SP_GEL_ITEM = "SP_GEL";
                                        $sp_gel_x_batch =0;
                                        $spbk = $row2['BALANCE'];
                                        $TOTAL_BALANCE5 = $spbk;
                                        $sp_gel_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE5' WHERE id='17'";
                                        $query_run12 = mysqli_query($conn, $sp_gel_query);
                                        // ------------------------sp_gel------------------
                                        // --------------------N_RESIN------------------------
                                        $N_ITEM = "N_RESIN";
                                        $n_resin = $row['N_RESIN'];
                                        $n_resin_x_batch = 0;
                                        $nrbk = $row4['BALANCE'];
                                        $TOTAL_BALANCE4 = $nrbk;
                                        $n_resin_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE4' WHERE id='19'";
                                        $query_run12 = mysqli_query($conn, $n_resin_query);
                                          if($w_400_x_batch>$wbk){
                                       continue;
                                          }
                                          else{
                                        echo " <font color=red> stock is not sufficent<font>";
                                        break;
                                          }
                                        }  
                                        else if ($f_450_x_batch <= $fbk || $w_400_x_batch <= $wbk || $gp_resin_x_batch <= $gprbk || $n_resin_x_batch <= $nrbk
                                        ||$sp_gel_x_batch <= $spbk|| $gp_gel_x_batch <= $gpbk || $pigment_x_batch <= $pbk ||$maj_x_batch <= $mbk 
                                        ||$hardner_x_batch <= $hbk ) {{
                                            //-------------F_450--------------------------------
                                            $F_ITEM = "F_450";
                                            $f_450 = $row['F_450'];
                                            $f_450_x_batch = (double)$row['F_450'] * $BATCH;
                                            $fbk = $row1['FIBER_BALANCE_KG'];
                                            $TOTAL_BALANCE = $fbk - $f_450_x_batch;
                                            $FBP = $row1['FIBER_BALANCE_PCS'];
                                            $f_t_pc = $FBP - $BATCH;
                                            $F_OUT = $BATCH;
                                                $f_450_query = "UPDATE genfiber_balance SET FIBER_BALANCE_KG = '$TOTAL_BALANCE',FIBER_BALANCE_PCS ='$f_t_pc'
                                                 WHERE ITEM_ID ='$ITEM_ID'";
                                                $query_run = mysqli_query($conn, $f_450_query);
                                                $OUT_BALANCE = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN, STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)  
                                                 VALUES ('$F_ITEM','$DEPARTMENT','$UOM','$stock_in','$F_OUT','$f_t_pc', '$NAME','$DATE','$REMARK')";
                                                $query_run = mysqli_query($conn, $OUT_BALANCE);
                                            //-------------F_450--------------------------------                                     
                                            // -------------W_400-------------------------------
                                            $W_ITEM = "W_400";
                                            $WBP = 0;
                                            $W_OUT = $BATCH;
                                            $w_400_x_batch =(double) $row['W_400'] * $W_OUT;
                                            $w_400 = $row['W_400'];
                                            $wbk = 0;
                                            $w_t_pc = 0;
                                            $TOTAL_BALANCE1 = $wbk - $w_400_x_batch;
                                             $w_400_query = "UPDATE genfiber_balance SET WOVEN_BALANCE_KG = 
                                            '$TOTAL_BALANCE1',WOVEN_BALANCE_PCS='$w_t_pc' WHERE ITEM_ID ='$ITEM_ID'";
                                            $query_run = mysqli_query($conn, $w_400_query);
                                            
                                            $OUT_BALANCE = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN, STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)  
                                            VALUES ('$W_ITEM','$DEPARTMENT','$UOM','$stock_in','$W_OUT','$w_t_pc', '$NAME','$DATE','$REMARK')";
                                            $query_run = mysqli_query($conn, $OUT_BALANCE);
                                        // }
                                            // -------------W_400-------------------------------
                                                                      /////////////////FIBER AND WOVEN SUMMARY------------------
                                                                      $insert_fiber_summary = "SELECT * FROM fiber_summary WHERE FORM_ID =$ITEM_ID";
                                                                      $result133 = $conn->query($insert_fiber_summary);

                                                                      while ($option133 = $result133->fetch_assoc()) {
                                                                          $R_DATE = $option133['R_DATE'];
                                                                          $IN_BALANCE = $option133['STOCK_IN'];
                                                                          $OUT_BALANCE = $option133['STOCK_OUT'];
                                                                      }
                                                                           if ($R_DATE!== $DATE) {
                                                                          $IN_BALANCE=0;
                                                                          $OUT_BALANCE=0;
                                                                          $S_BALANCE=$OUT_BALANCE + $F_OUT;
                                                                          $S_BALANCE=$OUT_BALANCE + $W_OUT;
                                                                            
                                                                      } elseif ($R_DATE == $DATE) {
                                                                          $IN_BALANCE;
                                                                          $S_BALANCE=$OUT_BALANCE + $F_OUT;
                                                                          $S_BALANCE=$OUT_BALANCE + $W_OUT;
                                                                      }
                                                                      $update_fiber_summary = "UPDATE fiber_summary SET STOCK_IN = '$IN_BALANCE' , STOCK_OUT='$S_BALANCE' , R_DATE='$DATE', P_BALANCE='$f_t_pc' WHERE FORM_ID ='$ITEM_ID' AND ITEM='FIBER'";
                                                                      $query_run134 = mysqli_query($conn, $update_fiber_summary);

                                                                      $update_woven_summary = "UPDATE fiber_summary SET STOCK_IN = '$IN_BALANCE' , STOCK_OUT='$S_BALANCE' , R_DATE='$DATE', P_BALANCE='$w_t_pc' WHERE FORM_ID ='$ITEM_ID' AND ITEM='WOVEN'";
                                                                      $query_run134 = mysqli_query($conn, $update_woven_summary);


                                                                       /////////////////FIBER AND WOVEN------------------
                                            
                                            // --------------------N_RESIN------------------------  
                                              $N_ITEM = "N_RESIN";
                                              $n_resin = $row['N_RESIN'];
                                              $n_resin_x_batch = (double)$row['N_RESIN'] * $BATCH;
                                              $nrbk = $row4['BALANCE'];
                                              $TOTAL_BALANCE4 = $nrbk - $n_resin_x_batch;
                                              $n_resin_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE4' WHERE id='19'";
                                              $query_run12 = mysqli_query($conn, $n_resin_query);

                                              $OUT_DATE = (double)$row14['R_DATE'];
                                              $OUT_BALANCE = (double)$row14['STOCK_OUT'];
                                              $IN_BALANCE = (double)$row14['STOCK_IN'];
                                              if ($DATE !== $OUT_DATE) {
                                                  $OUT_BALANCE = 0;
                                                  $IN_BALANCE = 0;
                                                  $S_BALANCE = $OUT_BALANCE + $n_resin_x_batch;
                                              }
                                              if ($DATE == $OUT_DATE) {
                                                  $S_BALANCE = $OUT_BALANCE + $n_resin_x_batch;
                                                  $IN_BALANCE;
                                              }
                                              $n_resin_query = "UPDATE summary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE',R_DATE='$DATE', P_BALANCE = '$TOTAL_BALANCE4'  WHERE id='19'";
                                              $query_run12 = mysqli_query($conn, $n_resin_query);


                                              $OUT_BALANCE = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN, STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)  
                                              VALUES ('$N_ITEM','$DEPARTMENT' ,'$UOM','$stock_in','$n_resin_x_batch', '$TOTAL_BALANCE4', '$NAME','$DATE','$REMARK')";  

                                                   $n_resin_query1 = "UPDATE dailysummary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE' , P_BALANCE = '$TOTAL_BALANCE4'  WHERE id='19' AND R_DATE ='$DATE' ";
                                           
                                                 $query_run123 = mysqli_query($conn, $n_resin_query1);
                                                 
                                            // --------------------N_RESIN------------------------
                                            // ------------hardner-------------------
                                            $hardner = (double)$row['HARDNER'];
                                            $hardner_x_batch = (double)$row['HARDNER'] * (double)$BATCH;
                                            $H_ITEM = "HARDNER";
                                           
                                            $hbk = $row8['BALANCE'];
                                            $TOTAL_BALANCE11 =  $hbk-$hardner_x_batch;
                                            $hardner_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE11' WHERE id='23'";
                                            $query_run1 = mysqli_query($conn, $hardner_query);

                                            
                                           $OUT_DATE = $row18['R_DATE'];
                                           $OUT_BALANCE = $row18['STOCK_OUT'];
                                           $IN_BALANCE = $row18['STOCK_IN'];

                                           if ($DATE == $OUT_DATE) {
                                            $S_BALANCE = $OUT_BALANCE + $hardner_x_batch;
                                            $IN_BALANCE;
                                          }
                                          if ($DATE !== $OUT_DATE) {
                                            $OUT_BALANCE = 0;
                                            $IN_BALANCE = 0;
                                            $S_BALANCE = $OUT_BALANCE + $hardner_x_batch;
                                          }
                                          $hardner_query = "UPDATE summary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE' ,R_DATE='$DATE', P_BALANCE = '$TOTAL_BALANCE11'  WHERE id='23'";
                                          $query_run12 = mysqli_query($conn, $hardner_query);

                                         $OUT_BALANCE = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN, STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)  
                                             VALUES ('$H_ITEM','$DEPARTMENT' ,'$UOM','$stock_in','$hardner_x_batch', '$TOTAL_BALANCE11', '$NAME','$DATE','$REMARK')";
                                         $query_run = mysqli_query($conn, $OUT_BALANCE);

                                         $hardner_query1 = "UPDATE dailysummary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE' , P_BALANCE = '$TOTAL_BALANCE11'  WHERE id='23' AND R_DATE ='$DATE' ";
                                           
                                         $query_run123 = mysqli_query($conn, $hardner_query1);
                                            // ------------hardner----------------
                                            // -------------------maj-------------
                                            $maj = $row['MAJ'];
                                            $M_ITEM = "MAJ";
                                            $maj_x_batch = (double)$row['MAJ'] * $BATCH;
                                            $mbk = $row9['BALANCE'];
                                            $TOTAL_BALANCE9 = $mbk -$maj_x_batch;


                                            $maj_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE9' WHERE id='24'";
                                            $query_run1 = mysqli_query($conn, $maj_query);

                                            $OUT_DATE = $row19['R_DATE'];
                                            $OUT_BALANCE = $row19['STOCK_OUT'];
                                            $IN_BALANCE = $row19['STOCK_IN'];

                                            if ($DATE !== $OUT_DATE) {
                                                $OUT_BALANCE = 0;
                                                $IN_BALANCE = 0;
                                                $S_BALANCE = $OUT_BALANCE + $maj_x_batch;
                                            }
                                            if ($DATE == $OUT_DATE) {
                                                $S_BALANCE = $OUT_BALANCE + $maj_x_batch;
                                                $IN_BALANCE;
                                            }
                                            $maj_query = "UPDATE summary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE' ,R_DATE='$DATE', P_BALANCE = '$TOTAL_BALANCE9'  WHERE id='24'";
                                            $query_run12 = mysqli_query($conn, $maj_query);


                                            $OUT_BALANCE = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN, STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK) 
                                            VALUES ('$M_ITEM','$DEPARTMENT' ,'$UOM','$stock_in','$maj_x_batch', '$TOTAL_BALANCE9', '$NAME','$DATE','$REMARK')";
                                            $query_run = mysqli_query($conn, $OUT_BALANCE);



                                            $maj_query1 = "UPDATE dailysummary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE' , P_BALANCE = '$TOTAL_BALANCE9'  WHERE id='24' AND R_DATE ='$DATE' ";
                                           
                                            $query_run123 = mysqli_query($conn, $maj_query1);

                                            // -------------------maj-------------
                                            // ---------------PIGMENT-----------------
                                        $pigment = $row['PIGMENT'];
                                        $P_ITEM = "PIGMENT";
                                        $pigment_x_batch = (double)$row['PIGMENT'] * $BATCH;
                                        $pbk = $row3['BALANCE'];
                                        $TOTAL_BALANCE8 =$pbk-$pigment_x_batch;

                                        $pigment_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE8' WHERE id='18'";
                                        $query_run1 = mysqli_query($conn, $pigment_query);


                                        $OUT_DATE = $row13['R_DATE'];
                                        $OUT_BALANCE = $row13['STOCK_OUT'];
                                        $IN_BALANCE = $row13['STOCK_IN'];

                                        if ($DATE !== $OUT_DATE) {
                                            $OUT_BALANCE = 0;
                                            $IN_BALANCE = 0;
                                            $S_BALANCE = $OUT_BALANCE + $pigment_x_batch;
                                        }
                                        if ($DATE == $OUT_DATE) {
                                            $S_BALANCE = $OUT_BALANCE + $pigment_x_batch;
                                            $IN_BALANCE;
                                        }
                                        $pigment_query = "UPDATE summary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE' ,R_DATE='$DATE', P_BALANCE = '$TOTAL_BALANCE8'  WHERE id='18'";
                                        $query_run12 = mysqli_query($conn, $pigment_query);
                                        $OUT_BALANCE = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN, STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)  
                                        VALUES ('$P_ITEM','$DEPARTMENT' ,'$UOM','$stock_in','$pigment_x_batch', '$TOTAL_BALANCE8', '$NAME','$DATE','$REMARK')";
                                        $query_run = mysqli_query($conn, $OUT_BALANCE);                                    
                                        $pigment_query1 = "UPDATE dailysummary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE' , P_BALANCE = '$TOTAL_BALANCE8'  WHERE id='18' AND R_DATE ='$DATE' ";
                                        $query_run123 = mysqli_query($conn, $pigment_query1);
                                             // ---------------PIGMENT-----------------
                                         
                                            // -------------------gp_gel--------------------
                                            $gp_gel = $row['GP_GEL'];
                                            $GEL_ITEM = "GP_GEL";
                                            $gp_gel_x_batch = $row['GP_GEL'] * $BATCH;
                                            $gpbk = $row6['BALANCE'];
                                            $TOTAL_BALANCE6 = $gpbk - $gp_gel_x_batch;
                                            $gp_gel_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE6' WHERE id='21'";
                                            $query_run1 = mysqli_query($conn, $gp_gel_query);
                                            $OUT_DATE = $row16['R_DATE'];
                                            $OUT_BALANCE = $row16['STOCK_OUT'];
                                            $IN_BALANCE = $row16['STOCK_IN'];
                                            if ($DATE !== $OUT_DATE) {
                                                $OUT_BALANCE = 0;
                                                $IN_BALANCE = 0;
                                                $S_BALANCE = $OUT_BALANCE + $gp_gel_x_batch;
                                            
                                              
                                            }
                                            if ($DATE == $OUT_DATE) {
                                                $S_BALANCE = $OUT_BALANCE + $gp_gel_x_batch;
                                                $IN_BALANCE;
                                            }
                                            $gp_gel_query = "UPDATE summary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE' ,R_DATE='$DATE', P_BALANCE = '$TOTAL_BALANCE6'  WHERE id='21'";
                                            $query_run12 = mysqli_query($conn, $gp_gel_query);

                                   

                                            $OUT_BALANCE = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN, STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)  
                                           VALUES ('$GEL_ITEM','$DEPARTMENT' ,'$UOM','$stock_in','$gp_gel_x_batch', '$TOTAL_BALANCE6', '$NAME','$DATE',' $REMARK')";
                                            $query_run = mysqli_query($conn, $OUT_BALANCE);

                                            $gp_gel_query1 = "UPDATE dailysummary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE' , P_BALANCE = '$TOTAL_BALANCE6'  WHERE id='21' AND R_DATE ='$DATE' ";
                                           
                                            $query_run123 = mysqli_query($conn, $gp_gel_query1);

                                            // ----------------gp_gel-----------------------
                                            // ------------------SP_GEL-----------------------
                                            $sp_gel = $row['SP_GEL'];
                                            $SP_GEL_ITEM = "SP_GEL";
                                            $sp_gel_x_batch = (double)$row['SP_GEL'] * $BATCH;
                                            $spbk = $row2['BALANCE'];
                                            $TOTAL_BALANCE5 = $spbk - $sp_gel_x_batch;

                                            $sp_gel_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE5' WHERE id='17'";
                                            $query_run1 = mysqli_query($conn, $sp_gel_query);
                                            $OUT_DATE = $row12['R_DATE'];
                                            $OUT_BALANCE = $row12['STOCK_OUT'];
                                            $IN_BALANCE = $row12['STOCK_IN'];

                                            if ($DATE !== $OUT_DATE) {
                                                $OUT_BALANCE = 0;
                                                $IN_BALANCE = 0;
                                                $S_BALANCE = $OUT_BALANCE + $sp_gel_x_batch;
                                            }
                                            if ($DATE == $OUT_DATE) {
                                                $S_BALANCE = $OUT_BALANCE + $sp_gel_x_batch;
                                                $IN_BALANCE;
                                            }
                                            $sp_gel_query = "UPDATE summary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE' 
                                           ,R_DATE='$DATE', P_BALANCE = '$TOTAL_BALANCE5'  WHERE id='17'";
                                            $query_run12 = mysqli_query($conn, $sp_gel_query);

                                        

                                            $OUT_BALANCE = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN, STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)  
                                            VALUES ('$SP_GEL_ITEM' ,'$DEPARTMENT','$UOM','$stock_in','$sp_gel_x_batch', '$TOTAL_BALANCE5', '$NAME','$DATE','$REMARK')";
                                            $query_run = mysqli_query($conn, $OUT_BALANCE);
                                            
                                            
                                            


                                             $sp_gel_query1 = "UPDATE dailysummary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE' , P_BALANCE = '$TOTAL_BALANCE5'  WHERE id='17' AND R_DATE ='$DATE' ";
                                           
                                             $query_run123 = mysqli_query($conn, $sp_gel_query1);

                                            // -----------------SP_GEL------------------------

                                            // -------------GP_RESIN---------------------------
                                            $GP_RESIN_ITEM = "GP_RESIN";
                                            $gp_resin = $row['GP_RESIN'];
                                            
                                            $gprbk = $row5['BALANCE'];
                                            $gp_resin_x_batch = $row['GP_RESIN'] * $BATCH;
                                            $TOTAL_BALANCE3 = $gprbk - $gp_resin_x_batch;
                                            $gp_resin_query = "UPDATE genchem_balance SET BALANCE = '$TOTAL_BALANCE3' WHERE id='20'";
                                            $query_run1 = mysqli_query($conn, $gp_resin_query);
                                          
                                            $OUT_DATE = $row15['R_DATE'];
                                            $OUT_BALANCE = $row15['STOCK_OUT'];
                                            $IN_BALANCE = $row15['STOCK_IN'];

                                            if ($DATE == $OUT_DATE) {
                                                $S_BALANCE = $OUT_BALANCE + $gp_resin_x_batch;
                                                $IN_BALANCE;

                                            }
                                            if ($DATE !== $OUT_DATE) {
                                                $OUT_BALANCE = 0;
                                                $IN_BALANCE = 0;
                                                $S_BALANCE = $OUT_BALANCE + $gp_resin_x_batch;

                                            }
                                            $gp_resin_query = "UPDATE summary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE'
                                              ,R_DATE='$DATE', P_BALANCE = '$TOTAL_BALANCE3'  WHERE id='20'";
                                                 $query_run1 = mysqli_query($conn, $gp_resin_query);

                                                 $OUT_BALANCE = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN, STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)  
                                            VALUES ('$GP_RESIN_ITEM','$DEPARTMENT' ,'$UOM','$stock_in','$gp_resin_x_batch', '$TOTAL_BALANCE3', '$NAME','$DATE','$REMARK')";
                                            $query_run = mysqli_query($conn, $OUT_BALANCE);

                                            $gp_resin_query1 = "UPDATE dailysummary SET STOCK_OUT ='$S_BALANCE' ,STOCK_IN ='$IN_BALANCE', P_BALANCE = '$TOTAL_BALANCE3'  WHERE id='20' AND R_DATE ='$DATE' ";
                                            $query_run123 = mysqli_query($conn, $gp_resin_query1);

                                            $R_DATE_ALL = "SELECT R_DATE FROM dailysummary WHERE DEPARTEMENT='GEN' ";
                                            $result = $conn->query($R_DATE_ALL);

                                            while ($optionData = $result->fetch_assoc()) {
                                                
                                                $RDATE = $optionData['R_DATE']; 
                                                // echo $RDATE;
                                            }

                                           
                                                if($DATE!==$RDATE) {

                                                  $daily_summery="SELECT * FROM summary WHERE DEPARTEMENT='GEN'";
                                                  $query_summery = mysqli_query($conn, $daily_summery);
                                                  while ($optionData = $query_summery->fetch_assoc()) {
                                                      $ID=$optionData['ID'];
                                                      $RDATE = $optionData['R_DATE'];
                                                     $ITEM=$optionData['ITEM'];
                                                     $UOM=$optionData['UOM'];
                                                     $DEPARTEMENT=$optionData['DEPARTEMENT'];
                                                     $STOCK_IN=$optionData['STOCK_IN'];
                                                     $STOCK_OUT=$optionData['STOCK_OUT'];
                                                     $P_BALANCE=$optionData['P_BALANCE'];
                                                     $PREFIX=$optionData['PREFIX'];
                                                     $Daily_Balance_History = " INSERT INTO dailysummary (ID,R_DATE,ITEM,UOM,DEPARTEMENT,STOCK_IN,STOCK_OUT,P_BALANCE,PREFIX) 
                                                     VALUES ('$ID','$RDATE','$ITEM','$UOM','$DEPARTEMENT','$STOCK_IN','$STOCK_OUT','$P_BALANCE','$PREFIX')";
                                                       
                                                     $query_run7 = mysqli_query($conn, $Daily_Balance_History);



                                                // $Daily_Balance_History =" INSERT INTO dailysummary SELECT * FROM summary WHERE DEPARTEMENT='GEN'";
                                                // $query_run7 = mysqli_query($conn, $Daily_Balance_History);
                                            }
                                          
                                        } 




                                        {


                                    ?>

                                                                                                                                                                                        <thead>

                                                                                                                                                                                            <tr>
                                                                                                                                                                                            <tr>
                                                                                                                                                     
                                                                                                           
                                                                                                                                                                                                <td>F-450(KG)</td>
                                                                                                                                                                                                <td> <?php echo $f_450 ?></td>
                                                                                                                                                                                                <td> <?php echo $f_450_x_batch ?></td>
                                                                                                                                                                                                <td> <?php echo $TOTAL_BALANCE ?> </td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <?php
                                                                                                                                                                                                    if ($TOTAL_BALANCE < 0) {
                                                                                                                                                                                                        echo "<font color=red>insufficent stock balance</font>";
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo "<font color=green>stock is sufficent</font>";
                                                                                                                                                                                                    }
                                                                                                                                                                                                    ?></td>
                                                                                                                                                                                            </tr>
                                                                                                                                                                                            <tr>
                                                                                                                                                                                                <td>W_400(KG)</td>
                                                                                                                                                                                                <td> <?php echo $w_400 ?> </td>
                                                                                                                                                                                                <td> <?php echo $w_400_x_batch ?> </td>
                                                                                                                                                                                                <td> <?php echo $TOTAL_BALANCE1 ?></td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <?php
                                                                                                                                                                                                    if ($TOTAL_BALANCE < 0) {
                                                                                                                                                                                                        echo "<font color=red>insufficent stock balance</font>";
                                                                                                                                                                                                    } 
                                                                                                                                                                                                    
                                                                                                                                                                                                    else if ($w_400_x_batch == 0) {
                                                                                                                                                                                                        echo "<font color=red>woven not needed</font>";
                                                                                                                                                                                                    }
                                                                                                                                                                                                     else {
                                                                                                                                                                                                        echo "<font color=green>stock is sufficent</font>";
                                                                                                                                                                                                    }
                                                                                                                                                                                                    ?></td>
                                                                                                                                                                                            </tr>
                                                                                                                                                                                            <tr>
                                                                                                                                                                                                <td>GP_RESIN</td>
                                                                                                                                                                                                <td> <?php echo $gp_resin ?> </td>
                                                                                                                                                                                                <td> <?php echo $gp_resin_x_batch ?> </td>
                                                                                                                                                                                                <td> <?php echo $TOTAL_BALANCE3 ?></td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <?php
                                                                                                                                                                                                    if ($TOTAL_BALANCE3 < 0) {
                                                                                                                                                                                                        echo "<font color=red>insufficent stock balance</font>";
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo "<font color=green>stock is sufficent</font>";
                                                                                                                                                                                                    }
                                                                                                                                                                                                    ?></td>
                                                                                                                                                                                            </tr>
                                                                                                                                                                                            <tr>
                                                                                                                                                                                                <td>N_RESIN</td>
                                                                                                                                                                                                <td> <?php echo $n_resin ?> </td>
                                                                                                                                                                                                <td> <?php echo $n_resin_x_batch ?> </td>
                                                                                                                                                                                                <td> <?php echo $TOTAL_BALANCE4 ?></td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <?php
                                                                                                                                                                                                    if ($TOTAL_BALANCE4 < 0) {
                                                                                                                                                                                                        echo "<font color=red>insufficent stock balance</font>";
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo "<font color=green>stock is sufficent</font>";
                                                                                                                                                                                                    }
                                                                                                                                                                                                    ?></td>
                                                                                                                                                                                            </tr>
                                                                                                                                                                                            <tr>
                                                                                                                                                                                                <td>SP_GEL</td>
                                                                                                                                                                                                <td> <?php echo $sp_gel ?> </td>
                                                                                                                                                                                                <td> <?php echo $sp_gel_x_batch ?> </td>
                                                                                                                                                                                                <td> <?php echo $TOTAL_BALANCE5 ?></td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <?php
                                                                                                                                                                                                    if ($TOTAL_BALANCE5 < 0) {
                                                                                                                                                                                                        echo "<font color=red>insufficent stock balance</font>";
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo "<font color=green>stock is sufficent</font>";
                                                                                                                                                                                                    }
                                                                                                                                                                                                    ?></td>
                                                                                                                                                                                            </tr>
                                                                                                                                                                                            <tr>
                                                                                                                                                                                                <td>GP_GEL</td>
                                                                                                                                                                                                <td> <?php echo $gp_gel ?> </td>
                                                                                                                                                                                                <td> <?php echo $gp_gel_x_batch ?> </td>
                                                                                                                                                                                                <td> <?php echo $TOTAL_BALANCE6 ?></td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <?php
                                                                                                                                                                                                    if ($TOTAL_BALANCE6 < 0) {
                                                                                                                                                                                                        echo "<font color=red>insufficent stock balance</font>";
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo "<font color=green>stock is sufficent</font>";
                                                                                                                                                                                                    }
                                                                                                                                                                                                    ?></td>
                                                                                                                                                                                            </tr>
                                                                                                                                                                                        
                                                                                                                                                                                            <tr>
                                                                                                                                                                                                <td>PIGMENT</td>
                                                                                                                                                                                                <td> <?php echo $pigment ?> </td>
                                                                                                                                                                                                <td> <?php echo $pigment_x_batch; ?> </td>
                                                                                                                                                                                                <td> <?php echo $TOTAL_BALANCE8 ?></td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <?php
                                                                                                                                                                                                    if ($TOTAL_BALANCE8 < 0) {
                                                                                                                                                                                                        echo "<font color=red>insufficent stock balance</font>";
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo "<font color=green>stock is sufficent</font>";
                                                                                                                                                                                                    }
                                                                                                                                                                                                    ?></td>
                                                                                                                                                                                            </tr>
                                                                                                                                                                                            <tr>
                                                                                                                                                                                                <td>MAJ</td>
                                                                                                                                                                                                <td> <?php echo $pigment ?> </td>
                                                                                                                                                                                                <td> <?php echo $pigment_x_batch; ?> </td>
                                                                                                                                                                                                <!-- <td>
                                                                                                                                                                                                    <?php 
                                                                                                                                                                                                     if($maj<=0){
                                                                                                                                                                                                        echo "-";
                                                                                                                                                                                                     }
                                                                                                                                                                                                     ?> 
                                                                                                                                                                                                </td> -->
                                                                                                                                                                                                <!-- <td> 
                                                                                                                                                                                                    <?php 
                                                                                                                                                                                                    if($maj_x_batch<=0){
                                                                                                                                                                                                        echo "-";
                                                                                                                                                                                                    }
                                                                                                                                                                                                    ?> 
                                                                                                                                                                                                </td> -->

                                                                                                                                                                                                <td> <?php echo $TOTAL_BALANCE9 ?></td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <?php
                                                                                                                                                                                                    if ($TOTAL_BALANCE9 < 0) {
                                                                                                                                                                                                        echo "<font color=red>insufficent stock balance</font>";
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo "<font color=green>stock is sufficent</font>";
                                                                                                                                                                                                    }
                                                                                                                                                                                                    ?></td>
                                                                                                                                                                                            </tr>

                                                                                                                                                                                            <tr>
                                                                                                                                                                                                <td>HARDNER</td>
                                                                                                                                                                                                <td> <?php echo $hardner ?> </td>
                                                                                                                                                                                                <td> <?php echo $hardner_x_batch ?> </td>
                                                                                                                                                                                                <td> <?php echo $TOTAL_BALANCE11 ?></td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <?php
                                                                                                                                                                                                    if ($TOTAL_BALANCE11 < 0) {
                                                                                                                                                                                                        echo "<font color=red>insufficent stock balance</font>";
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo "<font color=green>stock is sufficent</font>";
                                                                                                                                                                                                    }
                                                                                                                                                                                                    ?></td>
                                                                                                                                                                                            </tr>
                                                                                                                                                                                            </tr>
                                                                                                                                                                                            <div id="res">


<?php
if ($ITEM_ID == 31) {
    $gen_item = "GEN_70*70 ST";
} else if ($ITEM_ID == 32) {
    $gen_item = "GEN_60*60 ST";
} else if ($ITEM_ID == 33) {
    $gen_item = "GEN_70*70WC";
} else if ($ITEM_ID == 34) {
    $gen_item = "GEN_80*80 ST";
} else if ($ITEM_ID == 35) {
    $gen_item = "GEN_80*80WC";
} else if ($ITEM_ID == 36) {
    $gen_item = "GEN_80*80 CORNER ST";
} 
            
?>
<div>
    <h6 style="margin-left:20%!important">PRODUCT TYPE: <?php echo $gen_item ?> </h6> 
</div>
<div>
<h6 style="margin-left:20%!important">BATCH: <?php echo $BATCH ?> </h6> 
</div>
</div>
                                                                                                                                                                                        </thead>
                                                                                                                                                                                        
                                                                                                                                                                                        <!-- <tbody>
                                                                            <tr>
                                                                        </tbody> -->
                                <?php
                                                                            }}
                                                                        }
                                                                    }}}
                                                                }
                                                            }
                                                        }}}}}}}}}
                                                    }
                                                }
                                            }
                                //         }
                                // // }

                                // else 
                                // {
                                //     echo "No Record Found";
                                // }
                                ?>

                        </table>
            </div>
            </div>
            </form>
            </th>
            </tr>
            </tbody>
      </div>
  <!-- /.control-sidebar -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2016/2024 <a href="www.rodaspaints.com">SDT</a>.</strong> All rights reserved.
  </footer>
</div>
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
      $('#prod_qty').val(data[3]);
      $('#gend_qty').val(data[4]);
      $('#get_qty').val(data[5]);

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
