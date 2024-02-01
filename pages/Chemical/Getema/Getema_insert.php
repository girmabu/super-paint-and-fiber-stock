<?php
include('connect.php');
// ------------------------formulation insert--------------------------

if (isset($_POST["UPDATE_BALANCE"])) {
    $ITEM = mysqli_real_escape_string($conn, $_POST["ITEM"]);
    $UOM = mysqli_real_escape_string($conn, $_POST["UOM"]);
    $BALANCE = mysqli_real_escape_string($conn, $_POST["BALANCE"]);
    $REMARK = mysqli_real_escape_string($conn, $_POST["REMARK"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE ProChem_Balance SET ITEM = '$ITEM', UOM = '$UOM', BALANCE = '$BALANCE', REMARK = '$REMARK' WHERE id='$id'";
    if (mysqli_query($conn, $sqlUpdate)) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ProChem_Balance.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

if (isset($_POST['INSERT_STOCK_IN'])) {

    $ITEM_ID = $_POST['ITEM_ID'];
    $DEPARTMENT="GET";
    $UOM = $_POST['UOM'];
    $STOCK_IN = $_POST['STOCK_IN'];
    $RECIVED_BY = $_POST['RECIVED_BY'];
    $RECIVED_DATE = $_POST['RECIVED_DATE'];
    include('connect.php');
    $query = "SELECT BALANCE FROM getchem_balance WHERE ID = '$ITEM_ID'";
    $result = $conn->query($query);
    $query1 = "SELECT * FROM summary  WHERE id='$ITEM_ID'";
    $result1 = $conn->query($query1);

    if ($result->num_rows > 0) {
        while ($optionData = $result->fetch_assoc()) {
            while ($optionData1 = $result1->fetch_assoc()) {
            $option = $optionData['BALANCE'];
             $option1 = $optionData1['STOCK_IN']; 
            $option2 = $optionData1['R_DATE']; 
            $option3 = $optionData1['STOCK_OUT'];
            $balance = $option + $STOCK_IN;
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
        //This is the start of connection with fiber mini store
        if($ITEM_ID==12){// Resin
        $query_chem = "SELECT * FROM chemical_store_item WHERE id =2";
        $chem_result = $conn->query($query_chem);
        while ($optionData = $chem_result->fetch_assoc()) {
            $option=$optionData['quantity'];
        }
        $convert=((double)$STOCK_IN)/220;
        $resin_result=(double)$option-$convert;
        $resin_result=round($resin_result,2);
        if($resin_result>=0)
        {
            $chem_update = "UPDATE chemical_store_item SET quantity = '$resin_result' WHERE id=2";
            $query_chemup = mysqli_query($conn, $chem_update);
        }
        else {
            echo '<script> alert("Large Quantity"); </script>';
          }
      }
        //This is the end of connection with fiber mini store
    $genda_balance = "UPDATE GETCHEM_BALANCE SET BALANCE = '$balance' WHERE ID=$ITEM_ID";
    $query_run1 = mysqli_query($conn, $genda_balance);

    $summary_balance = "UPDATE summary SET STOCK_IN = '$s_balance',STOCK_OUT = '$option3',R_DATE='$RECIVED_DATE', P_BALANCE='$balance' WHERE id='$ITEM_ID'";
    $query_run2 = mysqli_query($conn, $summary_balance);
    //---------------------------------------------This is end of balance our stock---------------------------------
    if($ITEM_ID==9){
        $VALUE="SP_GEL";
    }
    if($ITEM_ID==10){
        $VALUE="PIGMENT";  
    }
    if($ITEM_ID==11){
        $VALUE="SP_RESIN";
    }
    if($ITEM_ID==12){
        $VALUE="GP_RESIN";  
    }
    if($ITEM_ID==13){
        $VALUE="GP_GEL";
    }
    if($ITEM_ID==14){
        $VALUE="CALCIUM";  
    }
    if($ITEM_ID==15){
        $VALUE="HARDNER";
    }
    if($ITEM_ID==16){
        $VALUE="MAJ";  
    }
        $REMARK="FOR GETEMA IN";
        $STOCK_OUT=0;
        $DEPARTMENT="GET";
        $query_in = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN,STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)
         VALUES ('$VALUE','$DEPARTMENT','$UOM','$STOCK_IN','$STOCK_OUT', '$balance', '$RECIVED_BY','$RECIVED_DATE','$REMARK')";
        $query_run = mysqli_query($conn, $query_in);

    $query = "INSERT INTO getchem_in(ITEM_ID, UOM, STOCK_IN, RECIVED_BY,RECIVED_DATE)  
     VALUES ('$ITEM_ID', '$UOM','$STOCK_IN', '$RECIVED_BY','$RECIVED_DATE')";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location:Chemical_balance.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
}
if (isset($_POST['getFiber']))
 {
    include('connect.php');
    $ITEM_ID = $_POST['ITEM_ID'];
    $UOM ="PCS";
    $FIBER_BALANCE_PCS = $_POST['FIBER_BALANCE_PCS'];
    $WOVEN_BALANCE_PCS = $_POST['WOVEN_BALANCE_PCS'];
    $RECIVED_BY = $_POST['RECIVED_BY'];
    $RECIVED_DATE = $_POST['RECIVED_DATE'];
    //----------------------------------------This is to balance our stock---------------------------------------------
    $select_balance_item = "SELECT WOVEN_BALANCE_PCS,FIBER_BALANCE_PCS,WOVEN_BALANCE_KG,FIBER_BALANCE_KG FROM getfiber_balance WHERE ITEM_ID='$ITEM_ID'";
    $result = $conn->query($select_balance_item);
     $kg_query ="SELECT W_400,F_450,ITEM FROM general_formulation WHERE ID =$ITEM_ID";
     $result1 = $conn->query( $kg_query);
      ////-------------------------------------------------------------------------------------- -===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  =
      $insert_fiber_summary = "SELECT * FROM fiber_summary WHERE FORM_ID =$ITEM_ID";
      $result133 = $conn->query( $insert_fiber_summary );
      $select_balance_item_summary = "SELECT WOVEN_BALANCE_PCS,FIBER_BALANCE_PCS FROM getfiber_balance WHERE ITEM_ID='$ITEM_ID'";
      $result134 = $conn->query( $select_balance_item_summary );
  
      while( $option133 = $result133->fetch_assoc() )
        {
                while( $option134 = $result134->fetch_assoc() )
        {
              $option13 = $option133[ 'ITEM' ];
              $P_BALANCE = $option133[ 'P_BALANCE' ];
              $TOTAL_FIBER_BALANCE = $option134[ 'FIBER_BALANCE_PCS' ];
              $TOTAL_WOVEN_BALANCE = $option134[ 'WOVEN_BALANCE_PCS' ];
              $R_DATE = $option133[ 'R_DATE' ];
              $IN_BALANCE = $option133[ 'STOCK_IN' ];
              $OUT_BALANCE = $option133[ 'STOCK_OUT' ];
              if ($R_DATE !== $RECIVED_DATE ) {
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
              $update_fiber_summary = "UPDATE fiber_summary SET STOCK_IN ='$S_BALANCE' , STOCK_OUT='$OUT_BALANCE',R_DATE='$RECIVED_DATE', P_BALANCE='$F_T_B' WHERE FORM_ID ='$ITEM_ID' AND ITEM='FIBER' ";
              $query_run134 = mysqli_query( $conn, $update_fiber_summary );
              $update_woven_summary = "UPDATE fiber_summary SET STOCK_IN ='$Sw_BALANCE' , STOCK_OUT='$OUT_BALANCE',R_DATE='$RECIVED_DATE', P_BALANCE='$W_T_B' WHERE FORM_ID ='$ITEM_ID' AND ITEM='WOVEN' ";
              $query_run134 = mysqli_query( $conn, $update_woven_summary );
          }
         }
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
            if($option5>0){
            $balance1 = $option1 + $WOVEN_BALANCE_PCS;
            $woven_kg_balance=$balance1 * $option5;
            }
            elseif($option5<=0) {
            $balance1=0;
            $woven_kg_balance=0;
            }
            $balance2 = $option2 + $FIBER_BALANCE_PCS;
            $fiber_kg_balance=(float)$balance2*(float)$option6;
            $f_roll_bal=(double)$option6*(double)$FIBER_BALANCE_PCS/46;
            $wr_roll_bal=(double)$option5*(double)$WOVEN_BALANCE_PCS/40;
            $prod_qty ="SELECT prod_qty FROM chemical_store_item where id=3";
            $result1 = $conn->query($prod_qty);
            if($result1->num_rows> 0){
          while($optionData=$result1->fetch_assoc()){
          $pr_qty=$optionData['prod_qty'];
         $new_prod=round($pr_qty-$f_roll_bal,4); 
        }
        }
        $production_bal ="UPDATE chemical_store_item SET prod_qty =$new_prod where item_id=3";
            $pr_qty ="SELECT prod_qty FROM chemical_store_item where item_id=5";
            $result2 = $conn->query($pr_qty);
            if($result2->num_rows> 0){
            while($optionData=$result2->fetch_assoc()){
            $production_q=$optionData['prod_qty'];
            $new_prod=round($production_q-$wr_roll_bal,4); 
        }
        }
        $p_bal ="UPDATE chemical_store_item SET prod_qty =$new_prod where item_id=5";
            //This is the end of wr update    
            $pcs_balance = "UPDATE getfiber_balance SET WOVEN_BALANCE_PCS = '$balance1', WOVEN_BALANCE_KG='$woven_kg_balance', 
            FIBER_BALANCE_PCS = '$balance2',FIBER_BALANCE_KG='$fiber_kg_balance'  WHERE ITEM_ID ='$ITEM_ID'";
            $query_run1 = mysqli_query($conn, $pcs_balance) or die(mysqli_error($conn));
            $item1="F_450";
            $item2="W_400";
            $DEPARTMENT="GET";
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
        $query = "INSERT INTO getfiber_balance(ITEM,UOM,FIBER_BALANCE_PCS,WOVEN_BALANCE_PCS,RECIVED_BY,RECIVED_DATE)
        VALUES ('$ITEM_ID', '$UOM','$FIBER_BALANCE_PCS','$WOVEN_BALANCE_PCS', '$RECIVED_BY','$RECIVED_DATE')";
        $query_run = mysqli_query($conn, $query);
        $query_run2 = mysqli_query($conn, $production_bal);
        $query_run3 = mysqli_query($conn, $p_bal);
  
      if ($query_run2) {
            echo '<script> alert("Data Saved"); </script>';
            header('Location:Fiber_balance.php');
          } else {
            echo '<script> alert("Data Not Saved"); </script>';
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
    $check=mysqli_query($conn,"select * from getfiber_balance where ITEM_ID='$ITEM_ID'");
    $checkrows=mysqli_num_rows($check);
     if($checkrows>0)
     {
     echo '<script> alert("Data already exist"); </script>';
     }
     else if($checkrows<=0)
     {
        $query = "INSERT INTO getfiber_balance(ITEM_ID, UNIT,FIBER_BALANCE_PCS,FIBER_BALANCE_KG,WOVEN_BALANCE_KG,WOVEN_BALANCE_PCS)  
        VALUES ('$ITEM_ID','$UOM','$FIBER_BALANCE_PCS','$FIBER_BALANCE_KG','$WOVEN_BALANCE_KG','$WOVEN_BALANCE_PCS')";
        $query_run = mysqli_query($conn, $query);
     }
     if($query_run)
     {
     echo '<script> alert("Data Saved"); </script>';
     header('Location:Fiber_balance.php');
     }
     else {
    echo '<script> alert("Data not saved"); </script>';

     }
 }
 if (isset($_POST['GET_PAINT'])) {
    include('connect.php');
    $item2="GP_RESIN";
    $STOCK_IN = 0;
    $GP_RESIN = $_POST['GP_RESIN'];
    $gp_resin_drum = 220;
    $UOM ="DRUM";
    $NAME = $_POST['NAME'];
    $DATE = $_POST['DATE'];
    // Data used to exceute chemical store in
    $item_id=2;
    $approved_by=$_POST['NAME'];
    $prod_qty=0;
    $gend_qty=0;
    $get_qty=$_POST['GP_RESIN'];

    $GP_RESIN_OUT = "SELECT BALANCE FROM getchem_balance WHERE ID='12'";
    $result = $conn->query($GP_RESIN_OUT);
    $GP_RESIN_SUMMARY = "SELECT * FROM summary  WHERE ID='12'";
    $result1 = $conn->query($GP_RESIN_SUMMARY);
    if ($result->num_rows > 0) {
        while ($option = $result1->fetch_assoc()) {
            while ($optionData = $result->fetch_assoc()) {
                $OUT_DATE=$option['R_DATE'];
                $OUT_BALANCE=$option['STOCK_OUT'];   
                $IN_BALANCE=$option['STOCK_IN']; 
                $option1 = $optionData['BALANCE'];
            
                $DRUM_KG=(double)$GP_RESIN*(double)$gp_resin_drum;
                $balance1 = (double)$option1 - (double)$DRUM_KG;

                $production_balance = "UPDATE getchem_balance SET BALANCE = '$balance1' WHERE id='12'";
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
                ,R_DATE='$DATE', P_BALANCE = '$balance1'  WHERE id='12'";
                $query_run3 = mysqli_query($conn, $gp_resin_query); 


            }
            if ($query_run1) {
                echo '<script> alert("Data Saved"); </script>';
                header('Location:Getema_out.php');
            }
            if ($query_run2) {
                echo '<script> alert("Data Saved"); </script>';
                header('Location:Getema_out.php');
            } else {
                echo '<script> alert("Data Not Saved"); </script>';
            }
        }
    }
}
if (isset($_POST["updatedata"])) {
    $id=$_POST['id'];
    $ITEM=$_POST["ITEM"];
    $UOM=$_POST["UOM"];
    $BALANCE=$_POST["BALANCE"];
    echo $id;
    $sqlUpdate = "UPDATE getchem_balance SET ITEM = '$ITEM', UOM = '$UOM', BALANCE = '$BALANCE' WHERE id='$id'";
    $sql_query=mysqli_query($conn, $sqlUpdate);
    if ($sql_query) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: Chemical_balance.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}