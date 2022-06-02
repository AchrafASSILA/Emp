<?php session_start() ?>
<?php if (isset($_SESSION['alogin'])) : ?>
	<?php include('includes/header.php') ?>
	<?php include('../includes/session.php') ?>
	<?php $get_id = $_GET['edit']; ?>
	<?php
	if (isset($_POST['add_staff'])) {

		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$department = $_POST['department'];
		$address = $_POST['address'];

		$phonenumber = $_POST['phonenumber'];
		$salary = $_POST['salary'];
		$strt = $_POST['strt'];

		$result = mysqli_query($conn, "update tblemployees set FirstName='$fname', LastName='$lname', EmailId='$email', Gender='$gender', Dob='$dob', Department='$department', Address='$address',  Phonenumber='$phonenumber' , salary='$salary',start_job='$strt' where emp_id='$get_id'         
		");
		if ($result) {
			echo "<script>alert('Record Successfully Updated');</script>";
			echo "<script type='text/javascript'> document.location = 'staff.php'; </script>";
		}
	}

	?>

	<body>
		<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/deskapp-logo-svg.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

		<?php include('includes/navbar.php') ?>

		<?php include('includes/right_sidebar.php') ?>

		<?php include('includes/left_sidebar.php') ?>

		<div class="mobile-menu-overlay"></div>

		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Staff Portal</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Staff Edit</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Edit Staff</h4>
								<p class="mb-20"></p>
							</div>
						</div>
						<div class="wizard-content">
							<form method="post" action="">
								<section>
									<?php
									$query = mysqli_query($conn, "select * from tblemployees where emp_id = '$get_id' ");
									$row = mysqli_fetch_array($query);
									$salary = $row['salary'];
									$start = $row['start_job'];
									?>

									<div class="row">
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>First Name :</label>
												<input name="firstname" type="text" class="form-control wizard-required" required="true" autocomplete="off" value="<?php echo $row['FirstName']; ?>">
											</div>
										</div>
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Last Name :</label>
												<input name="lastname" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['LastName']; ?>">
											</div>
										</div>
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Email Address :</label>
												<input name="email" type="email" class="form-control" required="true" autocomplete="off" value="<?php echo $row['EmailId']; ?>">
											</div>
										</div>
									</div>
									<div class="row">

										<div class="col-md-6 col-sm-12">
											<div class="form-group">
												<label>Gender :</label>
												<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
													<option value="<?php echo $row['Gender']; ?>"><?php echo $row['Gender']; ?></option>
													<option value="male">Male</option>
													<option value="female">Female</option>
												</select>
											</div>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="form-group">
												<label>Phone Number :</label>
												<input name="phonenumber" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['Phonenumber']; ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Date Of Birth :</label>
												<input name="dob" type="text" class="form-control date-picker" required="true" autocomplete="off" value="<?php echo $row['Dob']; ?>">
											</div>
										</div>
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Address :</label>
												<input name="address" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['Address']; ?>">
											</div>
										</div>
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Department :</label>
												<select name="department" class="custom-select form-control" required="true" autocomplete="off">
													<?php
													$query_staff = mysqli_query($conn, "select * from tblemployees join  tbldepartments where emp_id = '$get_id'");
													$row_staff = mysqli_fetch_array($query_staff);

													?>
													<option value="<?php echo $row_staff['DepartmentShortName']; ?>"><?php echo $row_staff['DepartmentName']; ?></option>
													<?php
													$query = mysqli_query($conn, "select * from tbldepartments");
													while ($row = mysqli_fetch_array($query)) {

													?>
														<option value="<?php echo $row['DepartmentShortName']; ?>"><?php echo $row['DepartmentName']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>

									<?php
									$query = mysqli_query($conn, "select * from tblemployees where emp_id = '$get_id' ");
									$new_row = mysqli_fetch_array($query);
									?>
									<div class="row">



										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Employee Salary :</label>
												<input name="salary" value="<?php echo $salary; ?>" type="text" class="form-control" required="true" autocomplete="off">
											</div>
										</div>


										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Start Job Date :</label>
												<input name="strt" value="<?= $start ?>" type="text" class="form-control date-picker" required="true" autocomplete="off">

											</div>
										</div>

									</div>
									<div class="row" style="justify-content: center;">
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label style="font-size:16px;"><b></b></label>
												<div class="modal-footer justify-content-center">
													<button class="btn" style="background: #2196f3;color: white;" name="add_staff" id="add_staff" data-toggle="modal">Update&nbsp;Staff</button>
												</div>
											</div>
										</div>
									</div>


								</section>
							</form>
						</div>
					</div>

				</div>
				<?php include('includes/footer.php'); ?>
			</div>
		</div>
		<!-- js -->
		<?php include('includes/scripts.php') ?>
	</body>

	</html>
<?php else : ?>
	<?php header('Location: ../index.php'); ?>
<?php endif; ?>