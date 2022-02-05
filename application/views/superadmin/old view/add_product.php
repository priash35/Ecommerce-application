<?php
$Id = $this->uri->segment('3');
$getId = $Id!="" ? $Id : '0';

$product_name  = '';
$product_desc  = '';
$selected_area_id ='';
$category_id  = '';
$isActive = '';
$product_image='';
$price='';
$sub_category_id ='';
$selected_area =array('0');
$actionMsg = "Add";
$btnMsg = "Save";
$delInfo ='';
$care='';
if(isset($getproduct) && !empty($getproduct)) { 
   $actionMsg = "Update";
   $btnMsg = "Update";
   $product_name = $getproduct->product_name!="" ? $getproduct->product_name : '';
   $product_desc = $getproduct->product_desc!="" ? $getproduct->product_desc : '';
   $category_id = $getproduct->category_fk_id!="" ? $getproduct->category_fk_id : '';
   $sub_category_id = $getproduct->sub_category_fk_id!="" ? $getproduct->sub_category_fk_id : '';
   $price=$getproduct->price!="" ? $getproduct->price : '';
   $product_image=$getproduct->product_image!="" ? $getproduct->product_image : '';
   $isActive = $getproduct->product_status!="" ? $getproduct->product_status : '';
   $selected_area_id = $getproduct->area_fk_id!="" ? $getproduct->area_fk_id : '';
   $delInfo =$getproduct->delInfo!="" ? $getproduct->delInfo : ''; 
   $care =$getproduct->care!="" ? $getproduct->care : '';
   $selected_area = explode(",",$getproduct->area_fk_id);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h4>
		<?php echo $actionMsg; ?> product 
		<!--<small>Preview</small>-->
	  </h4>
	</section>
	<div class="pull-left left15">
	    <ol class="breadcrumb breadcrumb1">
			<li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
			<li class="active">product Management</li>
			<li class="active"><?php echo $actionMsg; ?> product</li>
	    </ol>
	</div>

	<!-- Main content -->
	<section class="content content2">

	  <!-- SELECT2 EXAMPLE -->
			<div class="box box1 box-default">
			<?php
				$status = '';
				if(isset($insproduct) && $insproduct!="" && $insproduct > 0) {
					$status = "added";
				} else if(isset($isUpdproduct) && $isUpdproduct>0) {
					$status = "updated";
				}
			?>
			<?php if($status!="") { ?>
			<div class="box-header with-border">
				<h3 class="box-title">
					<span style="color:green">product has been <?php echo $status; ?> successfully</span>
				</h3>
			</div>
			<?php } ?>
			<!-- /.box-header -->
			<div class="box-body">
				<form method="post" id="productvalidator" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Product Name<span style="color:red">*</span></label>
								<input type="text" id="product_name" name="product_name" value="<?php echo $product_name ?>" class="form-control validate[required,maxSize[50],custom[onlyLetter]]" placeholder="Product Name">
								<input type="hidden" name="id" id="id" value="<?php echo $getId; ?>">
								<input type="hidden" name="action" id="action" value="<?php echo $actionMsg; ?>">
							</div><!-- /.form-group -->
							<div class="form-group">
								<label>Product Description<span style="color:red">*</span></label>
								<textarea name="product_desc" class="form-control validate[required]" placeholder="Product Description"><?php echo $product_desc; ?></textarea>
							</div><!-- /.form-group -->
							<div class="form-group">
								<label>Delivery Information<span style="color:red">*</span></label>
								<textarea name="delInfo" class="form-control validate[required]" placeholder="Delivery Information"><?php echo $delInfo; ?></textarea>
							</div><!-- /.form-group -->
							<div class="form-group">
								<label>Product Care<span style="color:red">*</span></label>
								<textarea name="care" class="form-control validate[required]" placeholder="Product Care"><?php echo $care; ?></textarea>
							</div><!-- /.form-group -->
							<div class="form-group">
								<label>Product Price<span style="color:red">*</span></label>
								<input type="text" id="price" name="price" value="<?php echo $price; ?>"
								class="form-control validate[required,minSize[1],maxSize[10]]" placeholder="Product Price">
							</div>
							<div class="col-md-12 nopadding">
								<label>Select Area<span style="color:red">*</span></label><br />
									<?php
									 if(count($area_data)>0){
										foreach($area_data as $cResult) {
											$chechinArr = multi_in_array($cResult['area_pk_id'],$selected_area);
											if($chechinArr){ ?>
												<div class="col-md-6 filterpadstyle" style="padding-left:0px;">
													<div class="checkbox checkboxstyle">
														<input checked type="checkbox" id='product_<?php echo $cResult['area_pk_id'] ?>' class="validate[required]" name="area" value="<?php echo $cResult['area_pk_id'];  ?>" />
														<label class="labelclass" for="product_<?php echo $cResult['area_pk_id']; ?>" ><?php echo ucfirst($cResult['area_name'].'( '.$cResult['area_pin'].')') ; ?></label>
													</div>
												</div>
											 <?php } else{ ?>
												<div class="col-md-6 filterpadstyle" style="padding-left:0px;">
													<div class="checkbox checkboxstyle">
														<input type="checkbox" id='product_<?php echo $cResult['area_pk_id'] ?>' class="validate[required]" name="area" value="<?php echo $cResult['area_pk_id'];  ?>" />
														<label class="labelclass" for="product_<?php echo $cResult['area_pk_id']; ?>" ><?php echo ucfirst($cResult['area_name'].'( '.$cResult['area_pin'].')') ; ?></label>
													</div>
												</div>

											<?php }
										}
									}else{
										echo "Record not found" ;
									} ?>
									<input type="hidden" id="checkd_area" name="area_id" value="<?php echo $selected_area_id;?>">
							</div>
							<div class="form-group">
								<label>Select Category<span style="color:red">*</span></label>
								<select class="form-control validate[required]" name="category_id" id="category_id" >
									<option value="">--Select Category--</option>
									<?php
									if(count($category_data)>0){
										foreach($category_data as $result){ 
											if($result['category_pk_id']== $category_id){
												$selected = 'selected';
											}else{
												$selected = '';
											}
											?>
											<option value="<?php echo $result['category_pk_id']; ?>" <?php echo $selected;?>><?php echo ucfirst($result['category_name'].' ('.$result['category_type'].')'); ?></option>
											<?php
										}
									} ?>
								</select>
							</div>
							<div id="sub_category">
								<?php if(isset($actionMsg) && $actionMsg=="Update"){ ?>
									<label>Select Sub Category<span style="color:red">*</span></label>
									<select class="form-control validate[required]" name="sub_cat" id="sub_cat" >
										<option value="">--Select Sub Category--</option>
										<?php
										if(count($sub_category_info)>0){
											foreach($sub_category_info as $result){ 
												if($result['sc_pk_id']== $sub_category_id){
													$selected = 'selected';
												}else{
													$selected = '';
												}
												?>
												<option value="<?php echo $result['sc_pk_id']; ?>" <?php echo $selected;?>><?php echo ucfirst($result['sc_category_name']); ?></option>
												<?php
											}
										} ?>
									</select>
								<?php } ?>
						    </div>
							<div class="form-group">
								<label>Status</label> <br/>
								<input type="radio" name="is_active" value="1" id="active" checked="checked" <?php if($isActive =="1") {?> checked <?php } ?>>
								<label class="labelclass" for="active" >Active</label>  
								&nbsp;&nbsp;<input type="radio" id="deactive" name="is_active" value="2" <?php if($isActive =="2") {?> checked <?php } ?>>
								<label class="labelclass" for="deactive" >Inactive</label>
							</div><!-- /.form-group -->
							<label for="exampleInputEmail1">Product Images</label><br />
							<div class="form-group">
								<?php 
								$i=0;
								if(isset($product_images) && !empty($product_images)){ 
									for($i=0;$i<count($product_images);$i++){ ?>
										<div id="del_promo_img<?php echo $product_images[$i]['prod_img_pk_id'];?>" style="display: block;">
										   <div id="abcd<?php echo $i;?>" class="abcd col-md-6 promotional_img">
												<img style="margin-top:10px;margin-bottom:10px;" id="previewimg<?php echo $i;?>" src="<?php echo base_url(); ?>assets/images/product_image/thumb/<?php echo $product_images[$i]['file_name']; ?>" width="137px" height="112px">
												<img id="del_img<?php echo $i;?>" class="del_promo_img del_img" src="<?php echo base_url(); ?>assets/images/del.png" align="<?php echo $product_images[$i]['file_name']; ?>" alt="<?php echo $product_images[$i]['prod_img_pk_id']; ?>">
											</div>
										</div>
								<?php  
									} 
								} ?>
								<div>
									<input type="file" name="prod_images[]" accept="image/*" id="prod_images" class="col-md-6 prod_images">
								</div>
								<input type="button" id="add_more" class="col-md-3 btn btn-success" value="Add More Image" />
							</div>
						</div>
						<div class = "col-md-12 nopadding">
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="<?php echo $btnMsg; ?>">
								<a href="<?php echo base_url(); ?>product/product_list" class="btn btn-danger">Cancel</a>
							</div>
						</div>
					</div><!-- /.box-body -->
				</form>
			</div><!-- /.box -->
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
/*function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#appended_logo').show();
			$('#product_photo_old').hide();
			$('#appended_logo').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$("#product_image").change(function(){
    readURL(this);
});*/
$("#category_id").change(function() {
	var mydata = $(this).val();
	if(mydata==''){
		$('#sub_category').html('');
	} else{
		$.ajax({
			type: "POST",
			data: {mydata:mydata},
			url: url+'ajax/append_subcategory',
			success: function(data) { 
				$('#sub_category').html('');
				$('#sub_category').append(data);
			}
		});
	}
});
var abc = '<?php echo $i;?>'; // Declaring and defining global increment variable.
$(document).ready(function() {
    $('#add_more').click(function() {
        $(this).before($("<div/>", {
            id: 'filediv'
        }).fadeIn('slow').append($("<input/>", {
            name: 'prod_images[]',
            type: 'file',
			accept:'image/*',
			class:'prod_images',
            id: 'prod_images'+ abc
			
        })));
    });
    // Following function will executes on change event of file input to select different file.
    $('body').on('change', '.prod_images', function() {
		var ext = $(this).val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
			swal("Please select an image.Only (gif, png, jpg, jpeg) types are allowed");
			$(this).val('');
			return false;
	    }
        if (this.files && this.files[0]) {
            abc += 1; // Incrementing global variable by 1.
            var z = abc - 1;
            var x = $(this).parent().find('#previewimg' + z).remove();
            $(this).before("<div id='abcd" + abc + "' class='abcd col-md-6 prod_images'><img style='margin-top:10px;margin-bottom:10px;' width='137px' height='112px' id='previewimg" + abc + "' src=''/></div>");
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
            $(this).hide();
            $("#abcd" + abc).append($("<img/>", {
                id: 'del_img'+ abc,
                src: url+'assets/images/del.png',
                class: 'del_img del_promo_img',
				accept:'image/*',
                alt: 'delete'
            }).click(function() {
				swal({
					title: "Are you sure you want to delete this image?",
					text: "You will not be able to recover this record!",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes, delete it!",
					closeOnConfirm: false
				},
				function(){
					$('#del_img'+ abc).parent().parent().remove();
					swal("Deleted!", "Image has been deleted.", "success");
				});	
            }));
        }
    });
    // To Preview Image
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };
$('.del_promo_img').click(function() {
	var id = $(this).attr("alt");
	var img_name = $(this).attr("align");
	swal({
		title: "Are you sure you want to delete this image?",
		text: "You will not be able to recover this record!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Yes, delete it!",
		closeOnConfirm: false
	},
	function(){
		jQuery.ajax({
			type: "POST",
			data: {id:id,img_name:img_name},
			url: url+'ajax/delete_prod_image',
			success: function(data) { 
				$("#del_promo_img"+id).hide();
				swal("Deleted!", "Image has been deleted.", "success");
			}
		});
	});
});
	
});
$(function () {
    $("input[name = 'area']").change(function () {
		$checks1 = $("input[name = 'area']:checkbox");
        if (this.checked) {
            var string = $checks1.filter(":checked").map(function(i,v){
				return this.value;
			}).get().join(",");
			$('#checkd_area').val(string);
        }else{
			var selected_specialization = $('#checkd_area').val();
			string = selected_specialization.replace(this.value, '');
			string = string.replace(',,', ',');
			$('#checkd_area').val(string);
		}
    });
});
</script>