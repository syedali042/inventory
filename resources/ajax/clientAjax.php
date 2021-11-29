<?php 

include 'db.php'; 

	
	if(isset($_POST['action']) && $_POST['action']=='GetUser'){

		$selectThisUser = mysqli_query($con, "select * from users where user_id = '".$_POST['user_id']."' ");

		$user = mysqli_fetch_assoc($selectThisUser);

		$selectThisUserRes = mysqli_query($con, "select * from reservations where user_id = '".$_POST['user_id']."' order by res_id desc ");

		$res = array();
		$resr = '';
		while($reservations = mysqli_fetch_assoc($selectThisUserRes)){

			$resr .= '<tr role="row" class="odd" style="text-align:center;">';
			$resr .= '<input type="hidden" class="gotResId" value="'.$reservations['res_id'].'">';
			$resr .= '<td>'.dateConvert($reservations['res_check_in_date'])." &nbsp;&nbsp;".$reservations['res_check_in_time'].'</td>';

			$resr .= '<td>'.dateConvert($reservations['res_check_out_date'])." &nbsp;&nbsp;".$reservations['res_check_out_time'].'</td>';

			$resr .= '<td>'.$reservations['facility_id'].'</td>';

			$resr .= '<td>'.$reservations['no_of_adults'].'</td>';

			$resr .= '<td>'.$reservations['no_of_children'].'</td>';

			$resr .= '<td><input type="hidden" class="res_id" value="'.$reservations['res_id'].'"><a href="javascript://" class="btn btn-success btn-sm paymentHistory" style="float: right;border-radius:3px;"><i class="fa fa-eye"></i> Payment History</a></td></tr>';

		}


		if($user==true){

			echo json_encode(array('status'=>true, 'data'=>$user, 'res'=>$resr));

		}

	}else if(isset($_POST['action']) && $_POST['action']=='updateThisUser'){


		$updateUser = mysqli_query($con, "update users set user_firstname = '".$_POST['user_firstname']."', user_lastname = '".$_POST['user_lastname']."', user_email = '".$_POST['user_email']."', user_contact = '".$_POST['user_contact']."', user_address = '".$_POST['user_address']."', user_country = '".$_POST['user_country']."', user_city = '".$_POST['user_city']."' where user_id = '".$_POST['user_id']."' ");
		if($updateUser==true){

			echo json_encode(array('status'=>true, 'data'=>$_POST));

		}

	}else if(isset($_POST['action']) && $_POST['action'] == 'client-image'){
	    $img = $_POST['image'];

	    $folderPath = "../images/img/client-images/";
	  
	    $image_parts = explode(";base64,", $img);
	    $image_type_aux = explode("image/", $image_parts[0]);
	    $image_type = $image_type_aux[1];
	  
	    $image_base64 = base64_decode($image_parts[1]);
	    $fileName = md5(date('Ymdhis')).uniqid() . '.png';
	  
	    $file = $folderPath . $fileName;
	    file_put_contents($file, $image_base64);
	 
	    echo json_encode(array("status"=>true, "img"=>$fileName));
	}else if(isset($_POST['action']) && $_POST['action'] == 'file-image'){
	    $img = $_POST['image'];

	    $folderPath = "../images/img/client-proofs/";
	  
	    $image_parts = explode(";base64,", $img);
	    $image_type_aux = explode("image/", $image_parts[0]);
	    $image_type = $image_type_aux[1];
	  
	    $image_base64 = base64_decode($image_parts[1]);
	    $fileName = md5(date('Ymdhis')).uniqid() . '.png';
	  
	    $file = $folderPath . $fileName;
	    file_put_contents($file, $image_base64);
	 
	    echo json_encode(array("status"=>true, "img"=>$fileName));
	}else if(isset($_POST['action']) && $_POST['action'] == 'getPayment'){
	    


		$selectThisPay = mysqli_query($con, "select * from payments where res_id = '".$_POST['res_id']."' order by pay_id desc");

		$pay = array();
		$pays = '';

		while($pay = mysqli_fetch_assoc($selectThisPay)){

			$pays .= '<tr role="row" class="odd" style="text-align:center;"><td>'.$pay['pay_total'].'</td>';
			$pays .= '<input type="hidden" class="gotResId" value="'.$pay['res_id'].'">';

			$pays .= '<td>'.$pay['pay_disc'].'</td>';

			$pays .= '<td>'.$pay['pay_balance'].'</td>';

			$pays .= '<td>'.$pay['pay_amount'].'</td>';
			// $pays .= '<td><input type="hidden" class="pay_id" value="'.$pay['pay_id'].'"><a href="javascript://" class="btn btn-success btn-sm history" style="float: right;border-radius:3px;"><i class="fa fa-eye"></i> History</a></td></tr>';

		}

		echo json_encode(array("status"=>true, "data"=>$pays));
		

	}else if(isset($_POST['action']) && $_POST['action'] == 'updateUser'){
		
		
		$selectThisUser = mysqli_query($con, "select * from users where user_id = '".$_POST['user_id']."' ");

		$user = mysqli_fetch_assoc($selectThisUser);
		if($user==true){

			echo json_encode(array('status'=>true, 'data'=>$user));

		}

	}else if(isset($_POST['action']) && $_POST['action'] == 'deleteUser'){

		$deleteUser = mysqli_query($con, "delete from users where user_id = '".$_POST['user_id']."' ");

		if($deleteUser==true){
			echo json_encode(array('status'=>true));
		}
	}else if(isset($_POST['action']) && $_POST['action']=='addClient'){

		$getUsers = mysqli_query($con, "select * from users where user_email = '".$_POST['resUser']['user_email']."' AND hotel_id = '".$_POST['hotel_id']."' ");

		$countUser = mysqli_num_rows($getUsers);

		if($countUser<1){

			$thisUser = mysqli_fetch_assoc($getUsers);

			$createUser = mysqli_query($con, "insert into users(hotel_id, user_firstname, user_lastname, user_email, user_pass, user_contact, user_country, user_city, user_card, user_card_exp, user_card_cvv, user_gender, user_img, user_address, user_cnic, user_cnic_no) values('".$_POST['hotel_id']."', '".$_POST['resUser']['user_firstname']."', '".$_POST['resUser']['user_lastname']."', '".$_POST['resUser']['user_email']."', '', '".$_POST['resUser']['user_phone']."', '".$_POST['resUser']['user_country']."', '".$_POST['resUser']['user_city']."', '', '', '', '".$_POST['resUser']['user_gender']."', '".$_POST['resUser']['user_image']."', '".$_POST['resUser']['user_address']."', '".$_POST['resUser']['user_doc']."', '".$_POST['resUser']['user_cnic_no']."')");

			echo json_encode(array("status"=>true, "data"=>$_POST['resUser']));
		}else{
			echo json_encode(array("status"=>false, "data"=>"Email Already Exist"));
		}
	}else if (isset($_FILES) && $_POST['uploadUserImage']){

        $ext = pathinfo($_FILES["main_image"]["name"], PATHINFO_EXTENSION);
        
        $file_name = md5(date('YmdHms').$_FILES["main_image"]['name']).'.'.$ext;

        $path = '../images/img/client-images/'.$file_name;
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
        	echo json_encode(array("status" => false , "msg" => "File must be an video file."));
        }
   	}else if (isset($_FILES) && $_POST['uploadUserFile']){

        $ext = pathinfo($_FILES["main_image"]["name"], PATHINFO_EXTENSION);
        
        $file_name = md5(date('YmdHms').$_FILES["main_image"]['name']).'.'.$ext;

        $path = '../images/img/client-proofs/'.$file_name;
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
        	echo json_encode(array("status" => false , "msg" => "File must be an video file."));
        }
   	}

?>