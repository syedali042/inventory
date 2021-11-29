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
                        <li class="active">Dashboard/Add Hotel</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
	<form action="javascript://" class="add-professors" id="demo1-upload" enctype="multipart/form-data">
		<br>
		<center><h4>Add Hotel</h4></center>
		<br>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <input required name="hotel_name" id="hotel_name" type="text" class="form-control" placeholder="Hotel Name">
                </div>
                <div class="form-group">
                    <input required name="hotel_address" id="hotel_address" type="text" class="form-control" placeholder="Address">
                </div>
                <div class="form-group">
                    <input required name="hotel_contact" id="hotel_contact" type="text" class="form-control" placeholder="Mobile no.">
                </div>
                <div class="form-group">
                    <input required name="hotel_email" id="hotel_email" type="text" class="form-control" placeholder="Email">
                </div>
                <!-- <div class="form-group">
                    <input required name="finish" id="finish" type="text" class="form-control" placeholder="Date of Birth">
                </div>
                <div class="form-group">
                    <input required name="postcode" id="postcode" type="text" class="form-control" placeholder="Postcode">
                </div> -->
                <div class="form-group res-mg-t-15">
					<textarea required name="hotel_description" id="hotel_description" placeholder="Description" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
					<select required name="hotel_state" id="hotel_state" class="form-control">
						<option value="none" selected="" disabled="">Select state</option>
						<option value="Punjab">Punjab</option>
						<option value="Sindh">Sindh</option>
						<option value="KPK">KPK</option>
						<option value="Balochistan">Balochistan</option>
						<option value="Gilgit-Baltistan">Gilgit-Baltistan</option>
						<option value="Azad Jammu & Kashmir">Azad Jammu & Kashmir</option>
                    </select>
                </div>
                <div class="form-group">
                        <input type="text" id="hotel_city" class="form-control" required="" placeholder="Hotel City">
						<!-- <select required name="hotel_city" id="hotel_city" class="form-control">
						<option value="none" disabled="">Select city</option>
                        <?php foreach ($selectCities as $key => $cities): ?>
						<option value="<?=$cities['city_name']?>"><?=$cities['city_name']?></option>
                        <?php endforeach ?>
				        </select> -->
                </div>
                <div class="form-group">
                        <input type="text" id="hotel_nearby_place" class="form-control" required="" placeholder="Nearby Places">
                        <!-- <select required name="hotel_nearby_place" id="hotel_nearby_place" class="form-control">
                        <option value="none" disabled="">Select city</option>
                        <?php foreach ($selectPlaces as $key => $places): ?>
                        <option value="<?=$places['place_name']?>"><?=$places['place_name']?></option>
                        <?php endforeach ?>
                        </select> -->
                </div>
                <div class="form-group">
                    <input required name="hotel_website" id="hotel_website" type="text" class="form-control" placeholder="Website URL">
                </div>
                <div class="form-group">
					<label>
						Hotel Title Image
					</label>
                    <input required type="file" name="hotel_img" id="hotel_img">
                    <input type="hidden" id="hotel_image" value="">
                </div>
                <div class="form-group">
                	
                	<img src="" id="owner_image" style="display: none;">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="payment-adress">
                    <center><button id="addHotel" type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Add Hotel</button></center>
                    <br><br>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        $("#hotel_img").on('change',function(){
            $("#validateButton1").text('Wait File Is Uploading');
            var data = new FormData();
            data.append('main_image', $(this).prop('files')[0]);
            data.append('action', 'hotel_image');
            $.ajax({
                type: 'POST',
                processData: false,
                contentType: false,
                data: data,
                url: '<?=AJAX?>basic.php',
                dataType : 'json',
                success: function(resp){
                    // resp = $.parseJSON(resp);
                    // console.log(resp.data);
                    if (resp.status == true)
                    {   
                        $("#hotel_image").val(resp.data);
                        $("#owner_image").attr('src', '<?=IMG?>img/hotelImages/'+resp.data);
                        $("#owner_image").css('display', 'block');
                    }
                    else
                    {
                        $("#validateButton1").text('Upload An Image First');
                    }
                }
            });
        });


        $('#addHotel').on('click', function(){

            var hotel_name = $('#hotel_name').val();
            var hotel_address = $('#hotel_address').val();
            var hotel_contact = $('#hotel_contact').val();
            var hotel_email = $('#hotel_email').val();
            var hotel_description = $('#hotel_description').val();
            var hotel_state = $('#hotel_state').val();
            var hotel_city = $('#hotel_city').val();
            var hotel_website = $('#hotel_website').val();
            var hotel_image = $('#hotel_image').val();
            var hotel_nearby_place = $('#hotel_nearby_place').val();
            var action = 'addHotel';
            if(hotel_name!=='' && hotel_address!=='' && hotel_contact!=='' && hotel_email!=='' && hotel_description!=='' && hotel_state!=='' && hotel_city!=='' && hotel_website!=='' && hotel_image!=='' && hotel_nearby_place!==''){

                $.post('<?=AJAX?>basic.php', {hotel_name:hotel_name, hotel_address:hotel_address, hotel_contact:hotel_contact, hotel_email:hotel_email, hotel_description:hotel_description, hotel_state:hotel_state, hotel_city:hotel_city, hotel_website:hotel_website, hotel_image:hotel_image, hotel_nearby_place:hotel_nearby_place, action:action}, function(resp){
	                    resp = $.parseJSON(resp);
	                    if(resp.status==true){
                            $('#addHotel').before('<div class="alert alert-success"><strong>Success!</strong>New hotel activation request sent !</div>');
                            setTimeout(function(){  
                                $('.alert').fadeOut('slow', function() {
                                    
                                });
                        	   window.open('allHotels', '_self');
                            }, 1000);
	                    }else if(resp.status==false && resp.data=='mail-error'){
                            $('#addHotel').before('<div class="alert alert-warning"><strong>Warning!</strong> Email already exists choose a unique email.</div>');
                            setTimeout(function(){  
                                $('.alert').fadeOut('slow', function() {
                                    
                                });
                            }, 1500);
                        }

                });

           }

        });

    });
</script>