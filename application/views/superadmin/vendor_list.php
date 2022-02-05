 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Vendor List
            <small>preview of Vendor List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="user_management.php">Vendor Management</a></li>
            <li class="active">Vendor list</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <!--                        <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="dataTables_length" id="example1_length">
                                                            <label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select>
                                                                entries
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div id="example1_filter" class="dataTables_filter">
                                                            <label>
                                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                        
                                                                    <div class="input-group-btn">
                                                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>-->
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding ">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Created Date</th>
                                    <th>Vendor Name</th>
                                    <th>Vendor Code</th>
                                    <th>Business Name</th>
                                    <th>Email Id.</th>
                                    <th>Contact no.</th>
                                    <th>Reg no.</th>
                                    <th>Image</th>
                                    <th>Active / Deactive</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $cnt = 1;
                                if (count($Vendors_data) > 0) {
                                    foreach ($Vendors_data as $result) {
                                        ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>

                                            <td><?php echo $result['addedon']; ?></td>
                                            <td><?php echo $result['user_first_name']; ?></td>
                                            <td><?php echo $result['vendorcode']; ?></td>
                                            <td><?php echo $result['bus_name']; ?></td>
                                            <td><?php echo $result['user_email']; ?></td>

                                            <td><?php echo $result['user_contact']; ?></td><td><?php echo $result['reg_no']; ?></td>
                                            <td> </td>
                                            <td>
                                                <a href="javascript:void(0)" class="text-center" onclick="status_change(<?php echo $result['user_pk_id']; ?>,<?php echo $result['user_status']; ?>)" title="<?php echo $result['status']; ?>">
                                                    <?php if ($result['user_status'] == '1') { ?>
                                                        <button type="button" class="btn btn-block btn-info">Active</button>
                                                        <?php } else {
                                                        ?>
                                                        <button type="button" class="btn btn-block btn-primary">Deactive</button>
                                                    <?php } ?>
                                                </a>
                                            </td>
                                            <td><a title="Edit" href="<?php echo base_url(); ?>vendors/edit/<?php echo $result['vendor_pk_id']; ?>"><img src="<?php echo base_url() ?>assets/images/pencil.png" border="0px"></a>|&nbsp;&nbsp;
                                                <a title="Delete" href="javascript:void(0)" onclick="delvendor(<?php echo $result['user_pk_id']; ?>,<?php echo $result['vendor_pk_id']; ?>)"><img width="23px;" height="20px;" src="<?php echo base_url(); ?>assets/images/delete.png" broder="0px"></a></td>

                                        </tr>
                                        <?php $cnt++;
                                    }
                                } else { ?>

<?php } ?>
                                        </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
<style>.btn-group .btn {
        padding: 2px;
    }</style>
<script>
    function delvenuealert() {
        swal("Can't delete! You can't delete yourself.")
    }
    function delvendor(uid, vid) {
        swal({
            title: "Are you sure you want to delete vendor?",
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
                data: {uid: uid, vid: vid},
                url: url + 'ajax/delete_vendor',
                success: function (data) {
                    if (data > 0)
                    {
                        swal("Deleted!", "vendor has been deleted.", "success");
                        window.location.href = url + "vendors/index/delete_success";
                    } else {
                        swal("Oops...", "Error in delete vendor!", "error");
                        window.location.href = url + "vendors/";
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
            title: "Are you sure to do vendor " + stc + "?",
            //text: "You will not be able to recover this record!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes,Change Status!",
            closeOnConfirm: false
        },
        function () {
            jQuery.ajax({
                url: url + "ajax/user_status_change",
                type: "post",
                data: {id: id, status: status},
                success: function (msg) {
                    window.location.href = url + "vendors/index/update_status";
                }
            });
        });
        return false;
    }

</script>
