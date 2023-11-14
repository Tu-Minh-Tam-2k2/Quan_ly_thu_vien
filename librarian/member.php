<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
<div class="container">
    <div class="margin-top">
        <div class="row">
            <div class="span12">
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><i class="icon-user icon-large"></i>&nbsp;Danh sách thành viên</strong>
                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">

                    <p><a href="#" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Thêm thành viên</a></p>

                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Giới tính</th>
                            <th>địa chỉ</th>
                            <th>liên lạc</th>
                            <th>Chức vụ</th>
                            <th>năm học</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $user_query = mysqli_query($conn, "select * from member") or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_array($user_query)) {
                            $id = $row['member_id'];  ?>
                            <tr class="del<?php echo $id ?>">
                                <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                <td><?php echo $row['gender']; ?> </td>
                                <td><?php echo $row['address']; ?> </td>
                                <td><?php echo $row['contact']; ?></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['year_level']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <?php include('toolttip_edit_delete.php'); ?>
                                <td width="100">
                                    <a rel="tooltip" title="Delete"  href="#" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>

                                    <a rel="tooltip" title="Edit"  href="#" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                </td>
                            </tr>
                        <?php  }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>