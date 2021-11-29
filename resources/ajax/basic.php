<?php 

	include 'db.php';

	if(isset($_POST['action']) && $_POST['action'] == 'signInAsOwner'){

		$selectOwner = mysqli_query($con, "select * from hotelowners where owner_email = '".$_POST['ownerEmail']."' AND owner_password = '".$_POST['ownerPass']."' ");

		$count = mysqli_num_rows($selectOwner);

		$owner = mysqli_fetch_array($selectOwner);

		if($count == 1){

			$_SESSION['login_owner'] = $owner;

			echo json_encode(array("status"=>true, "data"=>"Successfully Loged In !"));

		}else{

			echo json_encode(array("status"=>false, "data"=>"Check Your Credentials !"));

		}
	}else if(isset($_FILES) && $_POST['action']=='hotel_image'){
			$ext = pathinfo($_FILES["main_image"]['name'], PATHINFO_EXTENSION);
            $file_name = md5(date('YmdHms').$_FILES["main_image"]['name']).'.'.$ext;

            $path = '../images/img/hotelImages/'.$file_name;
            
            $fileName = strtolower($_FILES['main_image']['name']);
            $allowedExts = array('jpg','JPG','jpeg','JPEG','png','PNG','mp4','mpeg','avi');
            $extension = explode(".", $fileName);   
            $extension = end($extension);
            if(in_array($extension, $allowedExts))
            {
                if (move_uploaded_file($_FILES['main_image']['tmp_name'], $path))
                {   
                    $img = $file_name;

	                echo json_encode(array("status" => true , "data" => $img));                    
                   
                }
                else
                {
                    echo json_encode(array("status" => false , "msg" => "File not Uploaded :( please try again or check your internet connection!"));
                }
            }
            else
            {
                echo json_encode(array("status" => false , "msg" => "File must be an Image file."));
            }		

	}else if(isset($_POST['action']) && $_POST['action']=='addHotel'){

        $selectHotel = mysqli_query($con, "SELECT hotel_email FROM hotels WHERE hotel_email = '".$_POST['hotel_email']."' ");
        $count = mysqli_num_rows($selectHotel);
        if($count<1){

    
            $addHotel = mysqli_query($con, "INSERT INTO hotels(owner_id, hotel_name, hotel_contact, hotel_email, hotel_desc, hotel_city, hotel_state, hotel_address, hotel_image, nearby_places, hotel_star, hotel_website, hotel_status) VALUES('".$_SESSION['login_owner']['owner_id']."', '".$_POST['hotel_name']."', '".$_POST['hotel_contact']."', '".$_POST['hotel_email']."', '".$_POST['hotel_description']."', '".$_POST['hotel_city']."', '".$_POST['hotel_state']."', '".$_POST['hotel_address']."', '".$_POST['hotel_image']."', '".$_POST['hotel_nearby_place']."', '', '".$_POST['hotel_website']."', 'Not Confirmed')");

            if($addHotel==true){

                echo json_encode(array("status"=>true, "data"=>$_POST));

            }
        }else{
                echo json_encode(array("status"=>false, "data"=>'mail-error'));            
        }

    }else if(isset($_POST['action']) && $_POST['action']=='updateHotel'){

        $updateHotel = mysqli_query($con, "UPDATE hotels SET hotel_name = '".$_POST['hotel_name']."', hotel_address = '".$_POST['hotel_address']."', hotel_contact = '".$_POST['hotel_contact']."', hotel_email = '".$_POST['hotel_email']."', hotel_desc = '".$_POST['hotel_description']."', hotel_state = '".$_POST['hotel_state']."', hotel_city = '".$_POST['hotel_city']."', nearby_places = '".$_POST['nearby_places']."', hotel_website = '".$_POST['hotel_website']."', hotel_image = '".$_POST['hotel_image']."' WHERE hotel_id = '".$_POST['hotel_id']."' ");
        if($updateHotel==true){

            echo json_encode(array("status"=>true, "data"=>$_POST));

        }else{ 

            echo json_encode(array("status"=>false));

        }

    }else if(isset($_POST['action']) && $_POST['action']=='addFacility'){

        $addFacility = mysqli_query($con, "insert into hotelfacilities(hotel_id, facility_name, facility_charges, facility_charges_child) values('".$_POST['hotel_id']."','".$_POST['facilityName']."', '".$_POST['facilityCharges']."', '".$_POST['facilityChargesChild']."')");
        if($addFacility){
           echo json_encode(array("status"=>true, "data"=>$_POST)); 
        }

    }elseif (isset($_POST['action']) && $_POST['action']=='deleteFacility') {
        
        $deleteFacility = mysqli_query($con, "delete from hotelfacilities where hotel_id = '".$_POST['hotel_id']."' AND facility_id = '".$_POST['facility_id']."' ");

        if($deleteFacility==true){

            echo json_encode(array("status"=>true, "data"=>$_POST)); 

        }

    }else if(isset($_POST['action']) && $_POST['action']=='updateThisFacility'){

        $updateThisFacility = mysqli_query($con, "update hotelfacilities set facility_name = '".$_POST['facility_name']."', facility_charges = '".$_POST['facility_charges']."', facility_charges_child = '".$_POST['facility_charges_child']."' where facility_id = '".$_POST['facility_id']."' ");

        if($updateThisFacility==true){

            echo json_encode(array("status"=>true, "data"=>$_POST)); 

        }

    }else if(isset($_POST['action']) && $_POST['action']=='deleteHotelImage'){

        $deleteHotelImage = mysqli_query($con, "delete from hotelimages where hotel_id = '".$_POST['hotel_id']."' AND hotel_img_id = '".$_POST['hotelImageId']."' ");

        if($deleteHotelImage==true){

            echo json_encode(array("status"=>true, "data"=>$_POST)); 

        }

    }else if(isset($_POST['action']) && $_POST['action']=='receptionistLogin'){

        $selectRecep = mysqli_query($con, "select * from receptionists where recep_user = '".$_POST['username']."' AND recep_pass = '".$_POST['password']."' ");

        $count = mysqli_num_rows($selectRecep);

        $recep = mysqli_fetch_array($selectRecep);

        if($count == 1){

            $_SESSION['login_receptionist'] = $recep;

            echo json_encode(array("status"=>true, "data"=>"Successfully Loged In !"));

        }else{

            echo json_encode(array("status"=>false, "data"=>"Check Your Credentials !"));

        }

    }else if(isset($_POST['action']) && $_POST['action']=='deleteHotel'){

        $deleteHotel = mysqli_query($con, "delete from hotels where hotel_id = '".$_POST['hotel_id']."' ");

        if($deleteHotel == true){

            echo json_encode(array("status"=>true, "data"=>"Successfully Loged In !"));

        }

    }else if(isset($_POST['action']) && $_POST['action']=='addRecep'){

        $selectRecep = mysqli_query($con, "select * from receptionists where recep_user = '".$_POST['RecepUserName']."' ");
        
        $count = mysqli_num_rows($selectRecep);
        
        $recep = mysqli_fetch_array($selectRecep);
        
        if($recep['recep_user']==$_POST['RecepUserName']){

            $respMsg = 'Username Already Exist, Please Try Another Username !'; 
            echo json_encode(array("status"=>'recep-username', "data"=>$respMsg));

        }else if($count==0){

            $createRecep = mysqli_query($con, "insert into receptionists(hotel_id, recep_user, recep_pass, recep_name) values('".$_POST['HotelId']."', '".$_POST['RecepUserName']."', '".$_POST['RecepPass']."', '".$_POST['RecepName']."')");

            echo json_encode(array('status'=>true, 'data'=>$_POST));

        }

    }else if(isset($_POST['action']) && $_POST['action']=='updateThisRecep'){

        $updateThisRecep = mysqli_query($con, "update receptionists set recep_name = '".$_POST['recep_name']."', recep_user = '".$_POST['recep_user']."', recep_pass = '".$_POST['recep_pass']."' where recep_id = '".$_POST['recep_id']."' ");

        if($updateThisRecep == true){

            echo json_encode(array('status'=>true, 'data'=>$_POST));

        }

    }else if(isset($_POST['action']) && $_POST['action']=='deleteRecep'){

        $deleteRecep = mysqli_query($con, "delete from receptionists where recep_id = '".$_POST['recep_id']."' and hotel_id = '".$_POST['hotel_id']."' ");

        if($deleteRecep==true){

            echo json_encode(array('status'=>true, 'data'=>$_POST));

        }

    }else if(isset($_POST['action']) && $_POST['action']=='addExpense'){

        date_default_timezone_set('Asia/Karachi');
        $date = date('Y-m-d');

        $addExpense = mysqli_query($con, "insert into hotelexpenses(hotel_id, user_id, exp_amount, exp_description, exp_added) values('".$_POST['hotel_id']."', '".$_POST['user_id']."','".$_POST['exp_amount']."', '".$_POST['exp_description']."', '$date')");

        if($addExpense==true){
            echo json_encode(array('status'=>true, 'data'=>$_POST));
        }

    }else if(isset($_POST['action']) && $_POST['action']=='updateThisExpense'){

        $updateThisExpense = mysqli_query($con, "update hotelexpenses set exp_amount = '".$_POST['exp_amount']."', exp_description = '".$_POST['exp_description']."' where exp_id = '".$_POST['exp_id']."' and hotel_id = '".$_POST['hotel_id']."' ");

        if($updateThisExpense==true){

            echo json_encode(array("status"=>true, "data"=>$_POST)); 

        }

    }if(isset($_POST['action']) && $_POST['action'] == 'signInAsRecep'){

        $selectRecep = mysqli_query($con, "select * from receptionists where recep_user = '".$_POST['recepEmail']."' AND recep_pass = '".$_POST['recepPass']."' ");
        $count = mysqli_num_rows($selectRecep);

        $recep = mysqli_fetch_assoc($selectRecep);

        if($count == 1){

            $_SESSION['login_recep'] = $recep;
            // var_dump($_SESSION['login_recep']);
           echo json_encode(array("status"=>true, "data"=>$recep));

        }else{

            echo json_encode(array("status"=>false, "data"=>"Check Your Credentials !"));

        }
    }if(isset($_POST['action']) && $_POST['action'] == 'Get-Profit'){

        date_default_timezone_set('Asia/Karachi');
        
        $todayDate = date('Y-m-d');
        $h_id = $_POST['hotel_id'];

        $selectExpenses = mysqli_query($con, "SELECT sum(exp_amount) AS exp_amount, hotel_id FROM hotelexpenses WHERE hotel_id = '$h_id' AND exp_added = '$todayDate' ");
        $expense = mysqli_fetch_assoc($selectExpenses);
        $exp_amount = $expense['exp_amount'];

        $selectPayments = mysqli_query($con, "SELECT sum(payment_paid) AS pay_amount, hotel_id FROM payments WHERE hotel_id = '$h_id' AND pay_added LIKE '%$todayDate%' ");

        $payment = mysqli_fetch_assoc($selectPayments);
        $pay_amount = $payment['pay_amount'];

        $profit = $pay_amount - $exp_amount;

        echo json_encode(array('status'=>true, 'expense'=>$exp_amount , 'payment'=>$pay_amount, 'profit'=>$profit));
        
    }if(isset($_POST['data']['action']) && $_POST['data']['action']=='confirmEmail'){

        $code = rand(100000, 9999999);
        $role = $_POST['data']['role'];
        if($role == 'owner'){
            $ccUP = mysqli_query($con, "UPDATE hotelowners SET owner_cc = '$code' WHERE owner_email = '".$_POST['data']['email']."' ");
        }else if($role == 'recep'){
            $ccUP = mysqli_query($con, "UPDATE receptionists SET recep_cc = '$code' WHERE recep_user = '".$_POST['data']['email']."' ");
            
            
        }
        $to = $_POST['data']['email'];
        $subject = 'Confirmation Code';
        $message = 'Your Confirmation code is : '.$code;
        if(mail($to, $subject, $message, 'support@easystay.com.pk')){
            $tmailResp = 'Mail Sent';
            echo json_encode(array("status"=>true, "data"=>$tmailResp));
        }else{
            $tmailResp = 'Error';
            echo json_encode(array("status"=>false));
        } 

    }else if(isset($_POST['data']['action']) && $_POST['data']['action']=='confirmCode'){
        
        
        $confirmation_code = $_POST['data']['confirmation_code'];
        $role = $_POST['data']['role'];
        if($role == 'owner'){
            $ccUP = mysqli_query($con, "SELECT * FROM hotelowners WHERE owner_email = '".$_POST['data']['email']."' AND owner_cc = '$confirmation_code' ");
            $count = mysqli_num_rows($ccUP);
            if($count==1){
                echo json_encode(array("status"=>true));
            }else{
                echo json_encode(array("status"=>false));
            }
        }else if($role == 'recep'){
            $ccUP = mysqli_query($con, "SELECT * FROM receptionists WHERE recep_user = '".$_POST['data']['email']."' AND recep_cc = '$confirmation_code' ");
            $count = mysqli_num_rows($ccUP);
            if($count==1){
                echo json_encode(array("status"=>true));
            }else{
                echo json_encode(array("status"=>false));
            }   
        }

    }else if(isset($_POST['data']['action']) && $_POST['data']['action']=='updatePass'){

        $email = $_POST['data']['email'];
        $pass = $_POST['data']['pass'];
        $role = $_POST['data']['role'];
        if($role == 'owner'){
            $ccUP = mysqli_query($con, "UPDATE hotelowners SET owner_password = '".$_POST['data']['pass']."' WHERE owner_email = '".$_POST['data']['email']."' ");
            
            if($ccUP==true){
                $checkUser = mysqli_query($con, "select * from hotelowners where owner_email = '".$_POST['data']['email']."' AND owner_password = '".$_POST['data']['pass']."' ");
            
                $count = mysqli_num_rows($checkUser);
                
                $user = mysqli_fetch_array($checkUser);
                
                if($count==1){

                    $_SESSION['login_owner'] = $user;
                    // $active = mysqli_query($con, "update students set active_status = '1' where stu_id = '".$_SESSION['student-login']['stu_id']."' ");

                }
                echo json_encode(array("status"=>true));
            }else{
                echo json_encode(array("status"=>false));
            }
        }else if($role == 'recep'){
            $ccUP = mysqli_query($con, "UPDATE receptionists SET recep_pass = '".$_POST['data']['pass']."' WHERE recep_user = '".$_POST['data']['email']."' ");
            
            if($ccUP==true){
                $checkUser = mysqli_query($con, "select * from receptionists where recep_user = '".$_POST['data']['email']."' AND recep_pass = '".$_POST['data']['pass']."' ");
            
                $count = mysqli_num_rows($checkUser);
                
                $user = mysqli_fetch_array($checkUser);
                
                if($count==1){

                    $_SESSION['login_recep'] = $user;

                }
                echo json_encode(array("status"=>true));
            }else{
                echo json_encode(array("status"=>false));
            }   
        }

    }


?>
