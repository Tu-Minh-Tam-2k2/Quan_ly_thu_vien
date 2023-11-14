      <div class="navbar navbar-fixed-top navbar-inverse">
      	<div class="navbar-inner">
      		<div class="container">
      			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      				<span class="icon-bar"></span>
      				<span class="icon-bar"></span>
      				<span class="icon-bar"></span>
      			</a>
      			<div class="nav-collapse collapse">
      				<!-- .nav, .navbar-search, .navbar-form, etc -->
      				<ul class="nav">
      					<li><a href="dashboard.php"><i class="icon-home icon-large"></i>&nbsp;trang chủ</a></li>
      					<li><a href="users.php"><i class="icon-user icon-large"></i>&nbsp;người dùng</a></li>
      					<?php
							include('dropdown.php');
						?>
      					<li><a href="books.php"><i class="icon-book icon-large"></i>&nbsp;sách</a></li>
      					<li><a href="member.php"><i class="icon-group icon-large"></i>&nbsp;thành viên</a></li>
      				
      					<li><a href="#myModal" data-toggle="modal"><i class="icon-search icon-large"></i>&nbsp;tìm kiếm</a></li>
      					<!-- <li><a href="section.php"><i class="icon-group icon-large"></i>&nbsp;Sections</a></li> -->

      					<li><a href="#logout" data-toggle="modal"><i class="icon-signout icon-large"></i>&nbsp;Logout</a></li>
      				</ul>

      			</div>
      		</div>
      	</div>
      </div>
      <?php include('search_form.php'); ?>