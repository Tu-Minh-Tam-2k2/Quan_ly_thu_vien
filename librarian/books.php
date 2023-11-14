<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
<div class="container">
	<div class="margin-top">
		<div class="row">
			<div class="span12">
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><i class="icon-user icon-large"></i>&nbsp;Danh sách sách</strong>
				</div>
				<!--  -->
				<ul class="nav nav-pills">
					<li class="active"><a href="books.php">Tất cả</a></li>
					<li><a href="new_books.php">Sách mới</a></li>
					<li><a href="old_books.php">Sách cũ</a></li>
				</ul>
				<!--  -->

				<table cellpadding="0" cellspacing="0" class="table  table-bordered" id="example">
					<div class="pull-right">
						<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
					</div>
					<p><a href="add_books.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Thêm sách</a></p>

					<thead>
						<tr>
							<th>#</th>
							<th>tên sách</th>
							<th>loại</th>
							<th>tác giả</th>
							<th>NXB</th>
							<th>ngày thêm</th>
							<th>trạng thái</th>
							<th class="action">chỉnh sửa</th>
						</tr>
					</thead>
					<tbody>

						<?php

						$user_query = mysqli_query($conn, "select * from book where status != 'Archive'") or die(mysqli_error($conn));	
						while ($row = mysqli_fetch_array($user_query)) {
							$id = $row['book_id'];
							$cat_id = $row['category_id'];

							$borrow_details = mysqli_query($conn, "select * from borrowdetails where book_id = '$id' and borrow_status = 'pending'");
							$row11 = mysqli_fetch_array($borrow_details);
							$count = mysqli_num_rows($borrow_details);
						
							$cat_query = mysqli_query($conn, "select * from category where category_id = '$cat_id'") or die(mysqli_error($conn));
							$cat_row = mysqli_fetch_array($cat_query);
						?>
							<tr class="del<?php echo $id ?>">
								<td><?php echo $row['book_id']; ?></td>
								<td><?php echo $row['book_title']; ?></td>
								<td><?php echo $cat_row['classname']; ?> </td>
								<td><?php echo $row['author']; ?> </td>
								
								
								<td><?php echo $row['publisher_name']; ?></td>
								
								
								<td><?php echo $row['date_added']; ?></td>
								<td><?php echo $row['status']; ?></td>
								<?php include('toolttip_edit_delete.php'); ?>
								<td class="action">
									<a rel="tooltip" title="Delete" id="<?php echo $id; ?>" href="#delete_book<?php echo $id; ?>" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
									<?php include('delete_book_modal.php'); ?>
									<a rel="tooltip" title="Edit" id="e<?php echo $id; ?>" href="edit_book.php<?php echo '?id=' . $id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
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