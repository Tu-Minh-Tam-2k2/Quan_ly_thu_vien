<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
<div class="container">
	<div class="margin-top">
		<div class="row">
			<div class="span12">

				<div class="alert alert-info">Thêm sách</div>
				<p><a href="books.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
				<div class="addstudent">
					<div class="details">Vui lòng nhập chi tiết bên dưới</div>
					<form class="form-horizontal" method="POST" action="books_save.php" enctype="multipart/form-data">
						<div class="control-group">
							<label class="control-label" for="inputEmail">Tên sách:</label>
							<div class="controls">
								<input type="text" class="span4" id="inputEmail" name="book_title" placeholder="Book Title" required>
							</div>
						</div>


						<div class="control-group">
							<label class="control-label" for="inputPassword">Loại:</label>
							<div class="controls">
								<select name="category_id">
									<option></option>
									<?php
									$cat_query = mysqli_query($conn, "select * from category");
									while ($cat_row = mysqli_fetch_array($cat_query)) {
									?>
										<option value="<?php echo $cat_row['category_id']; ?>"><?php echo $cat_row['classname']; ?></option>
									<?php  } ?>
								</select>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="inputEmail">Tác giả:</label>
							<div class="controls">
								<input type="text" class="span4" id="inputPassword" name="author" placeholder="Author" required>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="inputPassword">Tên NXB:</label>
							<div class="controls">
								<input type="text" class="span4" id="inputPassword" name="publisher_name" placeholder="Publisher Name" required>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="inputPassword">Trạng thái:</label>
							<div class="controls">
								<select name="status" required>
									<option></option>
									<option>New</option>
									<option>Old</option>
									<option>Lost</option>
									<option>Damage</option>
									<option>Subject for Replacement</option>
								</select>
							</div>
						</div>


						<div class="control-group">
							<div class="controls">
								<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>