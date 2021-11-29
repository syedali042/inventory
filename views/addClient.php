<?php $hotelId = $_GET['hotel_id']; ?>
<style type="text/css">
    .select2-container--default .select2-selection--single{
        padding:5px;
        height: 38px !important;
        /*width: 148px; */
        font-size: 1.2em;  
        position: relative;
        background-color: #f8f8f8 !important;
        font-color: #888 !important;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<div class="container">
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Hotel</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard/Add New Client</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Add New Client</h4>
        </div>
        <div class="card-body" style="padding: 30px;">
            <div class="row">
                <div class="form-group col-md-6 col-sm-6">
                    <input type="hidden" name="hotel_id" id="hotel_id" value="<?=$hotelId?>">
                    <input type="text" name="user_firstname" class="form-control" placeholder="Firstname" id="user_firstname" required="">
                </div>
                <div class="form-group col-md-6 col-sm-6">
                    <input type="text" name="user_lastname" class="form-control" placeholder="Lastname" id="user_lastname">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-6">
                    <input type="text" name="user_email" class="form-control" placeholder="Email" id="user_email" required="">
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <select id="user_country" name="user_country" class="form-control" style="font-size: 12px;padding: 20px;">
                    	<option value="">Country</option>
                        <?php foreach ($selectCountries as $key => $row): ?>
                    	<?php
                    		if($row['country_code']!=='0'){
                    		echo '<option value="'.$row['country_name'].'">'.$row['country_name'].'</option>';
                    		}
                    	 ?>
                        <?php endforeach ?>
                    </select>
                </div> 
                <div class="form-group col-md-3 col-sm-3">
                    <input type="text" name="user_city" id="user_city" class="form-control" placeholder="City">
                    <!-- <select id="user_city" name="user_city" class="form-control" style="font-size: 12px;padding: none;">
                    	<option value="">City</option>
                        <?php foreach ($selectCities as $key => $row): ?>
                    	<?php
                    		if($row['country_code']!=='0'){
                    		echo '<option value="'.$row['city_name'].'">'.$row['city_name'].'</option>';
                    		} ?>
                        <?php endforeach ?>
                    </select> -->
                </div>
            </div>
            <div class="form-group" style="margin-bottom:3px;">
                <div class="row">
                   <div class="form-group col-md-3 col-sm-3">
                       <select id="user_country_code" name="user_country_code" class="form-control">
                        	<option value="">Country Code</option>
                            <?php foreach ($selectCountries as $key => $row2): ?>
                        		<?php if($row2['country_code']!=='0'){ ?>
                					<option value="+<?=$row2['country_code']?>">+<?=$row2['country_code']?></option>
                				<?php } ?>
                            <?php endforeach ?>
                        </select>
                	</div>
                    <div class="form-group col-md-9 col-sm-9">
                        <input type="number" name="user_contact" class="form-control" placeholder="Contact Number" id="user_contact" required="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="user_address" placeholder="Address" class="form-email form-control" id="user_address" required>
            </div>
            
            <div class="form-group">
                <!-- <input type="number" name="user_cnic_no" placeholder="Enter client's cnic here OR Take Snap From 'Attach File' Button " class="form-email form-control" id="user_cnic_no" required> -->
            </div>

            <div class="form-group">
                <select class="form-control" id="user_gender" name="user_gender">
                    <option>Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="form-group">
                <center>
                <a class="btn btn-primary" style="min-width: 350px;padding: 10px;" href="javascript://" data-toggle="modal" data-target="#captureImageModal"><i class="fa fa-camera"></i> Capture Image</a>
                <input type="hidden" name="user_image" id="user_image" value="">
                <a class="btn btn-primary" style="min-width: 350px;padding: 10px;" href="javascript://" data-toggle="modal" data-target="#captureFileModal"><i class="fa fa-file"></i> Capture File</a>
                <input type="hidden" name="user_doc" id="user_doc" value="">
                </center>
            </div>
            <center>
                <div style="display: flex;align-items: center;justify-content: center;">
                    <h3>OR</h3>
                </div>
            </center>
            <br>
            <div class="form-group">
                <center>
                <label for="uploadUserImage">
                    <a class="btn btn-success" style="min-width: 350px;padding: 10px;color: white;"><i class="fa fa-camera"></i> Upload Image</a>
                </label>
                    <input type="file" id="uploadUserImage" style="display: none;">
                <label for="uploadUserFile">
                    <a class="btn btn-success" style="min-width: 350px;padding: 10px;color: white;"><i class="fa fa-file"></i> Upload File</a>
                </label>
                    <input type="file" id="uploadUserFile" style="display: none;">
                </center>
            </div>
            <br>
            <div class="form-group">
                <center>
                <a class="btn btn-hms-red" id="addClient" style="width: 100%;" href="javascript://"><i class="fa fa-user-plus"></i> Add Client</a>
                </center>
            </div>

        </div>
    </div>
</div>



<div id="captureImageModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Capture Image</h4>
      </div>
      <div class="modal-body">
        <!--  -->
      <form method="POST" action="javascript://">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" id="image" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results" style="width:330px; height: 330px;padding-top: 25px;">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button class="btn btn-success" id="submit">Submit</button>
            </div>
        </div>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script language="JavaScript">
    Webcam.set({
        width: 390,
        height: 330,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }

    $(document).ready(function() {
         $('#user_country').select2({
            selectOnClose: true,
            width: 'resolve'
        });
        $('#user_country_code').select2({
            selectOnClose: true,
            width: 'resolve'
        }); 
    });

    $("#submit").on('click', function(){
        var image = $('#image').val();
        var action = 'client-image';

        $.post('<?=AJAX?>clientAjax.php', {image:image, action:action}, function(resp){

        resp = $.parseJSON(resp);
            if (resp.status == true)
            {   
                console.log(resp.img);
                $('#user_image').val(resp.img);
            }
                
        });
        $('#captureImageModal').modal('hide');
    });
</script>


<div id="captureFileModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Capture CNIC / Passport</h4>
      </div>
      <div class="modal-body">
        <!--  -->
      <form method="POST" action="javascript://">
        <div class="row">
            <div class="col-md-6">
                <div id="my_file_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_file_snapshot()">
                <input type="hidden" id="file-image" name="image" class="file-image-tag">
            </div>
            <div class="col-md-6">
                <div id="file-results" style="width:330px; height: 330px;padding-top: 25px;">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button class="btn btn-success" id="submit_file">Submit</button>
            </div>
        </div>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">

     Webcam.set({
        width: 390,
        height: 330,
        image_format: 'jpeg',
        jpeg_quality: 90
        });
  
        Webcam.attach( '#my_file_camera' );

        function take_file_snapshot() {
            Webcam.snap( function(data_uri) {
                $(".file-image-tag").val(data_uri);
                document.getElementById('file-results').innerHTML = '<img src="'+data_uri+'"/>';
            } );
        }

    $("#submit_file").on('click', function(){
        var image = $('#file-image').val();
        var action = 'file-image';

        $.post('<?=AJAX?>clientAjax.php', {image:image, action:action}, function(resp){

        resp = $.parseJSON(resp);
            if (resp.status == true)
            {   
                console.log(resp.img);
                $('#user_doc').val(resp.img);
            }
                
        });
        $('#captureFileModal').modal('hide');

    });
</script>

<script type="text/javascript">
    
    $(document).ready(function() {
        
        $('#addClient').click(function() {
            var hotel_id = '<?=$_GET['hotel_id']?>';
            var user_firstname = $('#user_firstname').val();
            var user_lastname = $('#user_lastname').val();
            var user_email = $('#user_email').val();
            var user_country = $('#user_country').val();
            var user_city = $('#user_city').val();
            var user_country_code = $('#user_country_code').val();
            var user_contact = $('#user_contact').val();
            var user_phone = user_country_code+user_contact;
            var user_address = $('#user_address').val();
            var user_gender = $('#user_gender').val();
            var user_image = $('#user_image').val();
            var user_doc = $('#user_doc').val();
            var action = 'addClient';
            var resUser = {user_firstname:user_firstname, user_lastname:user_lastname, user_email:user_email, user_country:user_country, user_city:user_city, user_phone:user_phone, user_address:user_address, user_gender:user_gender, user_image:user_image, user_doc:user_doc};
            $.post('<?=AJAX?>clientAjax.php', {hotel_id:hotel_id, resUser: resUser, action:action}, function(resp) {
                    
                resp = $.parseJSON(resp);

                if(resp.status==true){

                    $('input').val('');
                    $('#addClient').html('<i class="fa fa-check"></i> User Added');
                    $('.container').fadeOut('500', function() {
                        
                    });

                    setTimeout(function(){
                        $('#addClient').html('<i class="fa fa-user-plus"></i> Add Client');
                        $('.container').fadeIn('500', function() {
                        
                        });
                    }, 1000);

                }else{
                    $('#addClient').html('<i class="fa fa-user-plus"></i> User Already Exists');
                }

            });

        });

    });


    $("#uploadUserImage").on('change',function(){
        $("#validateButton1").text('Wait File Is Uploading');
        var data = new FormData();
        data.append('main_image', $(this).prop('files')[0]);
        data.append('uploadUserImage', 'uploadUserImage');
        $.ajax({
            type: 'POST',
            processData: false,
            contentType: false,
            data: data,
            url: '<?=AJAX?>clientAjax.php',
            dataType : 'json',
            success: function(resp){
                // resp = $.parseJSON(resp);
                // console.log(resp.data);
                if (resp.status == true)
                {   
                    $("#uploadUserImage").val(resp.data);
                    $("#user_image").val(resp.data);
                    // $("#roomUploadedImage").attr('src', '<?=IMG?>img/roomImages/'+resp.data);
                    // $("#roomUploadedImage").css('display', 'block');
                    // $('#addNewRoomImageTitle').css('display','none');
                    // $('#roomImageDiv').css('border','none');
                }
                else
                {
                    $("#validateButton1").text('Upload An Image First');
                }
            }
        });
    });

    $("#uploadUserFile").on('change',function(){
        $("#validateButton1").text('Wait File Is Uploading');
        var data = new FormData();
        data.append('main_image', $(this).prop('files')[0]);
        data.append('uploadUserFile', 'uploadUserFile');
        $.ajax({
            type: 'POST',
            processData: false,
            contentType: false,
            data: data,
            url: '<?=AJAX?>clientAjax.php',
            dataType : 'json',
            success: function(resp){
                // resp = $.parseJSON(resp);
                // console.log(resp.data);
                if (resp.status == true)
                {   
                    $("#uploadUserFile").val(resp.data);
                    $("#user_doc").val(resp.data);
                    // $("#roomUploadedImage").attr('src', '<?=IMG?>img/roomImages/'+resp.data);
                    // $("#roomUploadedImage").css('display', 'block');
                    // $('#addNewRoomImageTitle').css('display','none');
                    // $('#roomImageDiv').css('border','none');
                }
                else
                {
                    $("#validateButton1").text('Upload An Image First');
                }
            }
        });
    });
</script>
