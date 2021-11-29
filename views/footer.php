<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Add New Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body" id="expenseWidgetCard">
                        <div class="stat-widget-one" id="expenseWidget">
                            <!-- <div style="display: flex;align-items: center;justify-content: center;">
                                
                                asdf
                            </div> -->
                            <div class="form-group">
                                <label>Expense Amount</label>
                                <input required name="exp_amount" type="text" class="form-control exp_amount" placeholder="e.g 50, 100, 1000, 10000">
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label>Expense Description / Purpose</label>
                                <textarea name="exp_description" type="text" class="form-control exp_description" placeholder="Purpose"></textarea>
                                <!-- <input type="hidden" name="recep_id" id="recep_id" value="2"> -->
                            </div>
                            <div class="col-lg-12">
                                <div class="payment-adress" style="display: flex;align-items: center;justify-content: center;">
                                      <center id="expenseAddingSpinner" style="display: none;">
                                        <div class="spinner-border" role="status" style="margin-top: 5px;display: flex;align-items: center;justify-content: center;">
                                          <span class="sr-only"></span>
                                        </div>Processing...
                                        </center>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light addExpense">ADD</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div> -->
        </div>
    </div>
</div>
<div class="modal fade" id="posRequestModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title posRequestModalTitle" id="smallmodalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
              <table class="table table-condensed">
                <thead>
                <tr style="text-align: center;">
                  <th>Product Id</th>
                  <th>Products</th>
                  <th>Available Quantities</th>
                  <th>Requested Quantities</th>
                </tr>
                </thead>
                <tbody id="posRequestTable">
                   
                </tbody>
              </table>
              <center><button class="btn btn-success transferRequestedProducts"> Deliver Now</button></center>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div> -->
        </div>
    </div>
</div>
<style type="text/css">
  label{
    font-weight: bold !important;
  }
  textarea:focus, input:focus{
    outline: none;
}
</style>
<div class="modal fade" id="makeReservationModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="lgmodalLabel">Step 1 of 4 (Select Client)</h3>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body" id="reservationWidgetCard">
                        <form action="invoice" method="POST"  autocomplete="off">
                        <div class="stat-widget-one" id="reservationWidget">
                          <div class="row">
                            
                            <div class="col-md-12" id="selectClient">
                              <div class="form-group">
                                <!-- <center><label style="font-size: 28px;">Select Client</label></center> -->

                                <input style="height: 50px;border-left: none;border-right: none;border-top: none;" type="text" id="clientInput" class="form-control" placeholder="Select Client" autocomplete="off">
                              </div>
                              <div id="clientTableDiv" class="table-responsive" style="display:none;position: absolute;z-index: 1;background-color: #fff;width: 95%;max-height: 400px;">
                                  <table class="table table-hover table-condensed">
                                        <!-- <thead>
                                            <tr>
                                                <th data-field="room_no" data-editable="false">Name</th>
                                                <th data-field="room_type" data-editable="false">Email</th>
                                                <th data-field="room_title" data-editable="false">Contact</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead> -->
                                        <tbody id="clientTable">
                                            <?php foreach ($hotelUsers as $key => $row): ?>
                                            <tr>
                                                <td><img src="<?=IMG?>img/client-images/<?=$row['user_img']?>" style="width: 70px;height: 80px;"></td>
                                                <td><?=$row['user_firstname']." ".$row['user_lastname']?></td>
                                                <td><?=$row['user_email']?></td>
                                                <td><?=$row['user_contact']?></td>
                                                <td>
                                                    <input type="hidden" class="user_id" value="<?=$row['user_id']?>">
                                                    <a href="javascript://" class="btn btn-hms-red fillUserForm"><i class="fa fa-check"></i> Add</a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                              </div>
                            </div>

                            <div class="col-md-12" id="selectRoom" style="display: none;background-color: #fff;">
                              <div class="form-group">
                                <table class="table table-bordered" style="width: 100%;">
                                  <thead>
                                    <tr>
                                        <th data-field="room_no" data-editable="false">Room #</th>
                                        <th data-field="room_title" data-editable="false">Room Title</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody id="selectedRooms">
                                    
                                  </tbody>
                                </table>
                                <!-- <center><label style="font-size: 28px;">Select Room</label></center> -->
                                <input style="height: 50px;border-left: none;border-right: none;border-top: none;" type="text" id="roomInput" class="form-control" placeholder="Select Rooms">
                                
                              </div>
                              <div id="roomTableDiv" style="display:none;position: absolute;z-index: 1;background-color: #fff;max-height: 400px;">
                                  <table class="table table-hover table-condensed" style="width: 100%;">
                                        <tbody id="roomTable">
                                            <?php foreach ($selectRooms as $key => $row): ?>
                                            <tr>
                                                <td>#<?=$row['room_no']?></td>
                                                <td><?=$row['room_title']?></td>
                                                <td>
                                                    <input type="hidden" class="room_id" value="<?=$row['room_id']?>">
                                                    <a href="javascript://" class="addToRoomList btn btn-primary btn-sm"><i class="fa fa-check"></i> Add</a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                              </div>
                              <center><a href="javascript://" class="btn btn-info toSelectFacilities">Next</a></center>
                            </div>

                            <div class="col-md-12" id="selectFacility" style="display: none;background-color: #fff;">
                              <div class="form-group">
                                <table class="table table-bordered" style="width: 100%;">
                                  <thead>
                                    <tr>
                                        <th data-field="facility_id" data-editable="false">Facility Id</th>
                                        <th data-field="facility_name" data-editable="false">Facility Name</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody id="selectedFacilities">
                                    
                                  </tbody>
                                </table>
                                <input type="text" id="facilityInput" class="form-control" style="border-left: none;border-right: none;border-top: none;" placeholder="Select Amenities">
                              </div>
                              <div id="facilityTableDiv" style="display:none;position: absolute;z-index: 1;padding: 5px;background-color:#fff;border-radius: 10px;">
                                  <table class="table table-hover table-condensed" style="width: 100%;">
                                        <tbody id="facilityTable">
                                            <?php foreach ($selectFacilities as $key => $row): ?>
                                            <tr>
                                                <td>#<?=$row['facility_id']?></td>
                                                <td class="facility_name"><?=$row['facility_name']?></td>
                                                <td>
                                                    <input type="hidden" class="facility_id" value="<?=$row['facility_id']?>">
                                                    <a href="javascript://" class="addToFacilityList"><i class="fa fa-check"></i> Add</a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                              </div>
                            </div>

                            <div class="col-md-12 check-in-date-selector" style="display: none;">
                              <center><label style="font-size: 28px;">Reservation Details</label></center>
                              <br>
                            </div>

                            <div class="col-md-6 check-in-date-selector" style="display: none;">
                              <label>Check-In Date</label>
                                <input type="date" name="check-in-date" class="form-control" id="check-in-date">
                            <br>
                            </div>

                            <div class="col-md-6 check-in-date-selector" style="display: none;">
                              <label>Check-In Time</label>
                                <input type="time" name="check-in-time" class="form-control" id="check-in-time">
                            <br>
                            </div>

                            <div class="col-md-6 check-in-date-selector" style="display: none;">
                              <label>Check-Out Date</label>
                                <input type="date" name="check-out-date" class="form-control" id="check-out-date">
                            <br>
                            </div>

                            <div class="col-md-6 check-in-date-selector" style="display: none;">
                              <label>Check-Out Time</label>
                                <input type="time" name="check-out-time" class="form-control" id="check-out-time">
                            <br>
                            </div>

                            <div class="col-md-6 check-in-date-selector" style="display:none;">
                                <label>No. Of Adults</label>
                                <input type="number" name="no-of-adults" class="form-control" id="no-of-adults" placeholder="Number Of Adults">
                            <br>
                            </div>
                            <div class="col-md-6 check-in-date-selector" style="display:none;">
                                <label>No. Of Children</label>
                                <input type="number" name="no-of-children" class="form-control" id="no-of-children" placeholder="Number Of Children">
                                <br>

                            </div>
                            <div class="col-md-12 check-in-date-selector" style="display:none;">
                              <center><a href="javascript://" class="btn btn-info toSelectRooms">Next</a></center>
                            </div>

                          </div>
                          <center><button style="display: none;" type="submit" name="submit" class="btn btn-success" id="submit_all">Save & Continue</button></center>
                        </div>
                        <input type="hidden" name="hotel_id" value="<?=$_GET['hotel_id']?>">
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div> -->
        </div>
    </div>
</div>


    <!-- Right Panel -->
    <script src="<?=JS?>bootstrap.min.js"></script>

    <script src="<?=JS?>jquery.min.js"></script>
    
    <script src="<?=VENDOR?>popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="<?=JS?>popper.min.js"></script>
    <!-- <script src="<?=JS?>html2canvas.js"></script> -->
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
    <script src="<?=JS?>jspdf.min.js"></script>
    <script src="<?=JS?>main.js"></script>
    <script src="<?=VENDOR?>chart.js/dist/Chart.bundle.min.js"></script>
     <script src="<?=JS?>dashboard.js"></script>
    <script src="<?=JS?>widgets.js"></script>
    <script src="<?=VENDOR?>jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?=VENDOR?>jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="<?=VENDOR?>jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>

          function genPDF()
          {
           html2canvas(document.getElementById('abbbbb'),{
           onrendered:function(canvas){
           var img=canvas.toDataURL("image/jpeg");
           var doc = new jsPDF();
           doc.addImage(img,'JPEG',20,20);
           doc.save('test.pdf');
           }
           });
          }

        $(document).ready(function () {
            $('#backup_profit').click(function(){

                var action = 'backup_profit';
                $.post("<?=AJAX?>/admin/main.php", {action:action},
                    function (resp) {
                        
                        if(resp.status == true){

                            console.log(resp);

                        }

                    },
                    "JSON"
                );

            });



            $(document).on('click', '.posRequestId', function(){
              $this = $(this);
              var hotel_id = '<?=$_GET['hotel_id']?>';
              var posRequestId = $this.attr('data-id');
              var action = 'viewPosRequestDetails';

              $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, posRequestId:posRequestId, action:action}, function(resp){
                resp = $.parseJSON(resp);
                if(resp.status==true){
                  $('#posRequestTable').html(resp.data);
                  $('#posRequestModal').modal('show');

                  $('.posRequestModalTitle').html('Request Id: '+posRequestId);
                }

              });
            });

            $(document).on('click', '.transferRequestedProducts', function(){

              var availableWarehouseStock = $(".availableWarehouseStock").map(function() {
                  return $(this).text();
              }).get();

              var posRequestedProductQuantity = $('.posRequestedProductQuantity').map(function(){
                  return $(this).val();
              }).get();

              var i=0;
              posRequestedProductQuantity.forEach( function(element, index) {
                if(element<availableWarehouseStock[index] && element==availableWarehouseStock[index]){
                  console.log('error');
                }else{
                  console.log('ok');
                }
                i++;
              });


            });
        });
        // (function($) {
        //     "use strict";

        //     jQuery('#vmap').vectorMap({
        //         map: 'world_en',
        //         backgroundColor: null,
        //         color: '#ffffff',
        //         hoverOpacity: 0.7,
        //         selectedColor: '#1de9b6',
        //         enableZoom: true,
        //         showTooltip: true,
        //         values: sample_data,
        //         scaleColors: ['#1de9b6', '#03a9f5'],
        //         normalizeFunction: 'polynomial'
        //     });
        // })(jQuery);


        $('.addExpense').on('click', function(){
            $this = $(this);
            var exp_amount = $('.exp_amount').val();
            var exp_description = $('.exp_description').val();
            var hotel_id = '<?=$_GET['hotel_id']?>';
            var action = 'addExpense';
            var user_id = '0';
            if(exp_amount!=='' && exp_description!=='' && user_id!=='' && hotel_id!=='' && parseInt(exp_amount>0)){

                $this.css('display', 'none');
                $('#expenseAddingSpinner').css('display', 'block');
                $.post('<?=AJAX?>basic.php', {exp_amount:exp_amount, exp_description:exp_description, user_id:user_id, hotel_id:hotel_id, action:action}, function(resp){
                        resp = $.parseJSON(resp);
                        if(resp.status==true){
                            $this.html('<i class="fa fa-check"></i> Expense Added');
                            $this.css('display', 'block');
                            $('#expenseAddingSpinner').css('display', 'none');
                            setTimeout(function(){

                                // window.open('index?hotel_id='+hotel_id, '_self');
                                $('.exp_amount').val('');
                                $('.exp_description').val('');
                                $('#expenseModal').modal('hide');
                            }, 1000)
                        }

                });

           }else{

            alert('Enter Valid Amount');
            return false;

           }

        });
    </script>




<script type="text/javascript">
        
    $(document).on('click', '.addToRoomList', function(){
          


        $this = $(this);
        var room_id = $this.parent('td').children('.room_id').val();
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var action = 'GetThisRoom';

        $.post('<?=AJAX?>reservationAjax.php', {hotel_id:hotel_id, room_id:room_id, action:action}, function(resp){

            resp = $.parseJSON(resp);
            if(resp.status==true){

                $("#selectedRooms").append('<tr><input type="hidden" name="thisRoomId[]" class="thisRoomId" value="'+resp.data.room_id+'"><td>'+resp.data.room_no+'</td><td>'+resp.data.room_title+'</td><td><a href="javascript://" class="removeRoom">Remove</a></td></tr>');

            }

            // $this.parent('td').parent('tr').fadeOut('slow', function(){});

        });


    });

    $(document).on('click', '.removeRoom', function(){

        $this = $(this);

        $this.parent('td').parent('tr').remove();
        
    });


    $(document).on('click', '.addToFacilityList', function(){
        
        $this = $(this);
        var facility_id = $this.parent('td').children('.facility_id').val();
        var facility_name = $this.parent('td').parent('tr').children('.facility_name').text();      

            $("#selectedFacilities").append('<tr><input type="hidden" name="thisFacilityId[]" class="thisFacilityId" value="'+facility_id+'"><td>'+facility_id+'</td><td>'+facility_name+'</td><td><a href="javascript://" class="removeFacility">Remove</a></td></tr>');
            $this.parent('td').parent('tr').fadeOut('slow', function(){});

    });

    $(document).on('click', '.removeFacility', function(){

        $this = $(this);

        $this.parent('td').parent('tr').remove();
        
    });




     $(document).ready(function() {
        $("#clientInput").on("click", function() {
            $('#clientTableDiv').slideToggle('show');
            $('#clientInput').attr('placeholder', 'Search name, email or contact....');
        });
        $("#clientInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#clientTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

        });

        $("#roomInput").on("click", function() {
            $('#roomTableDiv').slideToggle('show');
            $('#roomInput').attr('placeholder', 'Search room number or title.... ');
        });
        $("#roomInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#roomTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $("#facilityInput").on("click", function() {
            $('#facilityTableDiv').slideToggle('show');
            $('#facilityInput').attr('placeholder', 'Search facility id or title.... ');
        });
        $("#facilityInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#facilityTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

        });
        $(document).on('click', '.toSelectRooms', function(){
          $('.check-in-date-selector').attr('style', 'display:none');
          $('#selectRoom').css('display', 'block');
          $('#lgmodalLabel').text('Step 3 of 4 (Select Rooms)');
        });
        $(document).on('click', '.toSelectFacilities', function(){
          
          $('#selectRoom').css('display', 'none');
          $('#selectFacility').css('display', 'block');
          $('#submit_all').css('display', 'block');
          $('#lgmodalLabel').text('Step 4 of 4 (Select Amenities)');
        });
        $(document).on('click', '.fillUserForm', function() {
            
            $this = $(this);

            var hotel_id = '<?=$_GET['hotel_id']?>';
            var user_id = $this.parent('td').children('.user_id').val();
            var action = 'fillUserForm';
            $.post('<?=AJAX?>reservationAjax.php', {hotel_id:hotel_id, user_id:user_id, action:action}, function(resp) {
                
                resp = $.parseJSON(resp);

                if(resp.status == true){

                    $('#selectClient').html('<div style="border:2px solid #303030;border-radius:3px;padding:10px;"><center><label><i class="fa fa-check"></i> '+resp.data.user_firstname+' '+resp.data.user_lastname+'</label></center></div><input type="hidden" name="user_firstname" value="'+resp.data.user_firstname+'"><input type="hidden" name="user_lastname" value="'+resp.data.user_lastname+'"><input type="hidden" name="user_email" value="'+resp.data.user_email+'"><input type="hidden" name="user_country" value="'+resp.data.user_country+'"><input type="hidden" name="user_city" value="'+resp.data.user_city+'"><input type="hidden" name="user_contact" value="'+resp.data.user_contact+'"><input type="hidden" name="user_address" value="'+resp.data.user_address+'"><input type="hidden" name="user_gender" value="'+resp.data.user_gender+'"><input type="hidden" name="user_image" value="'+resp.data.user_img+'"><input type="hidden" name="user_doc" value="'+resp.data.user_cnic+'">');
                    $('.check-in-date-selector').attr('style', 'display:block');
                    $('#selectClient').css('display', 'none');
                    $('#lgmodalLabel').text('Step 2 of 4 (Reservation Details)');
                    // $('#selectFacility').css('display', 'block');
                    
                }

            });


        });

    });
</script>
<div class="modal fade" id="roomModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">User Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        


      </div>


    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.viewRooms').click(function() {
            $this = $(this);
            var res_id = $this.parent('td').parent('tr').children('.res_id').val();
            var action = 'GetThisResRoom';
            $('#roomModal').children('div').children('div').children('.modal-body').html('<div class="row"></div>');
            $('#roomModal').children('div').children('div').children('.modal-header').children('.modal-title').text('Requested Rooms');
            $.post('<?=AJAX?>reservationAjax.php',{res_id:res_id, action:action}, function(resp){

                resp = $.parseJSON(resp);
                if(resp.status == true){

                    var roomData = resp.roomData;
                    roomData.forEach(function(data){

                        // $('#userModal').children('div').children('div').children('.modal-body').children('.row').append('<div class="col-md-6"><img src="<?=IMG?>img/roomImages/'+data.room_title_img+'"></div>');
                        $('#roomModal').children('div').children('div').children('.modal-body').children('.row').append('<div class="col-md-4"><div class="card"><img class="card-img-top" style="height:350px" src="<?=IMG?>img/roomImages/'+data.room_title_img+'" alt="Card image cap"><div class="card-body"><center><h4 class="card-title mb-3">'+data.room_title+'</h4><p>'+data.room_type+'</p></center></div></div></div>');
                        console.log(data.room_title_img);
                        $('#roomModal').modal('show');

                    });

                }

            })
        });
        $('.approveRequest').click(function() {
            $this = $(this);
            var res_id = $this.parent('td').parent('tr').children('.res_id').val();
            var action = 'approveRequest';
            $.post('<?=AJAX?>reservationAjax.php',{res_id:res_id, action:action}, function(resp){

                resp = $.parseJSON(resp);
                if(resp.status == true){
                    $('#bookingRequestResp').addClass('text-primary');
                    $('#bookingRequestResp').html('<i class="fa fa-check"></i> '+resp.data);

                }else{
                    $('#bookingRequestResp').addClass('text-danger');
                    $('#bookingRequestResp').html('<i class="fa fa-times"></i> '+resp.data);
                    $this.parent('td').parent('tr').fadeOut('slow', function() {
                    });
                }

            })
        });

        $('#generate-today-report').click(function() {
            $this = $(this);
            var hotel_id = '<?=$_GET['hotel_id']?>';
            var action = 'generate-report';
            var type = 'todayReport';
             $('#currentDateSpinner').attr('style', 'display:block;');
            $this.children('div').children('.card-body').attr('style', 'display:none;');
            $.post('<?=AJAX?>hotelReports.php',{hotel_id:hotel_id, action:action, type:type}, function(resp){

                resp = $.parseJSON(resp);
                if(resp.status == true){
                    $('#currentDateSpinner').attr('style', 'display:none;');
                    $('#currentDateSpinner').after('<a class="btn btn-primary btn-sm" href="<?=REPORT?>'+resp.data+'.pdf"><i class="fa fa-download"></i> Download</a>');
                }else{
                    
                }

            })
        });

        $('#singleDateReport').on('change', function() {
            $this = $(this);
            var hotel_id = '<?=$_GET['hotel_id']?>';
            var action = 'generate-report';
            var singleDate = $('#singleDateReport').val();
            var type = 'singleDateReport';
            $('#singleDateSpinner').attr('style', 'display:block;');
            $this.parent('div').parent('div').parent('.card-body').attr('style', 'display:none;');
            $.post('<?=AJAX?>hotelReports.php',{singleDate:singleDate, hotel_id:hotel_id, action:action, type:type}, function(resp){

                resp = $.parseJSON(resp);
                if(resp.status == true){
                    $('#singleDateSpinner').attr('style', 'display:none;');
                    $('#singleDateSpinner').after('<a class="btn btn-primary btn-sm" href="<?=REPORT?>'+resp.data+'.pdf"><i class="fa fa-download"></i> Download</a>');
                }else{
                    
                }

            })
        });

        $('#generate-report-dates').on('click', function() {
            $this = $(this);
            var hotel_id = '<?=$_GET['hotel_id']?>';
            var action = 'generate-report-dates';
            var dateOneReport = $('#dateOneReport').val();
            var dateTwoReport = $('#dateTwoReport').val();
            $('#twoDateSpinner').attr('style', 'display:block;');
            $this.parent('div').parent('div').parent('.card-body').attr('style', 'display:none;');
            $.post('<?=AJAX?>hotelReports.php',{dateOneReport:dateOneReport, dateTwoReport:dateTwoReport, action:action, hotel_id:hotel_id}, function(resp){

                resp = $.parseJSON(resp);
                if(resp.status == true){
                    $('#twoDateSpinner').attr('style', 'display:none;');
                    $('#twoDateSpinner').after('<center><a style="padding:10px;" class="btn btn-primary btn-sm" href="<?=REPORT?>'+resp.data+'.pdf"><i class="fa fa-download"></i> Download</a></center>');
                }else{
                    
                }

            })
        });


    });
</script>
</body>

</html>


