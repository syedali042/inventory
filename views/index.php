<?php
// if(!isset($_SERVER['HTTPS'])){
//      header('Location: https://easystay.com.pk');
//  }
// if(!isset($_SESSION['login_owner'])){
//     var_dump($_SESSION['login_owner']);
//     echo "<script>
//         window.open('login','_self');
//     </script>";
// } 
    function dateConvert($date){
        $Month = date("F", strtotime($date));
        $Date = date("d", strtotime($date));
        $Year = date("y", strtotime($date));
        return $Month.' '.$Date.', 20'.$Year;
    }
    date_default_timezone_set("Asia/Karachi");
    $currentDate = date('Y-m-d');
?>   
    <style type="text/css">
        .border-white{
            border-color:white !important;
        }
        .text-white{
            color:white !important;
        }
    </style>
       <?php if(!isset($_GET['hotel_id'])){header('Location: welcome');} ?>
    <div class="content mt-3">
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left" style="display: flex;align-items: center;justify-content: center;">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <!-- <li class="active">
                                <a href="javascript://" id="generate-today-report" class="btn btn-sm">
                                    <div>
                                        <center id="currentDateSpinner" style="display: none;">
                                        <div class="spinner-border" role="status" style="margin-top: 5px;display: flex;align-items: center;justify-content: center;">
                                          <span class="sr-only">Loading...</span>
                                        </div>Generating PDF....
                                        </center>
                                        <div class="card-body" style="padding: 0 !important;">
                                            <div class="stat-widget-one">
                                                <div class="dib">
                                                    <i class="fa fa-calendar text-success border-success" style="font-size:14px;"></i>
                                                    <div class="stat-text" style="display: inline-block;font-size:10px;">
                                                        &nbsp;Generate Today Report
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li> -->
                            <li class="active">
                                <a href="javascript://" id="" class="btn btn-sm">
                                    <div>
                                        <center id="currentDateSpinner" style="display: none;">
                                        <div class="spinner-border" role="status" style="margin-top: 5px;display: flex;align-items: center;justify-content: center;">
                                          <span class="sr-only">Loading...</span>
                                        </div>Generating PDF....
                                        </center>
                                        <div class="card-body" style="padding: 0 !important;">
                                            <div class="stat-widget-one">
                                                <div class="dib">
                                                    <div class="stat-text" style="display: inline-block;font-size:14px;">
                                                        <form action="inventory?hotel_id=<?=$_GET['hotel_id']?>" method="POST">
                                                        &nbsp;<button type="submit" class="btn btn-primary btn-sm" name="getPosShortProducts">POS Short Products <span class="badge badge-secondary"><?=count($getPosShortProducts)?></span></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="active">
                                <a href="javascript://" id="" class="btn btn-sm">
                                    <div>
                                        <center id="currentDateSpinner" style="display: none;">
                                        <div class="spinner-border" role="status" style="margin-top: 5px;display: flex;align-items: center;justify-content: center;">
                                          <span class="sr-only">Loading...</span>
                                        </div>Generating PDF....
                                        </center>
                                        <div class="card-body" style="padding: 0 !important;">
                                            <div class="stat-widget-one">
                                                <div class="dib">                                   
                                                    <div class="stat-text" style="display: inline-block;font-size:14px;">
                                                        <form action="inventory?hotel_id=<?=$_GET['hotel_id']?>" method="POST">
                                                            &nbsp;<button type="submit" class="btn btn-success btn-sm" name="getWarehouseShortProducts">Warehouse Short Products <span class="badge badge-secondary"><?=count($getWarehouseShortProducts)?></span></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
    </div>
    <br><br>
    <!-- <div class="dashboard-heading">
        <label>
            <h3 style="font-weight: bold;padding: 15px;">Inventory</h3>
        </label>
    </div> -->

    <a href="inventoryOrders?singleDate=<?=$currentDate?>&hotel_id=<?=$_GET['hotel_id']?>">
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body p-0 clearfix">
                <i class="fas fa-truck bg-info p-4 font-2xl mr-3 float-left text-light"></i>
                <div class="h5 text-info mb-0 pt-3"><?=count($dashboardTodayOrders)?></div>
                <div class="text-muted text-uppercase font-weight-bold font-xs small">Today Orders</div>
            </div>
        </div>
    </div>
    </a>

    
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="p-0 clearfix">
                <i class="fas fa-money-check-alt bg-primary p-4 font-2xl mr-3 float-left text-light"></i>
                <?php
                    $totalSale = 0;
                    $totalDiscount = 0;
                    foreach ($dashboardTodayOrders as $key => $row) {
                        $totalSale += $row['order_total'];
                        $totalDiscount += $row['order_discount'];
                    }
                    $totalWithoutDiscount = $totalSale - $totalDiscount;
                ?>
                <div class="h5 text-primary mb-0 pt-3"><?=$totalWithoutDiscount?></div>
                <div class="text-muted text-uppercase font-weight-bold font-xs small">Today Sale</div>
            </div>
        </div>
    </div>


    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="p-0 clearfix">
                <i class="fas fa-file-invoice-dollar bg-warning p-4 font-2xl mr-3 float-left text-light"></i>
                <?php
                    $totalExpenses = 0;
                    foreach ($dashboardTodayExpenses as $key => $row) {
                        $totalExpenses += $row['exp_amount'];
                    }
                ?>
                <div class="h5 text-warning mb-0 pt-3"><?=$totalExpenses?></div>
                <div class="text-muted text-uppercase font-weight-bold font-xs small">Today Expenses</div>
            </div>
        </div>
    </div>


    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="p-0 clearfix">
                <i class="fas fa-hand-holding-usd bg-danger p-4 font-2xl mr-3 float-left text-light"></i>
                <?php 
                    $profit = $totalWithoutDiscount - $totalExpenses;
                ?>
                <div class="h5 text-danger mb-0 pt-3"><?=$profit?></div>
                <div class="text-muted text-uppercase font-weight-bold font-xs small">Today Profit</div>
            </div>
        </div>
    </div>


    <a href="inventory?hotel_id=<?=$_GET['hotel_id']?>">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="ti-server text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">Products</div>
                                <div class="stat-text">Total: <?=count($dashboardCountProducts)?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <a href="suppliers?hotel_id=<?=$_GET['hotel_id']?>">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="ti-user text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">Suppliers</div>
                                <div class="stat-text">Total: <?=count($dashboardCountSuppliers)?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <a href="productCategories?hotel_id=<?=$_GET['hotel_id']?>">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="ti-pulse text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">
                                    Categories
                                </div>
                                <div class="stat-text">
                                    Total: <?=count($dashboardCountCategories)?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <a href="pos?hotel_id=<?=$_GET['hotel_id']?>">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="ti-stats-up text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">POS</div>
                                <div class="stat-text">
                                Products: <?=count($dashboardCountPosProducts)?>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fas fa-plus-circle"></i>
                    </div>

                    <?php 
                        $deliveredOrders = array(); 
                        $savedOrders = array(); 
                        $completedOrders = array();
                        foreach ($getOrders as $key => $row) {
                            if($row['order_status']=='delivered'){
                                $deliveredOrders[] = $row;
                            }else if($row['order_status']=='saved'){
                                $savedOrders[] = $row;
                            }else if($row['order_status']=='complete'){
                                $completedOrders[] = $row;
                            }
                        }

                        $expensesTillToday = 0;
                        foreach ($getAllExpenses as $key => $row) {
                            $expensesTillToday += $row['exp_amount'];
                        }

                         
                        $saleTillToday = 0;
                        $discountTillToday = 0;
                        foreach ($getOrders as $key => $row){
                            if($row['order_status']=='complete'){
                                $saleTillToday += $row['order_total'];
                                $discountTillToday += $row['order_discount'];
                            }
                        }

                        $profitTillToday = $saleTillToday-$discountTillToday-$expensesTillToday;
                    ?>

                    <div class="h4 mb-0">
                        <span class="count"><?=count($getOrders)?></span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Total Orders</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fas fa-truck-loading"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?=count($deliveredOrders)?></span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Deliveries</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fas fa-cloud-download-alt"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?=count($savedOrders)?></span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Saved</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fas fa-hand-peace"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?=count($completedOrders)?></span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Completed</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?=$expensesTillToday?></span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Expenses</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?=$profitTillToday?></span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Profit</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
        </div>
    </div>


            <!-- <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div> -->
            <!-- <div class="col-xl-3 col-lg-6">
                <label> Today Report </label>
            <a href="javascript://" id="generate-today-report">
                <div>
                    <center id="currentDateSpinner" style="display: none;">
                    <div class="spinner-border" role="status" style="margin-top: 12px;display: flex;align-items: center;justify-content: center;">
                      <span class="sr-only">Loading...</span>
                    </div>Generating PDF....
                    </center>
                    <div>
                        <div class="stat-widget-one">
                            <div class="dib">
                                <i class="fa fa-print text-success border-success" style="font-size:24px;"></i>
                                <div class="stat-text" style="display: inline-block;font-size:22px;padding: 2px;">
                                    &nbsp;&nbsp;&nbsp;&nbsp;<?=$currentDate?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div> -->
            <!--/.col-->
           <!-- <div class="row">
                <div class="col-md-2" style="margin-left: 0;">
                    <div class="page-header page-title">
                        <h1><b>Reports</b></h1>
                    </div>
                </div>
            </div>
            <br> -->
            <!-- <div class="col-xl-4 col-lg-6">
                <label> Single Date Report </label>
            <a href="javascript://" style="text-align: center;">
                <div class="card">
                    <center id="singleDateSpinner" style="display: none;">
                    <div class="spinner-border" role="status" style="margin-top: 12px;display: flex;align-items: center;justify-content: center;">
                      <span class="sr-only">Loading...</span>
                    </div>Generating PDF....
                    </center>
                    <div class="card-body">
                        <p style="font-size: 14px;"><u>Choose a date</u></p>
                        <input type="date" id="singleDateReport" class="form-control">
                    </div>
                </div>
            </a>
            </div>

            <div class="col-xl-8 col-lg-6">
            <label> Between Two Dates </label>
            <a href="javascript://" style="text-align: center;">
                <div class="card">
                    <center id="twoDateSpinner" style="display: none;">
                        <div class="spinner-border" role="status" style="margin-top: 12px;display: flex;align-items: center;justify-content: center;">
                          <span class="sr-only">Loading...</span>
                        </div>Generating PDF....
                    </center>
                    <div class="card-body" style="padding: 7px !important;">
                            <div class="form-group" style="width: 40%;display: inline-block !important;">
                                <p style="font-size: 14px;"><u>Starting Date</u></p>
                                <input type="date" id="dateOneReport" class="form-control">
                            </div>
                            <div class="form-group" style="width: 40%;display: inline-block !important;">
                                <p style="font-size: 14px;"><u>Ending Date</u></p>
                                <input type="date" id="dateTwoReport" class="form-control" >
                            </div>
                                <a href="javascript://" class="btn btn-hms-red btn-sm" id="generate-report-dates"><i class="fa fa-print" style="font-size:14px;"></i> Generate</a>
                    </div>
                </div>
            </a>
            </div> -->
            <!--/.col-->

            <!-- <div class="col-xl-3 col-lg-6">
            <a href="javascript://" id="generate-today-report">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="dib"><i class="fa fa-print text-success border-success" style="font-size:24px;display: inline-block !important;"></i>
                                &nbsp;&nbsp; <input type="date" id="dateTwoReport" class="form-control" style="width: 80%;display: inline-block !important;">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </a>
           </div> -->

            <!-- <?php if (isset($_SESSION['login_owner'])): ?>
            <div class="col-xl-3 col-lg-6">
                <div class="card bg-success">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-white border-white"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text text-white">Today Profit</div>
                                <div class="stat-digit text-white"><p id="profit" style="font-size:16px;color:#fff;">0</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php if (isset($_SESSION['login_owner'])): ?>
            <div class="col-xl-3 col-lg-6">
            <a href="viewPayments?hotel_id=<?=$_GET['hotel_id']?>">
                <div class="card bg-danger">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fa fa-money text-white border-white"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text text-white">Today Payments</div>
                                <div class="stat-digit text-white"><?=count($hotelPayments)?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
            <?php endif ?> -->
            
            <!--/.col-->

           <!--  <div class="col-xl-12 col-lg-3" style="border-radius: 3px;top: 0px;display: inline-block !important;">
                <div class="card">
                <div style="padding-bottom: 15px;padding-top: 15px;background-color: white;margin-right: 1px;margin-left: 1px;border:none;border-radius: 3px;">
                    <center style="display: inline-block;padding-left: 20px;"><h4 id="resRespMsg">Booking Requests</h4></center>
                    <h6 style="float:right;display: inline-block;padding-right: 20px;margin-top: 5px;" class="" id="bookingRequestResp"></h6>
                </div>
                    <div class="card-body" id="reservationWidgetCard">
                        <table id="bootstrap-data-table-export" class="table table-striped  dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 209px;">Res Id</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 209px;">Client Name</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 349px;">Rooms</th>
                                <th style="width: 18%;" class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 122px;">Check-In</th>
                                <th style="width: 18%;" class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 122px;">Check-Out</th>
                                <th style="width: 21%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getTodayBookingRequests as $key => $res): ?>

                            <tr role="row" class="odd">
                                <input type="hidden" class="user_id" value="<?=$res['user_id']?>">
                                <input type="hidden" class="res_id" value="<?=$res['res_id']?>">
                                <td><?=$res['res_id']?></td>
                                <td><a href="javascript://" class="viewUser"><i class="fa fa-eye"></i> View</a></td>
                                <td><a href="javascript://" class="viewRooms"><i class="fa fa-eye"></i> View</a></td>
                                <td><?=dateConvert($res['res_check_in_date'])?> <?=$res['res_check_in_time']?></td>
                                <td><?=dateConvert($res['res_check_out_date'])?> <?=$res['res_check_out_time']?></td>
                                <td>
                                    <a style="font-size: 11px;" href="javascript://" class="btn btn-primary btn-sm approveRequest"> <i class="fa fa-check"></i> Approve</a>
                                    <input type="hidden" class="occupied_rooms" value="<?=$res['room_id']?>">
                                    <a style="font-size: 11px;" href="javascript://" class="btn btn-warning btn-sm cancelRequest"> <i class="fa fa-times"></i> Cancel</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> -->

            <!--/.col-->
    </div> <!-- .content -->

    <script type="text/javascript">

    $(document).ready(function(){


        setInterval(function(){

            var hotel_id = '<?=$_GET['hotel_id']?>';
            var action = 'Get-Profit';
            $.post('<?=AJAX?>basic.php', {action:action, hotel_id:hotel_id}, function(resp){
                resp = $.parseJSON(resp);
                if(resp.status==true){
                    console.log(resp);
                    $('#profit').text('Rs.'+resp.profit+'/-');
                }
            });

        }, 4000);




        $('#addExpense').on('click', function(){

            var exp_amount = $('#exp_amount').val();
            var exp_description = $('#exp_description').val();
            var user_id = $('#recep_id').val();
            var hotel_id = '<?=$_GET['hotel_id']?>';
            var action = 'addExpense';
            if(exp_amount!=='' && exp_description!=='' && user_id!=='' && hotel_id!==''){

                $.post('<?=AJAX?>basic.php', {exp_amount:exp_amount, exp_description:exp_description, user_id:user_id, hotel_id:hotel_id, action:action}, function(resp){
                        resp = $.parseJSON(resp);
                        if(resp.status==true){

                            $('#expenseWidget').fadeOut('slow', function(){});
                            $('#respMsg').text('Expense Added');
                            setTimeout(function(){

                                window.open('index?hotel_id='+hotel_id, '_self');

                            }, 1500)
                        }

                });

           }

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