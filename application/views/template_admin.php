<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Apple devices fullscreen -->
        <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <title><?php echo @$page_title ?> - <?php echo $this->config->item('site_name'); ?></title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/bootstrap.min.css">
        <!-- jQuery UI -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/plugins/jquery-ui/jquery-ui.min.css">
        <!-- PageGuide -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/plugins/pageguide/pageguide.css">
        <!-- colorbox -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/plugins/colorbox/colorbox.css">
        <!-- Fullcalendar -->
        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/plugins/fullcalendar/fullcalendar.css"> -->
        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/plugins/fullcalendar/fullcalendar.print.css" media="print"> -->
        <!-- chosen -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/plugins/chosen/chosen.css">
        <!-- select2 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/plugins/select2/select2.css">
        <!-- icheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/plugins/icheck/all.css">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/style.css">
        <!-- Color CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/themes.css">
        <!--Plupload-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/plugins/plupload/jquery.plupload.queue.css">

        <!-- jQuery -->

        <script src="<?php echo base_url(); ?>assets_admin/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets_admin/js/plugins/validation/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets_admin/js/plugins/validation/additional-methods.min.js"></script>

        <!--[if lte IE 9]>
        <script src="<1?php echo base_url(); ?>assets_admin/js/plugins/placeholder/jquery.placeholder.min.js"></script>
        <script>
            $(document).ready(function() {
                $('input, textarea').placeholder();
            });
        </script>
        <![endif]-->
        <!-- Favicon -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_admin/css/dim.css">
        <script>
            var site_name = '<?php echo $this->config->item('site_name') ?>';
            var base_url = '<?php echo base_url(); ?>';
            var webpath = '<?php echo base_url(); ?>';
        </script>
    </head>
    <body>
        <?php
        $data['current'] = @$current;

        $data['prosub'] = @$prosub;
        $data['nepsub'] = @$nepsub;
        $data['tibsub'] = @$tibsub;
        $data['tibsubSub'] = @$tibsubSub;
        ?>
        <?php $this->load->view('common_admin/model'); ?>
        <?php $this->load->view('common_admin/header'); ?>
        <div class="container-fluid" id="content">
            <?php $this->load->view('common_admin/sidebar'); ?>
            <div id="main">
                <?php echo $contents; ?>
            </div>
        </div>
    </body>

    <!-- Nice Scroll -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- jQuery UI -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/jquery-ui/jquery-ui.js"></script>
    <!-- Touch enable for jquery UI -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
    <!-- slimScroll -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets_admin/js/bootstrap.min.js"></script>
    <!-- vmap -->
    <!--	<script src="<?php echo base_url(); ?>assets_admin/js/plugins/vmap/jquery.vmap.min.js"></script>
            <script src="<?php echo base_url(); ?>assets_admin/js/plugins/vmap/jquery.vmap.world.js"></script>
            <script src="<?php echo base_url(); ?>assets_admin/js/plugins/vmap/jquery.vmap.sampledata.js"></script>-->
    <!-- Bootbox -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/bootbox/jquery.bootbox.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/form/jquery.form.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/flot/jquery.flot.min.js"></script>
    <!--<script src="<?php echo base_url(); ?>assets_admin/js/plugins/flot/jquery.flot.bar.order.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/flot/jquery.flot.pie.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/flot/jquery.flot.resize.min.js"></script>-->
    <!-- colorbox -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/colorbox/jquery.colorbox-min.js"></script>
    <!-- masonry -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/masonry/jquery.masonry.min.js"></script>
    <!-- imagesLoaded -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
    <!-- PageGuide -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/pageguide/jquery.pageguide.js"></script>
    <!-- FullCalendar -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/fullcalendar/fullcalendar.min.js"></script>
    <!-- Chosen -->
    <!-- <script src="<?php echo base_url(); ?>assets_admin/js/plugins/chosen/chosen.jquery.min.js"></script>-->
    <!-- select2 -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/select2/select2.min.js"></script>
    <!-- icheck -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/icheck/jquery.icheck.min.js"></script>
    <!-- Theme framework -->
    <script src="<?php echo base_url(); ?>assets_admin/js/eakroko.min.js"></script>
    <!-- Theme scripts -->
    <script src="<?php echo base_url(); ?>assets_admin/js/application.min.js"></script>
    

</html>
