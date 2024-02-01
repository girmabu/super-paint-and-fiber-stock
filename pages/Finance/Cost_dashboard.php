<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Contacts</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
 
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <!-- Php code that used to execute the total cost and item list -->
      <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'ssms');
                $sql = "SELECT * FROM fiber_mini_item";
                $result=mysqli_query($connection,$sql);
                $query = "SELECT * FROM main_store_item where have_cost=1";
                $query_run = mysqli_query($connection, $query);

            ?>
      <!-- End of the php code that used to calculate total cost and item list -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  Super Double T General Trading PLC
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><u>Fiber Main Store Total Capital</u></b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="large"><span class="fa-li">
                      <?php
                      if($result)
                      {
                        
                      }
                         if($query_run)
                         {$i=0;
                          $t=0;
                            foreach($query_run as $row)
                            {
                             $i++; 
                             $total=$row['quantity']*$row['convertion']*$row['unit_price'];
                             $t+=$total;


                            }
                          }
                      ?>  
                    </span><h6 style="color:green !important">  Total Item :  <?php echo number_format($i); ?></h6> </li>
                        <li class="large"><span class="fa-li"><i class="fa fa-info" aria-hidden="true"></i>
                        </span> <h6 style="color:green !important"> Capital (Birr) :  <?php echo number_format($t); ?></h6></li>
                        <?php           
                          
                          
                              ?>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../../dist/img/logo.png" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="Fiber_main_store_cost.php" class="btn btn-sm btn-primary">
                    <i class="fa fa-eye" aria-hidden="true"></i> Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                Super Double T General Trading PLC
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Fiber Mini Store Total Capital</b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="large"><span class="fa-li"><i class="fa fa-sitemap" aria-hidden="true"></i>
                      <?php
                        $conn = mysqli_connect("localhost","root","");
                        $db = mysqli_select_db($conn, 'ssms');
                        $sql = "SELECT * FROM fiber_mini_item";
                        $result=mysqli_query($conn,$sql);
                        $query = "SELECT * FROM fiber_mini_item";
                        $query_run = mysqli_query($conn, $query);

                         if($query_run)
                         { 
                          $i=0;
                          $t=0;
                            foreach($query_run as $row)
                            {
                             $i++; 
                             $item_id = $row['main_store_item_id'];
                             $query ="SELECT * FROM main_store_item WHERE id =$item_id";
                             $result = $conn->query($query);
                             if($result->num_rows> 0){
                                 while($optionData=$result->fetch_assoc()){
                                 $convertion=$optionData['convertion'];
                             }
                         }

                             $total=(double)$row['quantity']*(double)$convertion *(double)$row['unit_price'];
                             $t+=$total;
                            }
                       ?>  
                    </span style="color:green !important">  Total Item :  <?php echo number_format($i); ?> </li>
                        <li class="large"><span class="fa-li"><i class="fa fa-info" aria-hidden="true"></i>
                        </span> Total (Birr) : <?php echo number_format($t); ?></li>
                        <?php           
                             }
                            ?>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                    <img src="../../dist/img/logo.png" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="Fiber_mini_store_cost.php" class="btn btn-sm btn-primary">
                    <i class="fa fa-eye" aria-hidden="true"></i> Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                Super Double T General Trading PLC
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                    <h1 class="lead"><b> Mini Mini RM Total Capital</b></h1>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fa fa-sitemap" aria-hidden="true"></i>
                        <?php
                         $g_c=0;
                         $g_f=0;
                         $get_c=0;
                         $get_f=0;
                         $pro_f=0;
                         $pro_c=0;
                        $conn = mysqli_connect("localhost","root","");
                        $db = mysqli_select_db($conn, 'ssms');
                        $gend_fiber = "SELECT * FROM genfiber_balance";
                        $gend_fiber_query=mysqli_query($conn,$gend_fiber);
                        $gend_chemical = "SELECT * FROM genchem_balance";
                        $gend_chem_query = mysqli_query($conn, $gend_chemical);
                        $get_chemical = "SELECT * FROM getchem_balance";
                        $get_chem_query=mysqli_query($conn,$get_chemical);
                        $get_fiber = "SELECT * FROM getfiber_balance";
                        $get_fiber_query = mysqli_query($conn, $get_fiber);
                        $pro_chemical = "SELECT * FROM prochem_balance";
                        $pro_chem_query=mysqli_query($conn,$pro_chemical);
                        $pro_fiber = "SELECT * FROM profiber_balanceupdated";
                        $pro_fiber_query = mysqli_query($conn, $pro_fiber);
                       
                         if($gend_fiber_query)
                         { 
                          
                       foreach($gend_fiber_query as $row)
                            {
                              $g_f++;
                      
                          }
                        }
                        foreach($gend_chem_query as $row)
                        {
                          $g_c++;
                  
                      }
                      foreach($get_chem_query as $row)
                      {
                        $get_c++;
                
                      }
                      foreach($get_fiber_query as $row)
                      {
                        $get_f++;
                
                      }
                      foreach($pro_chem_query as $row)
                      {
                        $pro_c++;
                
                      }
                      foreach($pro_fiber_query as $row)
                      {
                        $pro_f++;
                
                      }
                       ?> 
                         </span style="color:green !important">  Total Item : <?php  echo ($g_f+$g_c+$get_f+$get_f+$pro_f+$pro_c) ?> </li>
                        <li class="large"><span class="fa-li"><i class="fa fa-info" aria-hidden="true"></i>
                        </span> Total (Birr) : <?php  ?></li>
                       
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                    <img src="../../dist/img/logo.png" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                  <a href="Chem_mini_mini_cost.php" class="btn btn-sm btn-primary">
                    <i class="fa fa-eye" aria-hidden="true"></i> Details
                    </a>
                  </div>
                </div>
              </div>
            </div>         
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item"><a class="page-link" href="#">previous</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
              
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>
    <strong>Copyright &copy; 2016-2024 <a href="#"></a>.</strong> All rights reserved.
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
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
