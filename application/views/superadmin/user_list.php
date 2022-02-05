<?php
$ses = $this->session->userdata('super_admin_logged_in');
$isSuccess = $this->uri->segment('3');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User List
            <small>preview of User Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="user_management.php">User Management</a></li>
            <li class="active">User list</li>
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
                            <table class="table table-striped table-bordered" id="example" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Mobile No.</th>
                                        <th>Active / Deactive</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cnt = 1;
                                    if (count($user_data) > 0) {
                                        foreach ($user_data as $result) {
                                            ?>
                                            <tr>

                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo ucwords($result['user_first_name']) ?></td>
                                                <td><?php echo $result['user_email']; ?></td>
                                                <td><?php echo '+' . $result['user_contact']; ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" class="text-center" onclick="status_change(<?php echo $result['user_pk_id']; ?>,<?php echo $result['user_status']; ?>)" title="<?php echo $result['status']; ?>">
                                                        <?php if ($result['user_status'] == 1) { ?>
                                                            <button type="button" class="btn btn-block btn-info">Active</button>
                                                        <?PHP } else { ?>
                                                            <button type="button" class="btn btn-block btn-danger">Deactive</button>
                                                        <?php } ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a title="Delete" href="javascript:void(0)" class="btn btn-social-icon btn-bitbucket" onclick="delUser(<?php echo $result['user_pk_id']; ?>)">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $cnt++;
                                        }
                                    }
                                    ?>

                                    <?php // } ?>
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

<script>
    var url = '<?php echo base_url(); ?>';
    function delUser(id) {
        swal({
            title: "Are you sure you want to delete user?",
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
                url: url + 'ajax/delete_user',
                success: function (data) {
                    if (data > 0)
                    {
                        swal("Deleted!", "User has been deleted.", "success");
                        window.location.href = url + "user/user_list/delete_success";
                    } else {
                        swal("Oops...", "Error in delete user!", "error");
                        window.location.href = url + "user/user_list";
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
            title: "Are you sure to do user " + stc + "?",
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
                    if (msg == "1") {
                        window.location.href = url + "user/user_list/update_status";
                    }else{
                        swal("Oops...", "Error in Active / Deactive user!", "error");
                    }   
                }
            });
        });
        return false;
    }
    $(document).ready(function () {
        //$('#example1').dataTable();
    });
</script>