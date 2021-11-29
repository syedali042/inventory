<?php 
include 'db.php';
date_default_timezone_set("Asia/Karachi");
$currentDate = date('Y-m-d');
if(isset($_POST['action']) && $_POST['action']=='addProduct'){
	
	$createProduct = mysqli_query($con, "INSERT INTO products(hotel_id, product_cat, product_supplier, product_title, product_buy_price, product_sale_price, product_front_img, product_back_img,product_status, stock_in_pos, product_quantity) VALUES('".$_POST['hotel_id']."', '".$_POST['product_cat']."', '".$_POST['product_supplier']."', '".$_POST['product_title']."', '".$_POST['product_buy_price']."', '".$_POST['product_sale_price']."', '".$_POST['product_front_img']."', '".$_POST['product_back_img']."', '".$_POST['product_status']."', '".$_POST['stock_in_pos']."', '".$_POST['product_quantity']."')");

	if($createProduct==true){

		echo json_encode(array("status"=>true, "data"=>$_POST));

	}


}else if(isset($_POST['action']) && $_POST['action']=='addSupplier'){
	
	$createSupplier = mysqli_query($con, "INSERT INTO suppliers(hotel_id, supplier_name, supplier_email, supplier_contact, supplier_address, supplier_img) VALUES('".$_POST['hotel_id']."', '".$_POST['supplier_name']."', '".$_POST['supplier_email']."', '".$_POST['supplier_contact']."', '".$_POST['supplier_address']."', '".$_POST['supplier_img']."')");

	if($createSupplier==true){

		echo json_encode(array("status"=>true, "data"=>$_POST));

	}


}else if(isset($_POST['action']) && $_POST['action']=='productsRequest'){
	
	$products = implode(',', $_POST['products']);
	$quantity = implode(',', $_POST['quantity']);

	$createRequest = mysqli_query($con, "INSERT INTO pos_product_requests(hotel_id, products, quantity, request_added) VALUES('".$_POST['hotel_id']."', '$products', '$quantity', '$currentDate')");

	if($createRequest==true){		
		echo json_encode(array("status"=>true, "data"=>$_POST));
	}


}else if(isset($_POST['action']) && $_POST['action']=='addCategory'){
	
	$createCategory = mysqli_query($con, 'INSERT INTO product_cat(hotel_id, cat_title, cat_description) VALUES("'.$_POST['hotel_id'].'", "'.$_POST['cat_title'].'", "'.$_POST['cat_description'].'")');

	if($createCategory==true){

		echo json_encode(array("status"=>true, "data"=>$_POST));

	}


}else if(isset($_POST['action']) && $_POST['action']=='getProduct'){
	
	$selectProduct = mysqli_query($con, "SELECT * FROM products WHERE hotel_id = '".$_POST['hotel_id']."' AND product_id = '".$_POST['product_id']."' ");


	if($selectProduct==true){
		$product = mysqli_fetch_array($selectProduct);
		echo json_encode(array("status"=>true, "data"=>$product));

	}


}else if(isset($_POST['action']) && $_POST['action']=='getSupplier'){
	
	$selectSupplier = mysqli_query($con, "SELECT * FROM suppliers WHERE hotel_id = '".$_POST['hotel_id']."' AND supplier_id = '".$_POST['supplier_id']."' ");


	if($selectSupplier==true){
		$supplier = mysqli_fetch_array($selectSupplier);
		echo json_encode(array("status"=>true, "data"=>$supplier));

	}


}else if(isset($_POST['action']) && $_POST['action']=='getCategory'){
	
	$selectCategory = mysqli_query($con, "SELECT * FROM product_cat WHERE hotel_id = '".$_POST['hotel_id']."' AND cat_id = '".$_POST['cat_id']."' ");


	if($selectCategory==true){
		$cat = mysqli_fetch_array($selectCategory);
		echo json_encode(array("status"=>true, "data"=>$cat));

	}


}else if(isset($_POST['action']) && $_POST['action']=='updateProduct'){
	
	$updateProduct = mysqli_query($con, "UPDATE products SET product_cat = '".$_POST['product_cat']."', product_supplier = '".$_POST['product_supplier']."', product_title = '".$_POST['product_title']."', product_buy_price = '".$_POST['product_buy_price']."', product_sale_price = '".$_POST['product_sale_price']."', product_front_img = '".$_POST['product_front_img']."', product_back_img = '".$_POST['product_back_img']."', product_status = '".$_POST['product_status']."', stock_in_pos = '".$_POST['stock_in_pos']."', product_quantity = '".$_POST['product_quantity']."' WHERE hotel_id = '".$_POST['hotel_id']."' AND product_id = '".$_POST['product_id']."' ");


	if($updateProduct==true){
	
		echo json_encode(array("status"=>true, "data"=>$_POST));

	}


}else if(isset($_POST['action']) && $_POST['action']=='updateSupplier'){
	
	$updateSupplier = mysqli_query($con, "UPDATE suppliers SET supplier_name = '".$_POST['supplier_name']."', supplier_email = '".$_POST['supplier_email']."', supplier_contact = '".$_POST['supplier_contact']."', supplier_address = '".$_POST['supplier_address']."', supplier_img = '".$_POST['supplier_img']."' WHERE hotel_id = '".$_POST['hotel_id']."' AND supplier_id = '".$_POST['supplier_id']."' ");


	if($updateSupplier==true){
	
		echo json_encode(array("status"=>true, "data"=>$_POST));

	}


}else if(isset($_POST['action']) && $_POST['action']=='updateCategory'){
	
	$updateSupplier = mysqli_query($con, 'UPDATE product_cat SET cat_title = "'.$_POST['cat_title'].'", cat_description = "'.$_POST['cat_description'].'" WHERE hotel_id = "'.$_POST['hotel_id'].'" AND cat_id = "'.$_POST['cat_id'].'" ');


	if($updateSupplier==true){
	
		echo json_encode(array("status"=>true, "data"=>$_POST));

	}


}else if(isset($_POST['action']) && $_POST['action']=='Checkout-Saved-Order'){
	
	$updateOrder = mysqli_query($con, 'UPDATE inventory_orders SET order_status = "complete" WHERE hotel_id = "'.$_POST['hotel_id'].'" AND order_id = "'.$_POST['order_id'].'" ');


	if($updateOrder==true){
	
		echo json_encode(array("status"=>true, "data"=>$_POST));

	}


}else if(isset($_POST['action']) && $_POST['action']=='Deliver-Saved-Order'){
	
	$updateOrder = mysqli_query($con, 'UPDATE inventory_orders SET order_status = "delivered" WHERE hotel_id = "'.$_POST['hotel_id'].'" AND order_id = "'.$_POST['order_id'].'" ');


	if($updateOrder==true){
	
		echo json_encode(array("status"=>true, "data"=>$_POST));

	}


}else if(isset($_POST['action']) && $_POST['action']=='transferProduct'){
	


	$selectProduct = mysqli_query($con, "SELECT * FROM products WHERE hotel_id = '".$_POST['hotel_id']."' AND product_id = '".$_POST['product_id']."' ");

	$product = mysqli_fetch_assoc($selectProduct);

	$afterTransferInventory = $product['product_quantity']-$_POST['quantity'];
	$afterTransferPos = $product['stock_in_pos']+$_POST['quantity'];

	if($product==true){
		
		$updateProduct = mysqli_query($con, "UPDATE products SET product_quantity = '$afterTransferInventory', stock_in_pos = '$afterTransferPos' WHERE hotel_id = '".$_POST['hotel_id']."' AND product_id = '".$_POST['product_id']."' ");

		if($updateProduct==true){

			echo json_encode(array("status"=>true, "data"=>$_POST));

		}


	}


}else if(isset($_POST['action']) && $_POST['action']=='checkout-order'){
	

	$products = implode(",", $_POST['products']);
	$quantity = implode(",", $_POST['quantity']);
	$sale_price = implode(",", $_POST['sale_price']);

	$i=0;
	foreach ($_POST['products'] as $key => $row) {
		
		$selectProduct = mysqli_query($con, "SELECT stock_in_pos FROM products WHERE hotel_id = '".$_POST['hotel_id']."' AND product_id = '$row' ");

		$product = mysqli_fetch_assoc($selectProduct);

		$remainingProduct = $product['stock_in_pos']-$_POST['quantity'][$i];

		$updateProducts = mysqli_query($con, "UPDATE products SET stock_in_pos = '$remainingProduct' WHERE hotel_id = '".$_POST['hotel_id']."' AND product_id = '$row' ");		

	$i++;
	}

	date_default_timezone_set("Asia/Karachi");
	$currentDate = date('Y-m-d');
	$checkOut = mysqli_query($con, "INSERT INTO inventory_orders(hotel_id, client_id, order_products, order_quantity, order_total, order_status, order_discount, order_added) VALUES('".$_POST['hotel_id']."', '', '$products', '$quantity', '".$_POST['total']."', '".$_POST['order_status']."', '".$_POST['givenDiscount']."', '$currentDate')");
	if($checkOut==true){
		
		$maxOrderId = mysqli_query($con, "SELECT MAX(order_id) as order_id FROM inventory_orders WHERE hotel_id = '".$_POST['hotel_id']."' ");
		$order_id = mysqli_fetch_assoc($maxOrderId);
		echo json_encode(array("status"=>true, "data"=>$order_id));

	}


}else if(isset($_POST['action']) && $_POST['action']=='save-order'){
	

	$products = implode(",", $_POST['products']);
	$quantity = implode(",", $_POST['quantity']);
	$sale_price = implode(",", $_POST['sale_price']);

	$i=0;
	foreach ($_POST['products'] as $key => $row) {
		


		$updateProducts = mysqli_query($con, "UPDATE products SET stock_in_pos = '".$_POST['quantity'][$i]."' WHERE hotel_id = '".$_POST['hotel_id']."' AND product_id = '$row' ");		
		
	$i++;
	}

	date_default_timezone_set("Asia/Karachi");
	$currentDate = date('Y-m-d');
	$checkOut = mysqli_query($con, "INSERT INTO inventory_orders(hotel_id, client_id, order_products, order_quantity, order_total, order_status, order_discount, order_added) VALUES('".$_POST['hotel_id']."', '', '$products', '$quantity', '".$_POST['total']."', '".$_POST['order_status']."', '".$_POST['givenDiscount']."', '$currentDate')");
	if($checkOut==true){
		
		$maxOrderId = mysqli_query($con, "SELECT MAX(order_id) as order_id FROM inventory_orders WHERE hotel_id = '".$_POST['hotel_id']."' ");
		$order_id = mysqli_fetch_assoc($maxOrderId);
		// echo json_encode(array("status"=>true, "data"=>$order_id));

	}


}else if(isset($_POST['action']) && $_POST['action']=='generateInvoice'){
	

	$selectOrder = mysqli_query($con, "SELECT * FROM inventory_orders WHERE hotel_id = '".$_POST['hotel_id']."' AND order_id = '".$_POST['order_id']."' ");
	$order = mysqli_fetch_assoc($selectOrder);
	$products = explode(",", $order['order_products']);	
	$quantity = explode(",", $order['order_quantity']);
	$productInfo = array();
	foreach ($products as $key => $row) {
		$selectProductInfo = mysqli_query($con, "SELECT product_title, product_sale_price FROM products WHERE product_id = '$row' AND hotel_id = '".$_POST['hotel_id']."' ");
		$result = mysqli_fetch_assoc($selectProductInfo);

		$productInfo[] = $result;
	}
	$i = 0;
	$html = '';
	foreach ($quantity as $key => $row) {

		// $html .= '<tr>'.$row*$productInfo[$i]['product_sale_price'].'</tr>';

		$html .= '<tr style="text-align: center;"><td valign="top" width="25%" style="font-size:14px; line-height:20px;">'.$productInfo[$i]['product_title'].'</td><td valign="top" width="25%" style="font-size:14px; line-height:20px;">'.$row.'</td><td valign="top" width="25%" style="font-size:14px; line-height:20px;">'.$productInfo[$i]['product_sale_price'].'</td><td valign="top" width="25%" style="font-size:14px; line-height:20px;">'.$row*$productInfo[$i]['product_sale_price'].'</td></tr>';

	$i++;
	}	
	$totalPaid = $order['order_total']-$order['order_discount'];
	echo json_encode(array('status'=>true, "data"=>$html, "discount"=>$order['order_discount'], "total"=>$order['order_total'], "totalPaid"=>$totalPaid, "order_status"=>$order['order_status']));

}else if(isset($_POST['action']) && $_POST['action']=='viewPosRequestDetails'){
	

	$selectRequest = mysqli_query($con, "SELECT * FROM pos_product_requests WHERE hotel_id = '".$_POST['hotel_id']."' AND request_id = '".$_POST['posRequestId']."' ");

	$request = mysqli_fetch_assoc($selectRequest);
	$products = explode(",", $request['products']);	
	$quantity = explode(",", $request['quantity']);
	$productInfo = array();
	foreach ($products as $key => $row) {
		$selectProductInfo = mysqli_query($con, "SELECT product_id, product_title, product_sale_price, product_quantity FROM products WHERE product_id = '$row' AND hotel_id = '".$_POST['hotel_id']."' ");
		$result = mysqli_fetch_assoc($selectProductInfo);

		$productInfo[] = $result;
	}
	$i = 0;
	$html = '';
	foreach ($quantity as $key => $row) {

		// $html .= '<tr>'.$row*$productInfo[$i]['product_sale_price'].'</tr>';

		$html .= '<tr style="text-align: center;"><td valign="top" width="25%" style="font-size:14px; line-height:20px;">'.$productInfo[$i]['product_id'].'</td><td valign="top" width="25%" style="font-size:14px; line-height:20px;">'.$productInfo[$i]['product_title'].'</td><td valign="top" width="25%" style="font-size:14px; line-height:20px;" class="availableWarehouseStock">'.$productInfo[$i]['product_quantity'].'</td><td valign="top" width="25%" style="font-size:14px; line-height:20px;"><input type="number" class="form-control posRequestedProductQuantity" value="'.$row.'"></td></tr>';

	$i++;
	}	
	echo json_encode(array('status'=>true, "data"=>$html));

}else if(isset($_POST['action']) && $_POST['action']=='getOrder'){
	
	$getOrder = mysqli_query($con, "SELECT * FROM inventory_orders WHERE hotel_id = '".$_POST['hotel_id']."' AND order_id = '".$_POST['order_id']."' ");
	$order = mysqli_fetch_assoc($getOrder);
	$products = explode(",", $order['order_products']);	
	$quantity = explode(",", $order['order_quantity']);
	$productInfo = array();
	foreach ($products as $key => $row) {
		$selectProductInfo = mysqli_query($con, "SELECT product_id, product_title, product_sale_price FROM products WHERE product_id = '$row' AND hotel_id = '".$_POST['hotel_id']."' ");
		$result = mysqli_fetch_assoc($selectProductInfo);

		$productInfo[] = $result;
	}
	$i = 0;
	$html = '';
	foreach ($quantity as $key => $row) {

		// $html .= '<tr>'.$row*$productInfo[$i]['product_sale_price'].'</tr>';

		$html .= '<tr style="text-align: center;"><input type="hidden" class="order_product_id" value="'.$productInfo[$i]['product_id'].'"><td valign="top" width="25%" style="font-size:14px; line-height:20px;">'.$productInfo[$i]['product_title'].'</td><td valign="top" width="25%" style="font-size:14px; line-height:20px;" class="ordered_quantity">'.$row.'</td><td valign="top" width="25%" style="font-size:14px; line-height:20px;" class="product_unit_price">'.$productInfo[$i]['product_sale_price'].'</td><td><input type="number" class="returned_quantity form-control" value="0"></td></tr>';

	$i++;
	}	
	$totalPaid = $order['order_total']-$order['order_discount'];
	echo json_encode(array('status'=>true, "data"=>$html, "discount"=>$order['order_discount'], "total"=>$order['order_total'], "totalPaid"=>$totalPaid, "order_status"=>$order['order_status']));


}else if(isset($_POST['action']) && $_POST['action']=='updateOrder'){
	
	$getOrder = mysqli_query($con, "SELECT * FROM inventory_orders WHERE hotel_id = '".$_POST['hotel_id']."' AND order_id = '".$_POST['order_id']."' ");
	$order = mysqli_fetch_assoc($getOrder);
	$products = explode(",", $order['order_products']);	
	$quantity = explode(",", $order['order_quantity']);

	$returnedQuantity = $_POST['returnedQuantity'];
	$i = 0;
	$updatedQuantity = array();
	foreach ($returnedQuantity as $key => $row) {

		$updatedQuantity[] = $quantity[$i]-$row;


	$i++;
	}

	$productInfo = array();
	foreach ($products as $key => $row) {
		$selectProductInfo = mysqli_query($con, "SELECT product_id, product_title, product_sale_price, stock_in_pos FROM products WHERE product_id = '$row' AND hotel_id = '".$_POST['hotel_id']."' ");
		$result = mysqli_fetch_assoc($selectProductInfo);

		$productInfo[] = $result;
	}


	$updatedStock = array();
	$i=0;
	foreach ($productInfo as $key => $row) {
			
		$updatedStock[] = $row['stock_in_pos'] + $returnedQuantity[$i];

		$i++;
	}

	$i=0;
	$updatedPrice = 0;
	foreach ($productInfo as $key => $row) {
			
		$updatedPrice += $row['product_sale_price']*$updatedQuantity[$i];

	$i++;
	}
	$returnPriceToClient = $order['order_total']-$updatedPrice;

	$i = 0;
	foreach ($products as $key => $row) {

		$updateProduct = mysqli_query($con, "UPDATE products SET stock_in_pos = '".$updatedStock[$i]."' WHERE product_id = '$row' AND hotel_id = '".$_POST['hotel_id']."' ");
		
	$i++;
	}

	$weightageForDiscount = $order['order_total']/$returnPriceToClient;
	$weightageForDiscountFinal = $order['order_discount']/$weightageForDiscount;
	$weightageForDiscountFinal2 = $order['order_discount']-$weightageForDiscountFinal; 
	$returnPriceToClientFinal2 = $returnPriceToClient-$weightageForDiscountFinal;

	$updatedQuantityString = implode(',', $updatedQuantity);

	$updateOrder = mysqli_query($con, "UPDATE inventory_orders SET order_total = '$updatedPrice', order_quantity = '$updatedQuantityString', order_discount = '".$weightageForDiscountFinal2."' WHERE order_id = '".$_POST['order_id']."' AND hotel_id = '".$_POST['hotel_id']."' ");



	echo json_encode(array("status" => true , "data" => $returnPriceToClientFinal2, "updatedPrice"=>$updatedPrice, "updatedQuantity" => $updatedQuantity, "products"=> $products, "updatedStock" =>$updatedStock));

}else if (isset($_FILES) && $_POST['supplier_image']){

    $ext = pathinfo($_FILES["main_image"]["name"], PATHINFO_EXTENSION);
    
    $file_name = md5(date('YmdHms').$_FILES["main_image"]['name']).'.'.$ext;

    $path = '../images/img/suppliers/'.$file_name;
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
}else if (isset($_FILES) && $_POST['product_front_img']){

    $ext = pathinfo($_FILES["main_image"]["name"], PATHINFO_EXTENSION);
    
    $file_name = md5(date('YmdHms').$_FILES["main_image"]['name']).'.'.$ext;

    $path = '../images/img/products/front/'.$file_name;
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
}else if (isset($_FILES) && $_POST['product_back_img']){

    $ext = pathinfo($_FILES["main_image"]["name"], PATHINFO_EXTENSION);
    
    $file_name = md5(date('YmdHms').$_FILES["main_image"]['name']).'.'.$ext;

    $path = '../images/img/products/back/'.$file_name;
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