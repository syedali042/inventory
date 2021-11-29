<?php
if(!isset($_SESSION['login_owner'])){
    header('Location: login') ;
    // echo "<script>
    //     window.open('login','_self');
    // </script>";
} 
?>
<div class="container" style="color: grey;">
		
	<div class="row" style="align-items: center;justify-content: center;margin-top: 225px;">
		
		<h1>Welcome To Easy Stay</h1>

	</div>
	<br>
	<h5 style="text-align: center;">Hotel Management System</h5>
</div>