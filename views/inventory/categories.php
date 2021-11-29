<div class="container">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Categories</strong>
        </div>
        <div class="card-body">
            <div id="bootstrap-data-table-export_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="container">
                    <a href="javascript://" class="btn btn-hms-red btn-sm addNewCategory" ><i class="fa fa-plus"></i> Add New Category</a>
                    <input id="myInput" type="text" class="form-control" placeholder="&#128269; Filter By Any Field" style="width: 20%;display:inline-block;float:right;">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Category#</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Title</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Description</th>
                                <th>Actions</th>
                                <!-- <th style="width: 20%;">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php foreach ($categories as $key => $row): ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1">#<?=$row['cat_id']?></td>
                                <td><?=$row['cat_title']?></td>
                                <td><?=$row['cat_description']?></td>
                                <td>
                                    <a href="javascript://" data-id="<?=$row['cat_id']?>" class="btn btn-info btn-sm updateThisCategory"><i class="fa fa-upload"></i>View & Update </a>
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

<div id="AddNewCategoryModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title"><i class="fa fa-plus"></i> Add New Product</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
      </div>
      <div class="modal-body"> 
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cat_title">
                                <h6 style="font-weight:bold">Category Title</h6>
                            </label>
                            <input type="text" name="cat_title" class="form-control" id="cat_title">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cat_description">
                                <h6 style="font-weight:bold">Category Description</h6>
                            </label>
                            <input type="text" name="cat_description" class="form-control" id="cat_description">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button style="width: 100%;" type="submit" id="addCategory" class="btn btn-primary btn-sm">
                                Add Category
                            </button>
                            <div id="viewed_cat_id" data-id=""></div>
                            <button style="width: 100%;display: none;" type="submit" id="updateCategory" class="btn btn-success btn-sm">
                                Update Category
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

        $('.addNewCategory').on('click', function(){

            $('input').val('');
            $('textarea').val('');
            $('select').val('');
            $('#modal-title').html('<i class="fa fa-plus"></i> Add New Product');
            $('#AddNewCategoryModal').modal('show');
            $('#addCategory').css('display', 'block');
            $('#updateCategory').css('display', 'none');

        });
    });

    $('#addCategory').click(function() {
        
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var cat_title =$('#cat_title').val();
        var cat_description =$('#cat_description').val();
        var action = 'addCategory';

        $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, cat_title:cat_title, cat_description:cat_description,action:action}, function(resp) {
            
            resp = $.parseJSON(resp);

            if(resp.status==true){
                $('#AddNewCategoryModal').modal('hide');
            }

        });
    });

    $('.updateThisCategory').click(function(){

        $this = $(this);
        var cat_id = $this.attr('data-id');
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var action = 'getCategory';
        $.post('<?=AJAX?>inventoryAjax.php', {cat_id:cat_id, hotel_id:hotel_id, action:action}, function(resp) {
            
            resp = $.parseJSON(resp);

            if(resp.status==true){

                var cat = resp.data;

                $('#cat_title').val(cat.cat_title);
                $('#cat_description').val(cat.cat_description);
                $('#modal-title').html('<i class="fa fa-upload"></i> Update Category');
                $('#AddNewCategoryModal').modal('show');
                $('#addCategory').css('display', 'none');
                $('#updateCategory').css('display', 'block');
                $('#viewed_cat_id').attr('data-id', cat.cat_id);
            }

        });

    });

    $('#updateCategory').click(function() {
        
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var cat_id =$('#viewed_cat_id').attr('data-id');
        var cat_title =$('#cat_title').val();
        var cat_description =$('#cat_description').val();
        var action = 'updateCategory';

        $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, cat_id:cat_id, cat_title:cat_title, cat_description:cat_description, action:action}, function(resp) {
            
            resp = $.parseJSON(resp);

            if(resp.status==true){
                $('#AddNewCategoryModal').modal('hide');
            }

        });



    });
</script>

