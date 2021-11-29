<?php 
	session_start();
	error_reporting(0);
	// $user = 'rfxklykv_bloods';
	// $host = 'localhost';
	// $pass = 'BF[vN$1)yQiH';
	// $dbname = 'rfxklykv_masterclass';

	$user = 'root';
	$host = 'localhost';
	$pass = '';
	$dbname = 'hotelreservation';

    // $user = 'w3schema_loving_me';
	// $host = 'localhost';
	// $pass = '+celouk)7DK?';
	// $dbname = 'w3schema_loving_me';

	// $host = 'localhost';
 //     $user = 'easystay_syedali';
	// $pass = 'hk45@AE$#65';
	// $dbname = 'easystay_pk_db_easystay';

	$con = mysqli_connect($host, $user, $pass, $dbname);

	function dateConvert($date){
        $Month = date("F", strtotime($date));
        $Date = date("d", strtotime($date));
        $Year = date("y", strtotime($date));
        return $Month.' '.$Date.', 20'.$Year;
    }
?>