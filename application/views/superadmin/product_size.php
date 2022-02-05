<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Product Size </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Product Management</a></li>
            <li class="active">Product Size</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Product Size</h3>
                    </div>
                    
                    <form role="form"  method="post" method="<?= site_url() ?>product/size_product">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="size" class="form-control" value="<?= $data->id?>">
                                <label>Select Category</label>
                                <?php
                                
                                ?>
                                <select required id="category" name="category"  class="form-control">
                                    <option value="">-- Select Category--</option>
                                    <?php foreach ($category as $row) { ?>
                                    <option value="<?= $row->category_pk_id ?>" <?= $data->category_id == $row->category_pk_id ? "selected":"" ?> ><?= $row->category_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" id="size" class="form-control" value="<?= $data->id?>">
                                
                                <div class="" id="sub_category">
                                    <?php
//                                    echo "<pre>";
//                                    print_r($subcategory_data);
//                                    echo "</pre>";
//                                    die();
                                    ?>
                                    <label>Select Sub Category</label>
                                    <select required id="sub_categories" name="sub_cat"  class="form-control">
                                    <option value="">-- Select Sub Category--</option>
                                   <?php
                                   
                                        if (count($subcategory_data) > 0) {
                                            foreach ($subcategory_data as $result) {
                                                if ($result['sc_pk_id'] == $data->sub_category_id) {
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
                                </div>
                                
                            </div>
                              <div class="form-group">
                                <input type="hidden" name="id" id="size" class="form-control" value="<?= $data->id?>">
                                
                                <div class="" id="sub_sub_categories">
                                    <?php
//                                    echo "<pre>";
//                                    print_r($subcategory_data);
//                                    echo "</pre>";
//                                    die();
                                    ?>
                                    <label>Select Sub Sub Category</label>
                                    <select required id="sub_sub_cat" name="sub_sub_cat"  class="form-control">
                                    <option value="">-- Select Sub Sub Category--</option>
                                   <?php
                                   
                                        if (count($subsubcategory_data) > 0) {
                                            foreach ($subsubcategory_data as $result) {
                                                if ($result['sc_pk_id'] == $data->get_sub_subcategory) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                ?>
                                                <option value="<?php echo $result['sz_sc_category_fk_id']; ?>" <?php echo $selected; ?>><?php echo ucfirst($result['sz_category_name']); ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                </select>
                                </div>
                                
                            </div>
							
                            <div class="form-group">
                                <label>Size</label>
                                <input type="text" name="size" id="size" class="form-control" value="<?= $data->size?>" required>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Sub Sub-Category List</h3>


                    <!-- /.box-header -->
                </div>
                <div class="box-body table-responsive    ">
                    <div class="col-md-12 form-group">
                        <table class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Sub Sub Category</th>
                                    <th>Size</th>
                                    <th>Active/Deactive</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($size as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row->category_name; ?></td>
                                         <td><?= $row->sc_category_name; ?></td>
                                        <td><?= $row->sz_category_name; ?></td>
                                        <td><?= $row->size; ?></td>
                                        <td>
                                            <a href="javascript:void(0)" class="text-center" onclick="status_change(<?php echo $row->id; ?>,<?php echo $row->status; ?>)" title="<?php echo $row->status; ?>">
                                                <?php if ($row->status == '0') { ?>
                                                    <button type="button" class="btn btn-block btn-info">Active</button>
                                                        <!--Active-->
                                                <?php } else {
                                                    ?>
                                                    <button type="button" class="btn btn-block btn-primary">Deactive</button>
                                                    <!--Deactive-->
                                                <?php } ?>                                   
                                            </a>
                                        </td>
                                        <td><a title="Edit" href="<?php echo base_url(); ?>product/size_product?id=<?php echo $row->id; ?>"><img src="<?php echo base_url() ?>assets/images/pencil.png" border="0px"></a>|&nbsp;&nbsp;
                                            <a title="Delete" href="javascript:void(0)" onclick="delsize(<?php echo $row->id; ?>)"><img width="23px;" height="20px;" src="<?php echo base_url(); ?>assets/images/delete.png" broder="0px"></a></td>

                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>

                        <div class="box-footer clearfix">

                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.box -->
</div>

</section>
</div>



<script>
    $("#category").change(function () {
        var mydata = $(this).val();
        if (mydata == '') {
            $('#sub_category').html('');
        } else {
            $.ajax({
                type: "POST",
                data: {mydata: mydata},
                url: url + 'ajax/append_subcategory',
                success: function (data) {
                    $('#sub_category').html('');
                    $('#sub_category').append(data);
                }
            });
        }
    });
    //gs
     $("#sub_category").change(function () {
       // var mysubdata = $(this).val();
        var mysubdata = $("#sub_cat").val();
        if (mysubdata == '') {
            $('#sub_sub_categories').html('');
        } else {
            $.ajax({
                type: "POST",
                data: {mysubdata: mysubdata},
                url: url + 'ajax/append_sub_subcategory',
                success: function (data) {
                    $('#sub_sub_categories').html('');
                    $('#sub_sub_categories').append(data);
                }
            });
        }
    });
    
    function delsize(id) {
        swal({
            title: "Are you sure you want to delete subcategory?",
            text: "You will not be able to recover this record!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function () {
                window.location.href = "<?= base_url() ?>" + "product/delete_size/" + id;
        });
    }

    function status_change(id, status) {
        if (status == 0) {
            var stc = 'Inactive';
        } else {
            var stc = 'Active';
        }
        swal({
            title: "Are you sure to do subcategory " + stc + "?",
            //text: "You will not be able to recover this record!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes,Change Status!",
            closeOnConfirm: false
        },
        function () {
            jQuery.ajax({
                url: url + "ajax/change_status/" + id + "/category_size/id/"+ status,
                type: "post",
                data: {id: id, status: status},
                success: function (msg) {
                    location.reload();
//                    window.location.href = url + "category/size_category_list/update_sz_status";
                }
            });
        });
        return false;
    }
//$("#category_id").change(function() {
//alert();
//var mydata = $(this).val();
//if (mydata == '') {
//    $('#sub_category').html('');
//} else {
//    $.ajax({
//        type: "POST",
//        data: {mydata: mydata},
//        url: url + 'ajax/append_subcategory_addproduct',
//        success: function(data) {
//            $('#sub_category').html('');
//            $('#sub_category').append(data);
//            $('select#sub_catidXYZ').on('change', function() {
//                var mydata1 = $(this).val();
//                if (mydata == '') {
//                    $('#size_category').html('');
//                } else {
//                    $.ajax({
//                        type: "POST",
//                        data: {mydata1: mydata1},
//                        url: url + 'ajax/append_sizecategory_addproduct',
//                        success: function(data) {
//                            $('#size_category').html('');
//                            $('#size_category').append(data);
//                        }
//                    });
//                }
//
//            });
//        }
//    });
//
//}
//
//});

</script>
</div>