<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rodas Paint Industry</title>
  <?php include 'connect.php' ?>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style>
    /* #minimal_div{
      margin-left:210px;
      width:83%;
    } */
    #label_div{
    width:200px;
    }
    #check{
      margin-left:200px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rodas Paint Industry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/software/pages/Paint_main/Paint_main.php?user_id=7">Paint</a></li>
              <li class="breadcrumb-item active">Main Store</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Item</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="process.php" method="POST">
                <div class="card-body">
                  <div class="form-group row">
                    
                    <div class="col-sm-10">
                    <label for="inputEmail3"class="col-sm-2 col-form-label">Description of Item</label>
                      <input type="text" name="itemname" required class="form-control" id="inputEmail3" placeholder="Please type description of item correctly">
                    </div>
                  </div>
                  <div class="col-sm-10" id="minimal_div">
                   <label for="inputEmail3"class="col-sm-2 col-form-label" id="label_div">Unit of measurement</label>
                            <select name="unit" required id="minimal_input"  class="form-control" required>
                            <option value="">Select Unit of mearurement</option>
                            <option value="kg">kg</option>
                            <option value="roll">roll</option>
                            <option value="Drum">Drum</option>
                            <option value="bag">bag</option>
                            <option value="pail">pail</option> 
                            <option value="pair">pair</option>
                            <option value="jerican">Jerican</option>
                            <option value="pcs">pcs</option>
                            <option value="set">set</option>
                            <option value="pkt">pkt</option>
                            <option value="mtr">mtr</option>
                            <option value="ltr">ltr</option>
                            <option value="royal">royal</option>
                            <option value="gallon">G/N</option>
                            <option value="other">other</option>
                            <option value="other">Bag</option>
                               
                            </select> 
                        </div>
                   <div class="col-sm-10"  id="minimal_div">
                   <label for="inputEmail3"class="col-sm-2 col-form-label">Category of item</label>
                   <input type="text"  name="category"   class="form-control" value="Paint" readonly>
                           
                        </div>
                        
                  <div class="form-group row">
                   
                    <div class="col-sm-10">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Convertion Rate</label>
                      <input type="number" step="any" name="convrate" required class="form-control" id="inputPassword3" placeholder="convertion rate">
                    </div>
                  </div>
                  <div class="form-group row">
                   
                    <div class="col-sm-10">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Initial Qty</label>
                      <input type="number" step="any" name="quantity" required class="form-control" id="inputPassword3" placeholder="Quantity">
                    </div>
                  </div>
                  <div class="form-group row">
                   
                    <div class="col-sm-10">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Unit cost(Kg)</label>
                      <input type="number" step="any" name="unit_price" class="form-control" id="inputPassword3" placeholder="Unit price">
                    </div>
                  </div>
                </div>
                <div class="form-group" id="check"> 
                  <label> Visible For Mini Store </label>
                  <div class="form-check">
                  <input class="form-check-input" type="radio" name="code" value="1" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                   Yes
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="code" value="0" id="flexRadioDefault2" checked>
                  <label class="form-check-label" for="flexRadioDefault2">
                   No
                  </label>
          
              <button type="submit" name="insertdata"  class="btn btn-success float-right" >Save changes</button>
                </div>
        
              </form>
            </div>
              </div>
            
            </div>
          
          </div>
      
        </div>
      
      </div>
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
<script>
  function clearform()
{
    document.getElementById("item_name").value=""; //don't forget to set the textbox id
    document.getElementById("category_id").value="";
    document.getElementById("uom").value="";
}
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
