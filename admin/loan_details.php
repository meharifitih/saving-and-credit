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
                     $memid = $_SESSION['username'];
                    $connction = mysqli_connect("localhost", "root", "", "adminpanel");
                    $query = "SELECT * FROM loan_list where memberid='$memid'";
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
                            <th>Total to Pay</th>
                            <th>Monthly to Pay</th>
                            <th>Duration</th>
                            <th>Purpose</th>
                            <th>Status</th>
                            <th>Email</th>
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
                            <td><?php echo $row['loan_type']; ?></td>
                            <td><?php echo $row['mode_of_payment']; ?></td>
                            <td><b style="color: blue"><?php echo $row['loan_amount']; ?>$</b></td>
                            <td><b style="color: blue"><?php echo $row['total_to_pay']; ?>$</b></td>
                            <td><b style="color: blue"><?php
                             $total = $row['total_to_pay'];
                            $duration_in_months = $row['duration'] * 12;
                            $pay_in_month = $total / $duration_in_months;
                             echo ($pay_in_month); ?>$</b></td>
                            <td><?php echo $row['duration']; ?> Years</td>
                            <td><?php echo $row['purpose']; ?></td>
                            <td>
                                <?php if($row['status'] == "For Approval"): ?>
                                <span class="badge badge-warning">For Approval</span>
                                <?php elseif($row['status'] == "Approved"): ?>
                                <span class="badge badge-info">Approved</span>
                                <?php elseif($row['status'] == "Completed"): ?>
                                <span class="badge badge-success">Completed</span>
                                <?php elseif($row['status'] == "Denied"): ?>
                                <span class="badge badge-danger">Denied</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $row['memberid']; ?></td>
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