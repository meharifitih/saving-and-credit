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
                            <th>Loan Type</th>
                            <th>Payment Mode</th>
                            <th>Loan Amount($)</th>
                            <th>Duration</th>
                            <th>Purpose</th>
                            <th>Total to Pay($)</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Action</th>


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
                            <td><?php echo $row['loan_amount']; ?></td>
                            <td><?php echo $row['duration']; ?></td>
                            <td><?php echo $row['purpose']; ?></td>
                            <td><?php echo $row['total_to_pay']; ?></td>
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
                            <td>


                                <form action="loan_handdling.php" method="POST">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="status_edit_btn" class="btn btn-success">Manage</button>
                                </form>

                            </td>


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


<div class="modal fade" id="modifyloan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Loan status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <?php
                    $connction = mysqli_connect("localhost", "root", "", "adminpanel");
                    $query = "SELECT * FROM loan_list";
                    $query_run = mysqli_query($connction, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>

                    <div class="form-group">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">

                        <?php
                                }
                            } else {
                                echo "No Record Found";
                            }

                            ?>

                        <label> Status </label>
                        <select name="loan_status">
                            <option>For Approval</option>
                            <option>Approved</option>
                            <option>Completed</option>
                            <option>Denied</option>
                        </select>
                        <!-- <input type="text" name="status" class="form-control" placeholder="Enter Username"> -->
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="loan_status_btn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>