<div class="container">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Suppliers</strong>
        </div>
        <div class="card-body">
            <div id="bootstrap-data-table-export_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="container">
                    <a href="javascript://" class="btn btn-hms-red btn-sm addNewSupplier" ><i class="fa fa-plus"></i> Add New Supplier</a>
                    <input id="myInput" type="text" class="form-control" placeholder="&#128269; Filter By Any Field" style="width: 20%;display:inline-block;float:right;">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Supplier#</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Name</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Email</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Contact</th>
                                <th width="31%">Actions</th>
                                <!-- <th style="width: 20%;">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php foreach ($suppliers as $key => $row): ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1">#<?=$row['supplier_id']?></td>
                                <td><?=$row['supplier_name']?></td>
                                <td><?=$row['supplier_email']?></td>
                                <td><?=$row['supplier_contact']?></td>
                                <td>
                                    <a href="javascript://" data-id="<?=$row['supplier_id']?>" class="btn btn-info btn-sm updateThisSupplier"><i class="fa fa-upload"></i>View & Update </a>
                                    &nbsp;
                                    <a href="javascript://" data-id="<?=$row['supplier_id']?>" class="btn btn-danger btn-sm updateThisSupplier"><i class="fas fa-gavel"></i> Order New Stock </a>
                                </td>
                                <!-- <td>
                                    <input type="hidden" class="room_id" value="<?=$room['room_id']?>">
                                    <a href="javascript://" class="btn btn-primary btn-sm viewUser"> <i class="fa fa-spinner"></i> Turn To Vacant</a>
                                    &nbsp;&nbsp; <a href="javascript://" class="btn btn-warning btn-sm"> <i class="fa fa-upload"></i> Update</a>
                                     &nbsp;&nbsp; <a href="javascript://" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Delete</a>
                                </td> -->
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="AddNewSupplierModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title"><i class="fa fa-plus"></i> Add New Supplier</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
      </div>
      <div class="modal-body"> 
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="supplier_img">
                                <h6 style="font-weight:bold">Supplier Image</h6>
                                <img src="" style="width: 100%;padding:10px;max-height: 400px;display: none;" alt="img-responsive" class="img" id="view_supplier_image">
                            </label>
                            <input type="hidden" name="supplier_img" id="supplier_img" style="display: none;">
                            <input type="file" class="form-control" id="up_supplier_img">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="supplier_name">
                                <h6 style="font-weight:bold">Supplier Name</h6>
                            </label>
                            <input type="text" name="supplier_name" class="form-control" id="supplier_name">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="supplier_email">
                                <h6 style="font-weight:bold">Supplier Email</h6>
                            </label>
                            <input type="text" name="supplier_email" id="supplier_email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="supplier_contact">
                                <h6 style="font-weight:bold">Supplier Contact</h6>
                            </label>
                            <input type="text" id="supplier_contact" name="supplier_contact" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="supplier_address">
                                <h6 style="font-weight:bold;">Supplier Address</h6>
                            </label>
                            <input type="text" class="form-control" name="supplier_address" id="supplier_address">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button style="width: 100%;" type="submit" id="addSupplier" class="btn btn-primary btn-sm">
                                Add Supplier
                            </button>
                            <div id="viewed_supplier_id" data-id=""></div>
                            <button style="width: 100%;display: none;" type="submit" id="updateSupplier" class="btn btn-success btn-sm">
                                Update Supplier
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $('.addNewSupplier').on('click', function(){

            $('input').val('');

            $('#view_supplier_image').css('display', 'none');
            $('textarea').val('');
            $('select').val('');
            $('#view_front_image').css('display', 'none');
            $('#view_back_image').css('display', 'none');
            $('#modal-title').html('<i class="fa fa-plus"></i> Add New Supplier');
            $('#AddNewSupplierModal').modal('show');
            $('#addProduct').css('display', 'block');
            $('#updateProduct').css('display', 'none');

        });
    });


    $("#up_supplier_img").on('change', function(){
        $("#validateButton1").text('Wait File Is Uploading');
        var data = new FormData();
        data.append('main_image', $(this).prop('files')[0]);
        data.append('supplier_image', 'supplier_image');
        $.ajax({
            type: 'POST',
            processData: false,
            contentType: false,
            data: data,
            url: '<?=AJAX?>inventoryAjax.php',
            dataType : 'json',
            success: function(resp){
                // resp = $.parseJSON(resp);
                // console.log(resp.data);
                if (resp.status == true)
                {   
                    $("#supplier_img").val(resp.data);
                    $('#view_supplier_image').attr('src', '<?=IMG?>img/suppliers/'+resp.data);
                    $('#view_supplier_image').css('display', 'block');
                }
                else
                {
                    $("#validateButton1").text('Upload An Image First');
                }
            }
        });
    });

    $('#addSupplier').click(function() {
        
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var supplier_name =$('#supplier_name').val();
        var supplier_contact =$('#supplier_contact').val();
        var supplier_address =$('#supplier_address').val();
        var supplier_email =$('#supplier_email').val();
        var supplier_img =$('#supplier_img').val();
        var action = 'addSupplier';

        $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, supplier_name:supplier_name, supplier_contact:supplier_contact, supplier_email:supplier_email, supplier_address:supplier_address, supplier_img:supplier_img ,action:action}, function(resp) {
            


        });



    });

    $('.updateThisSupplier').click(function(){

        $this = $(this);
        var supplier_id = $this.attr('data-id');
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var action = 'getSupplier';
        $.post('<?=AJAX?>inventoryAjax.php', {supplier_id:supplier_id, hotel_id:hotel_id, action:action}, function(resp) {
            
            resp = $.parseJSON(resp);

            if(resp.status==true){

                var supplier = resp.data;

                $('#supplier_name').val(supplier.supplier_name);
                $('#supplier_email').val(supplier.supplier_email);
                $('#supplier_contact').val(supplier.supplier_contact);
                $('#supplier_address').val(supplier.supplier_address);
                $('#supplier_img').val(supplier.supplier_img);
                $('#view_supplier_image').attr('src', '<?=IMG?>img/suppliers/'+supplier.supplier_img);
                $('#view_supplier_image').css('display', 'block');
                $('#modal-title').html('<i class="fa fa-upload"></i> Update Supplier');
                $('#AddNewSupplierModal').modal('show');
                $('#addSupplier').css('display', 'none');
                $('#updateSupplier').css('display', 'block');
                $('#viewed_supplier_id').attr('data-id', supplier.supplier_id);
            }

        });

    });

    $('#updateSupplier').click(function() {
        
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var supplier_id =$('#viewed_supplier_id').attr('data-id');
        var supplier_name =$('#supplier_name').val();
        var supplier_contact =$('#supplier_contact').val();
        var supplier_address =$('#supplier_address').val();
        var supplier_email =$('#supplier_email').val();
        var supplier_img =$('#supplier_img').val();
        var action = 'updateSupplier';

        $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, supplier_id:supplier_id, supplier_name:supplier_name, supplier_contact:supplier_contact, supplier_email:supplier_email, supplier_address:supplier_address, supplier_img:supplier_img ,action:action}, function(resp) {
            
            resp = $.parseJSON(resp);

            if(resp.status==true){
                $('#AddNewSupplierModal').modal('hide');
            }

        });



    });
</script>

