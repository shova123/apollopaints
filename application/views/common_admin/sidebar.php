<div id="left" class="ui-sortable ui-resizable">
    <!--    <form action="search-results.html" method="GET" class='search-form'>-->
    <!--        <div class="search-pane">-->
    <!--            <input type="text" name="search" placeholder="Search here...">-->
    <!--            <button type="submit">-->
    <!--                <i class="fa fa-search"></i>-->
    <!--            </button>-->
    <!--        </div>-->
    <!--    </form>-->
    <div class="subnav">
        <div class="subnav-title">
            <a href="#" class='toggle-subnav'>
                <i class="fa fa-angle-down"></i>
                <span>Website Manager</span>
            </a>
        </div>
        <ul class="subnav-menu">
            <li class="dropdown">
                <a href="" data-toggle="dropdown"><i class="fa fa-camera"></i> Image Management</a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url("admin/pages/slide_list"); ?>">Slider Images</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("admin/pages/gallery_list"); ?>">Color Palace</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="<?php echo base_url("admin/pages/page_list"); ?>"><i class="fa fa-book"></i>  Content Manager</a>
            </li>

<!--             <li>
                <a href="<?php echo base_url("admin/pages/page_list"); ?>">Content Manager</a>
            </li> -->
           <!--  <li class="dropdown <?php
            if (isset($active[8])) {
                echo $active[8];
            }
            ?>">
                <a href="#" data-toggle="dropdown">About DropDown</a>
                <ul class="dropdown-menu">
                    <li <?php if (@$dropsub == 1) { ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url('admin/pages/about_dropdown') ?>">About DropDown</a>
                    </li>
                    <li <?php if (@$dropsub == 2) { ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url("admin/pages/our_team"); ?>">Our Team</a>
                    </li>
                </ul>
            </li> -->
            <!-- <li><a href="<?php echo base_url('admin/pages/video') ?>">Video Highlight</a></li> -->
            <!--             <li>
                            <a href="<?php echo base_url("admin/pages/team_list"); ?>">Our Team</a>
                        </li> -->

            <!--             <li>
                            <a href="<?php echo base_url("admin/pages/faq_list"); ?>">FAQ</a>
                        </li> -->




            <!--            <li class='dropdown'>
                            <a href="#" data-toggle="dropdown">Blog Management</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url("admin/pages/slide_list"); ?>">Blogs</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url("admin/pages/client_list"); ?>">Blogs Comment</a>
                                </li>
                                <li class='dropdown-submenu'>
                                    <a href="#" data-toggle="dropdown" class='dropdown-toggle'>Go to level 3</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">This is level 3</a>
                                        </li>
                                        <li>
                                            <a href="#">Unlimited levels</a>
                                        </li>
                                        <li>
                                            <a href="#">Easy to use</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>-->
            <!-- <li>
                <a href="<?php echo base_url("admin/pages/review_list"); ?>">Reviews</a>
            </li> -->
             <li>
                <a href="<?php echo base_url("admin/pages/testimonial"); ?>"><i class="fa fa-comments"></i> Testimonials</a>
            </li> 
            <li>
                <a href="<?php echo base_url("admin/pages/contact_list"); ?>"><i class="fa fa-phone"></i> Contact Info</a>
            </li>
 <!--            <li>
                <a href="<?php echo base_url('admin/pages/partner_list'); ?>"><i class="fa fa-money"></i> Happy Doners</a>
            </li> -->
            <!-- <li>
                <a href="<?php echo base_url('admin/pages/affiliation'); ?>">Affiliation</a>
            </li> -->
            <!-- <li>
                <a href="<?php echo base_url("admin/pages/blog_list"); ?>">Blogs</a>
            </li> -->
            <li class="dropdown">
                <a href="" data-toggle="dropdown"><i class="fa fa-link"></i> Links</a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url("admin/pages/quick_links"); ?>">Quick Links</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("admin/pages/social_links"); ?>">Social Links</a>

                    </li>
                </ul>
            </li>
<!--             <li class="dropdown <?php if (isset($active[15])) {echo 'active';}?>">
                <a href="#" data-toggle="dropdown"><i class="fa fa-comment-o"></i> Blog manager</a>
                <ul class="dropdown-menu">
                    <li class="<?php if (isset($active[15]) && @$sub_current==1) {echo 'active';}?>">
                        <a href="<?php echo base_url('admin/blogs/all_blogs') ?>">Blogs</a>
                    </li>
                    <li class="<?php if (isset($active[15]) && @$sub_current==2) {echo 'active';}?>">
                        <a href="<?php echo base_url("admin/blogs/comments"); ?>">Comments</a>
                    </li>

                </ul>
            </li> -->
             <li>
                <a href="<?php echo base_url("admin/pages/newsletter"); ?>"><i class="fa fa-newspaper-o"></i> Newsletter Subscribe</a>
            </li> 
            <li>
                <a href="<?php echo base_url("admin/pages/store"); ?>"><i class="fa fa-search"></i> Store Location</a>
            </li> 

        </ul>
    </div>

</div>