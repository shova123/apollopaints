<?php
$active[$current] = "active";
$user = $this->general_db_model->get_row('admins','*');
?>
<div id="navigation">
    <div class="container-fluid">
        <a href="<?php echo $this->config->item('site_link');?>" target="_blank" id="brand">Front</a>
        <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation">
            <i class="fa fa-bars"></i>
        </a>
        <ul class='main-nav'>
            <li class='<?php if (isset($active[1])) {echo $active[1];}?>'>
                <a href="<?php echo base_url("admin/dashboard");?>">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class='<?php if (isset($active[2])) {echo $active[2];}?>'>
                <a href="<?php echo base_url("admin/product/product_list");?>">
                    <span>Products</span>
                </a>
            </li>
                    <li>
                <a href="#" class="dropdown-toggle <?php if (isset($active[3])) {echo $active[3];}?>" data-toggle="dropdown">Category <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <?php
                    $this->db->select('*');
                    $this->db->order_by('order', 'ASC');
                    $queryProduct = $this->db->get('product');
                    $productDetails = $queryProduct->result();
                    if(!empty($productDetails)){
                        foreach($productDetails as $productResults){
                            $productID = $productResults->product_id;
                            $productTitle = $productResults->product_title;
                            $productSlug = $productResults->product_slug;

                            ?>
                            <li><a href="<?php echo base_url("admin/product/product_list/$productSlug"); ?>"><?php echo ucfirst($productTitle)?></a>
                               <!--  <ul class='dropdown-menu'>
                                    <li><a href="<?php echo base_url("admin/activity/activity_list/$productLink"); ?>">Activities</a></li>
                                    <li><a href="<?php echo base_url("admin/region/region_list/$productLink")?>">Regions</a></li>
                                    <li><a href="<?php echo base_url("admin/package/package_list/$productLink");?>">Packages</a></li>

                                </ul> -->
                            </li>
                        <?php }}?>
                </ul>
            </li>
                                <li>
                <a href="#" class="dropdown-toggle <?php if (isset($active[4])) {echo $active[4];}?>" data-toggle="dropdown">Color Visualizer <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-submenu"><a href="">Sample Images</a>
                                 <ul class='dropdown-menu'>
                                    <li><a href="<?php echo base_url("admin/color_visualizer/sample_list/interior"); ?>">Interior</a></li>
                                    <li><a href="<?php echo base_url("admin/color_visualizer/sample_list/exterior"); ?>">Exterior</a></li>

                                </ul> 
                            </li>
                            <li class="dropdown-submenu"><a href="">Colors</a>
                                 <ul class='dropdown-menu'>
                                    <li><a href="<?php echo base_url("admin/color_visualizer/color_list/interior"); ?>">Interior</a></li>
                                    <li><a href="<?php echo base_url("admin/color_visualizer/color_list/exterior"); ?>">Exterior</a></li>

                                </ul> 
                            </li>
                </ul>
            </li>
        </ul>
        <div class="user">
              <div class="dropdown">
                <a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo ucfirst($user->admin_name);  ?>
                    <img src="" alt="">
                </a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="<?php echo base_url("admin/personal") ?>">Edit profile</a>
                    </li>
<!--                     <li>
                        <a href="<?php echo base_url('admin/settings')?>">Account settings</a>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url('admin/login/logout');?>">Sign out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
