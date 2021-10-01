<?php
require_once("../config/server.php");

function Report_Data($pdo){
    $response =[];

    $stmt = $pdo->prepare("SELECT `gsmrt_cstmr_mst`.`CSTMR_NO`,`gsmrt_cstmr_mst`.`CSTMR_NME`,
        `gsmrt_cstmr_mst`.`TOWN`,`gsmrt_cstmr_mst`.`CST_CNTCT`,`gsmrt_whse_prcsdordr_mst`.`ORDR_NO`,
        `gsmrt_whse_prcsdordr_mst`.`CSTMR_NO`,`gsmrt_whse_prcsdordr_mst`.`PRCS_DTE`,`gsmrt_whse_prcsdordr_txn`.`ORDR_NO`,
        `gsmrt_whse_prcsdordr_txn`.`PRDCT_CDE`,`gsmrt_whse_prcsdordr_txn`.`PRDCT_DSCRPTN`,
        `gsmrt_whse_prcsdordr_txn`.`PRDCT_SP`,`gsmrt_whse_prcsdordr_txn`.`ORDR_QTY`,`gsmrt_whse_prcsdordr_txn`.`TTL_AMT`,
        `gsmrt_whse_prcsdordr_txn`.`PRDCT_PCK`,`gsmrt_prdct_mst`.`PRDCT_CDE`,`gsmrt_prdct_mst`.`PRDCT_DSCRPTN`,
        `gsmrt_prdct_mst`.`SPLR_CDE`,`gsmrt_prdct_mst`.`SUPLR_NME` FROM `gsmrt_cstmr_mst` INNER JOIN `gsmrt_whse_prcsdordr_mst`
        ON `gsmrt_cstmr_mst`.`CSTMR_NO`=`gsmrt_whse_prcsdordr_mst`.`CSTMR_NO` INNER JOIN `gsmrt_whse_prcsdordr_txn` ON 
        `gsmrt_whse_prcsdordr_txn`.`ORDR_NO`=`gsmrt_whse_prcsdordr_mst`.`ORDR_NO` INNER JOIN `gsmrt_prdct_mst` ON 
        `gsmrt_prdct_mst`.`PRDCT_CDE`=`gsmrt_whse_prcsdordr_txn`.`PRDCT_CDE`");
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if($data){
        $response['status'] ="success";
        $response['message'] ="Data Pulled Successfully";
    }else{
        $response['status'] ="Error";
        $response['message'] ="Unable to Log In";
    }
    
    header("Content-type:application/json;charset=UTF-8");
    echo json_encode($ $data);

}



?>