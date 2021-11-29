<?php

class CL_HILDES
{
	public function __construct()
	{

		$this->model = new MD_MAINMODEL();
		$this->temp = new LB_TEMPLATE('header', 'footer');
		$this->login_temp = new LB_TEMPLATE();

	}

	public function welcome(){

		$this->temp->loadcontent('welcome');
		$data['allHotel'] = $this->model->getAllHotels();
		$this->temp->loadview($data);

	}


	public function allExpenses(){

		$this->temp->loadcontent('allExpenses');

		$data['allHotel'] = $this->model->getAllHotels();

		if(isset($_GET['hotel_id'])){

			$hotel_id = $_GET['hotel_id'];
			$data['posRequests'] = $this->model->getPOSRequests($hotel_id);
			$data['thisHotel'] = $this->model->getHotel($hotel_id);
			if($data['thisHotel']['owner_id']==$_SESSION['login_owner']['owner_id']){
				$data['hotelUsers'] = $this->model->getUsers($hotel_id);
				$data['getHotelExpenses'] = $this->model->getAllExpenses($hotel_id);
				$data['getCities'] = $this->model->getCities();
				if(isset($_GET['singleDate'])){

					$hotel_id = $_GET['hotel_id'];
					$date = $_GET['singleDate'];

					$data['getHotelExpenses'] = $this->model->getSingleDateExpenses($hotel_id, $date);
					
				}

				if(isset($_GET['date1'])){

					$hotel_id = $_GET['hotel_id'];
					$date1 = $_GET['date1'];
					$date2 = $_GET['date2'];

					$data['getHotelExpenses'] = $this->model->getBetweenDatesExpenses($hotel_id, $date1, $date2);
				}
			}else if($_SESSION['login_recep']['hotel_id']==$data['thisHotel']['hotel_id']){
				$data['hotelUsers'] = $this->model->getUsers($hotel_id);
				$data['getHotelExpenses'] = $this->model->getAllExpenses($hotel_id);
				$data['getCities'] = $this->model->getCities();

				if(isset($_GET['singleDate'])){

					$hotel_id = $_GET['hotel_id'];
					$date = $_GET['singleDate'];

					$data['getHotelExpenses'] = $this->model->getSingleDateExpenses($hotel_id, $date);
					
				}

				if(isset($_GET['date1'])){

					$hotel_id = $_GET['hotel_id'];
					$date1 = $_GET['date1'];
					$date2 = $_GET['date2'];

					$data['getHotelExpenses'] = $this->model->getBetweenDatesExpenses($hotel_id, $date1, $date2);
				}
			}
			else if($data['thisHotel']==''){
				
				redirect('login');
			}else{
				redirect('login');
			}
		}else{

			redirect('welcome');

		}

		$this->temp->loadview($data);

	}


	public function index()
	{
		$this->temp->loadcontent('index');
		$data['title'] = "Easy Stay";
		if(isset($_GET['hotel_id'])){
			date_default_timezone_set('Asia/Karachi');
    		$todayDate = date('Y-m-d');
			$hotel_id = $_GET['hotel_id'];
			$data['posRequests'] = $this->model->getPOSRequests($hotel_id);
			$data['thisHotel'] = $this->model->getHotel($hotel_id);
			if($data['thisHotel']['owner_id']==$_SESSION['login_owner']['owner_id']){

				$data['getAllExpenses'] = $this->model->getAllExpenses($hotel_id);
				$data['getOrders'] = $this->model->getOrders($hotel_id);
				$data['getWarehouseShortProducts'] = $this->model->getWarehouseShortProducts($hotel_id);
				$data['getPosShortProducts'] = $this->model->getPosShortProducts($hotel_id);
				$data['dashboardCountPosProducts'] = $this->model->dashboardCountPosProducts($hotel_id);
				$data['dashboardTodayOrders'] = $this->model->getSingleDateOrders($hotel_id, $todayDate);
				$data['dashboardTodayExpenses'] = $this->model->getSingleDateExpenses($hotel_id, $todayDate);
				$data['dashboardCountProducts'] = $this->model->getProducts($hotel_id);
				$data['dashboardCountOrders'] = $this->model->dashboardCountOrders($hotel_id);
				$data['dashboardCountSuppliers'] = $this->model->getSuppliers($hotel_id);
				$data['dashboardCountCategories'] = $this->model->getCategories($hotel_id);
			}else if($_SESSION['login_recep']['hotel_id']==$data['thisHotel']['hotel_id']){
				$datd['getWarehouseShortProducts'] = $this->model->getWarehouseShortProducts($hotel_id);
				$data['getPosShortProducts'] = $this->model->getPosShortProducts($hotel_id);
				$data['dashboardCountProducts'] = $this->model->getProducts($hotel_id);
				$data['dashboardCountOrders'] = $this->model->dashboardCountOrders($hotel_id);
				$data['dashboardCountSuppliers'] = $this->model->getSuppliers($hotel_id);
				$data['dashboardCountCategories'] = $this->model->getCategories($hotel_id);
				$data['dashboardCountPosProducts'] = $this->model->dashboardCountPosProducts($hotel_id);

			}
			else if($data['thisHotel']==''){
				
				redirect('login');
			}else{
				redirect('login');
			}
			
		}
		$this->temp->loadview($data);
	}

	public function login()
	{
		$this->login_temp->loadcontent('login');
		
		$data['title'] = "Easy Stay";

		$this->login_temp->loadview($data);
	}

	public function logout(){

		$this->login_temp->loadcontent('logout');
		
		$data['title'] = "Easy Stay";

		$this->login_temp->loadview($data);

	}

	public function ownerProfile()
	{
		$this->temp->loadcontent('ownerProfile');
		
		$data['title'] = "Easy Stay";

		$data['ownerProfile'] = $this->model->getOwnerProfile();

		$data['allHotel'] = $this->model->getAllHotels();

		$this->temp->loadview($data);
	}	

	public function exec()
	{
		$this->login_temp->loadcontent('adminLogin');
		
		$data['title'] = "Easy Stay";

		$this->login_temp->loadview($data);
	}


	public function adminDash()
	{
		$this->temp->loadcontent('adminDash');
		$data['title'] = "Easy Stay";
			if(isset($_SESSION['login_admin'])){
				$data['Payments'] = $this->model->Payments();
				$data['Users'] = $this->model->Users();
				$data['Reservations'] = $this->model->Reservations();
				$data['ActiveReservations'] = $this->model->Reservations();
				$data['Rooms'] = $this->model->Rooms();
				$data['Hotels'] = $this->model->Hotels();
				$data['Members'] = $this->model->Members();
				// $data['getHotelExpenses'] = $this->model->getHotelExpenses($hotel_id);
				// $data['selectRooms'] = $this->model->getHotelRoomsRes($hotel_id);
				// $data['selectFacilities'] = $this->model->getHotelFacilities($hotel_id);
				// $data['getTodayBookingRequests'] = $this->model->getTodayBookingRequests($hotel_id);
			}
			
		$this->temp->loadview($data);
	}

	public function addOwner(){
		$this->temp->loadcontent('addOwner');

		$this->temp->loadview($data);
	}
	public function owners(){
		$this->temp->loadcontent('owners');
		$data['Members'] = $this->model->Members();
		$this->temp->loadview($data);
	}	

	public function resetPass(){
		
		$this->login_temp->loadcontent('passReset');
		$this->login_temp->loadview($data);
	}

	public function inventory(){
		
		$hotel_id = $_GET['hotel_id'];
		$data['thisHotel'] = $this->model->getHotel($hotel_id);
		$data['posRequests'] = $this->model->getPOSRequests($hotel_id);
		if($data['thisHotel']['owner_id']==$_SESSION['login_owner']['owner_id']){
			
			if(isset($_POST['getWarehouseShortProducts'])){

				$data['products'] = $this->model->getWarehouseShortProducts($hotel_id);	

			}else if(isset($_POST['getPosShortProducts'])){

				$data['products'] = $this->model->getPosShortProducts($hotel_id);					

			}else{
				
				$data['products'] = $this->model->getProducts($hotel_id);

			}

			$data['suppliers'] = $this->model->getSuppliers($hotel_id);
			$data['categories'] = $this->model->getCategories($hotel_id);
			$this->temp->loadcontent('inventory/index');
		}else if($_SESSION['login_recep']['hotel_id']==$data['thisHotel']['hotel_id']){

			$data['suppliers'] = $this->model->getSuppliers($hotel_id);
			$data['categories'] = $this->model->getCategories($hotel_id);
			$data['products'] = $this->model->getProducts($hotel_id);
			$this->temp->loadcontent('inventory/index');
		}else if($data['thisHotel']==''){
			
			redirect('login');
		}else{
			redirect('login');
		}
		$this->temp->loadview($data);
	}

	public function suppliers(){
		
		$hotel_id = $_GET['hotel_id'];
		$data['thisHotel'] = $this->model->getHotel($hotel_id);
		$data['posRequests'] = $this->model->getPOSRequests($hotel_id);
		if($data['thisHotel']['owner_id']==$_SESSION['login_owner']['owner_id']){
						
			$data['suppliers'] = $this->model->getSuppliers($hotel_id);
			$this->temp->loadcontent('inventory/suppliers');
		}else if($_SESSION['login_recep']['hotel_id']==$data['thisHotel']['hotel_id']){

			$data['suppliers'] = $this->model->getSuppliers($hotel_id);
			$this->temp->loadcontent('inventory/suppliers');
		}else if($data['thisHotel']==''){
			
			redirect('login');
		}else{
			redirect('login');
		}
		$this->temp->loadview($data);
	}


	public function productCategories(){
		
		$hotel_id = $_GET['hotel_id'];
		$data['thisHotel'] = $this->model->getHotel($hotel_id);
		$data['posRequests'] = $this->model->getPOSRequests($hotel_id);
		if($data['thisHotel']['owner_id']==$_SESSION['login_owner']['owner_id']){
						
			$data['categories'] = $this->model->getCategories($hotel_id);
			$this->temp->loadcontent('inventory/categories');
		}else if($_SESSION['login_recep']['hotel_id']==$data['thisHotel']['hotel_id']){

			$data['categories'] = $this->model->getCategories($hotel_id);
			$this->temp->loadcontent('inventory/categories');
		}else if($data['thisHotel']==''){
			
			redirect('login');
		}else{
			redirect('login');
		}
		$this->temp->loadview($data);
	}


	public function pos(){
		
		$hotel_id = $_GET['hotel_id'];
		$data['thisHotel'] = $this->model->getHotel($hotel_id);
		$data['posRequests'] = $this->model->getPOSRequests($hotel_id);
		if($data['thisHotel']['owner_id']==$_SESSION['login_owner']['owner_id']){
			
			$data['returnOrders'] = $this->model->returnRecepOrders($hotel_id);
			$data['products'] = $this->model->getProducts($hotel_id);
			$data['suppliers'] = $this->model->getSuppliers($hotel_id);		
			$data['categories'] = $this->model->getCategories($hotel_id);
			$this->temp->loadcontent('inventory/pos');
		}else if($_SESSION['login_recep']['hotel_id']==$data['thisHotel']['hotel_id']){
			$data['products'] = $this->model->getProducts($hotel_id);
			$data['suppliers'] = $this->model->getSuppliers($hotel_id);
			$data['categories'] = $this->model->getCategories($hotel_id);
			$this->temp->loadcontent('inventory/pos');
		}else if($data['thisHotel']==''){
			
			redirect('login');
		}else{
			redirect('login');
		}
		$this->temp->loadview($data);
	}


	public function inventoryInvoice(){
		
		$hotel_id = $_GET['hotel_id'];
		$data['thisHotel'] = $this->model->getHotel($hotel_id);
		$data['posRequests'] = $this->model->getPOSRequests($hotel_id);
		if($data['thisHotel']['owner_id']==$_SESSION['login_owner']['owner_id']){
			
			$data['products'] = $this->model->getProducts($hotel_id);
			$data['suppliers'] = $this->model->getSuppliers($hotel_id);		
			$data['categories'] = $this->model->getCategories($hotel_id);
			$this->login_temp->loadcontent('inventory/invoice');
		}else if($_SESSION['login_recep']['hotel_id']==$data['thisHotel']['hotel_id']){

			$data['products'] = $this->model->getProducts($hotel_id);
			$data['suppliers'] = $this->model->getSuppliers($hotel_id);
			$data['categories'] = $this->model->getCategories($hotel_id);
			$this->login_temp->loadcontent('inventory/invoice');
		}else if($data['thisHotel']==''){
			
			redirect('login');
		}else{
			redirect('login');
		}
		$this->login_temp->loadview($data);
	}

	public function inventoryOrders(){
		
		$hotel_id = $_GET['hotel_id'];
		$data['thisHotel'] = $this->model->getHotel($hotel_id);
		$data['posRequests'] = $this->model->getPOSRequests($hotel_id);
		if(isset($_GET['hotel_id'])){

			$hotel_id = $_GET['hotel_id'];
			$data['thisHotel'] = $this->model->getHotel($hotel_id);
			if($data['thisHotel']['owner_id']==$_SESSION['login_owner']['owner_id']){

				if(!isset($_GET['singleDate']) && !isset($_GET['date1'])){

					$data['orders'] = $this->model->getOrders($hotel_id);

					$paid = 0;
					foreach ($data['orders'] as $key => $row) {
						$paid += $row['order_total'];
					}
					$data['totalPaid'] = $paid;
					$discount = 0;
					foreach ($data['orders'] as $key => $row) {
						$discount += $row['order_discount'];
					}
					$data['totalDiscount'] = $discount;
					$data['products'] = $this->model->getProducts($hotel_id);
					$this->temp->loadcontent('inventory/orders');
				}else if(isset($_GET['singleDate'])){

					$hotel_id = $_GET['hotel_id'];
					$date = $_GET['singleDate'];
					$data['orders'] = $this->model->getSingleDateOrders($hotel_id, $date);
					$paid = 0;
					foreach ($data['orders'] as $key => $row) {
						$paid += $row['order_total'];
					}
					$data['totalPaid'] = $paid;
					$discount = 0;
					foreach ($data['orders'] as $key => $row) {
						$discount += $row['order_discount'];
					}
					$data['totalDiscount'] = $discount;
					$this->temp->loadcontent('inventory/orders');
				}else if(isset($_GET['date1'])){

					$hotel_id = $_GET['hotel_id'];
					$date1 = $_GET['date1'];
					$date2 = $_GET['date2'];
					$data['orders'] = $this->model->getBetweenDatesOrders($hotel_id, $date1, $date2);
					$paid = 0;
					foreach ($data['orders'] as $key => $row) {
						$paid += $row['order_total'];
					}
					$data['totalPaid'] = $paid;
					$discount = 0;
					foreach ($data['orders'] as $key => $row) {
						$discount += $row['order_discount'];
					}
					$data['totalDiscount'] = $discount;
					$this->temp->loadcontent('inventory/orders');
				}
				
			}else if($_SESSION['login_recep']['hotel_id']==$data['thisHotel']['hotel_id']){
				if(!isset($_GET['singleDate']) && !isset($_GET['date1'])){

					$data['orders'] = $this->model->getOrders($hotel_id);
					$paid = 0;
					foreach ($data['orders'] as $key => $row) {
						$paid += $row['order_total'];
					}
					$data['totalPaid'] = $paid;
					$discount = 0;
					foreach ($data['orders'] as $key => $row) {
						$discount += $row['order_discount'];
					}
					$data['totalDiscount'] = $discount;
					$data['products'] = $this->model->getProducts($hotel_id);
					$this->temp->loadcontent('inventory/orders');
				}else if(isset($_GET['singleDate'])){

					$hotel_id = $_GET['hotel_id'];
					$date = $_GET['singleDate'];

					$data['orders'] = $this->model->getSingleDateOrders($hotel_id, $date);
					$paid = 0;
					foreach ($data['orders'] as $key => $row) {
						$paid += $row['order_total'];
					}
					$data['totalPaid'] = $paid;
					$discount = 0;
					foreach ($data['orders'] as $key => $row) {
						$discount += $row['order_discount'];
					}
					$data['totalDiscount'] = $discount;
					$this->temp->loadcontent('inventory/orders');
				}else if(isset($_GET['date1'])){

					$hotel_id = $_GET['hotel_id'];
					$date1 = $_GET['date1'];
					$date2 = $_GET['date2'];
					$data['orders'] = $this->model->getBetweenDatesOrders($hotel_id, $date1, $date2);
					$paid = 0;
					foreach ($data['orders'] as $key => $row) {
						$paid += $row['order_total'];
					}
					$data['totalPaid'] = $paid;
					$discount = 0;
					foreach ($data['orders'] as $key => $row) {
						$discount += $row['order_discount'];
					}
					$data['totalDiscount'] = $discount;
					$this->temp->loadcontent('inventory/orders');
				}
			}
			else if($data['thisHotel']==''){
				
				redirect('login');
			}else{
				redirect('login');
			}
		}else{

			redirect('welcome');

		}	
		$this->temp->loadview($data);
	}

	public function viewUser(){

		$this->temp->loadcontent('viewUser');

		$data['allHotel'] = $this->model->getAllHotels();

		if(isset($_GET['hotel_id'])){

			$hotel_id = $_GET['hotel_id'];
			$data['thisHotel'] = $this->model->getHotel($hotel_id);
			$data['posRequests'] = $this->model->getPOSRequests($hotel_id);
			if($data['thisHotel']['owner_id']==$_SESSION['login_owner']['owner_id']){
				if(isset($_GET['request']) && $_GET['request']=='activeClients'){
					$data['hotelUsers'] = $this->model->getActiveUsers($hotel_id);	
				}else{
					$data['hotelUsers'] = $this->model->getUsers($hotel_id);
				}
				// $data['viewUser'] = $this->model->getUsers($hotel_id);
			}else if($_SESSION['login_recep']['hotel_id']==$data['thisHotel']['hotel_id']){
				if(isset($_GET['request']) && $_GET['request']=='activeClients'){
					$data['hotelUsers'] = $this->model->getActiveUsers($hotel_id);	
				}else{
					$data['hotelUsers'] = $this->model->getUsers($hotel_id);
				}
				// $data['viewUser'] = $this->model->getUsers($hotel_id);
			}
			else if($data['thisHotel']==''){
				
				redirect('login');
			}else{
				redirect('login');
			}

		}

		$this->temp->loadview($data);

	}

	public function addClient(){
		$this->temp->loadcontent('addClient');
		if(isset($_GET['hotel_id'])){
			$data['posRequests'] = $this->model->getPOSRequests($hotel_id);
			$hotel_id = $_GET['hotel_id'];
			$data['hotelUsers'] = $this->model->getUsers($hotel_id);
			$data['thisHotel'] = $this->model->getHotel($hotel_id);
			$data['selectCountries'] = $this->model->getCountries();

			$data['selectCities'] = $this->model->getCities();
		}
		$this->temp->loadview($data);
	}


}