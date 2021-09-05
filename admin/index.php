<?php
include('includes/header.php'); 
include('security.php');

include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered
                                Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?php
                                require 'database/dbconfig.php';
                                $query = "SELECT id FROM user where type='user' ORDER BY id ";
                                $query_run = mysqli_query($connction, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h4>' . $row . '</h4>';
                                ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Loan
                                Application
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                require 'database/dbconfig.php';
                                $query = "SELECT id FROM loan_list ORDER BY id ";
                                $query_run = mysqli_query($connction, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h4>' . $row . '</h4>';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Row -->
    <div class="card shadow mb-4">

        <h1>Informations</h1>

        <?php
                $connction = mysqli_connect("localhost", "root", "", "adminpanel");
                $query = "SELECT * FROM info";
                $query_run = mysqli_query($connction, $query);

                ?>
        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {

                                ?>

        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <section id="faq" class="faq section-bg">
                        <div class="container">
                            <div class="section-title">
                                <h2><?php echo $row['title']; ?></h2>
                                <p>
                                    <?php echo $row['description']; ?>
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <?php
                            }
                        } else {
                            echo "No News Found";
                        }

                        ?>

    </div>


    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>