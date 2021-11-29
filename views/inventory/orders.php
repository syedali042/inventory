<div class="container">
    <div class="card">
      <input type="hidden" id="testss" value="1">
        <div class="card-header">
            <strong class="card-title">Orders</strong>

            <strong class="card-title" style="float: right;">
              <span style="font-size: 15px;" class="badge badge-success"> Total Paid : Rs.<?=$totalPaid?>/- </span></strong>
            <strong class="card-title" style="float: right;">
              <span style="font-size: 15px;" class="badge badge-danger"> Total Discount : Rs.<?=$totalDiscount?>/- </span>&nbsp; &nbsp;
            </strong>
            <strong class="card-title" style="float: right;">
              <span style="font-size: 15px;" class="badge badge-info"> Profit: Rs.<?=$totalPaid-$totalDiscount?>/- </span>
            &nbsp; &nbsp;</strong>           
        </div>
        <div class="card-body">
            <div id="bootstrap-data-table-export_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="container" id="top-row">
                    <a href="pos?hotel_id=<?=$_GET['hotel_id']?>" class="btn btn-info" ><i class="fa fa-plus"></i> Add New Order</a>
                    <input id="myInput" type="text" class="form-control" placeholder="&#128269; Filter By Any Field" style="width: 20%;display:inline-block;float:right;">
                    <a href="javascript://" id="viewBetDate" class="btn btn-hms-red"><i class="fa fa-calender"></i> View B/w Dates</a>
                    <a href="javascript://" id="viewByDate" class="btn btn-success"><i class="fa fa-calender"></i> View By Date</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                        <thead>
                            <tr role="row">
                                <th style="text-align: center;" class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Order#</th>
                                <!-- <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Products</th>
                                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Quantity</th> -->
                                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Total</th>
                                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Discount</th>
                                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Status</th>
                                <th style="text-align: center;">Actions</th>
                                <!-- <th style="width: 20%;">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php foreach ($orders as $key => $row): ?>
                            <tr role="row" class="odd">
                                <td style="text-align: center;" class="sorting_1">#<?=$row['order_id']?></td>
                                <!-- <td style="text-align: center;"><?=$row['order_products']?></td>
                                <td style="text-align: center;"><?=$row['order_quantity']?></td> -->
                                <td style="text-align: center;"><?=$row['order_total']?></td>
                                <td style="text-align: center;"><?=$row['order_discount']?></td>
                                <td style="text-align: center;"><?=$row['order_status']?></td>
                                <td style="text-align: center;">
                                    <?php if($row['order_status']=='complete'){ ?>
                                         <a href="javascript://" data-id="<?=$row['order_id']?>" class="btn btn-info btn-sm viewOrder"><i class="fa fa-eye"></i>View</a>
                                    <?php }else if($row['order_status']=='saved'){ ?>
                                        <a href="javascript://" data-id="<?=$row['order_id']?>" class="btn btn-danger btn-sm Deliver-Saved-Order"><i class="fa fa-logout"></i>Deliver </a>
                                        <a href="javascript://" data-id="<?=$row['order_id']?>" class="btn btn-info btn-sm viewOrder"><i class="fa fa-eye"></i> View</a>
                                    <?php }else if($row['order_status']=='delivered'){ ?>
                                        <a href="javascript://" data-id="<?=$row['order_id']?>" class="btn btn-hms-red btn-sm Checkout-Saved-Order"><i class="fa fa-logout"></i>CheckOut </a>
                                        <a href="javascript://" data-id="<?=$row['order_id']?>" class="btn btn-info btn-sm viewOrder"><i class="fa fa-eye"></i> View</a>
                                    <?php } ?>
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

<div id="viewOrderModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title"><i class="fas fa-truck-moving"></i> Order ID : # </h4>
        <span class="badge badge-success" id="viewed_order_status">
          
        </span>
      </div>
      <div class="modal-body"> 

        <div class="table-responsive">
            
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>
                  Products</th>
                  <th>
                  Quantity</th>
                  <th>
                  Unit Price</th>
                  <th>
                  Total Price</th>
                </tr>
              </thead>
              <tbody id="invoiceTable">
                  
              </tbody>
            </table>
            <table width="100%" cellspacing="0" cellpadding="5" border="0" align="center">
              <tbody>
                <tr>
                  <td style="font-size:15px; line-height:20px; color:#404040; font-weight: bold;">Total</td>
                  <td style="font-size:16px; line-height:20px; color: #404040; font-weight: bold;" valign="top" align="right" id="order_total"></td>
                </tr>
                <tr>
                  <td style="font-size:15px; line-height:20px; color:#404040; font-weight: bold;">Discount</td>
                  <td style="font-size:16px; line-height:20px; color: #404040; font-weight: bold;" valign="top" align="right" id="order_discount"></td>
                </tr>
                <tr>
                  <td style="font-size:15px; line-height:20px; color:#404040; font-weight: bold;" id="paidAmountLabel">Total Paid</td>
                  <td style="font-size:16px; line-height:20px; color: #404040; font-weight: bold;" valign="top" align="right" id="totalPaid"></td>
                </tr>
              </tbody>
            </table>

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

    });

    $('.Checkout-Saved-Order').on('click', function() {
        
        $this = $(this);
        var order_id = $this.attr('data-id');
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var action = 'Checkout-Saved-Order';

        $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, order_id:order_id, action:action}, function(resp) {
            
            resp = $.parseJSON(resp);

            if(resp.status==true){
                $this.fadeOut('slow', function() {
                });
            }

        });
    });

    $('.Deliver-Saved-Order').on('click', function() {
        
        $this = $(this);
        var order_id = $this.attr('data-id');
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var action = 'Deliver-Saved-Order';

        $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, order_id:order_id, action:action}, function(resp) {
            
            resp = $.parseJSON(resp);

            if(resp.status==true){
                $this.fadeOut('slow', function() {
                });
            }

        });
    });

    $('.viewOrder').click(function(){

        $this = $(this);
        var order_id = $this.attr('data-id');
        var hotel_id = '<?=$_GET['hotel_id']?>';
        var action = 'generateInvoice';

          $.post('<?=AJAX?>inventoryAjax.php', {hotel_id:hotel_id, order_id:order_id, action:action}, function(resp) {
            
            resp = $.parseJSON(resp);

            if(resp.status==true){

              if(resp.order_status=='complete'){
                var amountTitle = 'Total Paid';
              }else{
                var amountTitle = 'Have To Paid';
              }

              $('#paidAmountLabel').text(amountTitle);
              $('#invoiceTable').html(resp.data);
              $('#order_total').text('Rs.'+resp.total+'/-'); 
              $('#order_discount').text('Rs.'+resp.discount+'/-'); 
              $('#totalPaid').text('Rs.'+resp.totalPaid+'/-'); 
              $('#viewOrderModal').modal('show');
              $('#modal-title').html('<i class="fas fa-truck-moving"></i> Order ID : #'+order_id);
              $('#viewed_order_status').text(resp.order_status);
            }

          });

    });

        $(document).on('click', '#viewBetDate', function(){

            $('#viewBetDate').after('<input type="date" id="date1" class="form-control" style="width:25%;display: inline-block;">&nbsp;&nbsp;&nbsp;<input type="date" id="date2" class="form-control" style="width:25%;display: inline-block;">&nbsp;&nbsp;&nbsp;<a href="javascript://" id="viewBetweenDate" class="btn btn-hms-red"><i class="fa fa-filter"></i> Filter</a>&nbsp;&nbsp;<a href="javascript://" id="cancelFilteration" class="btn btn-hms-red"><i class="fa fa-time"></i> Cancel</a>');            
            $('#viewBetDate').remove();
        });

        $(document).on('click', '#viewByDate', function(){

            $('#viewByDate').after('<input type="date" id="singleDate" class="form-control" style="width:25%;display: inline-block;">&nbsp;&nbsp;&nbsp;<a href="javascript://" id="viewSingleDate" class="btn btn-hms-red"><i class="fa fa-filter"></i> Filter</a>&nbsp;&nbsp;<a href="javascript://" id="cancelFilteration" class="btn btn-hms-red"><i class="fa fa-time"></i> Cancel</a>');            
            $('#viewByDate').remove();
        });

        $(document).on('click', '#viewSingleDate', function(){

            var singleDate = $('#singleDate').val();
            var hotel_id = '<?=$_GET['hotel_id']?>';
                
            window.open("inventoryOrders?singleDate="+singleDate+"&hotel_id="+hotel_id, "_self");

        });

        $(document).on('click', '#viewBetweenDate', function(){

            var date1 = $('#date1').val();
            var date2 = $('#date2').val();
            var hotel_id = '<?=$_GET['hotel_id']?>';
                
            window.open("inventoryOrders?date1="+date1+"&date2="+date2+"&hotel_id="+hotel_id, "_self");

        });

        $(document).on('click', '#cancelFilteration', function(){

            $this = $(this);

            $this.parent('div').html(function (i, html) {
                return html.replace(/&nbsp;/g, '');
            });
            $('#singleDate').remove();
            $('#viewSingleDate').remove();
            $('#viewByDate').remove();
            $('#date1').remove();
            $('#date2').remove();
            $('#top-row').html('<a href="pos?hotel_id=<?=$_GET['hotel_id']?>" class="btn btn-info" ><i class="fa fa-plus"></i> Add New Order</a> <a href="javascript://" id="viewBetDate" class="btn btn-hms-red"><i class="fa fa-calender"></i> View B/w Dates</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript://" id="viewByDate" class="btn btn-success"><i class="fa fa-calender"></i> View By Date</a><input id="myInput" type="text" class="form-control" placeholder="&#128269; Filter By Any Field" style="width: 20%;display:inline-block;float:right;margin-right:20px;">');
            $('#cancelFilteration').remove();
            $('#viewBetweenDate').remove();
        });
</script>

