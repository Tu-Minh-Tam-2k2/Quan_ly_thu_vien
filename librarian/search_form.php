<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header"></div>
	<div class="modal-body">
		<form class="form-horizontal" method="post" action="advance_search.php">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Tên sách</label>
				<div class="controls">
					<input type="text" name="title" id="inputEmail" placeholder="nhập tên sách">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Tác giả</label>
				<div class="controls">
					<input type="text" name="author" id="inputPassword" placeholder="nhập tên tác giả">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-success">Tìm</button>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
	</div>
</div>