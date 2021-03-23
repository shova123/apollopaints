<script>
    $(document).ready(function () {
        $('#video_link').keyup(function () {
            var video_linkVal = $(this).val();

            if (video_linkVal.length > 0) {
                $('#media_image').hide();
                //$('#videoiframe').html("");
                $('#videoiframe').html('<img src="<?php echo base_url(); ?>assets_admin/img/ajax-loader.gif" />');
                $('#videoiframe img').fadeOut(1500);
                var items = [];
                var arr = video_linkVal.split('?'), i;
                for (i in arr) {
                    var videoIDval = arr[1];
                }
                var idstrlength = videoIDval.length; //finding $video[1] length
                var videoID = videoIDval.substring(2, idstrlength);

                //var ytApiKey = "AIzaSyCV_Xf4m8RN4rS554u-u9XozKTYOQOxZvM";
                //var getData ="https://www.googleapis.com/youtube/v3/videos?part=snippet&id=" + videoID + "&key=" + ytApiKey;
                //alert(getData);
//                $.get(getData, function(data) {
//                  alert(data.items[0].snippet.title);
//                });
//                var url = 'https://www.googleapis.com/youtube/v3/videos?id='+videoID+'&key='+API_keys+'&fields=items(snippet(title))&part=snippet';
//                alert(data.items[0].snippet.title);
                //var url = "http://gdata.youtube.com/feeds/api/videos/"+videoID;
                //document.load(url);
                //var title = document.getElementsByTagName("title").items[0];
                //alert(title);

                items.push('<object width="525" height="350" data="http://www.youtube.com/v/' + videoID + '" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/' + videoID + '" /></object>');
                $('#videoiframe').append.apply($('#videoiframe'), items);

            } else {
                $('#media_image').show();
                $('#videoiframe').html($('<object/>').text("No Data Found"));
            }

        });
    });
</script>
<?php $isEdit = isset($videoDetails) ? true : false; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-color box-bordered">
                <div class="box-title">
                    <h3>
                        <i class="fa fa-edit"></i><?php echo $page_title ?></h3>
                </div>
                <div class="box-content nopadding">
                    <form action="" method="POST" name="addEditform" id="addEditform" class="addEditform form-horizontal form-bordered form-validate" enctype='multipart/form-data' >
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Video Title</strong></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="title" id="title" value="<?php if (@$isEdit) echo $videoDetails->title; ?>"/>
                            </div>
                        </div><!--/form-group-->

                        <div class="form-group" id="tutorialRow">

                            <label class="control-label col-sm-2">Youtube Link</label>
                            <div class="col-sm-6">
                                <input type="text" name="video_link" id="video_link" value="<?php
                                if (@$isEdit) {
                                    echo $videoDetails->video_link;
                                }
                                ?>" placeholder="Paste Youtube URL link" class="form-control">
                            </div>
                        </div>
                        <div class="form-group" >

                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-6" id="videoiframe">
                                <?php
                                if (@$isEdit) {
                                    $videosID = $videoDetails->video_id;  
                                    ?>
                                    <object width="525" height="350" data="http://www.youtube.com/v/<?php echo $videosID; ?>" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/<?php echo $videosID; ?>" /></object>
                                <?php } ?>

                            </div>
                        </div>


                        <div class="form-group">
                            <div>
                                <label class="control-label col-sm-2">Status</label>
                                <div class="col-sm-2">
                                    <select class="form-control" name="status">
                                        <option value="publish" <?php
                                        if ($isEdit) {
                                            if ($videoDetails->status == 'publish') {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>Publish</option>
                                        <option value='unpublish' <?php
                                        if ($isEdit) {
                                            if ($videoDetails->status == 'unpublish') {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>Unpublish</option>

                                    </select>
                                    <!-- <span class="help-block">1 for publish 0 for unpublish</span> -->
                                </div>
                            </div>
                        </div>
<!--                        <div class="form-group">
                            <label class="col-sm-2 control-label">Order</label>
                            <div class="col-sm-1">
                                <input type="number" class="form-control" name="order" id="order" value="<?php if (@$isEdit) echo $videoDetails->order; ?>"/>
                            </div>
                            <span style="color: #ff0000;">Arrange the order of page.</span>
                        </div>/form-group-->
                        <div class="form-actions">
                            <input type="submit" name="videoSubmit" class="btn btn-primary" value="Submit">
                            <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                            <a href="<?php echo base_url("admin/pages/video"); ?>"><button type="button" class="btn">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>