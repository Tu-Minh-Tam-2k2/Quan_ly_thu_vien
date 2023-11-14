<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
<div class="container">
	<div class="margin-top">
		<div class="row">
			<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><i class="icon-user icon-large"></i>&nbsp;Mượn sách</strong>
			</div>
			<div class="span12">
				<form method="post" action="borrow_save.php">
					<div class="span3">

						<div class="control-group">
							<label class="control-label" for="inputEmail">Tên người mượn</label>
							<div class="controls">
								<select name="member_id" class="chzn-select" required>
									<option></option>
									<?php $result =  mysqli_query($conn, "select * from member") or die(mysqli_error($conn));
									while ($row = mysqli_fetch_array($result)) { ?>
										<option value="<?php echo $row['member_id']; ?>"><?php echo $row['firstname'] . " " . $row['lastname']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputEmail">Ngày đáo hạn</label>
							<div class="controls">
								<input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="due_date" id="sd" maxlength="10" style="border: 3px double #CCCCCC;" required />
							</div>
						</div>
						<div class="control-group">
							<div class="controls">

								<button name="delete_student" class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Mượn sách</button>
							</div>
						</div>
					</div>
					<div class="span8">
						<div class="alert alert-success"><strong>Chọn sách</strong></div>
						<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
							<thead>
								<tr>
									<th>id</th>
									<th>tên sách</th>
									<th>danh mục</th>
									<th>tác giả</th>
									<th>tên NXB</th>
									<th>trạng thái</th>
									<th>thêm</th>

								</tr>
							</thead>
							<tbody>

								<?php $user_query = mysqli_query($conn, "select * from book where status != 'Archive' ") or die(mysqli_error($conn));
								while ($row = mysqli_fetch_array($user_query)) {
									$id = $row['book_id'];
									$cat_id = $row['category_id'];

									$cat_query = mysqli_query($conn, "select * from category where category_id = '$cat_id'") or die(mysqli_error($conn));
									$cat_row = mysqli_fetch_array($cat_query);
								?>
									<tr class="del<?php echo $id ?>">


										<td><?php echo $row['book_id']; ?></td>
										<td><?php echo $row['book_title']; ?></td>
										<td><?php echo $cat_row['classname']; ?> </td>
										<td><?php echo $row['author']; ?> </td>
										<td><?php echo $row['publisher_name']; ?></td>
										<td width=""><?php echo $row['status']; ?></td>
										<?php include('toolttip_edit_delete.php'); ?>
										<td width="20">
											<input id="" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
									</tr>
								<?php  }  ?>
							</tbody>
						</table>
				</form>
			</div>
		</div>
		<script>
			$(".uniform_on").change(function() {
				var max = 3;
				if ($(".uniform_on:checked").length == max) {

					$(".uniform_on").attr('disabled', 'disabled');
					alert('3 Books are allowed per borrow');
					$(".uniform_on:checked").removeAttr('disabled');

				} else {

					$(".uniform_on").removeAttr('disabled');
				}
			})
		</script>
	</div>
</div>
<?php include('footer.php') ?>