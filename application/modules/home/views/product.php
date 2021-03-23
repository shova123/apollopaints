
        
                <?php if(!empty($productList)){ ?>
        <!--BUDGET CALCULATION-->
        
        <div class="budget-calculation">
            <div class="container">
                <div class="budget-title">
                    <h2 class="heading-2">Products</h2>
                    <p>Explore Our products</p>
                </div>
                <div id="content">

                      
                        <div class="tab-pane" id="condition">
                            <!-- <h3 class="heading-3">Choose the surface that you would like to paint</h3> -->
                            <div class="btn-group">
                                <div class="row">
                                    <?php foreach($productList as $product){ ?>
                                    <div class="col-sm-4">
                                        <a href="<?php echo base_url("product/$product->product_slug"); ?>">
                                        <div class="budget-selection btn btn-default">
                                                <strong><?php echo $product->product_title; ?></strong> 
                                                <img alt="<?php echo $product->product_title; ?>" class="img-responsive" src="<?php echo base_url();?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT; ?>uploads/product/<?php echo $product->product_image; ?>&w=338&h=254">
                                            <?php echo $product->product_description; ?>
                                        </div>

                                        </a>
                                    </div>
                                      <?php } ?>  
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>
        
                <?php } ?>

        
                <?php if(!empty($catList)){ ?>
        <!--BUDGET CALCULATION-->
        
        <div class="budget-calculation">
            <div class="container">
                <div class="budget-title">
                    <h2 class="heading-2"><?php echo str_replace('_',' ',ucfirst($type)) ?></h2>
                    <!-- <p>Explore Our products</p> -->
                </div>
                <div id="content">

                      
                        <div class="tab-pane" id="condition">
                            <!-- <h3 class="heading-3">Choose the surface that you would like to paint</h3> -->
                            <div class="btn-group">
                                <div class="row">
                                    <?php foreach($catList as $category){ ?>
                                    <div class="col-sm-4">
                                        <a href="<?php echo base_url("product/$category->product_link/$category->category_slug"); ?>">
                                        <div class="budget-selection btn btn-default">
                                                <strong><?php echo $category->category_title; ?></strong> 
                                                <img alt="<?php echo $category->category_title; ?>" class="img-responsive" src="<?php echo base_url();?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT; ?>uploads/category/<?php echo $category->category_image; ?>&w=338&h=254">
                                            <?php echo $category->category_description; ?>
                                        </div>

                                        </a>
                                    </div>
                                      <?php } ?>  
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>
        
                <?php } ?>