<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<?php 
    date_default_timezone_set('Asia/Karachi');
    $todayDate = date('Y-m-d');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Easy Stay</title>
    <meta name="description" content="EasyStay - Hotel Management System">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/f7e9049f48.js" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <script src="<?=JS?>jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="<?=VENDOR?>bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?=CSS?>bootstrap.min.css">
    <link rel="stylesheet" href="<?=VENDOR?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=VENDOR?>themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?=VENDOR?>flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=VENDOR?>selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?=VENDOR?>jqvmap/dist/jqvmap.min.css">
    <!-- <link rel="stylesheet" href="<?=VENDOR?>datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=VENDOR?>datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"> -->
    <!-- <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <script src="<?=JS?>popper.min.js"></script>
    <script src="<?=JS?>html2canvas.js"></script>
    <link rel="stylesheet" href="<?=CSS?>style.css">
    <link rel="stylesheet" href="<?=CSS?>userProfile.css">
    <link href='<?=CSS?>googleFonts.css' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        
        // (function() {
        //     try {
        //         var $_console$$ = console;
        //         Object.defineProperty(window, "console", {
        //             get: function() {
        //                 if ($_console$$._commandLineAPI)
        //                     throw "Sorry, for security reasons, the script console is deactivated on netflix.com";
        //                 return $_console$$
        //             },
        //             set: function($val$$) {
        //                 $_console$$ = $val$$
        //             }
        //         })
        //     } catch ($ignore$$) {
        //     }
        // })();

    </script>

</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel" style="background-color:  #fff !important;">
        <nav class="navbar navbar-expand-sm">

            <div class="navbar-header" style="background-color:  #fff !important;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="<?=IMG?>logo-n.png" style="width:24px;" alt="Logo"> &nbsp;&nbsp;<b>Easy</b> Stay IMS</a>
                <a class="navbar-brand hidden" href="./"><img src="<?=IMG?>logo2.png" alt="Logo"></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse" style="background-color:  #fff !important;">
                <!-- /////////////////////////////////////////////////////////////////// -->
                <!-- //////////////////////// RECEPTIONIST SIDEBAR ///////////////////// -->
                <!-- /////////////////////////////////////////////////////////////////// -->
                

                <?php if(isset($_SESSION['login_admin'])){ ?>
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="adminDash"> <i class="menu-icon fa fa-hotel"></i>Dashboard </a>
                        </li>
                        <li class="">
                            <a href="addOwner"> <i class="menu-icon fa fa-hotel"></i>Add Owner </a>
                        </li>
                        <li class="">
                            <a href="owners"> <i class="menu-icon fa fa-users"></i>Owners List</a>
                        </li>
                        <li class="">
                            <a href="logout"> <i class="menu-icon fa fa-sign-out"></i>Logout</a>
                        </li>
                    </ul>

                <?php }else{ ?>  
                <ul class="nav navbar-nav">

                    <h2 class="menu-title" >Inventory</h2><!-- /.menu-title -->
                    <?php if (isset($_SESSION['login_owner'])){ ?>
                    <?php if(!isset($_GET['hotel_id'])){ ?>
                    <?php if(count($allHotel)!==0){ ?>
                    <?php foreach ($allHotel as $key => $hotel): ?>
                        <li>
                            <a href="index?hotel_id=<?=$hotel['hotel_id']?>"><i class="fa fa-hotel"></i> <?=$hotel['hotel_name']?></a>
                        </li>
                    <?php endforeach ?>
                    <?php }else{ ?>
                        <li class="">
                            <a href="#"> <i class="menu-icon fa fa-dot-circle"></i>No Hotel Added !</a>
                        </li>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                    <?php if(isset($_GET['hotel_id'])){ ?>
                    <li>
                        <a class="list-group-item list-group-heading" href="index?hotel_id=<?=$thisHotel['hotel_id']?>"><i class="menu-icon fa fa-tachometer"></i> Dashboard </a>
                    </li>
                    <li>
                        <a class="list-group-item" data-parent="#lvl1abcdef-sub" href="inventory?hotel_id=<?=$thisHotel['hotel_id']?>"><i class="menu-icon fab fa-product-hunt"></i> Products</a> 
                    </li>
                    <li>
                        <a class="list-group-item" data-parent="#lvl1abcdef-sub" href="allExpenses?hotel_id=<?=$thisHotel['hotel_id']?>"><i class="menu-icon fas fa-usd"></i> Expenses</a> 
                    </li>
                    <li>
                        <a class="list-group-item" data-parent="#lvl1abcdef-sub" href="suppliers?hotel_id=<?=$thisHotel['hotel_id']?>"><i class="menu-icon fas fa-truck"></i> Suppliers</a> 
                    </li>
                    <li>
                        <a class="list-group-item" data-parent="#lvl1abcdef-sub" href="productCategories?hotel_id=<?=$thisHotel['hotel_id']?>"><i class="menu-icon fas fa-list-ol"></i> Categories</a> 
                    </li>
                    <li>
                        <a class="list-group-item selected" data-parent="#lvl1abcdef-sub" href="pos?hotel_id=<?=$thisHotel['hotel_id']?>"><i class="menu-icon fas fa-blender-phone"></i> Point Of Sale</a>
                    </li>
                    <li>
                        <a class="list-group-item selected" data-parent="#lvl1abcdef-sub" href="inventoryOrders?hotel_id=<?=$thisHotel['hotel_id']?>"><i class="menu-icon fas fa-gavel"></i> Orders</a>
                    </li>
                    <li>
                        <a class="list-group-item selected" data-parent="#lvl1abcdef-sub" href="viewUser?hotel_id=<?=$thisHotel['hotel_id']?>"><i class="menu-icon fas fa-users"></i> Clients</a>
                    </li>
                    <?php } ?>
                    <h2 class="menu-title" >More</h2>
                    <!--  <li>
                        <a class="list-group-item" data-parent="#lvl1abcdef-sub" href="productCategories?hotel_id=<?=$thisHotel['hotel_id']?>"><i class="menu-icon fas fa-cog"></i> Settings</a> 
                    </li>
                    <li>
                        <a class="list-group-item selected" data-parent="#lvl1abcdef-sub" href="pos?hotel_id=<?=$thisHotel['hotel_id']?>"><i class="menu-icon fas fa-user"></i> My Account</a>
                    </li> -->
                    <li>
                        <a class="list-group-item selected" data-parent="#lvl1abcdef-sub" href="logout"><i class="menu-icon fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
                <?php } ?>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

<div class="header-menu">

    <div class="col-sm-7">
        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        <div class="header-left">
            <!-- <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <input class="form-control mr-sm-2" style="color:white;" type="text" placeholder="Search ..." aria-label="Search">
            <div class="form-inline">
                <form class="search-form">
                    <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                </form>
            </div> -->
                <div class="search-wrapper">
                    <div class="input-holder">
                        <input type="text" class="search-input" placeholder="Want to do or find something" />
                        <button class="search-icon" onclick="searchToggle(this, event);"><span><i class="fa fa-search" style="color: #17a2b8" aria-hidden="true"></i></span></button>
                    </div>
                    <span class="close" onclick="searchToggle(this, event);"></span>
                    <div id="globalSearchDiv" style="display: none;position: absolute;z-index: 1;background-color:#fff;margin-top: 10px;border-radius: 0px 5px 0px 5px;width: 100%;overflow:auto;max-height: 300px;padding: 5px;box-shadow: 2px 2px 15px #303030;">
                        <style type="text/css">
                            #operations li:hover{
                                background-color: #DCDCDC;
                            }
                        </style>
                        <div class="card-header" style="background-color: #17a2b8;border-radius: 5px 5px 5px 5px;">
                            <h5 style="font-weight: bold;color:white;"><i class="fa fa-cog"></i> Operations</h5>
                            <?php 
                                date_default_timezone_set('Asia/Karachi');
                                $todayDate = date('Y-m-d');
                            ?>
                        </div>
                        <ul style="list-style: none;" id="operations">
                            <a href="index?hotel_id=<?=$_GET['hotel_id']?>">
                                <li style="padding: 10px;border-bottom: 1px solid #17a2b8;">
                                    <i class="fa fa-tachometer"></i> Dashboard 
                                </li>
                            </a>
                            <a href="suppliers?hotel_id=<?=$_GET['hotel_id']?>">
                                <li style="padding: 10px;border-bottom: 1px solid #17a2b8;">
                                    <i class="fas fa-truck"></i> Suppliers 
                                </li>
                            </a>
                            <a href="inventory?hotel_id=<?=$_GET['hotel_id']?>">
                                <li style="padding: 10px;border-bottom: 1px solid #17a2b8;">
                                    <i class="fab fa-product-hunt"></i> Products 
                                </li>
                            </a>
                            <a href="inventoryOrders?hotel_id=<?=$_GET['hotel_id']?>">
                                <li style="padding: 10px;border-bottom: 1px solid #17a2b8;">
                                    <i class="fas fa-gavel"></i> Orders 
                                </li>
                            </a>
                            <a href="productCategories?hotel_id=<?=$_GET['hotel_id']?>">
                                <li style="padding: 10px;border-bottom: 1px solid #17a2b8;">
                                    <i class="fas fa-list-ol"></i> Categories 
                                </li>
                            </a>
                            <a href="pos?hotel_id=<?=$_GET['hotel_id']?>">
                                <li style="padding: 10px;border-bottom: 1px solid #17a2b8;">
                                    <i class="fa-blender-phone"></i> Point Of Sale 
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                
            <!-- <div class="dropdown for-notification">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="count bg-danger">5</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="notification">
                    <p class="red">You have 3 Notification</p>
                    <a class="dropdown-item media bg-flat-color-1" href="#">
                    <i class="fa fa-check"></i>
                    <p>Server #1 overloaded.</p>
                </a>
                    <a class="dropdown-item media bg-flat-color-4" href="#">
                    <i class="fa fa-info"></i>
                    <p>Server #2 overloaded.</p>
                </a>
                    <a class="dropdown-item media bg-flat-color-5" href="#">
                    <i class="fa fa-warning"></i>
                    <p>Server #3 overloaded.</p>
                </a>
                </div>
            </div> -->
            <?php 
                $activeRequests = array();
                foreach ($posRequests as $key => $row) {
                    if($row['request_status']=='active'){
                        $activeRequests[] = $row;
                    }
                }
                
            ?>
            <div class="dropdown for-message">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:-30px;margin-left:30px;">
                    <i class="fas fa-bell"></i>
                    <span class="count bg-primary"><?=count($activeRequests)?></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="message" style="margin-top:-30px;margin-left:30px;border:2px solid #007bff;border-radius: 5px;">
                    <p style="background-color: #007bff;color: #fff;margin-top: -10px">You have <?=count($activeRequests)?> Pending Requests</p>
                    <?php foreach ($activeRequests as $key => $row): ?>
                    <a href="javascript://" class="dropdown-item media posRequestId" data-id="<?=$row['request_id']?>" style="max-width: 300px;padding: 10px;">
                        <span class="photo media-left"><i style="font-size: 30px;margin-top: 8px;" class="fas fa-bell"></i></span>
                        <span class="message media-body" style="max-width: 300px;">
                            <span class="time float-right">
                                <p>These products are short, transfer <br>these products to POS</p>
                            </span>
                        </span>
                    </a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-5">
        <button type="button" style="margin-top: 8px;" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#expenseModal"><i class="fa fa-plus" ></i>&nbsp; New Expense</button>
        <a href="pos?hotel_id=<?=$_GET['hotel_id']?>" style="margin-top: 8px;" class="btn btn-outline-danger btn-sm"><i class="fa fa-star" ></i>&nbsp; New Order</a>
        <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src="<?=IMG?>owners/admin.png" alt="User Avatar">
            </a>

            <div class="user-menu dropdown-menu">
                <!-- <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a> -->

                <a class="nav-link" href="logout"><i class="fa fa-power-off"></i> Logout</a>
            </div>
        </div>

        <div class="language-select dropdown" id="language-select">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language" aria-haspopup="true" aria-expanded="true">
                <i class="flag-icon flag-icon-pk"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="language">
                <!-- <div class="dropdown-item">
                    <span class="flag-icon flag-icon-pk"></span>
                </div>
                <div class="dropdown-item">
                    <i class="flag-icon flag-icon-es"></i>
                </div>
                <div class="dropdown-item">
                    <i class="flag-icon flag-icon-us"></i>
                </div>
                <div class="dropdown-item">
                    <i class="flag-icon flag-icon-it"></i>
                </div> -->
            </div>
        </div>

    </div>
</div>

</header><!-- /header -->
        <!-- Header-->

<div class="preloaderBg" id="preloader" onload="preloader()" style="display: none;">
    <div class="preloader">
    </div>
    <div class="preloader2">
    </div>
    <center>
        <h3 style="margin-top: -20%;" id="preloader-text"></h3>
    </center>
</div>

<script type="text/javascript">
    function searchToggle(obj, evt){
    var container = $(obj).closest('.search-wrapper');
        if(!container.hasClass('active')){
            container.addClass('active');
            $('#globalSearchDiv').slideToggle('show');
            evt.preventDefault();
        }
        else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
            container.removeClass('active');
            $('#globalSearchDiv').slideToggle('show');
            // clear input
            container.find('.search-input').val('');
        }
}

$(document).ready(function() {
    // $(".search-input").on("click", function() {
    //     $('#globalSearchDiv').slideToggle('show');
    // });
    $(".search-input").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#operations li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>