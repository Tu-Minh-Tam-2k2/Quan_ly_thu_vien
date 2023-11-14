<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
<?php
$title = $_POST['title'];
/* $category = $_POST['category']; */
$author = $_POST['author'];
?>

<div class="container">
	<div class="margin-top">
		<div class="row">
			<div class="span12">
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><i class="icon-user icon-large"></i>&nbsp;Kết quả tìm kiếm</strong>
				</div>
				<table cellpadding="0" cellspacing="0" class="table  table-bordered" id="example">
					<thead>
						<tr>
							<th>#</th>
							<th>Tên sách</th>
							<th>loại</th>
							<th>tác giả</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$awhere = "";
						if (!empty($title) && !empty($author)) {
							$awhere = " and (book_title LIKE  '%$title%' or and author LIKE '%$author%') ";
						} elseif (!empty($title)) {
							$awhere = " and book_title LIKE  '%$title%' ";
						} elseif (!empty($author)) {
							$awhere = " and author LIKE  '%$author%' ";
						}

						$user_query = mysqli_query($conn, "select * from book where status != 'Archive' $awhere ") or die(mysqli_error($conn));
						while ($row = mysqli_fetch_array($user_query)) {
							$id = $row['book_id'];
							$cat_id = $row['category_id'];
							// $book_copies = $row['book_copies'];

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
							</tr>
						<?php  }  ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>