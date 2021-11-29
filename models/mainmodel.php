<?php
class MD_MAINMODEL extends LB_ezSQL_mysql
{
	private $db;
	public $lastid = NULL;
	public $pages ='';
	public $admin = FALSE;

	public function __construct($admin = FALSE)
	{
		$this->admin = $admin == "admin" ? TRUE : FALSE;

		$this->db = new LB_ezSQL_mysql(_DB_USER,_DB_PASS,_DB_NAME,_DB_HOST);
		parent::__construct(_DB_USER,_DB_PASS,_DB_NAME,_DB_HOST);
		$this->mid = isset($_SESSION['mid']) ? $_SESSION['mid'] : 0;
	}

	public function index(){
		err("Looks Like, you're here by mistake");
		die();
	}

	public function login($username, $password, $check = FALSE)
	{
		$username = $this->db->escape(strtolower($username));
		if(!$check){$password = md5($this->db->escape($password));}
		return $this->db->get_row("SELECT * FROM `user` WHERE `username` = \"$username\" AND `password` = \"$password\";");
	}
	public function get_reg_whole()
	{
		return $this->db->get_row("SELECT * FROM `reg_detail` LIMIT 1");
	}
	
	public function get_package_details($pckg = "1")
	{
		switch($pckg){
			case (string)"1":
				$data = $this->db->get_row("SELECT `one_title` as `title`,`one_price` as `amount` FROM `reg_detail` LIMIT 1");
				$data['total'] = $data['amount'];
			break;

			case (string)"2":
				$data = $this->db->get_row("SELECT `two_title` as `title`,`two_price` as `amount` FROM `reg_detail` LIMIT 1");
				$data['total'] = $data['amount'];
			break;

			case (string)"3":
				$data = $this->db->get_row("SELECT `three_title` as `title`,`three_price` as `amount` FROM `reg_detail` LIMIT 1");
				$data['total'] = $data['amount'];
			break;

			case (string)"4":
				$data = $this->db->get_row("SELECT `four_title` as `title`,`four_price` as `amount` FROM `reg_detail` LIMIT 1");
				$data['total'] = $data['amount'];
			break;
		}
		return $data;

	}

	public function check_username($user = '')
	{
		if(isset($user) && is_string($user) && strlen($user) > 2)
		{
			$user = $this->escape($user);
			return (bool)$this->get_row("SELECT * FROM `user` WHERE `username` = '$user' LIMIT 1");
		}
		else
		{
			return FALSE;
		}
	}

	public function check_email($email = '')
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			if(is_string($email))
			{
				$email = $this->escape($email);
				return (bool)$this->get_row("SELECT * FROM `user` WHERE `email` = '$email' LIMIT 1");
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}
	public function check_contact_email($email = '')
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			if(is_string($email))
			{
				$email = $this->escape($email);
				return (bool)$this->get_row("SELECT * FROM `cms_contact` WHERE `email` = '$email' LIMIT 1");
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}

	public function _update($table, $vals, $cond, $exec = TRUE)
	{

		if(is_array($vals) && is_array($cond))
		{
			try{
			$vv = '';
			$i = 0;
			$table = "`".trim(strtolower($table))."`";
			foreach($vals as $k=>$v):
				$v = $this->escape($v);
				if($i != 0) $vv .= " ,";
				$vv .= "`$k` = '$v' ";
				$i++;
			endforeach;
			$cc = '';
			$i = 0;
			foreach($cond as $k=>$v):
				$v = $this->escape($v);
				if($i != 0){$cc .= " AND ";}
				else{$cc .= "WHERE ";}
				$cc .= "`$k` = '$v'";
				$i++;
			endforeach;

			$sql = "UPDATE $table SET $vv $cc";
			if($exec)
				return $this->db->query($sql);
			else
				return $sql;
			}
			catch(Exception $e)
			{
				return FALSE;
			}

		}
		return FALSE;
	}

	public function _delete($table, $cond, $exec = TRUE)
	{
		if(is_array($cond))
		{
			try{

				$table = "`".trim(strtolower($table))."`";
				$cc = '';
				$i = 0;
				foreach($cond as $k=>$v):
					if($i != 0){$cc .= " AND ";}
					else{$cc .= "WHERE ";}
					$cc .= "`$k` = '$v'";
					$i++;
				endforeach;

				$sql = "DELETE FROM $table $cc";
				if($exec)
					return $this->db->query($sql);
				else
					return $sql;
			}
			catch(Exception $e)
			{
				return FALSE;
			}

		}
		return FALSE;
	}


	public function _insert($table, $vals, $exec = TRUE)
	{
		if(is_array($vals))
		{
			$vv = '';
			$i = 0;
			$table = "`".trim(strtolower($table))."`";
			foreach($vals as $k=>$v):
				$v = $this->escape($v);
				if($i != 0) $vv .= " ,";
				$vv .= "`$k` = '$v' ";
				$i++;
			endforeach;
			$sql = "INSERT INTO $table SET $vv";
			if($exec)
			{
				$data = $this->db->query($sql);
				if($data)
				{
					$this->lastid = $this->db->insert_id;

				}
				return $data;
			}
			else
				return $sql;

		}
		else
		return FALSE;
	}



	public function extract_img($html)
	{
		error_off();
		preg_match_all('/<img[^>]+>/i',$html, $result);
		$img = array();
		foreach($result[0] as $img_tag)
		{
			preg_match_all('/(src)=("[^"]*")/i',$img_tag, $img4);
			$img[] = $img4;
		}

		return isset($img[0]['2'][0]) && $img[0]['2'][0] != "" ? preg_replace('["]',"",$img[0]['2'][0]) : IMG.'ad.jpg';
	}



	/*
	 * *****************************************************************************************
	 * Main Functions start here
	 */

/*****************************************************************
 * Hotel-MVC Modal Starts From Here
 ******************************************************************/
	
	public function getPOSRequests($hotel_id){

		return $this->get_results("SELECT * FROM pos_product_requests WHERE hotel_id = '$hotel_id'ORDER BY request_id DESC ");

	}

	public function getOwnerProfile(){

		return $this->get_results("SELECT * FROM hotelowners WHERE owner_id  = '".$_SESSION['login_owner']['owner_id']."' ");

	}

	public function getAllHotels(){

		return $this->get_results("SELECT * FROM hotels WHERE owner_id = '".$_SESSION['login_owner']['owner_id']."' AND hotel_status = 'Confirmed' ");

	}

	public function getHotel($hotel_id){

		return $this->get_row("SELECT * FROM hotels WHERE hotel_id = '$hotel_id' AND hotel_status = 'Confirmed' ");

	}

	public function getCities(){

		return $this->get_results("SELECT city_name FROM cities WHERE city_country = 'Pakistan'");

	}

	public function getCountries(){

		return $this->get_results("SELECT * FROM countries GROUP BY country_code ORDER BY country_code ASC");

	}

	public function getUsers($hotel_id){

		return $this->get_results("SELECT * FROM users WHERE hotel_id = '$hotel_id' ORDER BY user_id DESC ");

	}


	public function getProducts($hotel_id){

		return $this->get_results("SELECT * FROM products WHERE hotel_id = '$hotel_id' ORDER BY product_id DESC");

	}

	public function getSuppliers($hotel_id){

		return $this->get_results("SELECT * FROM suppliers  WHERE hotel_id = '$hotel_id' ORDER BY supplier_id DESC");

	}

	public function getCategories($hotel_id){

		return $this->get_results("SELECT * FROM product_cat WHERE hotel_id = '$hotel_id' ORDER BY cat_id DESC");

	}

	public function getOrders($hotel_id){

		return $this->get_results("SELECT * FROM inventory_orders WHERE hotel_id = '$hotel_id' ORDER BY order_id DESC");

	}

	public function dashboardCountOrders($hotel_id){

		$orders = $this->get_row("SELECT SUM(order_total) as order_total, SUM(order_discount) as order_discount FROM inventory_orders WHERE hotel_id = '$hotel_id' ");
		return $orders['order_total']-$orders['order_discount'];

	}

	public function dashboardCountPosProducts($hotel_id){

		return $this->get_results("SELECT * FROM products WHERE hotel_id = '$hotel_id' AND stock_in_pos != '0' ORDER BY product_id DESC");

	}

	public function getSingleDateOrders($hotel_id, $date){

		return $this->get_results("SELECT * FROM inventory_orders WHERE hotel_id = '$hotel_id' AND order_added = '$date' ORDER BY order_id DESC ");

		// return "SELECT * FROM inventory_orders WHERE hotel_id = '$hotel_id' AND order_added = '$date' ORDER BY order_id DESC";

	}

	public function getBetweenDatesOrders($hotel_id, $date1, $date2){

		return $this->get_results("SELECT * FROM inventory_orders WHERE hotel_id = '$hotel_id' AND order_added BETWEEN '$date1' AND '$date2' ORDER BY order_id DESC ");

	}

	public function getCompletedOrders($hotel_id){

		return $this->get_results("SELECT * FROM inventory_orders WHERE hotel_id = '$hotel_id' AND order_status = 'complete' ORDER BY order_id DESC");

	}

	public function getSavedOrders($hotel_id){

		return $this->get_results("SELECT * FROM inventory_orders WHERE hotel_id = '$hotel_id' AND order_status = 'saved' ORDER BY order_id DESC");

	}

	public function getDeliveredOrders($hotel_id){

		return $this->get_results("SELECT * FROM inventory_orders WHERE hotel_id = '$hotel_id' AND order_status = 'delivered' ORDER BY order_id DESC");

	}

	public function getRequestedOrders($hotel_id){

		return $this->get_results("SELECT * FROM inventory_orders WHERE hotel_id = '$hotel_id' AND order_status = 'requested' ORDER BY order_id DESC");

	}

	public function returnRecepOrders($hotel_id){

		date_default_timezone_set('Asia/Karachi');
    	$todayDate = date('Y-m-d');
    	$day = date('d');
    	$fromDay = $day-7;
    	if($fromDay<10){
    		$fromDay = '0'.$fromDay;
    	}else{
    		$fromDay = $fromDay;
    	}
    	$fromDate = date('Y-m-'.$fromDay);

		$result = $this->get_results("SELECT * FROM inventory_orders WHERE hotel_id = '$hotel_id' AND order_status = 'complete' AND (order_added BETWEEN '$fromDate' AND '$todayDate') ORDER BY order_id DESC"); 
		$result2 = '';
		foreach ($result as $key => $row) {
			
			$order_products_id = explode(',', $row['order_products']);

			$productsRow = array(); 
			foreach ($order_products_id as $key => $row2) {
				
				$getProducts = $this->get_row("SELECT product_title FROM products WHERE hotel_id = '$hotel_id' AND product_id = '$row2' ");

				$productsRow[] = $getProducts['product_title'];
			}			

			$productsNameString = implode(' <strong>|</strong> ', $productsRow);


			$result2 .= '<tr><td>#'.$row['order_id'].'</td><td>'.$row['order_added'].'</td><td>'.$productsNameString.'</td><td>'.$row['order_quantity'].'</td><td>'.$row['order_total'].'</td><td>'.$row['order_discount'].'</td><td><a href="javascript://" data-id="'.$row['order_id'].'" class="returnOrder btn btn-danger btn-sm"> Return</a></td></tr>';

		}
		return $result2;
	}


	public function getActiveUsers($hotel_id){

		$activeReservations = $this->get_results("SELECT user_id FROM reservations WHERE hotel_id = '$hotel_id' AND res_status = 'confirmed' ORDER BY res_id DESC ");
		$activeUser = array();
		foreach ($activeReservations as $key => $row) {
			$res = $this->get_results("SELECT * FROM users WHERE hotel_id = '$hotel_id' AND user_id = '".$row['user_id']."'");
        	foreach($res as $key => $users){
        		$activeUser[] = $users;
        	}
		}		
		return $activeUser;
	}

	public function getWarehouseShortProducts($hotel_id){

		return $this->get_results("SELECT * FROM products WHERE hotel_id = '$hotel_id' AND product_quantity < 5 ORDER BY product_id DESC");

	}

	public function getPosShortProducts($hotel_id){

		return $this->get_results("SELECT * FROM products WHERE hotel_id = '$hotel_id' AND stock_in_pos < 5 ORDER BY product_id DESC");

	}


		public function getHotelExpenses($hotel_id){

		date_default_timezone_set('Asia/Karachi');
		$todayDate = date('Y-m-d');
		return $this->get_row("SELECT SUM(exp_amount) as exp_amount FROM hotelexpenses WHERE hotel_id = '$hotel_id' AND exp_added = '$todayDate' ");

	}

	public function getAllExpenses($hotel_id){
		
		return $this->get_results("SELECT * FROM hotelexpenses WHERE hotel_id = '$hotel_id' ORDER BY exp_id DESC");

	}

	public function getSingleDateExpenses($hotel_id, $date){

		return $this->get_results("SELECT * FROM hotelexpenses WHERE hotel_id = '$hotel_id' AND exp_added LIKE '%$date%' ORDER BY exp_id DESC ");		

	}

	public function getBetweenDatesExpenses($hotel_id, $date1, $date2){

		return $this->get_results("SELECT * FROM hotelexpenses WHERE hotel_id = '$hotel_id' AND exp_added BETWEEN '$date1' AND '$date2' ORDER BY exp_id DESC ");

	}


	//////////////////////////////////////////////////
	////////////////////////////////////////////////////
	//////////////////////////////////////////////////
	//////////////////////////////////////////////////////
						//ADMIN
	///////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////
	////////////////////////////////////////////////////////


	public function Payments(){
		return $this->get_results("SELECT * FROM payments ORDER BY pay_id DESC");
	}
	public function Users(){
		return $this->get_results("SELECT * FROM users ORDER BY user_id DESC");
	}
	public function Reservations(){
		return $this->get_results("SELECT * FROM reservations ORDER BY res_id DESC");
	}
	public function Rooms(){
		return $this->get_results("SELECT * FROM rooms ORDER BY room_id DESC");
	}
	public function Hotels(){
		return $this->get_results("SELECT * FROM hotels ORDER BY hotel_id DESC");
	}
	public function Members(){
		return $this->get_results("SELECT * FROM hotelowners ORDER BY owner_id DESC");
	}


}