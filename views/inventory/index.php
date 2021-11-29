<div class="container">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Products</strong>
        </div>
        <div class="card-body">
            <div id="bootstrap-data-table-export_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="container">
                    <a href="javascript://" class="btn btn-hms-red btn-sm addNewProduct" ><i class="fa fa-plus"></i> Add New Product</a>
                    <input id="myInput" type="text" class="form-control" placeholder="&#128269; Filter By Any Field" style="width: 20%;display:inline-block;float:right;">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Product#</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Title</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Buy Price (Per Unit)</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Sale Price (Per Unit)</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Status</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Stock (Warehouse)</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Stock (POS)</th>
                                <th>Actions</th>
                                <!-- <th style="width: 20%;">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php foreach ($products as $key => $row): ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1">#<?=$row['product_id']?></td>
                                <td><?=$row['product_title']?></td>
                                <td><?=$row['product_buy_price']?></td>
                                <td><?=$row['product_sale_price']?></td>
                                <td><?=$row['product_status']?></td>
                                <td><?=$row['product_quantity']?></td>
                                <td><?=$row['stock_in_pos']?></td>
                                <td>
                                    <a href="javascript://" data-id="<?=$row['product_id']?>" class="btn btn-info btn-sm updateThisProduct"><i class="fa fa-upload"></i>View & Update </a>

                                    <a style="margin-top: 5px;" href="javascript://" data-id="<?=$row['product_id']?>" class="btn btn-hms-red btn-sm transferToPos"><i class="fas fa-truck"></i>Transfer to POS</a>

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
<div id="transferToPosModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title-2"><i class="fa fa-plus"></i> Product ID : </h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
      </div>
      <div class="modal-body"> 

        <div class="row">
            
            <div class="col-md-12">
                
                <input type="number" id="quantityToTransfer" class="form-control" placeholder="Enter Quantity">

                <input type="hidden" id="transferProductId">

            </div>

        </div>

      </div>
      <div class="modal-footer">
            <a href="javascript://" id="tranferThisProduct" class="btn btn-hms-red btn-sm" style="width: 100%;"><i class="fas fa-truck"></i> Transfer</a>
      </div>
    </div>

  </div>
</div>


<div id="AddNewProductModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title"><i class="fa fa-plus"></i> Add New Product</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
      </div>
      <div class="modal-body"> 

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_cat">
                        <h6 style="font-weight: bold;">Product Category</h6>
                    </label>
                    <select id="product_cat" name="product_cat" class="form-control">
                        <option>...</option>
                        <?php foreach ($categories as $key => $row): ?>
                            <option value="<?=$row['cat_id']?>"><?=$row['cat_title']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_supplier">
                        <h6 style="font-weight:bold">Product Supplier</h6>
                    </label>
                    <select id="product_supplier" name="product_supplier" class="form-control">
                        <option>...</option>
                        <?php foreach ($suppliers as $key => $row): ?>
                            <option value="<?=$row['supplier_id']?>"><?=$row['supplier_name']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_title">
                        <h6 style="font-weight:bold">Product Name / Title</h6>
                    </label>
                    <input type="text" name="product_title" class="form-control" id="product_title">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_buy_price">
                        <h6 style="font-weight:bold">Product Buy Price (Unit)</h6>
                    </label>
                    <input type="text" name="product_buy_price" class="form-control" id="product_buy_price">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_sale_price">
                        <h6 style="font-weight:bold">Product Sale Price (Unit)</h6>
                    </label>
                    <input type="text" name="product_sale_price" class="form-control" id="product_sale_price">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_status">
                        <h6 style="font-weight:bold">Product Status</h6>
                    </label>
                    <select id="product_status" name="product_status" class="form-control">
                        <option value="In-Stock">In-Stock</option>
                        <option value="Out-of-Stock">Out-of-Stock</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_front_img">
                        <h6 style="font-weight:bold">Product Front Image</h6>
                        <img src="" style="width: 100%;padding:10px;max-height: 400px;display: none;" alt="img-responsive" class="img" id="view_front_image">
                    </label>
                    <input type="hidden" name="product_front_img" id="product_front_img" style="display: none;">
                    <input type="file" class="form-control" id="up_product_front_img">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_back_img">
                        <h6 style="font-weight:bold">Product Back Image</h6>
                        <img src="" style="width: 100%;padding:10px;max-height: 400px;display: none;" alt="img-responsive" class="img" id="view_back_image">
                    </label>
                    <input type="hidden" name="product_back_img" id="product_back_img" style="display: none;">
                    <input type="file" class="form-control" id="up_product_back_img">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_quantity">
                        <h6 style="font-weight:bold">Stock In Warehouse</h6>
                    </label>
                    <input type="number" class="form-control" name="product_quantity" id="product_quantity">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="stock_in_pos">
                        <h6 style="font-weight:bold">Stock In POS (Point of Sale)</h6>
                    </label>
                    <input type="number" name="stock_in_pos" id="stock_in_pos" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <button style="width: 100%;" type="submit" id="addProduct" class="btn btn-primary btn-sm">
                        Add Product
                    </button>
                    <div id="viewed_product_id" data-id=""></div>
                    <button style="width: 100%;display: none;" type="submit" id="updateProduct" class="btn btn-success btn-sm">
                        Update Product
                    </button>
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

        $('.transferToPos').on('click', function() {
            $this = $(this);
            var hotel_id = '<?=$_GET['hotel_id']?>';
            var product_id = $this.attr('data-id');
            $('#modal-title-2').html('<i class="fa fa-plus"></i> Product ID : '+product_id);
            $('#transferToPosModal').modal('show');
            $('#transferProductId').val(product_id);
        });

        $('#tranferThisProduct').click(function(){

            var hotel_id = '<?=$_GET['hotel_id']?>';
            var product_id = $('#transferProductId').val();
            var quantity = $('#quantityToTransfer').val();
            var action = 'transferProduct';

            $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, product_id:product_id, quantity:quantity, action:action}, function(resp) {
            
                resp = $.parseJSON(resp);

                if(resp.status==true){
                    $('#transferToPosModal').modal('hide');
                    window.open('inventory?hotel_id='+hotel_id, '_self');
                }

            });

        });

        $('.addNewProduct').on('click', function(){

            $('input').val('');
            $('textarea').val('');
            $('select').val('');
            $('#view_front_image').css('display', 'none');
            $('#view_back_image').css('display', 'none');
            $('#modal-title').html('<i class="fa fa-plus"></i> Add New Product');
            $('#AddNewProductModal').modal('show');
            $('#addProduct').css('display', 'block');
            $('#updateProduct').css('display', 'none');

        });
    });


    $("#up_product_front_img").on('change', function(){
        $("#validateButton1").text('Wait File Is Uploading');
        var data = new FormData();
        data.append('main_image', $(this).prop('files')[0]);
        data.append('product_front_img', 'product_front_img');
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
                    $("#product_front_img").val(resp.data);
                    $('#view_front_image').attr('src', '<?=IMG?>img/products/front/'+product.product_front_img);
                    $('#view_front_image').css('display', 'block');
                }
                else
                {
                    $("#validateButton1").text('Upload An Image First');
                }
            }
        });
    });

    $("#up_product_back_img").on('change',function(){
        $("#validateButton1").text('Wait File Is Uploading');
        var data = new FormData();
        data.append('main_image', $(this).prop('files')[0]);
        data.append('product_back_img', 'product_back_img');
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
                    $("#product_back_img").val(resp.data);
                    $('#view_back_image').attr('src', '<?=IMG?>img/products/back/'+product.product_back_img);
                    $('#view_back_image').css('display', 'block');  
                }
                else
                {
                    $("#validateButton1").text('Upload An Image First');
                }
            }
        });
    });


    $('#addProduct').click(function() {
        
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var product_cat =$('#product_cat').val();
        var product_supplier = $('#product_supplier').val();
        var product_title = $('#product_title').val();
        var product_buy_price = $('#product_buy_price').val();
        var product_sale_price = $('#product_sale_price').val();
        var product_front_img = $('#product_front_img').val();
        var product_back_img = $('#product_back_img').val();
        var product_status = $('#product_status').val();
        var stock_in_pos = $('#stock_in_pos').val();
        var product_quantity = $('#product_quantity').val();

        var action = 'addProduct';

        $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, product_cat:product_cat, product_supplier:product_supplier, product_title:product_title, product_buy_price:product_buy_price, product_sale_price:product_sale_price, product_front_img:product_front_img, product_back_img:product_back_img, product_status:product_status, stock_in_pos:stock_in_pos, product_quantity:product_quantity, action:action}, function(resp) {
            
            resp = $.parseJSON(resp);

            if(resp.status==true){
                $('#AddNewProductModal').modal('hide');
            }

        });



    });

    $('.updateThisProduct').click(function(){

        $this = $(this);
        var product_id = $this.attr('data-id');
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var action = 'getProduct';
        $.post('<?=AJAX?>inventoryAjax.php', {product_id:product_id, hotel_id:hotel_id, action:action}, function(resp) {
            
            resp = $.parseJSON(resp);

            if(resp.status==true){

                var product = resp.data;

                $('#product_cat').val(product.product_cat);
                $('#product_supplier').val(product.product_supplier);
                $('#product_title').val(product.product_title);
                $('#product_buy_price').val(product.product_buy_price);
                $('#product_sale_price').val(product.product_sale_price);
                $('#stock_in_pos').val(product.stock_in_pos);
                $('#view_front_image').attr('src', '<?=IMG?>img/products/front/'+product.product_front_img);
                $('#view_back_image').attr('src', '<?=IMG?>img/products/back/'+product.product_back_img);
                $('#product_front_img').val(product.product_front_img);
                $('#product_back_img').val(product.product_back_img);
                $('#product_status').val(product.product_status);
                $('#product_quantity').val(product.product_quantity);
                $('#view_front_image').css('display', 'block');
                $('#view_back_image').css('display', 'block');
                $('#modal-title').html('<i class="fa fa-upload"></i> Update Product');
                $('#AddNewProductModal').modal('show');
                $('#addProduct').css('display', 'none');
                $('#updateProduct').css('display', 'block');
                $('#viewed_product_id').attr('data-id', product.product_id);
            }

        });

    });

    $('#updateProduct').click(function() {
        
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var product_id =$('#viewed_product_id').attr('data-id');
        var product_cat =$('#product_cat').val();
        var product_supplier = $('#product_supplier').val();
        var product_title = $('#product_title').val();
        var product_buy_price = $('#product_buy_price').val();
        var product_sale_price = $('#product_sale_price').val();
        var product_front_img = $('#product_front_img').val();
        var product_back_img = $('#product_back_img').val();
        var product_status = $('#product_status').val();
        var product_quantity = $('#product_quantity').val();
        var stock_in_pos = $('#stock_in_pos').val();
        var action = 'updateProduct';

        $.post('<?=AJAX?>inventoryAjax.php', {product_id:product_id, hotel_id:hotel_id, product_cat:product_cat, product_supplier:product_supplier, product_title:product_title, product_buy_price:product_buy_price, product_sale_price:product_sale_price, product_front_img:product_front_img, product_back_img:product_back_img, product_status:product_status, stock_in_pos:stock_in_pos, product_quantity:product_quantity, action:action}, function(resp) {
            
            resp = $.parseJSON(resp);

            if(resp.status==true){
                $('#AddNewProductModal').modal('hide');
            }

        });



    });
</script>

