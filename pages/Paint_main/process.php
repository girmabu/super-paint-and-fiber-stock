<?php
include('connect.php');

if(isset($_POST['approve']))
{
    $id=$_POST['id'];
    $item_id = $_POST['item_id'];
    $uom = $_POST['uom'];
    $quantity = $_POST['quantity'];
    $approved_by = $_POST['approved_by'];
    $checked_by = $_POST['received_by'];
    $date= $_POST['date'];
    $qty ="SELECT * FROM msitementry where id=$item_id ";

    // $result = $conn->query($qty);
   $flag=true;
    $result = mysqli_query($conn, $qty);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $option =$optionData['quantity'];
        $main_id=$optionData['id'];
        $balance =(int) $option-(int)$quantity;
    }
}

if((int)$option<(int)$quantity)
{
    $now=(int)$quantity-(int)$option;
    $sql ="UPDATE paint_notification SET quantity = '$now' WHERE id='$id'";
     //For main store the system updates balances to zero
    $balance_main_store ="UPDATE msitementry SET quantity = '0' WHERE id='$item_id'";
  //main store out balance is updated to option.. beginning balance outs= option and balance =0;
    $query_out = "INSERT INTO main_out (`paint_main_id`,`quantity`,`request`,`checked_by`,`reqdepartment`,`date`) VALUES ('$item_id','$quantity','$checked_by','$approved_by','2','$date')";
    //The following code is used to select the quantity from the min store item
    $mini_bal ="SELECT quantity FROM Paint_mini_item WHERE paint_main_id ='$item_id'";
  //This is the latest update
    $result1 = mysqli_query($conn, $mini_bal);
    if($result1->num_rows> 0){
        while($optionData=$result1->fetch_assoc()){
        $option1 =$optionData['quantity'];
    $bal_mini =(int)$option1+(int)$quantity;
    $balance_mini_store ="UPDATE Paint_mini_item SET quantity = '$bal_mini' WHERE paint_main_id='$item_id'";
    }
    }
 
    // main function
    $sql_run=mysqli_query($conn, $sql);
    $sq = mysqli_query($conn, $balance_main_store);
    $sq = mysqli_query($conn, $balance_mini_store);
    $query_out=mysqli_query($conn,$query_out);
    // 
    }
    else if((int)$option>=(int)$quantity)
    {
    $sql="DELETE  FROM paint_notification WHERE id=$id";
    $balance_main_store ="UPDATE msitementry SET quantity = '$balance' WHERE id='$item_id'";
    $mini_bal ="SELECT quantity FROM Paint_mini_item WHERE paint_main_id ='$item_id'";
    $query_out = "INSERT INTO main_out (`paint_main_id`,`quantity`,`request`,`checked_by`,`reqdepartment`,`date`) VALUES ('$item_id','$quantity','$checked_by','$approved_by','2','$date')";
    $result1 = mysqli_query($conn, $mini_bal);
    if($result1->num_rows> 0){
        while($optionData=$result1->fetch_assoc()){
        $option1 =$optionData['quantity'];
    $bal_mini =(int)$option1+(int)$quantity;
   
        }
        }
        $balance_mini_store ="UPDATE Paint_mini_item SET quantity = '$bal_mini' WHERE paint_main_id='$item_id'";

        // main function transaction
        $sql_run=mysqli_query($conn, $sql);
        $sq = mysqli_query($conn, $balance_main_store);
        $sq = mysqli_query($conn, $balance_mini_store);
        $query_out=mysqli_query($conn,$query_out);
        }
        else if($q){
            $flag=false;
        }
 
        if($flag)
    {
      
        ?>
        <script>
             alert("update succesfully,thank you");
         window.location="paint_main.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
             alert("Something wrong");
         window.location="paint_main.php";
        </script>
        <?php
    }
}

if (isset($_POST['insertdata']))
{
    $item_name = $_POST['item_name'];
    $uom = $_POST['uom'];
    $quantity = $_POST['quantity'];
    $category_id=$_POST['category_id'];
    $code= $_POST['code'];
    $unit_price= $_POST['unit_price'];
    include('connect.php');
    $query = "INSERT INTO main_store_item (`item_name`,`uom`,`quantity`,`category_id`,`code`,`unit_price`) VALUES ('$item_name','$uom','$quantity','$category_id','$code','$unit_price')";
    $query_run = mysqli_query($conn, $query);
    echo $query;
    if($query_run)
    {
        ?>
        <script>
             alert("update succesfully,thank you");
         window.location="paint_main.php";
        </script>
        <?php
    }
    else
    {
        ?>
    <script>
         alert("Something wrong");
     window.location="paint_main.php";
    </script>
    <?php
    }
}

if (isset($_POST['main_store_in']))
{
    $item_id = $_POST['main_store_item_id'];
    $quantity = $_POST['quantity'];
    $ref_no=$_POST['ref_no'];
    $checked_by = $_POST['checked_by'];
    $received_by = $_POST['received_by'];
    $origin = $_POST['origin'];
    $date= $_POST['date'];
    include('connect.php');
    $qty ="SELECT * FROM main_store_item WHERE id =$item_id ";
    $result = $conn->query($qty);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $option =$optionData['quantity'];
        $balance = $option+$quantity;
        $uom=$optionData['uom'];
    }
    }
    $balance_mini_store ="UPDATE main_store_item SET quantity = '$balance' WHERE id='$item_id'";
    $query = "INSERT INTO main_store_item_in (`main_store_item_id`,`uom`,`received_by`,`quantity`,`ref_no`,`balance`,`checked_by`,`date`,`origin`) VALUES ('$item_id','$uom','$received_by','$quantity','$ref_no','$balance','$checked_by','$date','$origin')";
    $query1 = $conn->query($balance_mini_store);
    $query2 = $conn->query($query);
    if($query1)
    { 
        header('Location: fiber_main.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if(isset($_POST['update']))
{
    $id =$_POST['id'];
    $itemname = $_POST['itemname'];
    $quantity = $_POST['quantity'];
    $date=$_POST['date'];
    $received_by=$_POST['name'];
    $uom=$_POST['uom'];
    $remark=$_POST['remark'];
    include('connect.php');

    $sq="UPDATE msitementry  SET quantity ='$quantity' WHERE id='$id'";
    $st=mysqli_query($conn,$sq) or die(mysqli_error($conn));
        
    $st2="INSERT INTO main_in (paint_main_id,quantity,date,recieved,remark) VALUES('$id','$quantity','$date','$received_by','$remark')";;
    $st3=mysqli_query($conn,$st2) or die(mysqli_error($conn)) or die(mysqli_error($conn));
    ?>
    <script>
         alert("update succesfully,thank you");
     window.location="paint_main.php";
    </script>
    <?php

    
   
}
//The following code is used to update the entire table
if(isset($_POST['savefile']))
{
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $date=$_POST['date'];
    $received_by=$_POST['received_by'];
    include('connect.php');
    $sql="UPDATE msitementry  SET quantity = quantity+'$quantity' WHERE id='$id'";
    $query_run = $conn->query($sql) or die(mysqli_error($conn));
    if($query_run)
    {
    $st="INSERT INTO main_in (paint_main_id,quantity,date,recieved) VALUES('$id','$quantity','$date','$received_by')";
    $query_run=$conn->query($st);
    ?>
    <script>
         alert("Saved succesfully,thank you");
     window.location="paint_main.php";
    </script>
    <?php

    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
// This is the end of update code
//The following is start of delete code
if(isset($_POST['delete']))
{
    $id=$_POST['id'];
    $sql = "DELETE FROM main_store_item WHERE id=$id";
     $query_run = mysqli_query($conn, $sql);
    if ($query_run) {
     header("Location: fiber_main.php");
    }
    else {
    echo "Error deleting record: " . $conn->error;
    }
}
//This brace is end of delete code
if (isset($_POST['main_store_out']))
{
    $item_id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $remark=$_POST['remark'];
    $checked_by = $_POST['checked_by'];
    $received_by = $_POST['received_by'];
    $date= $_POST['date'];
    $qty ="SELECT * FROM msitementry WHERE id ='$item_id'";
    $result = $conn->query($qty);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $option =$optionData['quantity'];
        $balance = $option-$quantity;
    }
    }
    if($balance>=0){
    $up="UPDATE msitementry SET quantity = '$balance' WHERE id='$item_id'";
    $query = "INSERT INTO main_out (`paint_main_id`,`quantity`,`date`,`request`,`reqdepartment`,`remark`)
     VALUES ('$item_id','$quantity','$date','$checked_by','$received_by','$remark')";
    $query1 = $conn->query($up);
    $query2 = $conn->query($query);
    if($query2)
    {?>
     <script> alert("Data Saved"); 
     window.location="Paint_main.php";
    </script>;
    <?php

    }
    else
    {?>
    <script> alert("Data Not Saved"); 
   window.location="Paint_main.php";
   </script>
    <?php
    }
    }
    else 
    {
        ?>
    <script> alert("Insuffiecient stock balance"); 
   window.location="Paint_main.php";
   </script>
    <?php

    }
    }
    ?>