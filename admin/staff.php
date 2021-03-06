<?php session_start() ?>
<?php if (isset($_SESSION['alogin'])) : ?>
	<?php include('includes/header.php') ?>
	<?php include('../includes/session.php') ?>
	<?php
	if (isset($_GET['delete'])) {
		$delete = $_GET['delete'];
		$sql = "DELETE FROM tblemployees where emp_id = " . $delete;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Staff deleted Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'staff.php'; </script>";
		}
	}

	?>

	<body>
		<div class="pre-loader">
			<div class="pre-loader-box">
				<div class='loader-progress' id="progress_div">
					<div style="background-color: #03a9f4;" class='bar' id='bar1'></div>
				</div>
				<div class='percent' id='percent1'>0%</div>
				<div class="loading-text">
					Loading...
				</div>
			</div>
		</div>

		<?php include('includes/navbar.php') ?>

		<?php include('includes/right_sidebar.php') ?>

		<?php include('includes/left_sidebar.php') ?>

		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20">
				<div class="title pb-20">
					<h2 class="h3 mb-0">Administrative Breakdown</h2>
				</div>
				<div class="row pb-10">
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">

							<?php
							$sql = "SELECT emp_id from tblemployees";
							$query = $dbh->prepare($sql);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							$empcount = $query->rowCount();
							?>

							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark"><?php echo ($empcount) + 1; ?></div>
									<div class="font-14 text-secondary weight-500">Total Employees</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">

							<?php
							$query_reg_staff = mysqli_query($conn, "select * from tblemployees where role = 'Staff' ");
							$count_reg_staff = mysqli_num_rows($query_reg_staff);
							?>

							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark"><?php echo htmlentities($count_reg_staff); ?></div>
									<div class="font-14 text-secondary weight-500">Staffs</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#09cc06"><span class="icon-copy fa fa-hourglass"></span></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">

							<?php
							$query_reg_hod = mysqli_query($conn, "select * from tblemployees where role = 'Head' ");
							$count_reg_hod = mysqli_num_rows($query_reg_hod);
							?>

							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark"><?php echo ($count_reg_hod); ?></div>
									<div class="font-14 text-secondary weight-500">Department Heads</div>
								</div>
								<div class="widget-icon">
									<div class="icon"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">

							<?php
							$query_reg_admin = mysqli_query($conn, "select * from admin");
							$count_reg_admin = mysqli_num_rows($query_reg_admin);
							?>

							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark"><?php echo ($count_reg_admin); ?></div>
									<div class="font-14 text-secondary weight-500">Administrators</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#ff5b5b"><i class="icon-copy fa fa-hourglass-o" aria-hidden="true"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<style>
					.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
						background: none;
						border: none;
					}
				</style>
				<!-- Button trigger modal -->
				<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
					Launch demo modal
				</button> -->

				<!-- Modal -->

				<div class="card-box mb-30">
					<div class="pd-20">
						<h2 class="text-blue h4">ALL EMPLOYEES</h2>
					</div>
					<div class="pb-20" style="overflow-x: auto;">
						<table class="data-table table stripe hover nowrap" id="table_id">
							<thead>
								<tr>
									<th class="table-plus">FULL NAME</th>
									<th>EMAIL</th>
									<th>DEPARTMENT</th>
									<th>POSITION</th>
									<th>SALARY</th>
									<th>START JOB</th>

									<th>VIEW</th>
									<th class="datatable-nosort">ACTION</th>
								</tr>
							</thead>
							<tbody>
								<tr>

									<?php
									$teacher_query = mysqli_query($conn, "select * from tblemployees LEFT JOIN tbldepartments ON tblemployees.Department = tbldepartments.DepartmentShortName where role != 'Admin' ORDER BY tblemployees.emp_id");
									while ($row = mysqli_fetch_array($teacher_query)) {
										$id = $row['emp_id'];
										if ($row['role'] == 'Staff') :
									?>

											<td class="table-plus">
												<div class="name-avatar d-flex align-items-center" style="margin-right: 40px;">
													<div class="avatar mr-2 flex-shrink-0">
														<img style="width: 40px;
    height: 40px;" src="<?php echo (!empty($row['location'])) ? '../uploads/' . $row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
													</div>
													<div class="txt">
														<div class="weight-600"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></div>
													</div>
												</div>
											</td>
											<td><?php echo $row['EmailId']; ?></td>
											<td><?php echo $row['DepartmentName']; ?></td>
											<td><?php echo $row['role']; ?></td>
											<td><?php echo $row['salary'] ? $row['salary'] : 'null'; ?> Dh</td>
											<td><?php echo $row['start_job'] ? $row['start_job'] : 'null'; ?> </td>
											<td><button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#<?php echo $row['FirstName'] ?>">
													<i class="dw dw-eye"></i>

												</button>
												<div class="modal fade" id="<?php echo $row['FirstName'] ?>" tabindex="-1" aria-labelledby="<?php echo $row['FirstName'] ?>Label" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="<?php echo $row['FirstName'] ?>">Employee Informations</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<h5 class="mb-20 h5 text-blue">Employee Information</h5>
																<ul>
																	<li>
																		<span class="text-blue">Full Name:</span>
																		<?php echo $row['FirstName'] . ' ' . $row['LastName']; ?>
																	</li>
																	<li>
																		<span class="text-blue">Address Mail:</span>
																		<?php echo $row['EmailId']; ?>
																	</li>
																	<li>
																		<span class="text-blue">Department Name:</span>
																		<?php echo $row['DepartmentName']; ?>
																	</li>
																	<li>
																		<span class="text-blue">Start Job:</span>
																		<?php echo $row['start_job']; ?>
																	</li>
																	<li>
																		<span class="text-blue">Phone Number:</span>
																		<?php echo $row['Phonenumber']; ?>
																	</li>
																	<li>
																		<span class="text-blue">Date Of Birth:</span>
																		<?php echo $row['Dob']; ?>
																	</li>
																	<li>
																		<span class="text-blue">Salary:</span>
																		<?php echo $row['salary']; ?>Dh
																	</li>

																	<li>
																		<span class="text-blue">Address:</span>
																		<?php echo $row['Address']; ?>
																	</li>
																</ul>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

															</div>
														</div>
													</div>
												</div>
											</td>
											<td>
												<div class="dropdown">
													<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
														<i class="dw dw-more"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
														<a class="dropdown-item" href="edit_staff.php?edit=<?php echo $row['emp_id']; ?>"><i class="dw dw-edit2"></i> Edit</a>
														<a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this employee?');" href="staff.php?delete=<?php echo $row['emp_id'] ?>"><i class="dw dw-delete-3"></i> Delete</a>

													</div>
												</div>
											</td>


								</tr>
						<?php endif;
									} ?>
							</tbody>
						</table>
						<form method="POST" style="text-align: center;" action="./export-to-excel.php">
							<input type="submit" name="export_staffs" class="btn btn-success" value="download excel">
						</form>
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
	<script>
		window.location = '../index.php';
	</script>
<?php endif; ?>