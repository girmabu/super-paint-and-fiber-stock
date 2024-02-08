<?php
include( 'connect.php' );
if ( isset( $_POST[ 'insert_formulation' ] ) ) {
    $ITEM = $_POST[ 'ITEM' ];
    $UM = $_POST[ 'UNIT' ];
    $F_450 = $_POST[ 'F_450' ];
    $W_400 = $_POST[ 'W_400' ];
    $GP_RESIN = $_POST[ 'GP_RESIN' ];
    $N_RESIN = $_POST[ 'N_RESIN' ];
    $SP_GEL = $_POST[ 'SP_GEL' ];
    $GP_GEL = $_POST[ 'GP_GEL' ];
    $HARDNER = $_POST[ 'HARDNER' ];
    $PIGMENT = $_POST[ 'PIGMENT' ];
    $CALCIUM = $_POST[ 'CALCIUM' ];
    $MAJ = $_POST[ 'MAJ' ];
    $query = "INSERT INTO General_Formulation (ITEM, UNIT, F_450, W_400, GP_RESIN,CALCIUM , N_RESIN, SP_GEL, GP_GEL, HARDNER, PIGMENT, MAJ)
    VALUES ('$ITEM', '$UM','$F_450', '$W_400',  '$GP_RESIN','$CALCIUM', '$N_RESIN', '$SP_GEL', '$GP_GEL', '$HARDNER', '$PIGMENT', '$MAJ')";
    $query_run = mysqli_query( $conn, $query );
    if ( $query_run ) {
        echo '<script> alert("Data Saved"); </script>';
        header( 'Location:production_formulation.php' );
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if ( isset( $_POST[ 'UpdateFormulation' ] ) )
 {

    $update_id = $_POST[ 'id' ];
    $PRODUCT_TYPE = $_POST[ 'PRODUCT_TYPE' ];
    // $UNIT = $_POST[ 'UNIT' ];
    $F_450 = $_POST[ 'F_450' ];
    $W_400 = $_POST[ 'W_400' ];

    $GP_RESIN = $_POST[ 'GP_RESIN' ];
    $N_RESIN = $_POST[ 'N_RESIN' ];
    $SP_GEL = $_POST[ 'SP_GEL' ];
    $GP_GEL = $_POST[ 'GP_GEL' ];
    $HARDNER = $_POST[ 'HARDNER' ];
    $PIGMENT = $_POST[ 'PIGMENT' ];
    $CALCIUM = $_POST[ 'CALCIUM' ];
    $MAJ = $_POST[ 'MAJ' ];

    $query = "UPDATE General_Formulation SET ITEM='$PRODUCT_TYPE', F_450='$F_450', W_400='$W_400',GP_RESIN='$GP_RESIN',
     N_RESIN='$N_RESIN',SP_GEL='$SP_GEL',HARDNER='$HARDNER',PIGMENT='$PIGMENT',CALCIUM='$CALCIUM',MAJ='$MAJ' WHERE ID='$update_id'";

    $query_run = mysqli_query( $conn, $query );

    if ( $query_run )
    {
        echo '<script> alert("Data Updated"); </script>';
        header( 'Location:production_formulation.php' );
    } else {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}
if ( isset( $_POST[ 'INSERT_PRODUCTION_BALANCE' ] ) ) {

    $ITEM = $_POST[ 'ITEM' ];
    $UOM = $_POST[ 'UOM' ];
    $BALANCE = $_POST[ 'BALANCE' ];
    if ( $_POST[ 'BALANCE' ] >= 0 ) {
        $balance = $BALANCE;
        ;
    }
    if ( $_POST[ 'BALANCE' ] <= 0 ) {
        $balance = 0;
    }
    $REMARK = $_POST[ 'REMARK' ];

    $query = "INSERT INTO ProChem_Balance(ITEM, UOM, BALANCE, REMARK)  
     VALUES ('$ITEM', '$UOM','$balance', '$REMARK')";
    $query_run = mysqli_query( $conn, $query );
    if ( $query_run ) {
        echo '<script> alert("Data Saved"); </script>';
        header( 'Location: ProChem_Balance.php' );
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if ( isset( $_POST[ 'UPDATE_BALANCE' ] ) ) {
    $ITEM = mysqli_real_escape_string( $conn, $_POST[ 'ITEM' ] );
    $UOM = mysqli_real_escape_string( $conn, $_POST[ 'UOM' ] );
    $BALANCE = mysqli_real_escape_string( $conn, $_POST[ 'BALANCE' ] );
    $REMARK = mysqli_real_escape_string( $conn, $_POST[ 'REMARK' ] );
    $id = mysqli_real_escape_string( $conn, $_POST[ 'id' ] );
    $sqlUpdate = "UPDATE ProChem_Balance SET ITEM = '$ITEM', UOM = '$UOM', BALANCE = '$BALANCE', REMARK = '$REMARK' WHERE id='$id'";
    if ( mysqli_query( $conn, $sqlUpdate ) ) {
        echo '<script> alert("Data Saved"); </script>';
        header( 'Location: ProChem_Balance.php' );
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if ( isset( $_POST[ 'proFiber' ] ) ) {
    include( 'connect.php' );
    $ITEM_ID = $_POST[ 'ITEM_ID' ];
    $UOM = "pcs";
    $FIBER_BALANCE_PCS = $_POST[ 'FIBER_BALANCE_PCS' ];
    $WOVEN_BALANCE_PCS = $_POST[ 'WOVEN_BALANCE_PCS' ];
    $RECIVED_BY = $_POST[ 'RECIVED_BY' ];
    $RECIVED_DATE = $_POST[ 'RECIVED_DATE' ];
    //----------------------------------------This is to balance our stock---------------------------------------------
    $select_balance_item = "SELECT WOVEN_BALANCE_PCS,FIBER_BALANCE_PCS,WOVEN_BALANCE_KG,FIBER_BALANCE_KG FROM profiber_balanceupdated WHERE ITEM_ID='$ITEM_ID'";
    $result = $conn->query( $select_balance_item );
    $kg_query = "SELECT W_400,F_450,ITEM FROM general_formulation WHERE ID =$ITEM_ID";
    $result1 = $conn->query( $kg_query );
    ////-------------------------------------------------------------------------------------- -===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  =
    $insert_fiber_summary = "SELECT * FROM fiber_summary WHERE ID =$ITEM_ID";
    $result133 = $conn->query( $insert_fiber_summary );

    $select_balance_item_summary = "SELECT WOVEN_BALANCE_PCS,FIBER_BALANCE_PCS FROM profiber_balanceupdated WHERE ITEM_ID='$ITEM_ID'";
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
            $update_fiber_summary = "UPDATE fiber_summary SET STOCK_IN ='$S_BALANCE' , STOCK_OUT='$OUT_BALANCE',R_DATE='$RECIVED_DATE', P_BALANCE='$F_T_B' WHERE ID ='$ITEM_ID' AND ITEM='FIBER' ";
            $query_run134 = mysqli_query( $conn, $update_fiber_summary );

            $update_woven_summary = "UPDATE fiber_summary SET STOCK_IN ='$Sw_BALANCE' , STOCK_OUT='$OUT_BALANCE',R_DATE='$RECIVED_DATE', P_BALANCE='$W_T_B' WHERE ID ='$ITEM_ID' AND ITEM='WOVEN' ";
            $query_run134 = mysqli_query( $conn, $update_woven_summary );

        }
    }
    while( $option = $result1->fetch_assoc() )
 {
        while ( $optionData = $result->fetch_assoc() ) {
            $option1 = $optionData[ 'WOVEN_BALANCE_PCS' ];
            $option2 = $optionData[ 'FIBER_BALANCE_PCS' ];
            $option3 = $optionData[ 'WOVEN_BALANCE_KG' ];
            $option4 = $optionData[ 'FIBER_BALANCE_KG' ];
            $option5 = $option[ 'W_400' ];
            $option6 = $option[ 'F_450' ];
            $option7 = $option[ 'ITEM' ];

            if ( $option5>0 ) {
                $balance1 = $option1 + $WOVEN_BALANCE_PCS;
                $woven_kg_balance = $balance1 * $option5;
            } elseif ( $option5==0 ) {
                $balance1 = 0;
                $woven_kg_balance = 0;
            }
            $query_main = "SELECT * FROM main_store_item WHERE id =4";
            $main_result = $conn->query($query_main);
            while ($mainData = $main_result->fetch_assoc()) {
                $data=$mainData['convertion'];
            }
            $balance2 = $option2 + $FIBER_BALANCE_PCS;
            $fiber_kg_balance = ( float )$balance2*( float )$option6;
            $f_roll_bal = (double)$option6*(double)$FIBER_BALANCE_PCS/(double)$data;

            $prod_qty = "SELECT quantity FROM chemical_store_item where item_id=4";
            $result1 = $conn->query( $prod_qty );
           if($result1->num_rows> 0){
                while( $optionData = $result1->fetch_assoc() ) {
                    $pr_qty = $optionData[ 'quantity' ];
                    $new_prod = ( $pr_qty-$f_roll_bal);
                    $new_prod=round($new_prod,4);
                }
            }
            $production_bal = "UPDATE chemical_store_item SET quantity ='$new_prod' where item_id=4";
            $query_woven = "SELECT * FROM main_store_item WHERE id =5";
            $woven_result = $conn->query($query_woven);
            while ($mainData = $woven_result->fetch_assoc()) {
                $woven_data=$mainData['convertion'];
            }
            $balance12 = $option1 + $WOVEN_BALANCE_PCS;
            $woven_kg_balance = ( float )$balance12*( float )$option5;
            $w_roll_bal = (double)$option5*(double)$WOVEN_BALANCE_PCS/(double)$woven_data;

            $pr_qty = "SELECT quantity FROM chemical_store_item where item_id=5";
            $result2 = $conn->query( $pr_qty );
            if ( $result2->num_rows> 0 ) {
                while( $optionData = $result2->fetch_assoc() ) {
                    $production_q = $optionData[ 'quantity' ];
                    $new_woven = round( $production_q-$w_roll_bal, 4 );
                }
            }
            $p_bal = "UPDATE chemical_store_item SET quantity ='$new_woven' where item_id=5";
            //This is the end of we update
            $pcs_balance = "UPDATE profiber_balanceupdated SET WOVEN_BALANCE_PCS = '$balance1', WOVEN_BALANCE_KG='$woven_kg_balance', 
            FIBER_BALANCE_PCS = '$balance2',FIBER_BALANCE_KG='$fiber_kg_balance'  WHERE ITEM_ID ='$ITEM_ID'";
            $query_run1 = mysqli_query( $conn, $pcs_balance ) or die( mysqli_error( $conn ) );
            $item1 = 'F_450';
            $item2 = 'W_400';
            $DEPARTMENT = 'PRO';
            $UNIT = 'PCS';
            $STOCK_OUT = 0;
            $REMARK = $option7;
            $fiber_query_in = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN,STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)
       VALUES ('$item1','$DEPARTMENT','$UNIT','$FIBER_BALANCE_PCS','$STOCK_OUT', '$balance2', '$RECIVED_BY','$RECIVED_DATE','$REMARK')";
            $query_run = mysqli_query( $conn,  $fiber_query_in );
            $woven_query_in = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN,STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)
      VALUES ('$item2','$DEPARTMENT','$UNIT','$WOVEN_BALANCE_PCS','$STOCK_OUT', '$balance1', '$RECIVED_BY','$RECIVED_DATE','$REMARK')";
            $query_run = mysqli_query( $conn, $woven_query_in );

        }
    }
    $query = "INSERT INTO profiber_inupdated(ITEM,UOM,FIBER_BALANCE_PCS,WOVEN_BALANCE_PCS,RECIVED_BY,RECIVED_DATE)
     VALUES ('$ITEM_ID', '$UOM','$FIBER_BALANCE_PCS','$WOVEN_BALANCE_PCS', '$RECIVED_BY','$RECIVED_DATE')";
    $query_run = mysqli_query( $conn, $query );
    $query_run2 = mysqli_query( $conn, $production_bal );
    $query_run3 = mysqli_query( $conn, $p_bal );

    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header( 'Location: Fiber_balance.php' );
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if (isset($_POST['PAINT'])) {
    include('connect.php');
    $item2 = "GP_RESIN";
    // $item1 = "GP_GEL";
    $STOCK_IN = 0;
    $gp_resin_drum = 220;
    $GP_RESIN = $_POST['GP_RESIN'];
    // $GP_GEL = $_POST['GP_GEL'];
    $DATE = $_POST['DATE'];
    $UOM ="DRUM";
    $NAME = $_POST['NAME'];
    $GP_RESIN_OUT = "SELECT BALANCE FROM PROCHEM_BALANCE WHERE ID='4'";
    $result = $conn->query($GP_RESIN_OUT);

    $GP_RESIN_SUMMARY = "SELECT * FROM summary  WHERE ID='4'";
    $result1 = $conn->query($GP_RESIN_SUMMARY);
   
        while ($option = $result1->fetch_assoc()) {
            while ($optionData = $result->fetch_assoc()) {
                $OUT_DATE=$option['R_DATE'];
                $OUT_BALANCE=$option['STOCK_OUT'];   
                $IN_BALANCE=$option['STOCK_IN']; 
                echo $OUT_BALANCE;
                echo "hello";


                //GP_RESIN
                $option1 = $optionData['BALANCE'];
                
                $option5 = $option['BALANCE'];
                $DRUM_KG=$GP_RESIN*$gp_resin_drum;
                $balance1 = $option1 - $DRUM_KG;
            
                $production_balance = "UPDATE PROCHEM_BALANCE SET BALANCE = '$balance1' WHERE id='4'";
                $query_run1 = mysqli_query($conn, $production_balance); 

                $DEPARTMENT = "PRO";
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
                ,R_DATE='$DATE', P_BALANCE = '$balance1'  WHERE id='4'";
                $query_run1 = mysqli_query($conn, $gp_resin_query); 
            }
            if ($query_run1) {
                echo '<script> alert("Data Saved"); </script>';
                header('Location:Production_out.php');
            }
            if ($query_run2) {
                echo '<script> alert("Data Saved"); </script>';
                header('Location:Production_out.php');
            } else {
                echo '<script> alert("Data Not Saved"); </script>';
            }

          
        }
    
}
if ( isset( $_POST[ 'INSERT_STOCK_IN' ] ) )
{

    $ITEM_ID = $_POST[ 'ITEM_ID' ];
    $DEPARTMENT = 'PRO';
    $UOM = "kg";
    $STOCK_IN = $_POST[ 'STOCK_IN' ];
    $RECIVED_BY = $_POST[ 'RECIVED_BY' ];
    $RECIVED_DATE = $_POST[ 'RECIVED_DATE' ];
    //----------------------------------------This is to balance our stock---------------------------------------------
    include( 'connect.php' );
    $query = "SELECT BALANCE FROM ProChem_Balance WHERE id = $ITEM_ID";
    $result = $conn->query( $query );

    $query1 = "SELECT * FROM summary  WHERE id='$ITEM_ID'";
    $result1 = $conn->query( $query1 );

    while ( $optionData = $result->fetch_assoc() ) {
        while ( $optionData1 = $result1->fetch_assoc() ) {
            $option = $optionData[ 'BALANCE' ];
            $option1 = $optionData1[ 'STOCK_IN' ];
            $option2 = $optionData1[ 'R_DATE' ];
            $option3 = $optionData1[ 'STOCK_OUT' ];
            $balance = $option + $STOCK_IN;
            if ( $RECIVED_DATE !== $option2 ) {
                $option1 = 0;
                $option3 = 0;
                $s_balance = $option1 + $STOCK_IN;
            }
            if ( $RECIVED_DATE == $option2 ) {
                $s_balance = $option1 + $STOCK_IN;
                $option3;
            }
        }
    }

    if($ITEM_ID==4)
    {// Resin
        $query_main = "SELECT * FROM main_store_item WHERE id =1";
        $main_result = $conn->query($query_main);
        while ($mainData = $main_result->fetch_assoc()) {
            $data=$mainData['convertion'];
        }

        $query_chem = "SELECT * FROM chemical_store_item WHERE item_id =1";
        $chem_result = $conn->query($query_chem);
        while ($optionData = $chem_result->fetch_assoc()) {
            $option=$optionData['quantity'];
        }
        $convert=((double)$STOCK_IN)/(double)$data;
        $resin_result=(double)$option-$convert;
        $resin_result=round($resin_result,2);
        if($resin_result>=0)
        {
            $chem_update = "UPDATE chemical_store_item SET quantity = '$resin_result' WHERE item_id=1";
            $query_chemup = mysqli_query($conn, $chem_update);
        }
        else {
            echo '<script> alert("Large Quantity"); </script>';
          }
    }
    if($ITEM_ID==5)
    {// Jelcoat
        $query_main = "SELECT * FROM main_store_item WHERE id =2";
        $main_result = $conn->query($query_main);
        while ($mainData = $main_result->fetch_assoc()) {
            $data=$mainData['convertion'];
        }

        $query_chem = "SELECT * FROM chemical_store_item WHERE item_id=2";
        $chem_result = $conn->query($query_chem);
        while ($optionData = $chem_result->fetch_assoc()) {
            $option=$optionData['quantity'];
        }
        $convert=((double)$STOCK_IN)/(double)$data;
        $resin_result=(double)$option-$convert;
        $resin_result=round($resin_result,2);
        if($resin_result>=0)
        {
            $chem_update = "UPDATE chemical_store_item SET quantity = '$resin_result' WHERE item_id=2";
            $query_chemup = mysqli_query($conn, $chem_update);
        }
        else {
            echo '<script> alert("Large Quantity"); </script>';
          }
    }
    if($ITEM_ID==7)
    {// hardner
        $query_main = "SELECT * FROM main_store_item WHERE id =6";
        $main_result = $conn->query($query_main);
        while ($mainData = $main_result->fetch_assoc()) {
            $data=$mainData['convertion'];
        }

        $query_chem = "SELECT * FROM chemical_store_item WHERE item_id =6";
        $chem_result = $conn->query($query_chem);
        while ($optionData = $chem_result->fetch_assoc()) {
            $option=$optionData['quantity'];
        }
        $convert=((double)$STOCK_IN)/(double)$data;
        $resin_result=(double)$option-$convert;
        $resin_result=round($resin_result,2);
        if($resin_result>=0)
        {
            $chem_update = "UPDATE chemical_store_item SET quantity = '$resin_result' WHERE item_id=6";
            $query_chemup = mysqli_query($conn, $chem_update);
        }
        else {
            echo '<script> alert("Large Quantity"); </script>';
          }
    }
      $production_balance = "UPDATE PROCHEM_BALANCE SET BALANCE = '$balance' WHERE id='$ITEM_ID'";
    $query_run1 = mysqli_query( $conn, $production_balance );
    $summary_balance = "UPDATE summary SET STOCK_IN = '$s_balance',STOCK_OUT = '$option3', R_DATE='$RECIVED_DATE', P_BALANCE='$balance' WHERE id='$ITEM_ID'";
    $query_run2 = mysqli_query( $conn, $summary_balance );
    $STOCK_OUT = 0;
    if ( $ITEM_ID == 1 ) {
        $VALUE = 'SP_GEL';
    }
    if ( $ITEM_ID == 2 ) {
        $VALUE = 'PIGMENT';
    }
    if ( $ITEM_ID == 3 ) {
        $VALUE = 'N_RESIN';
    }
    if ( $ITEM_ID == 4 ) {
        $VALUE = 'GP_RESIN';
    }
    if ( $ITEM_ID == 5 ) {
        $VALUE = 'GP_GEL';
    }
    if ( $ITEM_ID == 6 ) {
        $VALUE = 'CALCIUM';
    }
    if ( $ITEM_ID == 7 ) {
        $VALUE = 'HARDNER';
    }
    if ( $ITEM_ID == 8 ) {
        $VALUE = 'MAJ';
    }

    $REMARK = 'FOR PRODCTION IN';
    $query_in = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN,STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)
     VALUES ('$VALUE','$DEPARTMENT','$UOM','$STOCK_IN','$STOCK_OUT', '$balance', '$RECIVED_BY','$RECIVED_DATE','$REMARK')";
    $query_run = mysqli_query( $conn, $query_in );
    $query = "INSERT INTO ProChem_In(ITEM_ID, UOM, STOCK_IN,P_BALANCE,RECIVED_BY,RECIVED_DATE)  
     VALUES ('$ITEM_ID', '$UOM','$STOCK_IN', '$balance', '$RECIVED_BY','$RECIVED_DATE')";
    $query_run = mysqli_query( $conn, $query );
    if ( $query_run ) {
        echo '<script> alert("Data Saved"); </script>';
        header( 'Location: chemical_balance.php' );
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if ( isset( $_POST[ 'updatedata' ] ) )
 {

    $item_id = $_POST[ 'id' ];
    $balance = $_POST[ 'BALANCE' ];

    $query = "UPDATE prochem_balance SET BALANCE='$balance' WHERE ID='$item_id'";

    $query_run = mysqli_query( $conn, $query );

    if ( $query_run )
    {
        echo '<script> alert("Data Updated"); </script>';
        header( 'Location:Chemical_balance.php' );
    } else {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}
if ( isset( $_POST['other_out'] ) )
{

    $to = $_POST[ 'to' ];
    $quantity=$_POST['STOCK_IN'];
    $RECIVED_BY=$_POST['RECIVED_BY'];
    $date=$_POST['RECIVED_DATE'];
    $item_id=$_POST['ITEM_ID'];
    $pro_dep="PRO";
    $gen_dep="GEN";
    $get_dep="GET";
    $uom="kg";
    $remark="በዉሰት የወጣ ኬሚካል";
    $prod_query="SELECT * FROM prochem_balance where ID='$item_id'";
    $query_pro=mysqli_query($conn,$prod_query);
    while ($optionData = $query_pro->fetch_assoc() ) {
        $name=$optionData['ITEM'];
        $pro_balance=$optionData['BALANCE'];
    }
    if($to){
    if((double)$pro_balance >= (double)$quantity)
    {
        $stock_in=0;
        $stock_out=0;
        $pro_chem_balance= (double)$pro_balance-(double)$quantity;
        $query = "UPDATE prochem_balance SET BALANCE='$pro_chem_balance' WHERE ID='$item_id'";
        $query_run2 = mysqli_query( $conn, $query );

        $OUT_BALANCE = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN, STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)  
        VALUES ('$name','$pro_dep' ,'$uom','$stock_in','$quantity', '$pro_chem_balance', '$RECIVED_BY','$date','$remark')";
        $query_run123 = mysqli_query($conn, $OUT_BALANCE);

        $query="SELECT * FROM summary where DEPARTEMENT='PRO' AND ID='$item_id'";
        $result=mysqli_query($conn,$query);
        while ($optionData=$result->fetch_assoc() ) {
            $db_date=$optionData['R_DATE'];
            $balance=$optionData['P_BALANCE'];
            $in=$optionData['STOCK_IN'];
            $out=$optionData['STOCK_OUT'];
        }
       if($db_date==$date)
       { 
        $out_balance=(double)$out+(double)$quantity;
        $total=(double)$balance+(double)$stock_in-(double)$quantity;
        $query = "UPDATE summary SET P_BALANCE='$total',STOCK_OUT='$out_balance' WHERE ID='$item_id'";
        $query_run0 = mysqli_query( $conn, $query );


        $query21 = "UPDATE dailysummary SET P_BALANCE='$total',STOCK_OUT='$out_balance' WHERE DEPARTEMENT='PRO' AND ITEM='$name'";
        $query_run= mysqli_query( $conn, $query21 );
        if($query_run0)
        {
        ?>
        <script>
             alert("Updated Successfully");
             window.location="chemical_balance.php";
        </script>
        <?php
       } 
        }
       else if($db_date!=$date)
       {
        $total=(double)$balance-(double)$quantity;
        $query = "UPDATE summary SET P_BALANCE='$total',STOCK_OUT='$quantity',R_DATE='$date' WHERE ID='$item_id'";
        $query_run3 = mysqli_query( $conn, $query );
        
        if($query_run3)
        {
        ?>
        <script>
             alert("Updated Successfully");
             window.location="chemical_balance.php";
        </script>
        <?php
       } 
       else{
        ?>
        <script>
             alert("Some Thing Wrong");
             window.location="chemical_balance.php";
        </script>
        <?php
       }
        }
       } 
          
        if($query_run2)
        {
         if($to==1)
          {
            $gen_query="SELECT * FROM genchem_balance where ITEM='$name'";
            $query_gen=mysqli_query($conn,$gen_query);
            while ($gen_data=$query_gen->fetch_assoc() ) {
                $gen_balance=$gen_data['BALANCE'];
            }


            $query="SELECT * FROM summary where DEPARTEMENT='GEN' AND ITEM='$name'";
            $result=mysqli_query($conn,$query);
            while ($optionData=$result->fetch_assoc() ) {
                $db_date=$optionData['R_DATE'];
                $balance=$optionData['P_BALANCE'];
                $in=$optionData['STOCK_IN'];
                $out=$optionData['STOCK_OUT'];
            }

            if($db_date==$date)
            { 
             $out_balance=(double)$out+(double)$quantity;
             $total=(double)$balance+(double)$quantity;
             $query = "UPDATE summary SET P_BALANCE='$total',STOCK_IN='$out_balance' WHERE DEPARTEMENT='GEN' AND ITEM='$name'";
             $query_run0 = mysqli_query( $conn, $query );

             $query21 = "UPDATE dailysummary SET P_BALANCE='$total',STOCK_IN='$out_balance' WHERE DEPARTEMENT='GEN' AND ITEM='$name'";
             $query_run= mysqli_query( $conn, $query21 );
             if($query_run0)
             {
             ?>
             <script>
                  alert("Updated Successfully");
                  window.location="chemical_balance.php";
             </script>
             <?php
            } 
             }
             else if($db_date!=$date)
             {
              $total=(double)$balance+(double)$quantity;
              $query = "UPDATE summary SET P_BALANCE='$total',STOCK_IN='$quantity',R_DATE='$date' WHERE DEPARTEMENT='GEN' AND ITEM='$name'";
              $query_run3 = mysqli_query( $conn, $query );
              
              $Daily_Balance_History = " INSERT INTO dailysummary (ID,R_DATE,ITEM,UOM,DEPARTEMENT,STOCK_IN,STOCK_OUT,P_BALANCE) 
              VALUES ('$item_id','$date','$name','$uom','$gen_dep','$quantity','$stock_out','$total')";
              $query_ru = mysqli_query( $conn, $Daily_Balance_History );

              if($query_run3)
              {
              ?>
              <script>
                   alert("Updated Successfully");
                   window.location="chemical_balance.php";
              </script>
              <?php
             } 
              }
           $genda_balance= (double)$gen_balance+(double)$quantity;
           $query1 = "UPDATE genchem_balance SET BALANCE='$genda_balance' where ITEM='$name'";
           $query_run2 = mysqli_query( $conn, $query1 );
           $OUT_BALANCE = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN, STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)  
           VALUES ('$name','$gen_dep' ,'$uom','$quantity','$stock_out', '$genda_balance', '$RECIVED_BY','$date','$remark')";
           $query_run123 = mysqli_query($conn, $OUT_BALANCE);
           if($query_run2)
           {
            ?>
            <script>
             alert("Balance Updated Successfully");
             window.location="chemical_balance.php";
            </script>
            <?php
            }
          }
          if($to==2)
          {
            $get_query="SELECT * FROM getchem_balance where ITEM='$name'";
            $query_get=mysqli_query($conn,$get_query);
            while ($get_data=$query_get->fetch_assoc() ) {
                $get_balance=$get_data['BALANCE'];
            }
           $getema_balance= (double)$get_balance+(double)$quantity;
           $query21 = "UPDATE getchem_balance SET BALANCE='$getema_balance' where ITEM='$name'";
           $query_run2 = mysqli_query( $conn, $query21 );
           $OUT_BALANCE1 = "INSERT INTO pro_sp_gel_out(ITEM,DEPARTEMENT,UOM,STOCK_IN, STOCK_OUT,P_BALANCE,RECIVED_BY,RECIVED_DATE,REMARK)  
           VALUES ('$name','$get_dep' ,'$uom','$quantity','$stock_out','$getema_balance', '$RECIVED_BY','$date','$remark')";
           $query_run13 = mysqli_query($conn, $OUT_BALANCE1);
            //This code is used to execute summery
            $query="SELECT * FROM summary where DEPARTEMENT='GET' AND ITEM='$name'";
            $result=mysqli_query($conn,$query);
            while ($optionData=$result->fetch_assoc() ) {
                $db_date=$optionData['R_DATE'];
                $balance=$optionData['P_BALANCE'];
                $in=$optionData['STOCK_IN'];
                $out=$optionData['STOCK_OUT'];
            }

            if($db_date==$date)
            { 
             $out_balance=(double)$out+(double)$quantity;
             $total=(double)$balance+(double)$stock_in+(double)$quantity;
             $query = "UPDATE summary SET P_BALANCE='$total',STOCK_IN='$out_balance' WHERE DEPARTEMENT='GET' AND ITEM='$name'";
             $query_run0 = mysqli_query( $conn, $query );

             $query21 = "UPDATE dailysummary SET P_BALANCE='$total',STOCK_IN='$out_balance' WHERE DEPARTEMENT='GET' AND ITEM='$name'";
             $query_run= mysqli_query( $conn, $query21 );
             if($query_run0)
             {
             ?>
             <script>
                  alert("Updated Successfully");
                  window.location="chemical_balance.php";
             </script>
             <?php
            } 
             }
             else if($db_date!=$date)
             {
              $total=(double)$balance+(double)$quantity;
              $query = "UPDATE summary SET P_BALANCE='$total',STOCK_IN='$quantity',R_DATE='$date' WHERE DEPARTEMENT='GET' AND ITEM='$name'";
              $query_run3 = mysqli_query( $conn, $query );
                
              $Daily_Balance_History = " INSERT INTO dailysummary (ID,R_DATE,ITEM,UOM,DEPARTEMENT,STOCK_IN,STOCK_OUT,P_BALANCE) 
              VALUES ('$item_id','$date','$name','$uom','$get_dep','$quantity','$stock_out','$total')";
              $query_ru = mysqli_query( $conn, $Daily_Balance_History );

              if($query_run3)
              {
              ?>
              <script>
                   alert("Updated Successfully");
                   window.location="chemical_balance.php";
              </script>
              <?php
             } 
              }
              //This is end of execute summery

           if($query21)
           {
            echo '<script> alert("Data Updated"); </script>';
            header( 'Location:Chemical_balance.php' );
            }
          }
        
        }
     }
      else{
     ?>
     <script>
          alert("Insufficent Balance");
    //   window.location="chemical_balance.php";
     </script>
     <?php
    }
    
}
if ( isset( $_POST[ 'updatefiber' ] ) )
 {

    $item_id = $_POST[ 'id' ];
    $woven_pcs = $_POST[ 'woven_pcs'];
    $fiber_pcs = $_POST[ 'fiber_pcs'];
    $qur="SELECT * FROM profiber_balanceupdated where id='$item_id'";
    $query_r= mysqli_query( $conn, $qur );
    while ($optionData = $query_r->fetch_assoc() ) {
        $form_id=$optionData['ITEM_ID'];
    }

    $qury="SELECT * FROM general_formulation where ID='$form_id'";
    $query_run = mysqli_query( $conn, $qury );
    while ($optionData = $query_run->fetch_assoc() ) {
        $w_400=$optionData['W_400'];
        $f_450=$optionData['F_450'];
    }
    $wov_kg=(double)$w_400*(double)$woven_pcs;
    $fib_kg=(double)$f_450*(double)$fiber_pcs;
    echo $fib_kg;
    $query = "UPDATE profiber_balanceupdated SET WOVEN_BALANCE_PCS='$woven_pcs', WOVEN_BALANCE_KG='$wov_kg'
    ,FIBER_BALANCE_PCS='$fiber_pcs',FIBER_BALANCE_KG='$fib_kg' WHERE ID='$item_id'";

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