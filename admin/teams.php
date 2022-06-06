<?php session_start() ?>
<?php if (isset($_SESSION['alogin'])) : ?>
    <?php include('includes/header.php') ?>
    <?php
    include('../includes/session.php')
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



            <div class="row">
                <?php $query = mysqli_query($conn, "select * from tbldepartments");
                ?>
                <?php while ($row = mysqli_fetch_array($query)) :

                ?>
                    <div class="col-lg-6 col-md-6 mb-20">
                        <div class="card-box height-100-p pd-20 min-height-200px">
                            <div class="d-flex justify-content-between pb-10">
                                <div class="h5 mb-0"><?= $row['DepartmentName'] ?></div>
                                <div class="table-actions">
                                    <!-- <a title="VIEW" href="heads.php"><i class="icon-copy ion-disc" data-color="#17a2b8"></i></a> -->
                                </div>
                            </div>
                            <div class="user-list">
                                <ul>
                                    <?php
                                    $cmd = mysqli_query($conn, "select * from tblemployees where department='$row[DepartmentShortName]' order by role");
                                    while ($col = mysqli_fetch_array($cmd)) {
                                        $id = $col['emp_id'];
                                    ?>

                                        <li class="d-flex align-items-center justify-content-between">
                                            <div class="name-avatar d-flex align-items-center pr-2">
                                                <div class="avatar mr-2 flex-shrink-0">
                                                    <img src="<?php echo (!empty($col['location'])) ? '../uploads/' . $col['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 box-shadow" width="50" height="50" alt="">
                                                </div>
                                                <div class="txt">
                                                    <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7"><?php echo $col['role']; ?></span>
                                                    <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7"><?php echo $col['Department']; ?></span>
                                                    <div class="font-14 weight-600"><?php echo $col['FirstName'] . " " . $col['LastName']; ?></div>
                                                    <div class="font-12 weight-500" data-color="#b2b1b6"><?php echo $col['EmailId']; ?></div>
                                                </div>
                                            </div>
                                            <div class="font-12 weight-500" data-color="#17a2b8"><?php echo $col['Phonenumber']; ?></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

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