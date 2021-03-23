<?php 
$headcontact = $this->general_db_model->get_row("contacts","*");
$logo = $this->general_db_model->get_row("admins","*"); 
$active[$current] = "active";
?>
<div class="top-bar">
	<div class="container">
    	<div class="top-info">
        	<ul>
            	<li><a href="mailto:<?php echo $headcontact->email; ?>">Email: <?php echo $headcontact->email; ?></a></li>
                <li><a href="callto:<?php echo $headcontact->contact_no_ph; ?>">Call Us:<?php echo $headcontact->contact_no_ph; ?></a></li>

            </ul>
        </div>
    </div>
</div>
<!--header start-->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-md-4">
            	<div class="biz-logo">
                	<a href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url();?>uploads/banners/<?php echo $logo->user_image; ?>" alt="logo"></a>
                </div>
            </div>
            <div class="col-sm-7 col-md-8">
            	<div class="row">
                	<div class="col-md-7">
                    	<div class="header-menu clearfix">
                        	<ul>
                            	<li><a href="<?php echo base_url('about'); ?>">about us</a></li>
                                <li><a href="<?php echo base_url('product'); ?>">Products</a></li>
                                <li><a href="<?php echo base_url('delivery'); ?>">delivery</a></li>
                                <li><a href="<?php echo base_url('career'); ?>">career</a></li>
                                <li><a href="<?php echo base_url('store_locator'); ?>">store locator</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                    	<div class="top-search">
                        	<div class="input-group">
                                <input type="text" class="form-control">
                                	<span class="input-group-btn">
                                	<button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i>
                                		</button>
                                	</span>
    						</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</header>
<!--end header-->



<!--nav start-->
<nav class="navbar navbar-default">
	<div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Menu</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <!--<li  class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">guevara program</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">home</a></li>
                        <li><a href="#">home</a></li>
                        <li><a href="#">home</a></li>
                    </ul>
                </li>-->
                <li class="home"><a href="<?php echo base_url(); ?>">home</a></li>
                <li class="color-visualizer"><a href="<?php echo base_url('color_visualizer'); ?>">color visualizer</a></li>
                <li class="budget-calculator"><a href="<?php echo base_url('budget_calculator'); ?>">budget calculator</a></li>
                <li class="expert-advice"><a href="<?php echo base_url('expert_advice'); ?>">expert advice</a></li>
                <li class="contact"><a href="<?php echo base_url('contact'); ?>">contact us</a></li>
            </ul>   
        </div><!-- /.navbar-collapse -->
    </div>
</nav>