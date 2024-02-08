<?php
include('connect.php');
 // ---------------------------------INSERT and UPDATE QUERY FOR PRODUCTION CHEMICALS BALANCE ---------------
 if(isset($_POST['INSERT_GENDA_BALANCE']))
 {

     $ITEM= $_POST['ITEM'];
     $UOM = $_POST['UOM'];
     $BALANCE = $_POST['BALANCE'];
     $REMARK = $_POST['REMARK'];
 
     $query = "INSERT INTO GenChem_Balance(ITEM, UOM, BALANCE, REMARK)  
     VALUES ('$ITEM', '$UOM','$BALANCE', '$REMARK')";
     $query_run = mysqli_query($conn, $query);
     if($query_run)
     {
         echo '<script> alert("Data Saved"); </script>';
         header('Location: Chemical_balance.php');
     }
     else
     {
         echo '<script> alert("Data Not Saved"); </script>';
     }
 }
 if (isset($_POST["UPDATE_BALANCE"]))
  {
    $ITEM = mysqli_real_escape_string($conn, $_POST["ITEM"]);
    $UOM = mysqli_real_escape_string($conn, $_POST["UOM"]);
    $BALANCE = mysqli_real_escape_string($conn, $_POST["BALANCE"]);
    $REMARK = mysqli_real_escape_string($conn, $_POST["REMARK"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE ProChem_Balance SET ITEM = '$ITEM', UOM = '$UOM', BALANCE = '$BALANCE', REMARK = '$REMARK' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate))
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ProChem_Balance.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if(isset($_POST['INSERT_STOCK_IN']))
{
    include('connect.php');
     $ITEM_ID= $_POST['ITEM_ID'];   
     $UOM = "kg";
     $STOCK_IN = $_POST['STOCK_IN'];
     $RECIVED_BY = $_POST['RECIVED_BY'];
     $RECIVED_DATE = $_POST['RECIVED_DATE'];
     $query ="SELECT BALANCE FROM GenChem_Balance WHERE id = $ITEM_ID";
     $result = $conn->query($query);
     $query1 = "SELECT * FROM summary  WHERE id='$ITEM_ID'";
     $result1 = $conn->query($query1);
     if($result->num_rows> 0){
         while($optionData=$result->fetch_assoc()){
            while ($optionData1 = $result1->fetch_assoc()) {
            $option =$optionData['BALANCE'];
            $option1 = $optionData1['STOCK_IN']; 
            $option2 = $optionData1['R_DATE']; 
            $option3 = $optionData1['STOCK_OUT'];
    $balance =$option+$STOCK_IN;
    if($RECIVED_DATE!==$option2){
        $option1=0;
        $option3=0;
        $s_balance = $option1 + $STOCK_IN;
    }if($RECIVED_DATE==$option2){
        $s_balance = $option1 + $STOCK_IN;
        $option3;
    }
   }
    }
        $genda_balance ="UPDATE GENCHEM_BALANCE SET BALANCE = '$balance' WHERE id='$ITEM_ID'";
        $query_run1= mysqli_query($conn, $genda_balance);
        $flag=false;
        if($ITEM_ID==20){//GP resin Item_id
            $flag=true;
            $id=2;
        }
        else if($ITEM_ID==21)// GP Gelcoat
        { 
            $flag=true;
            $id=11;
        
        }
        else if($ITEM_ID==23)// Hardner
        {
            $flag=true;
            $id=6;
        }
        if($flag)
        {
          $query_main = "SELECT * FROM main_store_item WHERE id =$id";
           $main_result = $conn->query($query_main);
           while ($mainData = $main_result->fetch_assoc()) {
           $data=$mainData['convertion'];
                }
            //start code
            $mini_query = "SELECT * FROM chemical_store_item  WHERE item_id=$id";
            $mini_result = $conn->query( $mini_query );
        while ( $mini_option = $mini_result->fetch_assoc() ) {
            $mini_balance= $mini_option['quantity'];
        if($ITEM_ID==20){// GP Resin
            $resin_kg= (double)$STOCK_IN/(double)$data;
            $actual_balance=$mini_balance-$resin_kg;
            $total_balance = "UPDATE chemical_store_item SET quantity='$actual_balance' WHERE item_id=1";
            $query_run10 = mysqli_query( $conn, $total_balance );
        }
        else if($ITEM_ID==21)//GP Gelcoat
        {
            $query_main = "SELECT * FROM main_store_item WHERE id =2";
           $main_result = $conn->query($query_main);
           while ($mainData = $main_result->fetch_assoc()) {
           $data1=$mainData['convertion'];
                }
            $jelcoat_kg=(double)$STOCK_IN/(double)$data1;
            $actual_balance=$mini_balance-$jelcoat_kg;

            $total_balance = "UPDATE chemical_store_item SET quantity='$actual_balance' WHERE item_id=2";
            $query_run10 = mysqli_query( $conn, $total_balance );
        }
        else if($ITEM_ID==23)
        { $query_main = "SELECT * FROM main_store_item WHERE id =6";
            $main_result = $conn->query($query_main);
            while ($mainData = $main_result->fetch_assoc()) {
            $data2=$mainData['convertion'];
                 }
            $hardner_kg= (double)$STOCK_IN/(double)$data2;
            $actual_balance=$mini_balance-$hardner_kg;
            $total_balance = "UPDATE chemical_store_item SET quantity='$actual_balance' WHERE item_id=$id";
            $query_run10 = mysqli_query( $conn, $total_balance );
        }
        }
        }
        $summary_balance = "UPDATE summary SET STOCK_IN = '$s_balance',STOCK_OUT = '$option3',R_DATE='$RECIVED_DATE', P_BALANCE='$balance' WHERE id='$ITEM_ID'";
        $query_run2 = mysqli_query($conn, $summary_balance);
        if($ITEM_ID==17){
            $VALUE="SP_GEL";
        }
        if($ITEM_ID==18){
            $VALUE="PIGMENT";  
        }
        if($ITEM_ID==19){
            $VALUE="N_RESIN";
        }
        if($ITEM_ID==20){
            $VALUE="GP_RESIN";  
        }
        if($ITEM_ID==21){
            $VALUE="GP_GEL";
        }
        if($ITEM_ID==22){
            $VALUE="CALCIUM";  
        }
        if($ITEM_ID==23){
            $VALUE="HARDNER";
        }
        if($ITEM_ID==24){
            $VALUE="MAJ";  
        }
            $REMARK="FOR GENDA IN";
            $STOCK_OUT=0;
            $DEPARTMENT="GEN";
            $query_in = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN,STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)
            VALUES ('$VALUE','$DEPARTMENT','$UOM','$STOCK_IN','$STOCK_OUT', '$balance', '$RECIVED_BY','$RECIVED_DATE','$REMARK')";
            $query_run = mysqli_query($conn, $query_in);
        //---------------------------------------------This is end of balance our stock---------------------------------
            $query = "INSERT INTO genchem_in(ITEM_ID, UOM, STOCK_IN, RECIVED_BY,RECIVED_DATE)  
            VALUES ('$ITEM_ID', '$UOM','$STOCK_IN', '$RECIVED_BY','$RECIVED_DATE')";
            $query_run = mysqli_query($conn, $query);
            if($query_run)
            {
                echo '<script> alert("Data Saved"); </script>';
                header('Location:Chemical_balance.php');
            }
            else
            {
                echo '<script> alert("Data Not Saved"); </script>';
            }
        }

}
if (isset($_POST['genFiber'])) {
    include('connect.php');
    $ITEM_ID = $_POST['ITEM_ID'];
    $UOM ="PCS";
    $FIBER_BALANCE_PCS = $_POST['FIBER_BALANCE_PCS'];
    $WOVEN_BALANCE_PCS = 0;
    $RECIVED_BY = $_POST['RECIVED_BY'];
    $RECIVED_DATE = $_POST['RECIVED_DATE'];
    $select_balance_item = "SELECT WOVEN_BALANCE_PCS,FIBER_BALANCE_PCS,WOVEN_BALANCE_KG,FIBER_BALANCE_KG FROM genfiber_balance WHERE ITEM_ID='$ITEM_ID'";
    $result = $conn->query($select_balance_item);
     $kg_query ="SELECT W_400,F_450,ITEM FROM general_formulation WHERE ID =$ITEM_ID";
     $result1 = $conn->query( $kg_query);
      ////-------------------------------------------------------------------------------------- -===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  =
      $insert_fiber_summary = "SELECT * FROM fiber_summary WHERE FORM_ID =$ITEM_ID";
      $result133 = $conn->query( $insert_fiber_summary );
      $select_balance_item_summary = "SELECT WOVEN_BALANCE_PCS,FIBER_BALANCE_PCS FROM genfiber_balance WHERE ITEM_ID='$ITEM_ID'";
      $result134 = $conn->query( $select_balance_item_summary );
      while( $option133 = $result133->fetch_assoc() )
   {
          while( $option134 = $result134->fetch_assoc() )
   {
              $option13 = $option133[ 'ITEM' ];
              $R_DATE = $option133[ 'R_DATE' ];
              $IN_BALANCE = $option133[ 'STOCK_IN' ];
              $OUT_BALANCE = $option133[ 'STOCK_OUT' ];
              $P_BALANCE = $option133[ 'P_BALANCE' ];
              $TOTAL_FIBER_BALANCE = $option134[ 'FIBER_BALANCE_PCS' ];
              $TOTAL_WOVEN_BALANCE = $option134[ 'WOVEN_BALANCE_PCS' ];
              if ($R_DATE!==$RECIVED_DATE ) {
                  $IN_BALANCE=0;
                  $OUT_BALANCE=0;
                  $S_BALANCE=$IN_BALANCE+$FIBER_BALANCE_PCS;
                  $Sw_BALANCE=$IN_BALANCE+$WOVEN_BALANCE_PCS;
              } elseif ($R_DATE == $RECIVED_DATE ) {
                  $OUT_BALANCE;
                  $S_BALANCE=$IN_BALANCE +$FIBER_BALANCE_PCS;
                  $Sw_BALANCE=$IN_BALANCE+$WOVEN_BALANCE_PCS;
              }
              $F_T_B=$TOTAL_FIBER_BALANCE+$FIBER_BALANCE_PCS;
              $W_T_B=$TOTAL_WOVEN_BALANCE+$WOVEN_BALANCE_PCS;


              $update_fiber_summary = "UPDATE fiber_summary SET STOCK_IN ='$S_BALANCE' , STOCK_OUT='$OUT_BALANCE',R_DATE='$RECIVED_DATE', P_BALANCE='$F_T_B' WHERE FORM_ID =$ITEM_ID AND ITEM='FIBER' ";
              $query_run134 = mysqli_query( $conn, $update_fiber_summary );
              $update_woven_summary = "UPDATE fiber_summary SET STOCK_IN ='$Sw_BALANCE' , STOCK_OUT='$OUT_BALANCE',R_DATE='$RECIVED_DATE', P_BALANCE='$W_T_B' WHERE ID ='$ITEM_ID' AND ITEM='WOVEN' ";
              $query_run1345 = mysqli_query( $conn, $update_woven_summary );
          }
      }
    if ($result->num_rows > 0) {
  
        while($option=$result1->fetch_assoc())
        {
            while ($optionData = $result->fetch_assoc()) {
              $option1 = $optionData['WOVEN_BALANCE_PCS'];
              $option2 = $optionData['FIBER_BALANCE_PCS'];
              $option3 = $optionData['WOVEN_BALANCE_KG'];
              $option4 = $optionData['FIBER_BALANCE_KG'];
              $option5 = $option['W_400'];
              $option6 = $option['F_450'];
              $option7=$option['ITEM'];
              // $balance1 = $option1 + $WOVEN_BALANCE_PCS;
              $balance1 = 0;
              $balance2 = $option2 + $FIBER_BALANCE_PCS;
              // $woven_kg_balance=$balance1 * $option5;
              $woven_kg_balance=0;
              $fiber_kg_balance=(double)$balance2 *(double)$option6;
              $query_main = "SELECT * FROM main_store_item WHERE id=4";
              $main_result = $conn->query($query_main);
              while ($mainData = $main_result->fetch_assoc()) {
                  $data=$mainData['convertion'];
              }
              $f_roll_bal=(double)$option6*(double)$FIBER_BALANCE_PCS/(double)$data;
              //The following code is used to update production fiber balance in rolls
              $chem_qty ="SELECT quantity FROM chemical_store_item where item_id=4";
              $result1 = $conn->query($chem_qty);
              if($result1->num_rows> 0){
                while($optionData=$result1->fetch_assoc()){
                $qty=$optionData['quantity'];
              $new_prod=round($qty-$f_roll_bal,4); 
            }
            }
            $chemical_balance ="UPDATE chemical_store_item SET quantity =$new_prod where item_id=4";
            // $query_woven = "SELECT * FROM main_store_item WHERE id =5";
            // $woven_result = $conn->query($query_woven);
            // while ($mainData = $woven_result->fetch_assoc()) {
            //     $data2=$mainData['convertion'];
            // }
            // $wr_roll_bal=(double)$option5*(double)$WOVEN_BALANCE_PCS/(double)$data2;
            //   $w_qty ="SELECT quantity FROM chemical_store_item where item_id=5";
            //   $result2 = $conn->query($w_qty);
            //   if($result2->num_rows> 0){
            //     while($optionData=$result2->fetch_assoc()){
            //     $chem_qty=$optionData['quantity'];
            //     $new_prod=round($chem_qty-$wr_roll_bal,4); 
            // }
            // }
            // $p_bal ="UPDATE chemical_store_item SET quantity =$new_prod where item_id=5";
              $pcs_balance = "UPDATE genfiber_balance SET WOVEN_BALANCE_PCS = '$balance1', WOVEN_BALANCE_KG='$woven_kg_balance', 
            FIBER_BALANCE_PCS = '$balance2',FIBER_BALANCE_KG='$fiber_kg_balance'  WHERE ITEM_ID ='$ITEM_ID'";
              $query_run1 = mysqli_query($conn, $pcs_balance) or die(mysqli_error($conn));
            
              $item1="F_450";
              $item2="W_400";
              $DEPARTMENT="GEN";
              $UNIT="PCS";
            $STOCK_OUT=0;
            $REMARK=$option7;
              $fiber_query_in = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN,STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)
              VALUES ('$item1','$DEPARTMENT','$UNIT','$FIBER_BALANCE_PCS','$STOCK_OUT', '$balance2', '$RECIVED_BY','$RECIVED_DATE','$REMARK')";
              $query_run = mysqli_query($conn,  $fiber_query_in);
              $woven_query_in = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN,STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)
              VALUES ('$item2','$DEPARTMENT','$UNIT','$WOVEN_BALANCE_PCS','$STOCK_OUT', '$balance1', '$RECIVED_BY','$RECIVED_DATE','$REMARK')";
            $query_run = mysqli_query($conn, $woven_query_in);
            
            }
          }
          $query = "INSERT INTO genfiber_in(ITEM,UOM,FIBER_BALANCE_PCS,WOVEN_BALANCE_PCS,RECIVED_BY,RECIVED_DATE)
            VALUES ('$ITEM_ID', '$UOM','$FIBER_BALANCE_PCS','$WOVEN_BALANCE_PCS', '$RECIVED_BY','$RECIVED_DATE')";
          $query_run = mysqli_query($conn, $query);
          $query_run1 = mysqli_query($conn, $chemical_balance);
          $query_run2 = mysqli_query($conn, $p_bal);
          if ($query_run) {
            echo '<script> alert("Data Saved"); </script>';
            header('Location:Fiber_balance.php');
          } else {
            echo '<script> alert("Data Not Saved"); </script>';
          }
        }
          
        }
        if (isset($_POST['GEN_PAINT'])) {
            include('connect.php');
            $item2 = "GP_RESIN";
            $STOCK_IN = 0;
            $GP_RESIN = $_POST['GP_RESIN'];
            $gp_resin_drum = 220;
            $UOM ="DRUM";
            $NAME = $_POST['NAME'];
            $DATE = $_POST['DATE'];
        
            $GP_RESIN_OUT = "SELECT BALANCE FROM GENCHEM_BALANCE WHERE ID='20'";
            $result = $conn->query($GP_RESIN_OUT);
        
        
            $GP_RESIN_SUMMARY = "SELECT * FROM summary  WHERE ID='20'";
            $result1 = $conn->query($GP_RESIN_SUMMARY);
            if ($result->num_rows > 0) {
                while ($option = $result1->fetch_assoc()) {
                    while ($optionData = $result->fetch_assoc()) {
                        $OUT_DATE=$option['R_DATE'];
                        $OUT_BALANCE=$option['STOCK_OUT'];   
                        $IN_BALANCE=$option['STOCK_IN']; 
                        $option1 = $optionData['BALANCE'];
                    
                        $DRUM_KG=$GP_RESIN*$gp_resin_drum;
                        $balance1 = $option1 - $DRUM_KG;
        
                        $production_balance = "UPDATE GENCHEM_BALANCE SET BALANCE = '$balance1' WHERE id='20'";
                        $query_run1 = mysqli_query($conn, $production_balance);
        
                        $DEPARTMENT = "GEN";
                        $REMARK = "FOR CHEMIST";
                
                        $gp_resin_in = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN, STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)
                            VALUES ('$item2','$DEPARTMENT','$UOM','$STOCK_IN','$GP_RESIN', '$balance1', '$NAME','$DATE','$REMARK')";
                        $query_run4 = mysqli_query($conn, $gp_resin_in);
        
                        if($DATE==$OUT_DATE){
                            $S_BALANCE = $OUT_BALANCE+$DRUM_KG;
                           $IN_BALANCE;
                       
                        }if($DATE!==$OUT_DATE){
                            $OUT_BALANCE=0;
                            $IN_BALANCE=0;
                            $S_BALANCE = $OUT_BALANCE+$DRUM_KG;
                        }
                        
                        $gp_resin_query = "UPDATE summary SET STOCK_OUT ='$S_BALANCE',STOCK_IN ='$IN_BALANCE'
                        ,R_DATE='$DATE', P_BALANCE = '$balance1'  WHERE id='20'";
                        $query_run3 = mysqli_query($conn, $gp_resin_query); 
        
        
                    }
                    if ($query_run1) {
                        echo '<script> alert("Data Saved"); </script>';
                        header('Location:Genda_out.php');
                    }
                    if ($query_run2) {
                        echo '<script> alert("Data Saved"); </script>';
                        header('Location:Genda_out.php');
                    } else {
                        echo '<script> alert("Data Not Saved"); </script>';
                    }
                }
            }
        }
if(isset($_POST['addfiber']))
 {

     $ITEM_ID= $_POST['ITEM_ID'];
     $UOM = 'PCS';
     $FIBER_BALANCE_PCS = $_POST['FIBER_BALANCE_PCS'];
     $WOVEN_BALANCE_PCS = $_POST['WOVEN_BALANCE_PCS'];

     $kg_query ="SELECT W_400,F_450,ITEM FROM general_formulation WHERE ID =$ITEM_ID";
     $result322 = $conn->query( $kg_query);
     while ($optionData = $result322->fetch_assoc()) {
        $fiber=$optionData['F_450'];
        $woven=$optionData['W_400'];
        }
        $FIBER_BALANCE_KG=(double)$FIBER_BALANCE_PCS*(double)$fiber;
        $WOVEN_BALANCE_KG=(double)$WOVEN_BALANCE_PCS*(double)$woven;

     $query = "INSERT INTO genfiber_balance(ITEM_ID, UNIT,FIBER_BALANCE_PCS,FIBER_BALANCE_KG,WOVEN_BALANCE_KG,WOVEN_BALANCE_PCS)  
     VALUES ('$ITEM_ID','$UOM','$FIBER_BALANCE_PCS','$FIBER_BALANCE_KG','$WOVEN_BALANCE_KG','$WOVEN_BALANCE_PCS')";
     $query_run = mysqli_query($conn, $query);
     echo $query;
     if($query_run)
     {
         echo '<script> alert("Data Saved"); </script>';
         header('Location:Fiber_balance.php');
     }
     else
     {
         echo '<script> alert("Data Not Saved"); </script>';
     }
 }
 if (isset($_POST["updatedata"]))
 {
    include('connect.php');
    $id = $_POST['id'];
    $UOM =$_POST['uom'];
    $balance = $_POST['balance'];
   $sqlUpdate = "UPDATE genchem_balance SET UOM = '$UOM', BALANCE = '$balance' WHERE ID='$id'";
   if(mysqli_query($conn,$sqlUpdate))
   {
       echo '<script> alert("Data Saved"); </script>';
       header('Location:Chemical_balance.php');
   }
   else
   {
       echo '<script> alert("Data Not Saved"); </script>';
   }
}
if ( isset( $_POST[ 'updatefiber' ] ) )
 {

    $item_id = $_POST[ 'id' ];
    $fiber_pcs = $_POST[ 'fiber_pcs'];
    $qur="SELECT * FROM genfiber_balance where ID='$item_id'";
    $query_r= mysqli_query( $conn, $qur );
    while ($optionData = $query_r->fetch_assoc() ) {
        $form_id=$optionData['ITEM_ID'];
    }

    $qury="SELECT * FROM general_formulation where ID='$form_id'";
    $query_run = mysqli_query( $conn, $qury );
    while ($optionData = $query_run->fetch_assoc() ) {
        $f_450=$optionData['F_450'];
    }
    $fib_kg=(double)$f_450*(double)$fiber_pcs;

    $query = "UPDATE genfiber_balance SET FIBER_BALANCE_PCS='$fiber_pcs',FIBER_BALANCE_KG='$fib_kg' WHERE ID='$item_id'";

    $query_run = mysqli_query( $conn, $query );

    if ( $query_run )
    {
        ?>
        <script>
             alert("update succesfully,thank you");
         window.location="Fiber_balance.php";
        </script>
        <?php
    } else {
        ?>
        <script>
             alert("Some thing wrong");
         window.location="Fiber_balance.php";
        </script>
        <?php
    }
}
?>