<?php
include('connect.php');
if(isset($_POST['mini_notification']))
{  
      include('connect.php');
    $item_id = $_POST['item_id'];
    $uom = $_POST['uom'];
    $prod_qty = $_POST['prod_qty'];
    $gend_qty =$_POST['gend_qty'];
    $get_qty =$_POST['get_qty'];
    $received_by =$_POST['received_by'];
    $checked_by = $_POST['checked_by'];
    $date= $_POST['date'];
    $quantity=(int)$prod_qty+(int)$gend_qty+(int)$get_qty;
    $query = "INSERT INTO mini_notification (`item_id`,`uom`,`prod_qty`,`gend_qty`,`get_qty`,`quantity`,`received_by`,`checked_by`,`date`) VALUES ('$item_id','$uom','$prod_qty','$gend_qty','$get_qty','$quantity','$received_by','$checked_by','$date')";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: chem_notification.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if(isset($_POST['insertdata']))
{
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    $main_qty ="SELECT * FROM main_store_item WHERE id =$item_id ";
    $result = $conn->query($main_qty);
    if($result->num_rows> 0)
    {
        while($optionData=$result->fetch_assoc()){
        $uom=$optionData['uom'];
    }
    }

    $existance ="SELECT * FROM chemical_store_item WHERE item_id =$item_id ";
    $result = $conn->query($existance);
    if($result->num_rows> 0)
    {
        echo '<script> alert("Data already exist"); </script>';
        header('Location:chem_index.php');
    }
    else{
    $query = "INSERT INTO chemical_store_item (`item_id`,`uom`,`quantity`) VALUES ('$item_id','$uom','$quantity')";
     $query_run = mysqli_query($conn, $query);
     $sql="UPDATE main_store_item  SET chemical_item =1 where id='$item_id'";
     $sql_query = mysqli_query($conn, $sql);
     if($query_run)
     {
        echo '<script> alert("Data Saved"); </script>';
        header('Location:chem_index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
    }
}
if (isset($_POST["deleteindex"])) {
   $item_id=$_POST['id'];
   include('connect.php');
        // sql to delete a record
    echo $item_id;
    $sql = "DELETE FROM mini_notification WHERE id=$item_id";
    $query_run = mysqli_query($conn, $sql);
    if ($query_run) {
        header("Location: index.php");}
        else {
            echo $item_id;
    echo "Error deleting record: " . $conn->error;
    }
}
if(isset($_POST['updatenotification']))
{
    $id=$_POST['id'];
    $item_id = (int)$_POST['item_id'];
    $received_by=$_POST['received_by'];
    $checked_by=$_POST['checked_by'];
    $date=$_POST['date'];
    $uom=$_POST['uom'];
    $quantity=$_POST['quantity'];
    $remark=$_POST['remark'];
    if($remark==1)
    {
        $sql_query="UPDATE notification SET quantity=$quantity,uom='$uom',item_id=$item_id,
        received_by='$received_by',checked_by='$checked_by',date='$date' where id='$id'";
        $query_run2 = $conn->query($sql_query);
    }
    
   $sql="UPDATE mini_notification SET quantity=$quantity,uom='$uom',item_id=$item_id,
    received_by='$received_by',checked_by='$checked_by',date='$date' where id='$id'";
    $query_run = $conn->query($sql);
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location:chem_index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if (isset($_POST["deletechemindex"]))
{
    $item_id=$_POST['item_id'];
    include('connect.php');
 // sql to delete a record
    $sql = "DELETE FROM mini_notification WHERE id=$item_id";
    $query_run = mysqli_query($conn, $sql);
    $sql12 = "DELETE FROM notification WHERE id=$item_id";
    $query_run123 = mysqli_query($conn, $sql12);
    if ($query_run) {
     header("Location:chem_index.php");}
      else {
 
   echo "Error deleting record: " . $conn->error;
    }
}
if(isset($_POST['updatedata']))
{
    $id=$_POST['id'];
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    $uom=$_POST['uom'];
    include('connect.php');
    $sql="UPDATE chemical_store_item  SET quantity = '$quantity', uom= '$uom' where id='$id'";
    $query_run = $conn->query($sql);
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location:chem_index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if (isset($_POST["delete"]))
 {
    $item_id=$_POST['id'];
    $get_id="SELECT * from chemical_store_item where id='$item_id'";
    $process=mysqli_query($conn,$get_id);
    if($process->num_rows> 0)
    {
        while($optionData=$process->fetch_assoc()){
        $m_id=$optionData['item_id'];
    }
    }
    $sql = "DELETE FROM chemical_store_item WHERE id='$item_id'";
    $query_run = mysqli_query($conn, $sql);
    $sql_main="UPDATE main_store_item  SET chemical_item =0 where id='$m_id'";
    $sql_query = mysqli_query($conn, $sql_main);

    if ($query_run) {
     header("Location: chem_index.php");
    }
    else {
    echo "Error deleting record: " . $conn->error;
    }
}
if(isset($_POST['request']))
 {  
    include('connect.php');
    $item_id = $_POST['item_id'];
    $uom = $_POST['uom'];
    $quantity = $_POST['quantity'];
    $received_by =$_POST['received_by'];
    $checked_by = $_POST['checked_by'];
    $date= $_POST['date'];
    $remark=$_POST['remark'];
    $query ="SELECT * FROM main_store_item where id=$item_id";
    $result = $conn->query($query);
    if($result->num_rows> 0){
    while($optionData=$result->fetch_assoc()){
    $uom = $optionData['uom'];
     }}
     if($remark==2)
     {
    $query = "INSERT INTO mini_notification (`item_id`,`uom`,`quantity`,`received_by`,`checked_by`,`date`) VALUES ('$item_id','$uom','$quantity','$received_by','$checked_by','$date')";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
     {
         echo '<script> alert("Data Saved"); </script>';
         header('Location:chem_index.php');
     }
     else
     {
         echo '<script> alert("Data Not Saved"); </script>';
     }
  }
  elseif($remark==1){
    $query1="INSERT INTO notification ( `item_id`, `uom`, `quantity`, `date`, `received_by`, `checked_by`, `remark`) 
    VALUES ('$item_id','$uom','$quantity','$date','$received_by','$checked_by','$remark')";
    $query_run = mysqli_query($conn, $query1);
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location:chem_index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
  }
 }
 if(isset($_POST['insertformulation']))
{
    $ITEM = $_POST['ITEM'];
    $UNIT = $_POST['UNIT'];
    $F_450 = $_POST['F_450'];
    $W_400 = $_POST['W_400'];
    $GP_RESIN = $_POST['GP_RESIN'];
    $N_RESIN = $_POST['N_RESIN'];
    $SP_GEL = $_POST['SP_GEL'];
    $GP_GEL = $_POST['GP_GEL'];
    $CALCIUM = $_POST['CALCIUM'];
    $HARDNER = $_POST['HARDNER'];
    $PIGMENT = $_POST['PIGMENT'];
    $MAJ = $_POST['MAJ'];
    $PREFIX = $_POST['PREFIX'];
    
    $query = "INSERT INTO general_formulation (`ITEM`,`UNIT`,`F_450`,`W_400`,`GP_RESIN`,`N_RESIN`,`SP_GEL`
    ,`GP_GEL`,`CALCIUM`,`HARDNER`,`PIGMENT`,`MAJ`,`PREFIX`) 
    VALUES ('$ITEM','$UNIT','$F_450','$W_400','$GP_RESIN','$N_RESIN',
    '$SP_GEL','$GP_GEL','$CALCIUM','$HARDNER','$PIGMENT','$MAJ','$PREFIX')";
     $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $form_id ="SELECT * FROM general_formulation";
        $result1 = $conn->query( $form_id );
        while( $optionData = $result1->fetch_assoc() ) {
            $formulation_id=$optionData['ID'];
        }
        // echo $option; // option is the general formulation id
        $DEPARTEMENT = $_POST['PREFIX'];
        $ITEM ="FIBER";
        $UOM ="PCS";
        $STOCK_IN =0;
        $STOCK_OUT =0;
        $P_BALANCE =0;
        $R_DATE =date("Y/m/d") ;
        $PREFIX = $_POST['ITEM'];
        $FORM_ID = $formulation_id;
        $query = "INSERT INTO fiber_summary (`DEPARTEMENT`,`ITEM`,`UOM`,`STOCK_IN`,`STOCK_OUT`,
        `P_BALANCE`,`R_DATE`,`PREFIX`,`FORM_ID`) VALUES ('$DEPARTEMENT','$ITEM','$UOM','$STOCK_IN','$STOCK_OUT'
        ,'$P_BALANCE','$R_DATE','$PREFIX','$FORM_ID')";
        $query_run2 = mysqli_query($conn, $query);
        if($query_run2)
        {
            echo '<script> alert("Data Saved"); </script>';
            header('Location:formulation.php');
        }
     
        
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if(isset($_POST['chem_out']))
{
    $item_id=$_POST['main_store_item_id'];
    $quantity=$_POST['outs'];
    $ref_no = $_POST['ref_no'];
    $date= $_POST['date'];
    $approved_by=$_POST['approved_by'];
    $received_by=$_POST['received_by'];
    $qty="SELECT * FROM chemical_store_item where item_id='$item_id'";
    $query_r = $conn->query($qty);
    if($query_r->num_rows> 0){
        while($optionData=$query_r->fetch_assoc()){
        $quant = $optionData['quantity'];
        $uom= $optionData['uom'];
         }}
         $balance=(double)$quant-(double)$quantity;
         if($balance>=0)
         {
     $sql="UPDATE chemical_store_item  SET quantity = '$balance' where item_id='$item_id'";
     $query_run1=$conn->query($sql);
     $query = "INSERT INTO chemical_store_in (`item_id`,`uom`,`balance`,`received_by`,`date`,`ref_no`,`approved_by`,`outs`)
      VALUES ('$item_id','$uom','$balance','$received_by','$date','$ref_no','$approved_by','$quantity')";
     $query_run = mysqli_query($conn, $query);

     if($query_run)
     {
        ?>
        <script>
         alert("successfully Updated");
         window.location="chem_index.php";
        </script>
        <?php
     }
         }

         else{
     ?>
    <script>
     alert("Insufficient Balance");
     window.location="chem_index.php";
    </script>
    <?php
         }
}
?>