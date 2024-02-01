<?php
include( '../connect.php' );
// ------------------------formulation insert--------------------------
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
    if ( $Q ) {
        echo '<script> alert("Data Saved"); </script>';
        header( 'Location:production_formulation.php' );
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
// -----------------update FORMULATION---------------------------------------------------------------
if ( isset( $_POST[ 'UpdateFormulation' ] ) )
 {

    $update_id = $_POST[ 'id' ];
    $PRODUCT_TYPE = $_POST['PRODUCT_TYPE' ];
    $UNIT = $_POST[ 'UNIT' ];
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
    $query = "UPDATE General_Formulation SET ITEM='$PRODUCT_TYPE', UNIT='$UNIT', F_450='$F_450', W_400='$W_400',GP_RESIN='$GP_RESIN',
     N_RESIN='$N_RESIN',SP_GEL='$SP_GEL',HARDNER='$HARDNER',PIGMENT='$PIGMENT',CALCIUM='$CALCIUM',MAJ='$MAJ' WHERE ID='$update_id'";
    $query_run = mysqli_query( $conn, $query );
    if ( $query_run )
 {
        echo '<script> alert("Data Updated"); </script>';
        header( 'Location:../formulation.php' );
    } else {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}

// -----------------update FORMULATION---------------------------------------------------------------

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

// ---------------------------------INSERT and UPDATE QUERY FOR PRODUCTION CHEMICALS STOCK_IN ---------------
if ( isset( $_POST[ 'INSERT_STOCK_IN' ] ) ) {

    $ITEM_ID = $_POST[ 'ITEM_ID' ];
    $DEPARTMENT = 'PRO';
    $UOM = $_POST[ 'UOM' ];
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
    include( 'connect.php' );
    $production_balance = "UPDATE PROCHEM_BALANCE SET BALANCE = '$balance' WHERE id='$ITEM_ID'";
    $query_run1 = mysqli_query( $conn, $production_balance );
//     if($ITEM_ID==4){
//         $id=1;
//     }
//     else if($ITEM_ID==1)
//     {
//         $id=2;
//     }
//     else if($ITEM_ID==7)
//     {
//         $id=6;
//     }
//     $mini_query = "SELECT * FROM chemical_store_item  WHERE item_id=$id";
//     $mini_result = $conn->query( $mini_query );
//     while ( $mini_option = $mini_result->fetch_assoc() ) {
//         $mini_balance= $mini_option['prod_qty'];

//     if($ITEM_ID==4){
//         $resin_kg= $STOCK_IN/220;
//         $actual_balance=$mini_balance-$resin_kg;
//         $total_balance = "UPDATE chemical_store_item SET prod_qty='$actual_balance' WHERE id=2";
//         $query_run10 = mysqli_query( $conn, $total_balance );
//     }
//     else if($ITEM_ID==1)
//     {
//         $jelcoat_kg= $STOCK_IN/200;
//         $actual_balance=$mini_balance-$jelcoat_kg;

//         $total_balance = "UPDATE chemical_store_item SET prod_qty='$actual_balance' WHERE id=1";
//         $query_run10 = mysqli_query( $conn, $total_balance );
//     }
//     else if($ITEM_ID==7)
//     {
//         $hardner_kg= $STOCK_IN/30;
//         $actual_balance=$mini_balance-$hardner_kg;
//         $total_balance = "UPDATE chemical_store_item SET prod_qty='$actual_balance' WHERE id=5";
//         $query_run10 = mysqli_query( $conn, $total_balance );
//     }
// }
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
        header( 'Location: ProChem_Balance.php' );
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

