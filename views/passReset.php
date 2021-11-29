<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Easy Stay</title>
    <meta name="description" content="EasyStay - Hotel Management System">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=VENDOR?>bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=VENDOR?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=VENDOR?>themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?=VENDOR?>flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=VENDOR?>selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="<?=CSS?>style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body style="background-color:#45B8AC">
<main id="main">
    <br>
    <br>
    <br>
<div class="container" style="margin-top:50px;">
    <div class="panel panel-md">
    <?php
        if(isset($_GET['role'])){
            $user = $_GET['role'];
        }
    ?>
        <div class="panel-body">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <!-- form login -->
                <div class="form-group">
                <!-- <label class="font-avenir"></label> -->
                <input type="email" class="form-control" placeholder="Enter Your Email" id="email">
                </div>
                <div class="form-group no-margin">
                <button class="font-avenir btn btn-theme btn-lg btn-t-primary btn-block confirmEmail" style="color: white;font-size: 20px;font-weight: bold;background-color:#28a745;">Confirm Email</button>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- <div class="white-space-20"></div> -->
    <br><br>
</div>
</main>
<input type="hidden" id="session_email">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?=VENDOR?>popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=VENDOR?>bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=JS?>main.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.confirmEmail').click(function(){
            var role = '<?=$user?>';
            var email = $('#email').val();
            var action = 'confirmEmail';
            var data = {role:role, email:email, action:action};
            if(email !=='' && role !==''){
                $.post('<?=AJAX?>basic.php', {data:data}, function(resp) {
                
                    resp = $.parseJSON(resp);
                    if(resp.status==true){

                        $('#main').empty();
                        $('#main').append('<div class="container" style="margin-top:50px;"><div class="panel panel-md"><div class="panel-body"><div class="row"><div class="col-md-4"></div><div class="col-md-4"><div class="form-group"><input type="text" class="form-control" placeholder="Enter Confirmation Code" id="confirmation_code"></div><div class="form-group no-margin"><button class="font-avenir btn btn-theme btn-lg btn-t-primary btn-block confirmCode" style="color: white;font-size: 20px;font-weight: bold;background-color:#28a745;">Confirm Email</button></div></div></div></div></div><br><br></div>');
                        $('#session_email').val(email);
                    }else{
                        
                    }

                });
            }else{
                
            }

        });

        $(document).on('click', '.confirmCode', function(){
            var role = '<?=$user?>';
            var confirmation_code = $('#confirmation_code').val();
            var email = $('#session_email').val();
            var action = 'confirmCode';
            var data = {role:role, confirmation_code:confirmation_code, action:action, email:email};

            if(confirmation_code !=='' && role !==''){
                $.post('<?=AJAX?>basic.php', {data:data}, function(resp) {
                
                    resp = $.parseJSON(resp);
                    if(resp.status==true){

                        $('#main').empty();
                        $('#main').append('<div class="container" style="margin-top:50px;"><div class="panel panel-md"><div class="panel-body"><div class="row"><div class="col-md-4"></div><div class="col-md-4"><div class="form-group"><input type="password" class="form-control" placeholder="New Password" id="new_pass"></div><div class="form-group"><input type="password" class="form-control" placeholder="Confirm Password" id="confirm_pass"></div><div class="form-group no-margin"><button class="font-avenir btn btn-theme btn-lg btn-t-primary btn-block updatePass" style="color: white;font-size: 20px;font-weight: bold;background-color:#28a745;">Update Password</button></div></div></div></div></div><br><br></div>');
                        
                    }else{
                        $('#main').empty();
                        $('#main').append('<div class="container" style="margin-top:50px;"><div class="panel panel-md"><div class="panel-body"><div class="row"><div class="col-md-4"></div><div class="col-md-4"><div class="form-group no-margin"><button class="font-avenir btn btn-theme btn-lg btn-t-primary btn-block pchangebtn" style="color: white;font-size: 20px;font-weight: bold;background-color:#28a745;">Code Didn\'t Work Enter Email Again</button></div></div></div></div></div><br><br></div>');
                            //  setTimeout(function(){
                            //     window.open('resetPass?role='+role, '_self');
                            // }, 1000);
                    }

                });
            }else{
                
            }

        });

        $(document).on('click', '.updatePass', function(){
            $this = $(this);
            var role = '<?=$user?>';
            var email = $('#session_email').val();
            var pass = $('#new_pass').val();
            var cpass = $('#confirm_pass').val();
            var action = 'updatePass';
            var data = {role:role, pass:pass, action:action, email:email};

            if(pass == cpass){
                $.post('<?=AJAX?>basic.php', {data:data}, function(resp) {
                
                    resp = $.parseJSON(resp);
                    if(resp.status==true){

                        $('#main').empty();
                        $('#main').append('<div class="container" style="margin-top:50px;"><div class="panel panel-md"><div class="panel-body"><div class="row"><div class="col-md-4"></div><div class="col-md-4"><div class="form-group no-margin"><button class="font-avenir btn btn-theme btn-lg btn-t-primary btn-block pchangebtn" style="color: white;font-size: 20px;font-weight: bold;">Password Changed</button></div></div></div></div></div><br><br></div>');
                        setTimeout(function(){
                            $('.pchangebtn').text('Loging In...');
                        }, 1000);
                        setTimeout(function(){
                            window.open('index', '_self');
                        }, 1000);
                        
                    }else{
                        
                    }
                });
            }else{
                
                $this.after('<div class="form-group no-margin"><button class="font-avenir btn btn-theme btn-lg btn-t-primary btn-block errorBtn" style="color: white;font-size: 20px;font-weight: bold;">Passwords Didn\'t Match Type Again</button>');
                setTimeout(function(){
                    $('.errorBtn').remove();
                }, 1000);
            }

        });

    });

</script>

</body>
</html>