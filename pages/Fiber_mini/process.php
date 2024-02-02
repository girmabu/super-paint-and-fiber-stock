<?php
include('connect.php');

if(isset($_POST['updatedata']))
{
    $id=$_POST['id'];
    $item_id = $_POST['main_store_item_id'];
    $quantity = $_POST['quantity'];
    $uom=$_POST['uom'];
    include('connect.php');

    $main_qty ="SELECT * FROM fiber_mini_item WHERE id='$id'";
    $result = $conn->query($main_qty);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $id=$optionData['main_store_item_id'];
   
    }
    }
    
    $sql="UPDATE fiber_mini_item  SET quantity = '$quantity', uom= '$uom' where main_store_item_id='$id'";
    $query_run = $conn->query($sql);
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location:fiber_mini.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if(isset($_POST['updatenotification']))
{
    $id=$_POST['id'];
    $item_id = (int)$_POST['item_id'];
    $quantity = (double)$_POST['quantity'];
    $received_by=$_POST['received_by'];
    $checked_by=$_POST['checked_by'];
    $uom=$_POST['uom'];
    $date=$_POST['date'];
    include('connect.php');
    $sql="UPDATE notification SET quantity=$quantity,uom='$uom',item_id=$item_id,
    received_by='$received_by',checked_by='$checked_by',date='$date' where id='$id'";
    $query_run = $conn->query($sql);
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location:fiber_mini.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if(isset($_POST['notification']))
{
    $item_id = $_POST['main_store_item_id'];
    $quantity = $_POST['quantity'];
    $received_by = $_POST['received_by'];
    $checked_by = $_POST['checked_by'];
    $date = $_POST['date'];
    $remark=2;
    $main_qty ="SELECT uom FROM fiber_mini_item WHERE main_store_item_id =$item_id ";
    $result = $conn->query($main_qty);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $uom=$optionData['uom'];
      
    }
  }
    $query1="INSERT INTO notification ( `item_id`, `uom`, `quantity`, `date`, `received_by`, `checked_by`, `remark`) 
    VALUES ('$item_id','$uom','$quantity','$date','$received_by','$checked_by','$remark')";
    $query_run = mysqli_query($conn, $query1);
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location:fiber_mini.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if(isset($_POST['approve_mininotification']))
{
    include('connect.php');
    $id=$_POST['id'];
    $item_id = $_POST['item_id'];
    $uom = $_POST['uom'];
    $quantity = $_POST['quantity'];
    $received_by = $_POST['received_by'];
    $checked_by = $_POST['checked_by'];
    $ref_no= $_POST['ref_no'];
    $approved_by=$_POST['approved_by'];
    $date= $_POST['date'];
    $outs=$quantity;
    
    $qty ="SELECT quantity FROM fiber_mini_item WHERE main_store_item_id =$item_id ";
    $i=0;
        $result = $conn->query($qty);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $option =$optionData['quantity'];
    $balance = $option-$quantity;
    }
    }
    $query1 = "INSERT INTO fiber_mini_item_in (`main_store_item_id`,`uom`,`outs`,`balance`,`ref_no`,`received_by`,`checked_by`,`date`) VALUES ('$item_id','$uom','$quantity','$balance','$ref_no','$received_by','$checked_by','$date')";
    $query_run1 = mysqli_query($conn, $query1);
    $balance_mini_store ="UPDATE fiber_mini_item SET quantity = '$balance' WHERE main_store_item_id='$item_id'";
    //This code is used to update chemical balance
    $chem_quantity ="SELECT quantity FROM chemical_store_item WHERE item_id =$item_id ";
    $result2 = $conn->query($chem_quantity);
    if($result2->num_rows> 0)
    {
    while($optionData=$result2->fetch_assoc()){
    $option2=$optionData['quantity'];
    $chem_balance=$option2+(double)$quantity;
    }
    }
    $query = "INSERT INTO chemical_store_in (`item_id`,`uom`,`quantity`,`received_by`,`checked_by`,`date`,`ref_no`,`balance`)
    VALUES ('$item_id','$uom','$quantity','$received_by','$checked_by','$date',`$ref_no`,`$chem_balance`)";

    $chem_bal ="UPDATE chemical_store_item SET quantity =$chem_balance WHERE item_id=$item_id";
    $sql="DELETE  FROM mini_notification WHERE id=$id";
    $sql_run=mysqli_query($conn, $sql);
    $chem_sql = mysqli_query($conn, $chem_bal);
    $sq = mysqli_query($conn, $balance_mini_store);
    $query_run = mysqli_query($conn, $query);
    if($sq)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location:fiber_mini.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
 if (isset($_POST["deleteminiindex"]))
 {
    $item_id=$_POST['item_id'];
    include('connect.php');
    $sql = "DELETE FROM notification WHERE id=$item_id";
    $query_run = mysqli_query($conn, $sql);
    if ($query_run) {
     header("Location:fiber_mini.php");}
      else {
 
   echo "Error deleting record: " . $conn->error;
    }
  }
    //This code is used to delete the data from the mini store item list

    if (isset($_POST["deleteindex"]))
     {
        $item_id=$_POST['id'];
        include('connect.php');
       // sql to delete a record
   
        $sql = "DELETE FROM fiber_mini_item WHERE id=$item_id";
     
         $query_run = mysqli_query($conn, $sql);
        if ($query_run) {
         header("Location: fiber_mini.php");
        }
        else {
        echo "Error deleting record: " . $conn->error;
        }
    }
        //This code is end of the fiber mini store
 if (isset($_POST['insertdata']))
  {
    $item_id = $_POST['main_store_item_id'];
    $quantity = $_POST['quantity'];
    include('connect.php');
    $main_qty ="SELECT uom FROM main_store_item WHERE id =$item_id ";
    $result = $conn->query($main_qty);
    if($result->num_rows> 0)
    {
        while($optionData=$result->fetch_assoc()){
        $uom=$optionData['uom'];
    }
    }
    $attendance ="SELECT main_store_item_id FROM fiber_mini_item where main_store_item_id=$item_id";
    $query_att = $conn->query($attendance);
    if($query_att->num_rows> 0)
    {
        echo '<script> alert("Data already exist"); </script>';
    }
    else {
    $query = "INSERT INTO fiber_mini_item (`main_store_item_id`,`uom`,`quantity`) VALUES ('$item_id','$uom','$quantity')";
    $query1="UPDATE main_store_item SET code =1 WHERE id=$item_id";
    $query_run1=mysqli_query($conn,$query1);
    $query_run =mysqli_query($conn,$query);
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: fiber_mini.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
    }
 }
    if (isset($_POST['fiber_mini_out']))
        {
            include('connect.php');
            $item_id = $_POST['main_store_item_id'];
            // $uom = $_POST['uom'];
            $outs = $_POST['outs'];
            $received_by = $_POST['received_by'];
            $checked_by = $_POST['checked_by'];
            $ref_no= $_POST['ref_no'];
            $date= $_POST['date'];
            $main_qty ="SELECT quantity,uom FROM fiber_mini_item WHERE main_store_item_id =$item_id ";
            $result = $conn->query($main_qty);
            $quantity=0;
            if($result->num_rows> 0){
                while($optionData=$result->fetch_assoc()){
                $option =$optionData['quantity'];
                $uom=$optionData['uom'];
                $balance=$option-$outs;
                }
            }
            if($balance>=0)
            {
            $query = "INSERT INTO fiber_mini_item_in (`main_store_item_id`,`uom`,`quantity`,`outs`,`received_by`,`checked_by`,`balance`,`ref_no`,`date`) VALUES ('$item_id','$uom','$quantity','$outs','$received_by','$checked_by','$balance','$ref_no','$date')";
            $mini_bal ="UPDATE fiber_mini_item SET quantity =$balance WHERE main_store_item_id=$item_id";
            $sql_run_query = $conn->query($query);
            $sql_run_mini_bal = $conn->query($mini_bal);
            if($query)
            {
            {
                echo '<script> alert("Data Saved"); </script>';
                header('Location: fiber_mini.php');
            }
            }
            else {
                echo '<script> alert("Data not Saved"); </script>';

            }
            }
            else {
                echo '<script> alert("Insuffiecient Stock Balance"); </script>';
            }
        }
    if (isset($_POST['additem']))
        {
            $item_id = $_POST['main_store_item_id'];
            $quantity = $_POST['quantity'];
            $main_qty ="SELECT uom FROM main_store_item WHERE id =$item_id ";
            $result = $conn->query($main_qty);
            if($result->num_rows> 0)
            {
                while($optionData=$result->fetch_assoc()){
                $uom=$optionData['uom'];
            }
            }
            echo $uom;
            $query = "INSERT INTO fiber_mini_item (`main_store_item_id`,`uom`,`quantity`) VALUES ('$item_id','$uom','$quantity')";
            $query_run =mysqli_query($conn,$query);
            if($query_run)
            {
                echo '<script> alert("Data Saved"); </script>';
                header('Location: fiber_mini.php');
            }
            else
            {
                echo '<script> alert("Data Not Saved"); </script>';
            }
        }