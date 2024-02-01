<?php
include('connect.php');
if(isset($_POST['updatecost']))
{  
      include('connect.php');
    $item_id = $_POST['id'];
    $uom = $_POST['uom'];
    $unit_price =$_POST['unit_price'];
    $convertion =$_POST['convertion'];
    $sql="UPDATE main_store_item SET uom='$uom',unit_price='$unit_price',convertion='$convertion' where id=$item_id";
    $query_run = mysqli_query($conn, $sql);
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: Fiber_main_store_cost.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if(isset($_POST['updateminicost']))
{  
      include('connect.php');
    $item_id = $_POST['id'];
    $uom = $_POST['uom'];
    $quantity =$_POST['quantity'];
    $unit_price =$_POST['unit_price'];
    $sql="UPDATE fiber_mini_item SET uom='$uom',quantity='$quantity',unit_price='$unit_price' where id=$item_id";
    $query_run = mysqli_query($conn, $sql);
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: Fiber_mini_store_cost.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if(isset($_POST['updatechemcost']))
{  

    $item_id = $_POST['id'];
    $uom = $_POST['uom'];
    $quantity =$_POST['quantity'];
    $unit_price =$_POST['unit_price'];
    $remark=$_POST['remark'];
    if($item_id<=8)
    {
        if($item_id!=4 && $item_id!=5){
        $sql="UPDATE prochem_balance SET UOM='$uom',BALANCE='$quantity',unit_price='$unit_price' where id=$item_id";
        $query_run = mysqli_query($conn, $sql);
        if($query_run)
        {
            echo '<script> alert("Data Saved"); </script>';
            header('Location:Chem_mini_mini_cost.php');
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
        }
    }
   else 
    {
        echo '<script> alert("you cannot update resin cost"); </script>';
        header('Location:Chem_mini_mini_cost.php');
    }
    }
    if($item_id>=8 && $item_id<=16)
    {
        if($item_id!=12 && $item_id!=13){
        $sql="UPDATE getchem_balance SET UOM='$uom',BALANCE='$quantity',unit_price='$unit_price' where id=$item_id";
        $query_run = mysqli_query($conn, $sql);
        if($query_run)
        {
            echo '<script> alert("Data Saved"); </script>';
            header('Location:Chem_mini_mini_cost.php');
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
        }
    }
    else 
    {
        echo '<script> alert("you cannot update resin cost"); </script>';
        header('Location:Chem_mini_mini_cost.php');
    }
    }
    if($item_id>16 && $item_id<=24)
    {
        if($item_id!=20 && $item_id!=21){
        $sql="UPDATE genchem_balance SET UOM='$uom',BALANCE='$quantity',unit_price='$unit_price' where id=$item_id";
        $query_run = mysqli_query($conn, $sql);
        if($query_run)
        {
            echo '<script> alert("Data Saved"); </script>';
            header('Location:Chem_mini_mini_cost.php');
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
        }
    }
    else 
    {
        echo '<script> alert("you cannot update resin cost"); </script>';
        header('Location:Chem_mini_mini_cost.php');
    }
    }
}
if(isset($_POST['addtocost']))
{  
    $item_id = $_POST['item_id'];
    $have_cost =1;
    $sql="UPDATE main_store_item SET have_cost='$have_cost' where id=$item_id";
    $query_run = mysqli_query($conn, $sql);
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: Fiber_main_store_cost.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if (isset($_POST["updateindex"]))
     {
        $item_id=$_POST['id'];
        include('connect.php');
       // sql to delete a record
   
       $sql="UPDATE main_store_item SET have_cost='0' where id=$item_id";
       $query_run = mysqli_query($conn, $sql);
       if($query_run)
       {
           echo '<script> alert("Data Saved"); </script>';
           header('Location: Fiber_main_store_cost.php');
       }
       else
       {
           echo '<script> alert("Data Not Saved"); </script>';
       }
    }
       
?>