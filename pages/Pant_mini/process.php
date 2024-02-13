<?php
include('connect.php');

if(isset($_POST['updatedata']))
{
    $id=$_POST['id'];
    $item_id = $_POST['main_store_item_id'];
    $quantity = $_POST['quantity'];
    $uom=$_POST['uom'];
    
    $sql="UPDATE Paint_mini_item  SET quantity = '$quantity', unit= '$uom' where id='$id'";
    $query_run = $conn->query($sql);
    if($query_run)
    {
        ?>
        <script>
            alert("update succesfully,thank you");
        window.location="paint_mini.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert("Some thing Wrong");
        window.location="paint_mini.php";
        </script>
        <?php
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
    echo $sql;
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
    $checked_by = $_POST['checked_by'];
    $date = $_POST['date'];
    $main_qty ="SELECT * FROM msitementry WHERE id =$item_id ";
    $result = $conn->query($main_qty);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $uom=$optionData['unit'];
    }
  }
    $query1="INSERT INTO paint_notification ( `item_id`, `uom`, `quantity`, `date`, `checked_by`) 
    VALUES ('$item_id','$uom','$quantity','$date','$checked_by')";
    $query_run = mysqli_query($conn, $query1);
    if($query_run)
    {
        ?>
        <script>
            alert("Successfully sent requisition");
        window.location="paint_mini.php";
        </script>
        <?php
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}


if(isset($_POST['approve_mininotification']))
{
    include('connect.php');
    $cv=0;
    $id=$_POST['id'];
    $item_id = $_POST['item_id'];
    $uom = "Kg";
    $quantity = $_POST['quantity'];
    $approved_by=$_POST['approved_by'];
    $req=3;
    $date= $_POST['date'];
   
    $sr="SELECT convertunit from msitementry where id='$item_id'";
    $st1=mysqli_query($conn,$sr) or die(mysqli_error($conn));
    $x=mysqli_fetch_assoc($st1);
    if($x != null)
    {$xx=$x['convertunit'];}
    else{$xx=1;}
    $cv = $_POST['quantity']*$xx;
    $query = "INSERT INTO paintmini_out (`quantity`,`date`,`reqdepartment`,`paint_main_id`,`checked_by`,unit)
     VALUES ('$quantity','$date','$req','$item_id','$approved_by','$uom')";
     $query1=mysqli_query($conn,$query) or die(mysqli_error($conn));

    $qty ="UPDATE paint_mini_item SET quantity=quantity-'$quantity'  WHERE paint_main_id ='$item_id' ";
    $qty1=mysqli_query($conn,$qty) or die(mysqli_error($conn));

    $qt ="UPDATE paintmini_mini_item SET quantity=quantity+'$cv'  WHERE paint_main_id='$item_id'";
    $qt1=mysqli_query($conn,$qt) or die(mysqli_error($conn));

    $del="DELETE from paint_notification WHERE  item_id='$item_id'";
    $del1=mysqli_query($conn,$del) or die(mysqli_error($conn));
        ?>
        <script>
            alert("Send succesfully,thank you");
    window.location="paint_mini.php";
        </script>
        <?php

  
}
 if (isset($_POST["deleteminiindex"])) {
    $item_id=$_POST['item_id'];
    include('connect.php');
     // sql to delete a record
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
   
        $sql = "DELETE FROM paint_mini_item WHERE id='$item_id'";
        $query_run = mysqli_query($conn, $sql) or 
        die(mysqli_error($conn));
        $st="SELECT paint_main_id from paint_mini_item WHERE id='$item_id'";
        $res=mysqli_query($conn,$st) or die(mysqli_error($conn));
        $re=mysqli_fetch_assoc($res);
        $i=$re['paint_main_id'];
        $query_main= "UPDATE msitementry set code_mini='0' where id='$i'";
        $main_query= mysqli_query($conn,$query_main)  or die(mysqli_error($conn));


        if ($query_run) {
         header("Location: Paint_mini.php");
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
    echo $uom;
    $query = "INSERT INTO fiber_mini_item (`main_store_item_id`,`uom`,`quantity`) VALUES ('$item_id','$uom','$quantity')";
    $query1="UPDATE main_store_item SET code =1 WHERE id=$item_id";
    $query_run1=mysqli_query($conn,$query1);
    $query_run =mysqli_query($conn,$query);
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
 }
    if (isset($_POST['unitconvert']))
        {
            include('connect.php');
            $item_id = $_POST['main_store_item_id'];
            $quantity = $_POST['quantity'];
            $checked_by = $_POST['checked_by'];
            $date= $_POST['date'];
            $up ="UPDATE paint_mini_item set quantity='$quantity',unit='Kg' WHERE paint_main_id='$item_id'";
            $result = $conn->query($up);
            ?>
            <script>
                alert("Data converted succesfully,thank you");
            window.location="paint_mini.php";
            </script>
            <?php
          
            
     
        
          
        }


    if (isset($_POST['additem']))
        {
            $item_id = $_POST['main_store_item_id'];
            $quantity = $_POST['quantity'];
            $main_qty ="SELECT * FROM msitementry WHERE id ='$item_id'";
            $result = $conn->query($main_qty);
            if($result->num_rows> 0)
            {
                while($optionData=$result->fetch_assoc()){
                $uom=$optionData['unit'];
                $id=$optionData['id'];
            }
            }
            $main_qty ="SELECT * FROM paint_mini_item WHERE paint_main_id='$item_id'";
            $r =mysqli_query($conn,$main_qty);
            $x=mysqli_num_rows($r);
            if($x)
            {
                ?>
                <script>
                    alert("Data already registered");
                window.location="paint_mini.php";
                </script>
                <?php
            }
            else{
            $query = "INSERT INTO paint_mini_item (`paint_main_id`,`quantity`) VALUES ('$item_id','$quantity')";
            $query_run =mysqli_query($conn,$query);
            $query211 = "UPDATE msitementry set code_mini='1' where id='$item_id'";
            $query_run =mysqli_query($conn,$query211);
            if($query_run)
            {
                        ?>
            <script>
                alert("update succesfully,thank you");
            window.location="paint_mini.php";
            </script>
            <?php

            }
            else
            {
                echo '<script> alert("Data Not Saved"); </script>';
            }
        }
    }