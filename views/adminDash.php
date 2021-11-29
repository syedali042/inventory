<?php
// if(!isset($_SESSION['login_owner'])){
//     var_dump($_SESSION['login_owner']);
//     echo "<script>
//         window.open('login','_self');
//     </script>";
// } 
    if(!isset($_SESSION['login_admin'])){header('Location: exec');}
    function dateConvert($date){
        $Month = date("F", strtotime($date));
        $Date = date("d", strtotime($date));
        $Year = date("y", strtotime($date));
        return $Month.' '.$Date.', 20'.$Year;
    }
    
?>

 
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
    </div>
       
<div class="content mt-3">

            <!-- <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div> -->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <!-- <a href="viewUser?hotel_id=<?=$_GET['hotel_id']?>"> -->
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                           <h1 style="color: white;"><i class="fa fa-bed"></i></h1>
                        </div>
                        <h4 class="mb-0">
                            <span class="count" style="color: white;"><?=count($Hotels)?></span>
                        </h4>
                        <p class="text-light">Total Hotels</p>

                        <!-- <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div> -->

                    </div>
                    <!-- </a> -->
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-5">
                    <!-- <a href="allExpenses?hotel_id=<?=$_GET['hotel_id']?>"> -->
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                           <h1 style="color: white;"><i class="fa fa-bed"></i></h1>
                        </div>
                        <h4 class="mb-0">
                            <span class="count" style="color: white;"><?=count($Rooms)?></span>
                        </h4>
                        <p class="text-light">Rooms</p>

                        <!-- <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div> -->

                    </div>
                    <!-- </a> -->
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <!-- <a href="viewReservations?hotel_id=<?=$_GET['hotel_id']?>"> -->
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <h1 style="color: white;"><i class="fa fa-ticket"></i></h1>
                        </div>
                        <h4 class="mb-0">
                            <span class="count" style="color: white;"><?=count($Reservations)?></span>
                        </h4>
                        <p class="text-light">Total Reservations</p>

                    </div>
                    <!-- </a> -->

                    <!-- <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart3"></canvas>
                    </div> -->
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <!-- <a href="viewHotel?hotel_id=<?=$_GET['hotel_id']?>"> -->
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <h1 style="color: white;"><i class="fa fa-users"></i></h1>
                        </div>
                        <h4 class="mb-0">
                            <span class="count" style="color: white"><?=count($Users)?></span>
                        </h4>
                        <p class="text-light">Total Clients</p>

                        <!-- <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div> -->

                    </div>
                    <!-- </a> -->
                </div>
            </div>
            <!--/.col-->

            <!-- <div class="col-xl-8 col-lg-3" style="border-radius: 3px;top: 0px;display: inline-block !important;">

                <div style="padding-bottom: 15px;padding-top: 15px;background-color: white;margin-right: 1px;margin-left: 1px;border:none;border-radius: 3px;">
                    <center style="display: inline-block;padding-left: 20px;"><h4 id="resRespMsg">Booking Requests</h4></center>
                    <h6 style="float:right;display: inline-block;padding-right: 20px;margin-top: 5px;" class="" id="bookingRequestResp"></h6>
                </div>
                <br>
                <div class="card">
                    <div class="card-body" id="reservationWidgetCard">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
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
            <!-- <div class="col-xl-4 col-lg-3" style="border-radius: 3px;top: 0px;display: inline-block !important;">
                <div style="padding-bottom: 15px;padding-top: 15px;background-color: white;margin-right: 1px;margin-left: 1px;border:none;border-radius: 3px;">
                    <h4 id="respMsg" style="padding-left: 20px;">Add New Expense</h4>
                </div>
                <br>
                <div class="card">
                    <div class="card-body" id="expenseWidgetCard">
                        <div class="stat-widget-one" id="expenseWidget">
                            <div class="form-group">
                                <label>Expense Amount</label>
                                <input required name="exp_amount" id="exp_amount" type="text" class="form-control" placeholder="e.g 50, 100, 1000, 10000">
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label>Expense Description / Purpose</label>
                                <textarea name="exp_description" id="exp_description" type="text" class="form-control" placeholder="Purpose"></textarea>
                                <input type="hidden" name="recep_id" id="recep_id" value="2">
                                <input type="hidden" name="recep_id" id="hotel_id" value="<?=$_GET['hotel_id']?>">
                            </div>
                            <div class="col-lg-12">
                                <div class="payment-adress" style="display: flex;align-items: center;justify-content: center;">
                                    <button id="addExpense" type="submit" class="btn btn-primary waves-effect waves-light">ADD</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-xl-6 col-lg-3" style="border-radius: 3px;top: 0px;display: inline-block !important;">
                <div style="padding-bottom: 15px;padding-top: 15px;background-color: white;margin-right: 1px;margin-left: 1px;border:none;border-radius: 3px;">
                    <center style="display: inline-block;padding-left: 20px;"><h4 id="resRespMsg">Make Reservation</h4></center>
                    <h6 style="float: right;display: inline-block;padding-right: 20px;margin-top: 5px;"><a href="javascript://" data-toggle="modal" data-target="#usersModal"><i class="fa fa-user"></i> Select User</a></h6>
                </div>
                <br>
                <div class="card">
                    <div class="card-body" id="reservationWidgetCard">
                        <form action="invoice" method="POST">
                        <div class="stat-widget-one" id="reservationWidget">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Check-In Date</label>
                                    <input type="date" name="check-in-date" class="form-control" id="check-in-date">
                                </div>
                                <div class="col-md-6">
                                    <label>Check-In Time</label>
                                    <input type="time" name="check-in-time" class="form-control" id="check-in-time">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Check-Out Date</label>
                                    <input type="date" name="check-out-date" class="form-control" id="check-out-date">
                                </div>
                                <div class="col-md-6">
                                    <label>Check-Out Time</label>
                                    <input type="time" name="check-out-time" class="form-control" id="check-out-time">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>No. Of Adults</label>
                                    <input type="number" name="no-of-adults" class="form-control" id="no-of-adults" placeholder="Number Of Adults">
                                </div>
                                <div class="col-md-6">
                                    <label>No. Of Children</label>
                                    <input type="number" name="no-of-children" class="form-control" id="no-of-children" placeholder="Number Of Children">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" style="width: 100%;" id="selectedRoomsTable">
                                        <tr>
                                            <th>Room #</th>
                                            <th>Room Type</th>
                                            <th>Room Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <center><a href="javascript://" data-toggle="modal" data-target="#roomsModal" class="btn btn-primary"><i class="fa fa-plus"></i> Add Room</a></center><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" style="width: 100%;" id="selectedFacilitiesTable">
                                        <tr>
                                            <th>Facility Id</th>
                                            <th>Facility Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <center><a href="javascript://" data-toggle="modal" data-target="#facilitiesModal" class="btn btn-primary"><i class="fa fa-plus"></i> Add Facility</a></center><br>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-secondary" id="submit_all">Save & Continue</button>
                        </div>
                        <input type="hidden" name="hotel_id" value="<?=$_GET['hotel_id']?>">
                        </form>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-xl-3 col-lg-6">
                <a href="viewUser?hotel_id=<?=$_GET['hotel_id']?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">New Customer</div>
                                    <div class="stat-digit"><?=count($newUsers)?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div> -->

            <!-- <div class="col-xl-3 col-lg-6">
                <a href="viewReservations?hotel_id=<?=$_GET['hotel_id']?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Act. Reservations</div>
                                    <div class="stat-digit"><?=count($hotelActiveReservations)?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>    
            </div> -->
            <?php if (isset($_SESSION['login_owner'])): ?>
            <!-- <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Profit</div>
                                <div class="stat-digit">1,012</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <?php endif ?>
            <?php if (isset($_SESSION['login_owner'])): ?>
            <!-- <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <a href="viewPayments?hotel_id=<?=$_GET['hotel_id']?>">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <h1 style="color: white;"><i class="fa fa-money"></i></h1>
                        </div>

                        <h4 class="mb-0">
                            <span class="count" style="color: white;"><?=count($hotelPayments)?></span>
                        </h4>
                        <p class="text-light">Total Payments</p>


                    </div>
                    </a>
                </div>
            </div> -->
            <?php endif ?>
            <!--/.col-->
    </div>