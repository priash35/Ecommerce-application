 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>CMS Page List
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!--<div class="box-header">-->

                    <div class="box-body table-responsive no-padding ">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>CMS Page Name</th>
                                        <th>CMS Meta Title</th>
                                        <th>CMS Meta Keywords</th>
                                        <th>CMS Meta Description</th>
                                        <th>CMS Page Content</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cnt = 1;
                                    if (count($cms_data) > 0) {
                                        foreach ($cms_data as $result) {
                                            ?>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>

                                                <td><?php echo $result['cms_page_name']; ?></td>
                                                <td><?php echo $result['cms_meta_title']; ?></td>
                                                <td><?php echo $result['cms_meta_Keywords']; ?></td>
                                                <td><?php echo $result['cms_meta_description']; ?></td>
                                                <td><?php echo charlength($result['cms_page_content'], 100);  ?></td>        <!--                                            <td>
                                                    <a href="javascript:void(0)" class="text-center" onclick="status_change(<?php echo $result['user_pk_id']; ?>,<?php echo $result['user_status']; ?>)" title="<?php echo $result['status']; ?>">
                                                <?php if ($result['user_status'] == '1') { ?>
                                                                <button type="button" class="btn btn-block btn-info">Active</button>
                                                <?php } else {
                                                    ?>
                                                                <button type="button" class="btn btn-block btn-primary">Deactive</button>
                                                <?php } ?>
                                                    </a>
                                                </td>-->
                                                <td><a title="Edit" href="<?php echo base_url(); ?>cms/edit_cms/<?php echo $result['cms_id']; ?>"><img src="<?php echo base_url() ?>assets/images/pencil.png" border="0px"></a>|&nbsp;&nbsp;
                                                    <a title="Delete" href="javascript:void(0)" onclick="delcms('<?php echo $result['cms_id']; ?>',<?php echo $result['cms_id']; ?>)"><img width="23px;" height="20px;" src="<?php echo base_url(); ?>assets/images/delete.png" broder="0px"></a></td>

                                            </tr>
                                            <?php
                                            $cnt++;
                                        }
                                    } else {
                                        ?>

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
    $(document).ready(function() {
        $('#example').DataTable();
    });
                                                function delvenuealert() {
                                                    swal("Can't delete! You can't delete yourself.")
                                                }
                                                function delcms(cid) {
                                                    swal({
                                                        title: "Are you sure you want to delete cms?",
                                                        text: "You will not be able to recover this record!",
                                                        type: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#DD6B55",
                                                        confirmButtonText: "Yes, delete it!",
                                                        closeOnConfirm: false
                                                    },
                                                    function() {
                                                        $.ajax({
                                                            type: "POST",
                                                            data: {cid: cid},
                                                            url: url + 'ajax/delete_cms',
                                                            success: function(data) {
                                                               
                                                                if (data > 0)
                                                                {

                                                                    swal("Deleted!", "cms has been deleted.", "success");
                                                                    window.location.href = url + "cms/cmsList";
                                                                } else {
                                                                    swal("Oops...", "Error in delete cms!", "error");
                                                                    window.location.href = url + "cms/cmsList";
                                                                }
                                                            }
                                                        });

                                                    });
                                                }

//    function status_change(id, status) {
//        if (status == 1) {
//            var stc = 'Inactive';
//        } else {
//            var stc = 'Active';
//        }
//        swal({
//            title: "Are you sure to do vendor " + stc + "?",
//            //text: "You will not be able to recover this record!",
//            type: "warning",
//            showCancelButton: true,
//            confirmButtonColor: "#DD6B55",
//            confirmButtonText: "Yes,Change Status!",
//            closeOnConfirm: false
//        },
//        function () {
//            jQuery.ajax({
//                url: url + "ajax/user_status_change",
//                type: "post",
//                data: {id: id, status: status},
//                success: function (msg) {
//                    window.location.href = url + "vendors/index/update_status";
//                }
//            });
//        });
//        return false;
//    }

</script>
