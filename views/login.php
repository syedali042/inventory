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


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                </div>
                <div class="login-form">
                    <center>
                        <img src="<?=IMG?>logo-n.png" style="width:50px;"> <h3 style="font-family:'Raleway', sans-serif;display:inline-block;text-align:center;">Easy Stay IMS</h3>
                        <br><br>
                    </center>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" id="owner-email" class="form-control" placeholder="Email">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="owner-pass" class="form-control" placeholder="Password">
                        </div>
                                <div class="checkbox">
                                    <!-- <label>
                                <input type="checkbox"> Remember Me
                            </label> -->
                            <label class="pull-right">
                                <a href="resetPass?role=owner">Forgotten Password?</a>
                            </label>

                                </div>
                                <button type="submit" id="signInAsOwner" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                                <!-- <br><br>
                                <a href="recepLogin" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in As Receptionist</a> -->
                                <div class="social-login-content">
                                    <!-- <div class="social-button">
                                        <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                        <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                                    </div> -->
                                </div>
                                <!-- <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                                </div> -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?=VENDOR?>popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=VENDOR?>bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=JS?>main.js"></script>
    
    

    <script type="text/javascript">
        
        $(document).ready(function() {
            
            $('#signInAsOwner').on('click', function(){

                var ownerEmail = $('#owner-email').val();
                var ownerPass = $('#owner-pass').val();
                var action = 'signInAsOwner';
                if(ownerEmail!=='' && ownerPass!==''){

                
                $.post('<?=AJAX?>basic.php', {ownerEmail:ownerEmail, ownerPass:ownerPass, action:action}, function(resp){

                    resp = $.parseJSON(resp);
                    if(resp.status===true){
                        window.open('index', '_self');
                    }else{
                        $('#signInAsOwner').css('background-color', '#ff2e44');
                        $('#signInAsOwner').html('<i class="fa fa-bel"></i> Credentials Not Matched');
                        setTimeout(function(){
                            $('#signInAsOwner').css('background-color', '#28a745');
                            $('#signInAsOwner').text('Sign In');
                        }, 2000);
                    }
                });

                }else{
                    $('#signInAsOwner').css('background-color', '#ff2e44');
                        $('#signInAsOwner').html('<i class="fa fa-bel"></i> Provide Credentials Carefully');
                        setTimeout(function(){
                            $('#signInAsOwner').css('background-color', '#28a745');
                            $('#signInAsOwner').text('Sign In');
                        }, 2000);
                }
            });

        });

    </script>

</body>

</html>
