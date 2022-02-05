<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Update CMS </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">CMS Management</a></li>
            <li class="active">New CMS</li>
        </ol>
    </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">CMS Details</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="post" id="uservalidator" action="<?php echo base_url();?>cms/edit_cms/<?= $cms_info->cms_id?>" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cms_page_name">CMS Page Name</label>
                                                        <input type="text" class="form-control" id="cms_page_name" value="<?php echo $cms_info->cms_page_name?>"  name="cms_page_name" placeholder="CMS Page Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>CMS Meta Title</label>
                                                        <input class="form-control" type="text" name="cms_meta_title" id="cms_meta_title" value="<?php echo $cms_info->cms_meta_title ?>" placeholder="CMS Meta Title" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label>CMS Meta Keywords</label>
                                                        <input class="form-control" type="text" name="cms_meta_Keywords" id="cms_meta_Keywords" value="<?php echo $cms_info->cms_meta_Keywords ?>" placeholder="CMS Meta Keywords" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>CMS Meta Description</label>
                                                        <input class="form-control" type="text" name="cms_meta_description" id="cms_meta_description" value="<?php echo $cms_info->cms_meta_description ?>" placeholder="CMS Meta Description" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>CMS Page Content</label>
                                                        <textarea class="form-control"  name="cms_page_content" id="editor1" placeholder="CMS Page Content" value="" required ><?php echo $cms_info->cms_page_content ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="box-footer">
                                                        <input type="submit" name="submit" value="Update CMS Page" class="btn btn-success"/>
                                                        <!--<input type="submit" class="btn btn-primary" value="<?php echo $btnMsg; ?>">-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <!-- /.box-body -->


                            </form>
                        </div>
                        <!-- /.box -->
                    </div>
                </section>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->

   <script>
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#appended_logo').show();
			$('#user_photo_old').hide();
			$('#appended_logo').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$("#user_photo").change(function(){
    readURL(this);
});
$("#user_type input[name='user_type']").click(function(){
    if($('input:radio[name=user_type]:checked').val() == "2"){
		$("#select_venue").show();
    }else if($('input:radio[name=user_type]:checked').val() == "1"){
		$("#select_venue").hide();
	}else{
		$("#select_venue").hide();
	}
});
<?php if($actionMsg=='Update'){
		if($venue_id !="" && $venue_id>0) { ?>
			$("#select_venue").show();
<?php }
 } ?>
</script>        