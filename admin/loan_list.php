<?php
include ('security.php');
include('includes/header.php'); 
include('includes/navbar.php');
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Loan List
            </h6>
        </div>

        <div class="card-body">

            <?php
    if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
     echo '<h2 class="bg-primary text-white">' . $_SESSION['success'] . '</h2>';
    unset($_SESSION['success']);
    }

    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    echo '<h2 class="bg-danger text-white">' . $_SESSION['status'] . '</h2>';
    unset($_SESSION['status']);
    }
  ?>

            <div class="table-responsive">

                <?php
                    $connction = mysqli_connect("localhost", "root", "", "adminpanel");
                    $query = "SELECT * FROM loan_list";
                    $query_run = mysqli_query($connction, $query);

                    ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Member </th>
                            <th>Type of Loan</th>
                            <th>Mode of Payment</th>
                            <th>Loan Amount</th>
                            <th>Duration</th>
                            <th>Purpose</th>
                            <th>Interest</th>
                            <th>Status</th>
                            <th>Date</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {

                                    ?>



                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['loan_type_id']; ?></td>
                            <td><?php echo $row['mode_of_payment']; ?></td>
                            <td><?php echo $row['loan_amount']; ?></td>
                            <td><?php echo $row['duration']; ?></td>
                            <td><?php echo $row['purpose']; ?></td>
                            <td><?php echo $row['interest']; ?></td>
                            <td><select name="">
                                    <option value="">
                                        <?php echo $row['status']; ?>
                                    </option>
                                </select></td>
                            <td><?php echo $row['date']; ?></td>

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