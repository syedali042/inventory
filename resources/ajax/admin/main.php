<?php

include '../db.php';

if(isset($_POST['action']) && $_POST['action'] == 'signInAsAdmin'){

    $selectAdmin = mysqli_query($con, "select * from exec where exec_email = '".$_POST['adminEmail']."' AND exec_password = '".md5($_POST['adminPass'])."' ");

    $count = mysqli_num_rows($selectAdmin);

    $owner = mysqli_fetch_array($selectAdmin);

    if($count == 1){

        $_SESSION['login_admin'] = $owner;

        echo json_encode(array("status"=>true, "data"=>"Successfully Loged In !"));

    }else{

        echo json_encode(array("status"=>false, "data"=>"Check Your Credentials !"));

    }
}else if(isset($_POST['action']) && $_POST['action'] == 'addOwner'){

    $addOwner = mysqli_query($con, "INSERT INTO `hotelowners`(`owner_username`, `owner_password`, `owner_contact`, `owner_email`, `owner_image`, `owner_status`) VALUES ('".$_POST['ownerName']."','".$_POST['ownerPass']."','".$_POST['ownerContact']."','".$_POST['ownerEmail']."','','".$_POST['ownerStatus']."')");
     
    if($addOwner==true){

        echo json_encode(array("status"=>true, "data"=>"Successfully Created !"));

    }else{

        echo json_encode(array("status"=>false, "data"=>"Check Your Credentials !"));

    }

}
// else if(isset($_POST['action']) && $_POST['action'] == 'backup_profit'){

//     $selectHotels = mysqli_query($con, "SELECT hotel_id FROM hotels");
    
//     $hotel_ids = array();
//     while($hotels = mysqli_fetch_assoc($selectHotels)){
//         $hotel_ids[] = $hotels['hotel_id'];
//     }
//     $payments = array();
//     $expenses = array();
//     foreach($hotel_ids as $key => $h_ids){
        
//         date_default_timezone_set('Asia/Karachi');
//         $todayDate = date('Y-m-d');
        
//         $selectExpenses = mysqli_query($con, "SELECT sum(exp_amount) AS exp_amount, hotel_id FROM hotelexpenses WHERE hotel_id = '$h_ids' AND exp_added = '$todayDate' ");
//         while($expense = mysqli_fetch_assoc($selectExpenses)){
//             $expenses[] = $expense;
//         }

//         $selectPayments = mysqli_query($con, "SELECT sum(pay_amount) AS pay_amount, hotel_id FROM payments WHERE hotel_id = '$h_ids' AND pay_added LIKE '%$todayDate%' ");
//         while($payment = mysqli_fetch_assoc($selectPayments)){
//             $payments[] = $payment;
//         }
        
//     }
//     $newArray = array($payments, $expenses);
//     foreach($newArray as list($array1, $array2)){
//         var_dump($array);
//     }
    

//     echo json_encode(array("status"=>true, "payments"=>$payments, "expenses"=>$expenses));

// }

?>