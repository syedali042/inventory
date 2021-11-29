<div class="container">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Users</strong>
        </div>
        <div class="card-body">
            <div id="bootstrap-data-table-export_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row" style="padding-left: 15px;">
                <input id="myInput" type="text" class="form-control" placeholder="&#128269; Filter By Any Field" style="width: 20%;display:inline-block;float:right;margin-right:20px;">
            </div><br>
            <div class="row">
                <div class="col-sm-12">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 209px;">Client ID</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 209px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 349px;">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 154px;">Contact</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 122px;">City</th>
                                <th style="width: 30%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php foreach ($hotelUsers as $key => $user): ?>
                            <tr role="row" class="odd">
                                <td>#<?=$user['user_id']?></td>
                                <td class="sorting_1"><?=$user['user_firstname']?> <?=$user['user_lastname']?></td>
                                <td><?=$user['user_email']?></td>
                                <td><?=$user['user_contact']?></td>
                                <td><?=$user['user_city']?></td>
                                <td>
                                    <input type="hidden" class="user_id" value="<?=$user['user_id']?>">
                                    <a href="javascript://" class="btn btn-hms-red btn-sm viewUser"> <i class="fa fa-eye"></i> View</a>
                                    &nbsp;&nbsp; <a href="javascript://" class="btn btn-warning btn-sm updateUser"> <i class="fa fa-upload"></i> Update</a>
                                     &nbsp;&nbsp; <a href="javascript://" class="btn btn-info btn-sm deleteUser"> <i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="bootstrap-data-table-export_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table-export_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="bootstrap-data-table-export_previous">
                                    <a href="#" aria-controls="bootstrap-data-table-export" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                </li>
                                <li class="paginate_button page-item active">
                                    <a href="#" aria-controls="bootstrap-data-table-export" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="bootstrap-data-table-export" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="bootstrap-data-table-export" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="bootstrap-data-table-export" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="bootstrap-data-table-export" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="bootstrap-data-table-export" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                                </li>
                                <li class="paginate_button page-item next" id="bootstrap-data-table-export_next">
                                    <a href="#" aria-controls="bootstrap-data-table-export" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.viewUser').click(function() {
            $this = $(this);
            var user_id = $this.parent('td').children('.user_id').val();
            var action = 'GetUser';
            $.post('<?=AJAX?>clientAjax.php',{user_id:user_id, action:action}, function(resp){

                resp = $.parseJSON(resp);
                if(resp.status == true){


                    $('#user_doc').attr('src', '<?=IMG?>img/client-proofs/'+resp.data.user_cnic);
                    $('#userName').text(resp.data.user_firstname+' '+resp.data.user_lastname);
                    $('#user_name').text('@'+resp.data.user_firstname+resp.data.user_lastname);
                    $('#userEmail').text(resp.data.user_email);
                    $('#userContact').text(resp.data.user_contact);
                    $('#userLocation').text(resp.data.user_city+' '+resp.data.user_country);
                    $('#userAddress').text(resp.data.user_address);
                    $('#userImage').attr('src', '<?=IMG?>img/client-images/'+resp.data.user_img);
                    $('#userModal').modal('show');

                    var reservations = resp.res;
                    console.log(reservations);
                    $('#reservationsTable').html(resp.res);


                }

            })
        });


        $('.updateUser').click(function(){
            $this = $(this);
            var user_id = $this.parent('td').children('.user_id').val();
            var action = 'updateUser';
            $.post('<?=AJAX?>clientAjax.php',{user_id:user_id, action:action}, function(resp){

                resp = $.parseJSON(resp);
                if(resp.status == true){


                    $('#user_id1').val(resp.data.user_id)
                    $('#user_firstname1').val(resp.data.user_firstname);
                    $('#user_lastname1').val(resp.data.user_lastname);
                    $('#user_email1').val(resp.data.user_email);
                    $('#user_contact1').val(resp.data.user_contact);
                    $('#user_address1').val(resp.data.user_address);
                    $('#user_country1').val(resp.data.user_country);
                    $('#user_city1').val(resp.data.user_city);
                    $('#updateModal').modal('show');


                }

            })

        });

        $('.deleteUser').click(function(){
            $this = $(this);
            var user_id = $this.parent('td').children('.user_id').val();
            var action = 'deleteUser';
            $.post('<?=AJAX?>clientAjax.php',{user_id:user_id, action:action}, function(resp){

                resp = $.parseJSON(resp);
                if(resp.status == true){

                    $this.parent('td').parent('tr').fadeOut('slow', function(){});

                }

            })

        });

        $('#updateThisUser').click(function(){
            
            var user_id = $('#user_id1').val();
            var user_firstname = $('#user_firstname1').val();
            var user_lastname = $('#user_lastname1').val();
            var user_email = $('#user_email1').val();
            var user_contact = $('#user_contact1').val();
            var user_address = $('#user_address1').val();
            var user_country = $('#user_country1').val();
            var user_city = $('#user_city1').val();
            var action = 'updateThisUser';
            
            $.post('<?=AJAX?>clientAjax.php',{user_id:user_id, user_firstname:user_firstname, user_lastname:user_lastname, user_email:user_email, user_contact:user_contact, user_address:user_address, user_country:user_country, user_city:user_city, action:action}, function(resp){

                resp = $.parseJSON(resp);
                if(resp.status == true){

                    $('#updateModal').modal('hide');


                }

            })

        });


    });
</script>
<!-- The Modal -->
<div class="modal fade" id="userModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">User Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            
        <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18" id="profileTabs">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <i class="green ace-icon fa fa-user bigger-120"></i>
                        Profile
                    </a>
                </li>
                <?php if (isset($_SESSION['login_owner'])): ?>
                <li style="display: none;">
                    <a data-toggle="tab" href="#feed">
                        <i class="orange ace-icon fa fa-rss bigger-120"></i>
                        Reservations
                    </a>
                </li>

                <li style="display: none;">
                    <a data-toggle="tab" href="#friends">
                        <i class="blue ace-icon fa fa-usd bigger-120"></i>
                        Payment History
                    </a>
                </li>
                <?php endif ?>
            </ul>

            <div class="tab-content no-border padding-24">
                <div id="home" class="tab-pane in active">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 center">
                            
                                <img style="border-radius:3px;height:230px;" alt=" Avatar" id="userImage" src="http://bootdey.com/img/Content/avatar/avatar6.png">
                            

                            <div class="space space-4"></div>

                            <!-- <a href="#" class="btn btn-sm btn-block btn-success">
                                <i class="ace-icon fa fa-plus-circle bigger-120"></i>
                                <span class="bigger-110">Add as a friend</span>
                            </a>

                            <a href="#" class="btn btn-sm btn-block btn-hms-red">
                                <i class="ace-icon fa fa-envelope-o bigger-110"></i>
                                <span class="bigger-110">Send a message</span>
                            </a> -->
                        </div><!-- /.col -->

                        <div class="col-xs-12 col-sm-5">
                            <h4 class="blue">
                                <span class="middle" id="userName"></span>

                                <!-- <span class="label label-purple arrowed-in-right">
                                    <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
                                    online
                                </span> -->
                            </h4>

                            <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Username </div>

                                    <div class="profile-info-value">
                                        <span id="user_name"></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Location </div>

                                    <div class="profile-info-value">
                                        <i class="fa fa-map-marker light-orange bigger-110"></i>
                                        <span id="userLocation"></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Email </div>

                                    <div class="profile-info-value">
                                        <span id="userEmail"></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Contact </div>

                                    <div class="profile-info-value">
                                        <span id="userContact">Contact</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Address </div>

                                    <div class="profile-info-value">
                                        <span id="userAddress"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="hr hr-8 dotted"></div>

                            <!-- <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Website </div>

                                    <div class="profile-info-value">
                                        <a href="#" target="_blank">www.alexdoe.com</a>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">
                                        <i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
                                    </div>

                                    <div class="profile-info-value">
                                        <a href="#">Find me on Facebook</a>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">
                                        <i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
                                    </div>

                                    <div class="profile-info-value">
                                        <a href="#">Follow me on Twitter</a>
                                    </div>
                                </div>
                            </div> -->
                        </div><!-- /.col -->
                        <div class="col-sm-4">
                            <img id="user_doc" class="img-responsive" src="" style="width:100%;height:230px;border-radius:3px;">
                        </div>
                    </div><!-- /.row -->

                    <div class="space-20"></div>
                </div><!-- /#home -->

                <div id="feed" class="tab-pane">
                <input id="input1" type="text" class="form-control" placeholder="&#128269; Filter By Any Field" style="width: 20%;display:inline-block;float:right;">
                <br><br>
                    <table class="table table-bordered table-hovered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                        <thead>
                            <tr role="row" style="text-align:center;">
                                <!-- <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 209px;">Rooms</th> -->
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 122px;">Check-In</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 122px;">Check-Out</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Facilities</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 154px;">No. Of Adults</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 122px;">No. Of Children</th>
                                <th style="width: 15%;text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="reservationsTable">
                        </tbody>
                    </table>

                </div><!-- /#feed -->

                <div id="friends" class="tab-pane">
                <input id="input2" type="text" class="form-control" placeholder="&#128269; Filter By Any Field" style="width: 20%;display:inline-block;float:right;">
                <br><br>
                   <table id="bootstrap-data-table-export" class="table table-bordered table-hovered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                        <thead>
                            <tr role="row" style="text-align:center;">
                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 209px;">Total</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 349px;">Discount</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 154px;">Balance</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 122px;">Paid</th>
                                <!-- <th style="width: 10%;text-align: center;">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody id="paymentsTable">
                        </tbody>
                    </table> 
                </div><!-- /#friends -->

            </div>
        </div>
        </div>                

      </div>


    </div>
  </div>
</div>



<div class="modal fade" id="updateModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title"><i class="fa fa-user"></i> Update User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <input type="hidden" id="user_id1">
            <div class="row">
                <div class="col-md-3">
                    <label><h6>First Name</h6></label>
                </div>
                <div class="col-md-9">
                    <input type="text" id="user_firstname1" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label><h6>Last Name</h6></label>
                </div>
                <div class="col-md-9">
                    <input type="text" id="user_lastname1" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label><h6>Email</h6></label>
                </div>
                <div class="col-md-9">
                    <input type="text" id="user_email1" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label><h6>Contact</h6></label>
                </div>
                <div class="col-md-9">
                    <input type="text" id="user_contact1" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label><h6>Address</h6></label>
                </div>
                <div class="col-md-9">
                    <input type="text" id="user_address1" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label><h6>Country</h6></label>
                </div>
                <div class="col-md-9">
                    <input type="text" id="user_country1" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label><h6>City</h6></label>
                </div>
                <div class="col-md-9">
                    <input type="text" id="user_city1" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <button class="btn btn-hms-red btn-sm" id="updateThisUser"><i class="fa fa-upload"></i> Update</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {

        $("#input1").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#reservationsTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $("#input2").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#paymentsTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $(document).on('click', '.paymentHistory', function() {
            
            $this = $(this);

            var res_id  = $this.parent('td').children('.res_id').val();

            var action = 'getPayment';

            $.post('<?=AJAX?>clientAjax.php', {res_id:res_id, action:action}, function(resp){

                resp = $.parseJSON(resp);

                if(resp.status == true){

                    $('#paymentsTable').html(resp.data);
                    $('#profileTabs a[href="#friends"]').tab('show');


                }
            });

        });
    });

</script>