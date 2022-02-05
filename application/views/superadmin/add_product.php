<?php
$Id = $this->uri->segment('3');
$getId = $Id != "" ? $Id : '0';

$product_name = '';
$product_desc = '';
$selected_area_id = '';
$category_id = '';
$isActive = '';
$product_image = '';
$price = '';
$sub_category_id = '';
$actionMsg = "Add";
$selected_area = array('0');
$selected_color = array('0');
$btnMsg = "Save";
$care = '';
$SUK = '';
$brand_pk_id = '';
$QTY = '';
$Mproduct = '';
$Xproduct = '';
$XLproduct = '';
$XXproduct = '';
$sc_category_fk_id = '';
$city_pk_id = '';
$vendor_pk_id = '';
$selected_colors = '';
if (isset($getproduct) && !empty($getproduct)) {
    $actionMsg = "Update";
    $btnMsg = "Update";
    $product_name = $getproduct->product_name != "" ? $getproduct->product_name : '';
    $product_desc = $getproduct->product_desc != "" ? $getproduct->product_desc : '';
    $category_id = $getproduct->category_fk_id != "" ? $getproduct->category_fk_id : '';
    $SUK = $getproduct->SUK != "" ? $getproduct->SUK : '';
    $QTY = $getproduct->QTY != "" ? $getproduct->QTY : '';
    $sub_category_id = $getproduct->sub_category_fk_id != "" ? $getproduct->sub_category_fk_id : '';
    $vendor_pk_id = $getproduct->pro_vendor_id != "" ? $getproduct->pro_vendor_id : '';
    $brand_pk_id = $getproduct->brand != "" ? $getproduct->brand : '';
    $selected_color = explode(",", $getproduct->product_color);
    $selected_colors = $getproduct->product_color != "" ? $getproduct->product_color : '';
    ;
    $Mproduct = $product_info = $this->product_model->get_product_by_size($getproduct->product_pk_id, 'M');
    $Xproduct = $product_info = $this->product_model->get_product_by_size($getproduct->product_pk_id, 'X');
    $XLproduct = $product_info = $this->product_model->get_product_by_size($getproduct->product_pk_id, 'XL');
    $XXproduct = $product_info = $this->product_model->get_product_by_size($getproduct->product_pk_id, 'XX');
    $product_image = $getproduct->product_image != "" ? $getproduct->product_image : '';
    $isActive = $getproduct->product_status != "" ? $getproduct->product_status : '';
    $selected_area_id = $getproduct->area_fk_id != "" ? $getproduct->area_fk_id : '';
    $care = $getproduct->care != "" ? $getproduct->care : '';
    $selected_area = explode(",", $getproduct->area_fk_id);
    $city_pk_id = '';
}
//print_r($brandList);

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product Management</a></li>
            <li class="active">Add Product</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Product Details</h3>
                    </div>
                    <form method="post" id="productvalidator" enctype="multipart/form-data">
                        <div class="box-body ">
                            <div class="col-md-12">
                                <div class="form-horizontal">
                                    <div class="box-body">
                                        <div class="form-group col-md-6">
                                            <label class="col-sm-5 text-left">Item Code</label>
                                            <div class="col-sm-7">
                                               	<input type="text" id="SUK" name="SUK" onkeypress="" value="<?php echo $SUK ?>" class="form-control validate[required,maxSize[50]]" placeholder="Item Code">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-sm-5 text-left">Product Name</label>
                                            <div class="col-sm-7">
                                                <input type="text" id="product_name" name="product_name" value="<?php echo $product_name ?>" class="form-control validate[required,maxSize[50]]" placeholder="Product Name">
                                                <input type="hidden" name="id" id="id" value="<?php echo $getId; ?>">
                                                <input type="hidden" name="action" id="action" value="<?php echo $actionMsg; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-sm-5 text-left">Product Brand</label>
                                            <div class="col-sm-7">
                                                <select name="brand" class="form-control">
                                                    <option value="">-- Please Select --</option>
                                                    <?php
                                                    if (count($brandList) > 0) {
                                                        foreach ($brandList as $resultbrandList) {
                                                            ?>
                                                            <option   value="<?= $resultbrandList['brand_pk_id'] ?>" <?php
                                                            if ($resultbrandList['brand_pk_id'] == $brand_pk_id) {
                                                                echo "selected";
                                                            }
                                                            ?> ><?= $resultbrandList['brand_name'] ?></option>
                                                                      <?php
                                                                  }
                                                              }
                                                              ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-sm-5  text-left">Product Category</label>
                                            <div class="col-sm-7">
                                                <select class="form-control validate[required]" name="category_id" id="category_id" >
                                                    <option value="">----- Select Category-----</option>
                                                    <?php
                                                    if (count($category_data) > 0) {
                                                        foreach ($category_data as $resultcat) {
                                                            ?>
                                                            <option   value="<?= $resultcat['category_pk_id'] ?>" <?php
                                                            if ($resultcat['category_pk_id'] == $category_id) {
                                                                echo "selected";
                                                            }
                                                            ?> ><?= $resultcat['category_name'] ?></option>
                                                                      <?php
                                                                  }
                                                              }
                                                              ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail3" class="col-sm-5 text-left">Product Sub Category</label>
                                            <div class="col-sm-7">
                                                <span id="sub_category">
                                                    <?php if (isset($actionMsg) && $actionMsg == "Update") { ?>

                                                        <select  class="form-control" name="sub_cat" id="sub_catid" >
                                                            <option value="" >--Select Sub Category--</option>
                                                            <?php
                                                            if (count($subcategory_data) > 0) {
                                                                foreach ($subcategory_data as $result) {
                                                                    if ($result['sc_pk_id'] == $sub_category_id) {
                                                                        $selected = 'selected';
                                                                    } else {
                                                                        $selected = '';
                                                                    }
                                                                    ?>
                                                                    <option value="<?php echo $result['sc_pk_id']; ?>" <?php echo $selected; ?>><?php echo ucfirst($result['sc_category_name']); ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-sm-5 text-left">Product SubSub Category</label>
                                            <div class="col-sm-7">
                                                <span id="size_category">
                                                    <?php if (isset($actionMsg) && $actionMsg == "Update") { ?>

                                                        <select  class="form-control" name="size_cat" id="size_cat" >
                                                            <option value="1" >--Select Sub Sub Category--</option>
                                                            <?php
                                                            if (count($sizecategory_data) > 0) {
                                                                foreach ($sizecategory_data as $result) {
                                                                    if ($result['sz_pk_id'] == $sz_category_name) {
                                                                        $selected = 'selected';
                                                                    } else {
                                                                        $selected = '';
                                                                    }
                                                                    ?>
                                                                    <option value="<?php echo $result['sz_pk_id']; ?>" <?php echo $selected; ?>><?php echo ucfirst($result['sz_category_name']); ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputEmail3" class="col-sm-5 text-left">Product Description</label>
                                            <div class="col-sm-7">

                                                <textarea name="product_desc" class="form-control validate[required]" placeholder="Product Description"><?php echo $product_desc; ?></textarea>
                                            </div>
                                        </div>
                                        <!--                                        <div class="form-group col-md-6">
                                                                                    <label for="inputEmail3" class="col-sm-5 text-left">Product Stock Qty</label>
                                                                                    <div class="col-sm-7">
                                                                                        <input type="text" class="form-control validate[required]" name="QTY" placeholder="Stock Qty" value="<?php echo $QTY; ?>">
                                                                                    </div>
                                                                                </div>-->
                                        <!--<div class="form-group col-md-6">
                                            <label for="inputEmail3" class="col-sm-5 text-left">Product Color</label>
                                            <div class="col-sm-7">
                                               <select class="form-control" name="product_color">
                                                 <option value="">-- Select Color --</option>
                                                    <option value="Red">Red</option>
                                                    <option value="BLue">BLue</option>
                                                    <option value="Grean">Grean</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--<div class="form-group  col-md-6">
<label>Product Color  </label>  
<div class="btn-group" data-toggle="buttons">
                                        <?php
                                        if (!empty($color_data)) {
                                            foreach ($color_data as $res) {
                                                ?>                                                                                                 </>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </div>

</div>-->
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail3" class="col-sm-5 text-left">Vendor</label>
                                            <div class="col-sm-7">
                                                <select class="form-control validate[required]" name="vendor_pk_id">
                                                    <option value="">-- Select Vendor --</option>
                                                    <?php
                                                    if (count($vendor_data) > 0) {
                                                        foreach ($vendor_data as $result) {
                                                            if ($result['vendor_pk_id'] == $vendor_pk_id) {
                                                                $selected = 'selected';
                                                            } else {
                                                                $selected = '';
                                                            }
                                                            ?>
                                                            <option value="<?php echo $result['vendor_pk_id']; ?>" <?php echo $selected; ?>><?php echo ucfirst($result['bus_name']); ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="padding: 0">
                                            <label class="col-sm-5 text-left">Product Size and Price :</label>
                                           
                                            <div class="box-body">
                                                <table class="table table-bordered text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>Product Size Name</th>
                                                            <th>Product Unit Price</th>
                                                            <th>Product Discount (%)</th>
                                                            <th>Product Quantity</th>
                                                            <th>Product Discount Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="product_size">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="box-body col-md-10 input_fields_wrap">
                                                <label for="inputEmail3" class="col-sm-10 text-left">Product Delivery Charge</label>

                                                <table  class="table table-bordered ">
                                                    <tr>
                                                        <th>City</th>
                                                        <th>Area pin Code</th>
                                                        <th>Delivery Charge</th>
                                                        <th>Number Of Days</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <tbody id="appendArea" class="asdf">

                                                        <tr id="ss" rel="0" class="abc">
                                                            <td>
                                                                <select id="" class="city_id form-control validate[required]" name="cityid_0"> 
                                                                    <option value="">-- Please Select City --</option>
                                                                    <?php
                                                                    if (count($CityData) > 0) {
                                                                        foreach ($CityData as $result) {
                                                                            if ($result['city_pk_id'] == $city_pk_id) {
                                                                                $selected = 'selected';
                                                                            } else {
                                                                                $selected = '';
                                                                            }
                                                                            ?>
                                                                            <option value="<?php echo $result['city_pk_id']; ?>" <?php echo $selected; ?>><?php echo ucfirst($result['city_name']); ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>

                                                                </select></td>
                                                            <td>
                                                                <span id="AreaID">
                                                                    <select class="form-control validate[required]" name="area_0">
                                                                        <option value="">-- Please Select Area Pin code--</option>
                                                                    </select>

                                                            </td>
                                                            <td id="" class="areaClass"> <input type="number" name="delivery_charges_0" class="form-control"  placeholder="Delivery Charge"></td>
                                                            <td id="" class="areaClass"> <input type="number" name="no_of_days_0" class="form-control"  placeholder="Stock Quantity"></td>
                                                            <td id="areaID_0" ><a onclick="addMore(0)" id="addmoreArea"  class="addmoreArea btn btn-social-icon btn-primary"><i class="fa fa-plus"></i></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12">

                                                <label>Product Color</label>	<br />
                                                <?php
                                                if (count($color_data) > 0) {
                                                    foreach ($color_data as $cResult) {
                                                        $chechinArr = multi_in_array($cResult['color_pk_id'], $selected_color);
                                                        if ($chechinArr) {
                                                            ?>
                                                            <div class="col-md-3 form-group filterpadstyle" style="margin: 10px;">
                                                                <div class="checkbox checkboxstyle " style="background-color:<?php echo $cResult['color_code']; ?>; width: 30px">
                                                                    <input checked type="checkbox" id='color_<?php echo $cResult['color_pk_id'] ?>' class="" name="checkbox" value="<?php echo $cResult['color_pk_id']; ?>" />
                                                                    <span class="box"></span>
                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="col-md-3 filterpadstyle" style="margin: 10px;">
                                                                <div class="checkbox  checkboxstyle" style="background-color:<?php echo $cResult['color_code']; ?>; width: 30px">
                                                                    <input type="checkbox" id='color_<?php echo $cResult['color_pk_id'] ?>'  class="" name="checkbox" value="<?php echo $cResult['color_pk_id']; ?>" />
                                                                    <span class="box"></span>
                                                                </div>
                                                            </div>

                                                            <?php
                                                        }
                                                    }
                                                } else {
                                                    echo "Record not found";
                                                }
                                                ?>
                                            </div>
                                            <input type="hidden" id="checkd_colors" name="product_color" value="<?php echo $selected_colors; ?>">
                                            <div class="col-md-12">
                                                <label for="exampleInputEmail1">Product Images</label><br />
                                                <div class="form-group">
                                                    <?php
                                                    $i = 0;
                                                    if (isset($product_images) && !empty($product_images)) {
                                                        for ($i = 0; $i < count($product_images); $i++) {
                                                            ?>
                                                            <div id="del_promo_img<?php echo $product_images[$i]['prod_img_pk_id']; ?>" style="display: block;">
                                                                <div id="abcd<?php echo $i; ?>" class="abcd col-md-6 promotional_img">
                                                                    <img style="margin-top:10px;margin-bottom:10px;" id="previewimg<?php echo $i; ?>" src="<?php echo base_url(); ?>assets/images/product_image/thumb/<?php echo $product_images[$i]['file_name']; ?>" width="137px" height="112px">
                                                                    <img id="del_img<?php echo $i; ?>" class="del_promo_img del_img" src="<?php echo base_url(); ?>assets/images/del.png" align="<?php echo $product_images[$i]['file_name']; ?>" alt="<?php echo $product_images[$i]['prod_img_pk_id']; ?>">
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <div>
                                                        <input type="file" name="prod_images[]" accept="image/*" id="prod_images" class="col-md-6 prod_images">
                                                    </div>
                                                    <input type="button" id="add_more" class="col-md-3 btn btn-success" value="Add More Image" />
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
</div>
</section>
</div>
<style type="text/css">
    .boxs{
        display: none;
    }
</style>


<script>

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function product_disc(id) {
    var a = Number(document.getElementById("unitprice" + id).value);
    var b = Number(document.getElementById("discount" + id).value);
    var c = a - (Number(a) * Number(b) / 100);
    document.getElementById("discPrice" + id).value = c;

}

function sum() {
    a = Number(100);
//        a = Number(document.getElementById("rate").value);
    b = Number(10);
    c = a - (Number(a) * Number(b) / 100);
//        alert(c);
//        document.getElementById("net").value = c;
}

//    sum();
$(function() {
    $("input[name = 'checkbox']").change(function() {
        $checks = $("input[name = 'checkbox']:checkbox");
        if (this.checked) {
            var string = $checks.filter(":checked").map(function(i, v) {
                return this.value;
            }).get().join(",");
            $('#checkd_colors').val(string);
        } else {
            var selected_classes = $('#checkd_colors').val();
            string = selected_classes.replace(this.value, '');
            string = string.replace(',,', ',');
            $('#checkd_colors').val(string);
        }
    });
});
function display(obj, a) {

    var CITY = obj.value;
    if (CITY == '') {
        $('#AreaID' + a).html('');
    } else {
        $.ajax({
            type: "POST",
            data: {CITY: CITY, a: a},
            url: url + 'ajax/append_Area_addproduct',
            success: function(data) {
                $('#AreaID' + a).html('');
                //alert($(".city_id").next().find('.AreaID').value);
                //$("#city1").next().find('.AreaID').append(data);
                $('#AreaID' + a).append(data);
            }
        });
    }
}
function addMore(a) {
    //alert(a);
    $('#areaID_' + a).css('display', 'none');
    a = a + 1;
    var areaHtml = '<tr><td><select onchange="display(this,' + a + ');" id="city' + a + '" name="cityid_' + a + '" class="city_id form-control validate[required]"><option value="">-- Please Select City --</option><?php
if (count($CityData) > 0) {
foreach ($CityData as $result) {
if ($result["city_pk_id"] == $city_pk_id) {
$selected = "selected";
} else {
$selected = "";
}
?><option value="<?php echo $result["city_pk_id"]; ?>" <?php echo $selected; ?>><?php echo ucfirst($result["city_name"]); ?></option><?php
}
}
?></select></td>';
    areaHtml += '<td><span id="AreaID' + a + '" class="AreaID"><select class="form-control validate[required]" name="area_' + a + '"><option value="">-- Please Select Area Pin code--</option></select><span></td>';
    areaHtml += '<td id="" class="areaClass"> <input type="number" name="delivery_charges_' + a + '" class="form-control"  placeholder="Delivery Charge"></td>';
    areaHtml += '<td id="" class="areaClass"> <input type="number" name="no_of_days_' + a + '" class="form-control"  placeholder="Stock Quantity"></td>';
    areaHtml += '<td id="areaID_' + a + '" ><a onclick="addMore(' + a + ')" id="addmoreArea" class="addmoreArea btn btn-social-icon btn-primary"><i class="fa fa-plus"></i></a></td>';
    areaHtml += '</tr>';
    $('#appendArea').append(areaHtml);

}
/*
 $("#addmoreArea").click(function(){

 var par = $(this).parent().parent().attr('rel');
 var className = $("#areaID_"+par).attr('id');

 $('#'+className).children().removeAttr("id");

 var par1 = par+1;
 var newRow ='<tr id="ss"  class="abc" rel="'+par1+'" ><td><select id="CityID" class="form-control validate[required]"><option value="">-- Please Select City --</option>';
 var newRoe='<?php
if (count($CityData) > 0) {
foreach ($CityData as $result) {
if ($result["city_pk_id"] == $city_pk_id) {
$selected = "selected";
} else {
$selected = "";
}
?>';
         var newRow2='<option value="<?php echo $result["city_pk_id"]; ?>" <?php echo $selected; ?>><?php echo ucfirst($result["city_name"]); ?></option><?php
}
}
?>';

 var newRow3='</select></td>	<td><span id="AreaID"><select class="form-control validate[required]" name="area['+par1+']"><option value="">-- Please Select Area Pin code--</option></select><span></td><td class="areaClass"> <input type="number" class="form-control"  placeholder="Delivery Charge"></td><td id="areaID_'+par1+'"><a id="addmoreArea" class="btn btn-social-icon btn-primary"><i class="fa fa-plus"></i></a></td></tr>"';
 var areaHtml = (newRow+newRoe+newRow2+newRow3);
 $('#appendArea').append(areaHtml);
 });
 *//*function readURL(input) {
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
    if (mydata == '') {
        $('#product_size').html('');
        $('#sub_category').html('');
        $('#size_category').html('');

    } else {
    $.ajax({
            type: "POST",
            data: {mydata: mydata},
            url: url + 'ajax/append_subcategory_addproduct',
            success: function(data) {
               // $('#product_size').html('');
                $('#sub_category').html('');
                $('#sub_category').append(data);
                 $('#sub_catidXYZ').change(function() { 
                    var mydata1 = $(this).val();
                     if (mydata1 == '') {
                        //$('#product_size').html('');
                        $('#size_category').html('');

                        } else{
                             $.ajax({
                                type: "POST",
                                data: {mydata1: mydata1},
                                url: url + 'ajax/append_sizecategory_addproduct',
                                success: function(data) {
                                    $('#size_category').html('');
                                    $('#size_category').append(data);
                                    $('#size_cat').on('change', function() {
                                         var mysubdata = $(this).val();
                                         if (mysubdata == '') {
                                            $('#product_size').html('');
                                         }else{
                                            $.ajax({
                                                type: "POST",
                                                data: {mysubdata: mysubdata},
                                                url: url + 'ajax/append_produt_size',
                                                success: function (data) {
                                                    $('#product_size').html('');
                                                    $('#product_size').append(data);
                                                }
                                            });
                                         }
                                    });
                                }
                             });
                        }
                 });
            }   
        });
    }
});

/*$("#category_id").change(function() {
    var mydata = $(this).val();
    if (mydata == '') {
        //$('#product_size').html('');
        $('#sub_category').html('');

    } else {
        $.ajax({
            type: "POST",
            data: {mydata: mydata},
            url: url + 'ajax/append_subcategory_addproduct',
            success: function(data) {
               // $('#product_size').html('');
                $('#sub_category').html('');
                $('#sub_category').append(data);
                $('select#sub_catidXYZ').on('change', function() {
                    var mydata1 = $(this).val();
                      $.ajax({
                            type: "POST",
                            data: {mydata1: mydata1},
                            url: url + 'ajax/append_sizecategory_addproduct',
                            success: function(data) {
                                $('#size_category').html('');
                                $('#size_category').append(data);
                                 $('#size_cat').on('change', function() {
                                  var mysubdata = $("#size_cat").val();
                                  alert(mysubdata);
                                   if (mysubdata == '') {
                                            $('#size_category').html('');
                                            $('#size_category').append(data);
                                            //$('#size_category').html('');
                                        } else {
                                        $.ajax({
                                            type: "POST",
                                            data: {mysubdata: mysubdata},
                                            url: url + 'ajax/append_produt_size',
                                            success: function (data) {
                                                $('#product_size').html('');
                                                $('#product_size').append(data);
                                            }
                                        });
                                      }
                                });
                            }
                        });*/
                   //   if (mydata == '') {
                  //      $('#product_size').html('');
                  //      $('#size_category').html('');
                  //  } else {
                        /* $.ajax({
                            type: "POST",
                            data: {mydata: mydata1},
                            url: url + 'ajax/append_produt_size',
                            success: function (data) {
                                $('#product_size').html('');
                                $('#product_size').append(data);
                            }
                        });*/
                    //}

/*                });
            }
        });

    }

});*/


$('select.city_id').on('change', function() { //alert();
    var CITY = $(this).val();
    if (CITY == '') {
        $('#AreaID').html('');
    } else {
        $.ajax({
            type: "POST",
            data: {CITY: CITY, a: 0},
            url: url + 'ajax/append_Area_addproduct',
            success: function(data) {
                $('#AreaID').html('');
                $('#AreaID').append(data);
            }
        });
    }
});

var abc = '<?php echo $i; ?>'; // Declaring and defining global increment variable.
$(document).ready(function() {
    $('#add_more').click(function() {
        $(this).before($("<div/>", {
            id: 'filediv'
        }).fadeIn('slow').append($("<input/>", {
            name: 'prod_images[]',
            type: 'file',
            accept: 'image/*',
            class: 'prod_images',
            id: 'prod_images' + abc

        })));
    });
    // Following function will executes on change event of file input to select different file.
    $('body').on('change', '.prod_images', function() {
        var ext = $(this).val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
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
                id: 'del_img' + abc,
                src: url + 'assets/images/del.png',
                class: 'del_img del_promo_img',
                accept: 'image/*',
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
                function() {
                    $('#del_img' + abc).parent().parent().remove();
                    swal("Deleted!", "Image has been deleted.", "success");
                });
            }));
        }
    });
    // To Preview Image
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    }
    ;
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
        function() {
            jQuery.ajax({
                type: "POST",
                data: {id: id, img_name: img_name},
                url: url + 'ajax/delete_prod_image',
                success: function(data) {
                    $("#del_promo_img" + id).hide();
                    swal("Deleted!", "Image has been deleted.", "success");
                }
            });
        });
    });

});

</script>