<?php
session_start();
include('includes/header.php'); 
include('includes/user_navbar.php');
?>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Loan List
            </h6>
        </div>

        <div class="card-body">
            <!-- 
            <?php
        
        $name = $_SESSION['username']
        
        ?> -->

            <div class="table-responsive">

                <?php
                    $connction = mysqli_connect("localhost", "root", "", "adminpanel");
                    $query = "SELECT * FROM deposit where memberid='$name'";
                    $query_run = mysqli_query($connction, $query);

                    ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Member </th>
                            <th>Interest (per year)</th>
                            <th>Saving amount ($)</th>
                            <th>Total deposite ($)</th>
                            <th>Date</th>
                            <th>Email</th>
                            <!-- <th>Interest ($)</th>
                            <th>Date</th> -->


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {

                                    ?>



                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['membe_name']; ?></td>
                            <td><?php echo $row['interest']; ?></td>
                            <td><?php echo $row['savingamount']; ?></td>
                            <td><?php echo $row['totaldeposite']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['memberid']; ?></td>

                        </tr>

                        <?php
                                }
                            } else {
                                echo "No Record Found";
                            }

                            ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>