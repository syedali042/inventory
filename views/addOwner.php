<?php if(!isset($_SESSION['login_admin'])){header('Location: exec');} ?>
<div class="container">
	<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Owners</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard / Owner </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <center><h3 style="padding: 20px;">Create Owner Account</h3></center>
    
	    <div class="row">
			
			<div class="col-md-3" style="display: flex;align-items: center;justify-content: center;text-align: right;padding: 10px;"><h6>Name:</h6></div>

			<div class="col-md-6">
				
				<input type="text" class="form-control" id="ownerName">

			</div>

		</div>
		<br>
		<div class="row">
			
			<div class="col-md-3" style="display: flex;align-items: center;justify-content: center;text-align: right;padding: 10px;"><h6>Email:</h6></div>

			<div class="col-md-6">
				
				<input type="email" class="form-control" id="ownerEmail">

			</div>

		</div>
		<br>
		<div class="row">
			
			<div class="col-md-3" style="display: flex;align-items: center;justify-content: center;text-align: right;padding: 10px;"><h6>Password:</h6></div>

			<div class="col-md-6">
				
				<input type="text" class="form-control" id="ownerPass">

			</div>

        </div>
        <br>
		<div class="row">
			
			<div class="col-md-3" style="display: flex;align-items: center;justify-content: center;text-align: right;padding: 10px;"><h6>Contact:</h6></div>

			<div class="col-md-6">
				
				<input type="text" class="form-control" id="ownerContact">

			</div>

        </div>
        <br>
		<div class="row">
			
			<div class="col-md-3" style="display: flex;align-items: center;justify-content: center;text-align: right;padding: 10px;"><h6>Address:</h6></div>

			<div class="col-md-6">
				
				<input type="text" class="form-control" id="ownerAddress">

			</div>

        </div>
        <br>
		<div class="row">
			
			<div class="col-md-3" style="display: flex;align-items: center;justify-content: center;text-align: right;padding: 10px;"><h6>Account Status:</h6></div>

			<div class="col-md-6">
				
				<select name="" id="ownerStatus" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Waiting</option>
                </select>

			</div>

		</div>
		<br>
		<div class="row">
			
			<div class="col-md-3"></div>

			<div class="col-md-6">
				
				<button class="btn btn-primary" style="width: 100%;border-radius: 5px;" id="addOwner"><i class="fa fa-plus"></i> Add Owner</button>

			</div>

		</div>

		<br>

	
		<div class="row">
			
			<div class="col-md-3"></div>

			<div class="col-md-6">
			
				<div class="alert alert-primary" role="alert" id="Success" style="display: none;">
				  Owner Created Successfully
				</div>

				<div class="alert alert-danger" role="alert" id="Error" style="display: none;">
				  UserName Already Exist, Try Another.
				</div>

			</div>

		</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#addOwner').click(function() {
			
			var ownerName = $('#ownerName').val();
			var ownerEmail = $('#ownerEmail').val();
            var ownerPass = $('#ownerPass').val();
            var ownerContact = $('#ownerContact').val();
            var ownerStatus = $('#ownerStatus').val();
            var ownerAddress = $('#ownerAddress').val();
			var action = 'addOwner';
            if(ownerName!=='' && ownerEmail!=='' && ownerPass!=='' && ownerContact!=='' && ownerStatus!=='' && ownerAddress!==''){
                $.post('<?=AJAX?>admin/main.php', {ownerName:ownerName, ownerEmail:ownerEmail, ownerPass:ownerPass, ownerContact:ownerContact, ownerStatus:ownerStatus, ownerAddress:ownerAddress, action:action}, function(resp) {
                    
                    resp = $.parseJSON(resp);

                    if(resp.status==true){

                        $('#Success').fadeIn('slow', function() {
                            
                        });

                        setTimeout(function(){

                            $('#Success').fadeOut('slow', function() {});						
                            window.open('owners', '_self');

                        }, 2000);

                    }else{

                        $('#Error').fadeIn('slow', function() {
                            
                        });

                        setTimeout(function(){

                            $('#Error').fadeOut('slow', function() {});	

                        }, 2000);

                    }

                });
            }else{
                $('#addOwner').css('background-color', '#ff2e44');
                $('#addOwner').html('<i class="fa fa-bel"></i> Provide Credentials Carefully');
                setTimeout(function(){
                    $('#addOwner').css('background-color', '#007bff');
                    $('#addOwner').html('<i class="fa fa-plus"></i> Add Owner');
                }, 2000);
            }
		});

	});
</script>