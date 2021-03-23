<footer class="footer">
	<div class="footer-top">
    	<div class="container">
        	<div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="footer-nav">
                        <h4>information</h4>
                        <ul>
                            <li><a href="#">about</a></li>
                            <li><a href="#">delivary information</a></li>
                            <li><a href="#">privacy policy</a></li>
                            <li><a href="#">terms &amp; condition</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-3">
                    <div class="footer-nav">
                        <h4>explore our products</h4>
                        <ul>
                            <li><a href="#">interior</a></li>
                            <li><a href="#">exterior</a></li>
                            <li><a href="#">wallpapers</a></li>
                            <li><a href="#">undercoats</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-3">
                    <div class="footer-nav">
                        <h4>customer service</h4>
                        <ul>
                            <li><a href="#">contact us</a></li>
                            <li><a href="#">returns</a></li>
                            <li><a href="#">site map</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-3">
                    <div class="footer-nav">
                        <h4>extras</h4>
                        <ul>
                            <li><a href="#">brands</a></li>
                            <li><a href="#">gift vouchers</a></li>
                            <li><a href="#">specials</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="footer-btm">
    	<div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="footer_box">
                        <div class="copyright">Powered By <a href="#">Web-Robo</a> Apollo paints &copy; 2013</div>
                        
                        <ul class="social-list list-unstyled">
                            <?php
        // $socials = array('facebook', 'twitter', 'youtube', 'linkedin', 'google-plus', 'skype', 'instagram');
        $SocialClub = $this->general_db_model->get_result('social_links','*',"status='publish'");
        foreach ($SocialClub as $social) {
            ?>
                            <li><a href="<?php echo $social->http_links;?>" target="_blank"><i class="fa fa-<?php echo $social->site_name; ?>"></i></a></li>

                            <?php } ?>

                        </ul> 
                    </div>
                </div>
            
                <div class="col-sm-6 col-md-5 col-md-offset-1">
                    <div class="footer-subscribe">
                     <div class="box newsletter">
                        <div class="box-heading"><h5>Newsletter</h5></div>
                            <div class="box-content">
                                <p id="result" style="color:red;"></p>
                <span style="color: #f00;" id="EmailErr"></span>
                                <form method="post" name="theForm" class="subscribe" id="theForm" data-parsley-validate>
                                    <div class="input-group">
                                    	<input type="email" class="form-control" placeholder="Email Address" name="email" id="email" data-parsley-type="email" data-parsley-minlength="5" required>
                                        <span class="input-group-btn">
                                        	<button type="button" id="button" class="btn btn-default">subscribe</button>
                                        </span>
                                	</div>
                                </form>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    $(function () {
        $('#button').click(function (e) {
            e.preventDefault();
            var email = $('#email').val();
            var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
            if (email == "") {
                document.getElementById("EmailErr").innerHTML = "&#x2717 Enter Your Email";
                return false;
            } else if (!emailRegex.test(email)) {
                document.getElementById("EmailErr").innerHTML = "&#x2717 Enter a valid Email";
                return false;
            } else {
                document.getElementById("EmailErr").innerHTML = "";
            }
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('home/newsletter') ?>',
                data: {ajaxEmail: email},
                success: function (response) {

                    $("#result").empty().append(response);
                    e.defaultSubmit();
                }
            });
        });
    })
</script>