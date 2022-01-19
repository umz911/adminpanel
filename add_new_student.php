<!DOCTYPE html>
<html lang="en">
<?php require "head.php";?>
<body>
	<div class="wrapper">
		<div class="main-header" data-background-color="purple">
			<?php require "logo_header.php";?>
			<?php require "nav_bar.php";?>
		</div>
		<?php require "sidebar.php";?>
		<form action="process.php" method="POST">
			<div class="main-panel">
				<div class="content">
					<div class="page-inner">
						<div class="page-header">
							<h4 class="page-title">Add New Student</h4>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">New Student</div>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label for="fname">First Name</label>
											<input type="text" class="form-control" name = "fname" id="fname" placeholder="First Name">
										</div>
										<div class="form-group">
											<label for="email">Email Address</label>
											<input type="email" class="form-control" name = "email" id="email" placeholder="Email Address">
										</div>
										<div class="form-group">
											<label for="class">Class</label>
											<input type="text" class="form-control" name = "class" id="class" placeholder="class">
										</div>
										<button type="submit" name="sub" value="submit" class="btn btn-primary btn-lg">Submit</button>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>			
		</form>
	</div>
<?php require "footbar.php";?>
</body>
</html>