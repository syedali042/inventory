<div class="container">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Point Of Sale</strong>
        </div>
        <div class="card-body">
            <div id="bootstrap-data-table-export_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="container">
                    <!-- <a href="javascript://" class="btn btn-hms-red btn-sm addNewProduct" ><i class="fa fa-plus"></i> Add New Product</a> -->
                    <input id="myInput" type="text" class="form-control" placeholder="&#128269; Filter By Any Field" style="width: 20%;display:inline-block;">
                    <a href="javascript://" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#returnOrderModal"><i class="fa fa-plus"></i> Return Order</a>
                    <a href="javascript://" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#requestProductModal"><i class="fa fa-plus"></i> Request A Product</a>&nbsp;&nbsp;

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-7 table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Pro#</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Stock</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Title</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Price</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Qua.</th>
                                <th>Actions</th>
                                <!-- <th style="width: 20%;">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php foreach ($products as $key => $row): ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1 product_id"><?=$row['product_id']?></td>
                                <td class="stock_in_pos"><?=$row['stock_in_pos']?></td>
                                <td class="product_title"><?=$row['product_title']?></td>
                                <td class="product_sale_price"><?=$row['product_sale_price']?></td>
                                <td class="select_quantity"><input type="number" class="form-control selected_quantity"></td>
                                <td>
                                    <a href="javascript://" data-id="<?=$row['product_id']?>" class="btn btn-success btn-sm addToCart"><i class="fas fa-cart-plus"></i> Add to Cart</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                </div>
                
                <div class="col-md-5 table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Title</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Price</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                                <!-- <th style="width: 20%;">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody id="cartTable">
                                
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">
                                    <center>
                                        <a href="javascript://" id="viewDiscountInput" class="btn btn-info btn-sm">Discount</a>
                                        <input type="number" id="givenDiscount" value="0" class="form-control" style="display: none;">
                                        <!-- <button class="btn btn-danger btn-sm" id="doneDiscountInput" style="display: none;">Done</button> -->
                                    </center>
                                </th>
                                <th colspan="1">
                                    <center id="grandTotal">
                                        Grand Total 
                                    </center>
                                </th>
                                <td>
                                    <center>
                                        <a href="javascript://" class="btn btn-primary btn-sm saveOrder">Save</a>
                                    </center>
                                </td>
                                <td colspan="1">
                                    <center>
                                        <a href="javascript://" class="btn btn-info btn-sm checkOut">CheckOut</a>
                                    </center>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div id="returnOrderModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Return Order</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
      </div>
      <div class="modal-body"> 

        <div class="col-md-12" id="selectOrder">
          <div class="form-group">
            <!-- <center><label style="font-size: 28px;">Select Client</label></center> -->

            <input style="height: 50px;border-left: none;border-right: none;border-top: none;" type="text" id="returnOrderInput" class="form-control" placeholder="Select Order" autocomplete="off">
          </div>
          <div id="returnOrderTableDiv" class="table-responsive" style="display:none;position: absolute;z-index: 1;background-color: #fff;width: 95%;max-height: 400px;">
              <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Order#</th>
                            <th width="15%">Dated</th>
                            <th>Products</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Discount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="returnOrderTable">
                       <?=$returnOrders?>
                    </tbody>
                </table>
          </div>
        </div>

        <div class="col-md-12" id="returnOrder">
          
          <div id="returnOrderTableOrderDiv" class="table-responsive">
              <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <th>Products</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Return Quantity</th>
                        </tr>
                    </thead>
                    <tbody id="returnOrderTbody">
                       
                    </tbody>
                </table>

                <center><a href="javascript://" data-id="0" id="updateOrder" class="btn btn-primary btn-sm"> Return</a></center>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="requestProductModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Request Product</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
      </div>
      <div class="modal-body"> 

        <div class="col-md-7" id="selectOrder">
          <input style="height: 50px;border-left: none;border-right: none;border-top: none;" type="text" id="requestProductInput" class="form-control" placeholder="Filter Products" autocomplete="off">
          <div id="returnOrderTableDiv" class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">Pro #</th>
                            <th>Title</th>
                            <th width="20%">Quantity</th>
                            <th width="25%">Add To List</th>
                        </tr>
                    </thead>
                    <tbody id="requestProductTable">
                        <?php foreach ($products as $key => $row) { ?>
                            <tr> 
                                <td>#<?=$row['product_id']?></td>   
                                <td class="productTitle"><?=$row['product_title']?></td>   
                                <td class="productQuantity"><input type="number" class="requested_quantity form-control"></td>
                                <td><a style="width: 100%;" href="javascript://" class="btn btn-primary btn-sm addToRequestList" data-id="<?=$row['product_id']?>"> Add</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
          </div>
        </div>
        <div class="col-md-5" id="selectOrder">
          <div id="returnOrderTableDiv" class="table-responsive">
            <label style="margin-top: 17px;">Selected Products</label>
            <ol style="list-style-type: decimal;padding-top:20px;margin-left:20px;" id="requestedProductList">
                
            </ol>
            <button style="width: 100%;" class="btn btn-info btn-sm sendRequest"><i class="fa fa-upload"></i> Send</button>
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

    $(document).on('click', '.addToRequestList', function() {
    
        $this = $(this);

        var productId = $this.attr('data-id');
        var productTitle = $this.parent('td').parent('tr').children('.productTitle').text();
        var productQuantity = $this.parent('td').parent('tr').children('.productQuantity').children('.requested_quantity').val();
        
        $('#requestedProductList').append('<li style="padding:5px;"><input type="hidden" class="requestedProductQuantity" value="'+productQuantity+'"><input type="hidden" class="requestedProductId" value="'+productId+'">'+productTitle+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;('+productQuantity+')<a href="javascript://" class="removeProductFromRequestList" style="float:right;color:#ac0700;margin-top: 2px;"><i class="fas fa-times"></i></a></li>');

        // console.log(productTitle);
        // console.log(product_id);
        // console.log(productQuantity);

    });

    $(document).on('click', '.removeProductFromRequestList', function() {
        $this = $(this);
        $this.parent('li').remove();
    });

    $(document).on('click', '.sendRequest', function() {

         $this = $(this);
         var products = $(".requestedProductId").map(function() {
                    return $(this).val();
                }).get();
         var quantity = $(".requestedProductQuantity").map(function() {
                    return $(this).val();
                }).get();

         var action = 'productsRequest';

         var hotel_id = '<?=$_GET['hotel_id']?>';

         $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, products:products, quantity:quantity, action:action}, function(resp) {
            
            resp = $.parseJSON(resp);
            if(resp.status==true){

                $this.addClass('btn-success');
                $this.html('<i class="fas fa-check"></i> Request Sent');
                $this.removeClass('btn-info');
                $this.removeClass('sendRequest');

                setTimeout(function(){
                    $('#requestProductModal').modal('hide');
                }, 1000);
            }

         });
    });

    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $("#requestProductInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#requestProductTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $("#returnOrderInput").on("click", function() {
            $('#returnOrderTableDiv').slideToggle('show');
            $('#returnOrderInput').attr('placeholder', 'Search product id, date....');
        });
        $("#returnOrderInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#returnOrderTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

        });

        $('#viewDiscountInput').on('click', function(){

            $('#givenDiscount').css('display', 'block');
            $('#viewDiscountInput').css('display', 'none');

        }); 

        $('.addToCart').on('click', function(){
            $this = $(this);

            var product_id = $this.parent('td').parent('tr').children('.product_id').text();
            var stock_in_pos = $this.parent('td').parent('tr').children('.stock_in_pos').text();
            var product_title = $this.parent('td').parent('tr').children('.product_title').text();
            var product_sale_price = $this.parent('td').parent('tr').children('.product_sale_price').text();
            var selected_quantity = $this.parent('td').parent('tr').children('.select_quantity').children('.selected_quantity').val();
            var total = product_sale_price*selected_quantity;

            console.log(parseInt(stock_in_pos)+'>'+parseInt(selected_quantity)+'='+parseInt(stock_in_pos)>parseInt(selected_quantity));

            if((parseInt(selected_quantity)>0) && (parseInt(stock_in_pos)>parseInt(selected_quantity) || parseInt(stock_in_pos)===parseInt(selected_quantity))){

                $('#cartTable').append('<tr><input type="hidden" class="cart_product_id" value="'+product_id+'"><td class="cart_product_title">'+product_title+'</td><td class="cart_product_sale_price">'+product_sale_price+'</td><td class="cart_product_quantity">'+selected_quantity+'</td><td class="cart_product_total">'+total+'</td><td style="display:flex;align-items:center;justify-content:center;font-size:35px;font-weight:bold;"><a href="javascript://" class="removeProductFromCart" style="color:#eb4034;"><i class="fas fa-times"></i></a></td></tr>');

                var grandTotal = $(".cart_product_total").map(function() {
                    return $(this).text();
                }).get();

                var sum = grandTotal.reduce(function(a, b){
                    return parseInt(a) + parseInt(b);
                }, 0);

                var givenDiscount = $('#givenDiscount').val();
                $('#grandTotal').text(sum-parseInt(givenDiscount));

            }else{
                alert('Select Valid Quantity');
                return false;

            }

        });
    });


    $('.returnOrder').click(function(){

        $this = $(this);
        var order_id = $this.attr('data-id');
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var action = 'getOrder';
        $.post('<?=AJAX?>inventoryAjax.php', {order_id:order_id, hotel_id:hotel_id, action:action}, function(resp) {
            
            resp = $.parseJSON(resp);

            if(resp.status==true){

                var order = resp.data;
                $('#returnOrderTbody').html(order);
                // $('#returnOrder').css('display', 'block');
                $('#returnOrderTableDiv').slideToggle('show');
                $('.modal-title').text('Order ID: '+order_id);
                $('#updateOrder').css('display', 'block');
                $('#updateOrder').attr('data-id', order_id);
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

    $('#updateOrder').click(function(){
        $this = $(this);

        var error_quantity = $(".error_quantity").map(function() {
                $(this).remove();
            }).get();

        var order_id = $this.attr('data-id');
        var returned_quantity = $(".returned_quantity").map(function() {
                
            $this = $(this);

            if($this.val()>'0' || $this.val()=='0'){
               
                $this.css('border', '1px solid #dee2e6');
                $this.after('<small class="error_quantity"><small></small></small>');
                return $this.val();


            }else if($this.val()<'0'){  

                $this.css('border', '1px solid #ac0700');
                $this.after('<small class="error_quantity"><small>Invalid Quantity</small></small>');
                $this.val('0');
                return false;                    
            }

        }).get();


        if(order_id!=='0' && order_id !==0 ){

            var product_id = $(".order_product_id").map(function() {
                return $(this).val();
            }).get();

            var ordered_quantity = $(".ordered_quantity").map(function() {
                return $(this).text();
            }).get();

            var i = 0;
            var invalidEntries = [];
            var validEntries = [];
            ordered_quantity.forEach(function(r){

                if(parseInt(returned_quantity[i])<parseInt(r) || parseInt(returned_quantity[i])==parseInt(r)){

                     validEntries.push(returned_quantity[i]);

                }else{
                    invalidEntries.push(returned_quantity[i]);  
                }
                i++;
            });
            var action = 'updateOrder';
            if(invalidEntries==''){
            
                var hotel_id = '<?=$_GET['hotel_id']?>';
                var returnedQuantity = validEntries;
                $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, order_id:order_id, product_id:product_id, returnedQuantity:returnedQuantity, action:action}, function(resp) {
                    
                    resp = $.parseJSON(resp);

                    $('#updateOrder').after('<center><div class="alert alert-success"><strong>Order Returned: </strong> Please return Rs.'+resp.data+'/- to client / customer !</div></center>');
                    $('#updateOrder').css('display', 'none');

                    $('#returnOrderTbody').empty();

                    setTimeout(function(){
                        window.open('inventoryInvoice?hotel_id='+hotel_id+'&order_id='+order_id);
                        $('#returnOrderModal').modal('hide');
                        $('.alert').remove();
                    }, 1000);

                });

            }else{
                alert('Invalid Entry');
            }

        }else{

            console.log('Not Okay');
            alert('No Order Selected');

        }

    });

    $('.checkOut').on('click', function(){

        $this = $(this);

        var hotel_id = '<?=$_GET['hotel_id']?>';

        var products = $(".cart_product_id").map(function() {
                return $(this).val();
            }).get();

        var quantity = $(".cart_product_quantity").map(function() {
                return $(this).text();
            }).get();

        var sale_price = $(".cart_product_total").map(function() {
                return $(this).text();
            }).get();

        var total = $('#grandTotal').text();

        var givenDiscount = $('#givenDiscount').val();

        var order_status = 'complete';

        var action = 'checkout-order';
        $this.removeClass('btn-info');
        $this.addClass('btn-danger');
        $this.text('Wait...');
        $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, products:products, quantity:quantity, sale_price:sale_price, total:total, givenDiscount:givenDiscount, order_status:order_status, action:action}, function(resp) {
            
            resp = $.parseJSON(resp);
            if(resp.status==true){

                setTimeout(function(){
                    window.open('inventoryInvoice?hotel_id='+hotel_id+'&order_id='+resp.data.order_id);
                    $this.removeClass('btn-danger');
                    $this.addClass('btn-success');
                    $this.text('Invoice Printed');
                    window.open('pos?hotel_id='+hotel_id, '_self');
                }, 1000);

            }


        });

    });











    $('.saveOrder').on('click', function(){

        $this = $(this);

        var hotel_id = '<?=$_GET['hotel_id']?>';

        var products = $(".cart_product_id").map(function() {
                return $(this).val();
            }).get();

        var quantity = $(".cart_product_quantity").map(function() {
                return $(this).text();
            }).get();

        var sale_price = $(".cart_product_total").map(function() {
                return $(this).text();
            }).get();

        var total = $('#grandTotal').text();

        var givenDiscount = $('#givenDiscount').val();

        var order_status = 'saved';

        var action = 'save-order';
        $this.removeClass('btn-info');
        $this.addClass('btn-danger');
        $this.text('Saving Order...');
        $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, products:products, quantity:quantity, sale_price:sale_price, total:total, givenDiscount:givenDiscount, order_status:order_status, action:action}, function(resp) {
            
            resp = $.parseJSON(resp);
            if(resp.status==true){

                $this.text('Order Saved');
                $this.removeClass('btn-danger');
                $this.addClass('btn-success');

                setTimeout(function(){
                    window.open('pos?hotel_id='+hotel_id, '_self');
                }, 1500);

            }


        });

    });

</script>

