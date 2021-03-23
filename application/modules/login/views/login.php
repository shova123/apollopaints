<?php
//@session_start();
if($this->session->flashdata('error_message'))
{

	$display = 'block';
	$formClass = 'error';
        $formOuter = 'outererror';
        $formHead ='error';
        $color = '#fff';
}
else
{
	$display = 'none';
	$formClass = '';
        $formOuter = 'outer';
        $formHead ='head';
        $color = '#000';
}
?>



<!----------------------------------Template Login-------------------------------------->

<!doctype html>
<html>

<head>
    <!--    <meta charset="utf-8">-->
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />-->
    <!--    <!-- Apple devices fullscreen-->
    <!--    <meta name="apple-mobile-web-app-capable" content="yes" />-->
    <!--    <!-- Apple devices fullscreen-->
    <!--    <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />-->

    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets_admin/css/bootstrap.min.css">
    <!-- icheck -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets_admin/css/plugins/icheck/all.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets_admin/css/style.css">
    <!-- Color CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets_admin/css/themes.css">


    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets_admin/js/jquery.min.js"></script>

    <!-- Nice Scroll -->
    <!--    <script src="--><?php //echo base_url();?><!--assets_admin/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>-->
    <!-- Validation -->
    <script src="<?php echo base_url();?>assets_admin/js/plugins/validation/jquery.validate.min.js"></script>
    <!--    <script src="--><?php //echo base_url();?><!--assets_admin/js/plugins/validation/additional-methods.min.js"></script>-->
    <!-- icheck -->
    <script src="<?php echo base_url();?>assets_admin/js/plugins/icheck/jquery.icheck.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets_admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/js/eakroko.js"></script>

    <!--[if lte IE 9]>
    <script src="<?php echo base_url();?>assets_admin/js/plugins/placeholder/jquery.placeholder.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input, textarea').placeholder();
        });
    </script>
    <![endif]-->


    <!-- Favicon -->
    <!--    <link rel="shortcut icon" href="--><?php //echo base_url();?><!--assets_admin/img/favicon.ico" />-->
    <!-- Apple devices Homescreen icon -->
    <!--    <link rel="apple-touch-icon-precomposed" href="--><?php //echo base_url();?><!--assets_admin/img/apple-touch-icon-precomposed.png" />-->

</head>



</html>




<!----------------------------------Template Login END-------------------------------------->





<style xmlns="http://www.w3.org/1999/html">
  .wrapper .error {
    background: #EB0505;/*linear-gradient(to bottom, #EB0505 0%, #f4f4f4 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);*/
    border-bottom: 1px solid #EB0505;
    padding: 5px;
}
.outer{
    background: #fff;
}
.wrapper.outererror {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: -moz-use-text-color #EB0505 #EB0505;
    border-image: none;
    border-right: 5px solid #EB0505;
    border-style: none solid solid;
    border-width: medium 5px 5px;
}

/* Messages start */

.titlebar .message {
	width: auto;
	z-index: 999;
	position: relative;
	display: inline-block;
	margin-left: 7px;
}

.messages {
	display: inline-block;
	border-radius: 15px;
	background: #373737 url(<?php echo base_url();?>assets_admin/img/bg-grad-msg.png) 0 0 repeat-x;
	color: #fff;
	padding: 8px 35px 8px 38px;
	position: relative;
	text-align: left;
	min-height: 19px;
	line-height: 18px;
}

.close-msg {
	display: block;
	width: 20px;
	height: 20px;
	background: url(<?php echo base_url();?>assets_admin/img/icons/icon-msg-close.png) 0 0 no-repeat;
	position: absolute;
	top: 6px;
	right: 8px;
	text-indent: -9999px;
	cursor: pointer;
}

.close-msg:hover {
	background: url(<?php echo base_url();?>assets_admin/img/icons/icon-msg-close.png) left bottom no-repeat;
}

.icon-messages {
	position: absolute;
	left: -15px;
	top: -5px;
	width: 43px;
	height: 43px;
}

.icon-success { background: url(<?php echo base_url();?>assets_admin/img/icons/icon-success.png); }

.icon-error { background: url(<?php echo base_url();?>assets_admin/img/icons/icon-error.png); }

/* Messages end */
/*FOrm image thumbnails*/
</style>
<!--    </head>-->
    <body class='login'>

        <div class="wrapper">
            <h1 class="<?php echo $formHead?>">
                <a href="">
                    <img src="" alt="" class='retina-ready' width="59" height="49">
                    ADMINlogin
                </a>
            </h1>
            <div class="login-body <?php echo $formOuter?>">
                <h2 >SIGN IN</h2>
                <div class="titlebar login-error" align="center"  style="display:<?php echo $display;?>">
                    <div class="message" id="message">
                        <div class="clear"></div>
                        <div class="messages">
                                <div class="icon-messages icon-error"></div>
                                <span id="errorMsg">Wrong username/password! Re-enter</span>
                                <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="close">Close</a>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url('admin/login/validuser');?>" method="post" id="test" class="form-validate" >  	  
                <!--<form action="index.html" method='get' class='form-validate' id="test">-->
                    <div class="form-group">
                        <div class="email controls">
                            <!--<input type="text" class="form-control" name="username" id="username" value="<?php echo @get_cookie('login_name')?>" placeholder="Username">-->
                            <input type="text" name='username' id="username" value="<?php //echo @get_cookie('login_name')?>" placeholder="Username" class='form-control' data-rule-required="true" ><!--data-rule-email="true"-->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="pw controls">
                            <input type="password" name="password" id="password" value="<?php //echo @get_cookie('login_pass')?>" placeholder="Password" class='form-control' data-rule-required="true">
                        </div>
                    </div>
                    <div class="submit">
                        <div class="remember">
                            <input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <input name="submit" type="submit" value="Login" id="loginBtn" class="btn btn-primary" />
                        <!--<input type="submit" value="Sign me in" class='btn btn-primary'>-->
                    </div>
                </form>
                <div class="forget">
                    <a href="#">
                        <span>Forgot password?</span>
                    </a>
                </div>
            </div>
        </div>


</body>

