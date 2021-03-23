<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Appolo Paints</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets_front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets_front/css/font-awesome.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets_front/css/flexslider.css" media="screen">
    <link href="<?php echo base_url();?>assets_front/css/materialtab.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_front/css/responsivetables.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_front/css/jgallery.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_front/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_front/css/parsley.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_front/css/responsive.css" rel="stylesheet" media="all">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets_front/images/fav-icon.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.<?php echo base_url();?>assets_front/js/1.4.2/respond.min.js"></script>
        <![endif]-->

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!--<script src="<?php echo base_url();?>assets_front/js/jquery.min.js"></script>-->
        <script src="<?php echo base_url();?>assets_front/js/bootstrap.min.js"></script>
        <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
    </head>



    <body>

        <?php $this->load->view('includes/header'); ?>


        <?php echo $contents; ?>

        <?php $this->load->view('includes/footer'); ?>


        <a href="#" class="scrollToTop" title="click here for top"><i class="fa fa-chevron-up" aria-hidden="true"></i>
        </a>

        
        <!-- jQuery -->
        <script src="<?php echo base_url();?>assets_front/js/jquery-scrolltofixed.js"></script>
        <script src="<?php echo base_url();?>assets_front/js/jquery.flexslider.js"></script>
        <script src="<?php echo base_url();?>assets_front/js/responsivetables.min.js"></script>
        <script src="<?php echo base_url();?>assets_front/js/parallax.min.js"></script>
        <script src="<?php echo base_url();?>assets_front/js/touchswipe.min.js"></script>
        <script src="<?php echo base_url();?>assets_front/js/jgallery.min.js"></script>
        <script src="<?php echo base_url();?>assets_front/js/main.js"></script>
        <script src="<?php echo base_url();?>assets_front/js/parsley.min.js"></script>
        <script>
        $( function() {
            $( '#gallery' ).jGallery();
        } );
        </script>
    </body>
    </html>