<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/function.js">


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Order Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User Order Management</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">User Order List</h3>

                        <div class="row" style="margin-top: 10px">

                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding ">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Order ID</th>
                                        <!--<th>Ship Slot</th>-->
                                        <th>Delivery <br>Charge</th>
                                        <th>Ship Address</th>
                                        <th>Date</th>
                                        <!--<th>Discount <br>Amt</th>-->
                                        <!--<th>Coupon<br>Discount</th>-->
                                        <th>Delivery Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($orderData as $row) {
                                        ?>
                                    <tr>
                                        <td> <?= ++$i ?></td>
                                        <td><?= $row['user_first_name'] . ' ' . $row['user_last_name'] ?></td>
                                        <td><?= $row['order_id'] ?></td>
                                        <td></td>
                                        <td><?= $row['address1'] . ' ' . $row['address2'] . ' ' . $row['city'] . ' ' . $row['postcode'] ?></td>
                                        <td><?= $row['orderdate'] ?></td>
                                        <td><?= $row['order_status']?></td>
                                        <td></td>
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
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>


<script>

    function delvenuealert() {
        swal("Can't delete! You can't delete yourself.")
    }
    function delproduct(id) {
        swal({
            title: "Are you sure you want to delete Product?",
            text: "You will not be able to recover this record!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function () {
            $.ajax({
                type: "POST",
                data: {id: id},
                url: url + 'ajax/delete_product',
                success: function (data) {
                    if (data > 0)
                    {
                        swal("Deleted!", "Product has been deleted.", "success");
                        window.location.href = url + "product/product_list/delete_success";
                    } else {
                        swal("Oops...", "Error in delete product!", "error");
                        window.location.href = url + "product/product_list";
                    }
                }
            });

        });
    }

    function status_change(id, status) {
        if (status == 1) {
            var stc = 'Inactive';
        } else {
            var stc = 'Active';
        }
        swal({
            title: "Are you sure to do product " + stc + "?",
            //text: "You will not be able to recover this record!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes,Change Status!",
            closeOnConfirm: false
        },
        function () {
            jQuery.ajax({
                url: url + "ajax/product_status_change",
                type: "post",
                data: {id: id, status: status},
                success: function (msg) {
                    window.location.href = url + "product/product_list/update_status";
                }
            });
        });
        return false;
    }

</script>