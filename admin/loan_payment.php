<?php
session_start();
include('includes/header.php'); 
include('includes/acc_navbar.php');
?>

<div class="card shadow mb-4">
    <div class="card card-primary">
        <form action="code.php" method="POST">
            <div class="card-header py-3">
                <h4>Loan Payment</h4>

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

                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <?php
                                $connction = mysqli_connect("localhost", "root", "", "adminpanel");
                                $query = "SELECT username FROM user where type='user'";
                                $query_run = mysqli_query($connction, $query);
                                ?>
                                <div class="form-group">

                                    <label>Member</label>
                                    <select name="user" class="form-control">
                                        <?php
                                    if (mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                    ?>
                                        <option>
                                            <?php echo $row['username']; 
                                            
                                                }
                                        } else {
                                            echo "No Record Found";
                                        }
                                            
                                            ?>
                                        </option>


                                    </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="text" class="form-control" name="amount" placeholder="00.00">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" name="pay" class="btn btn-primary"><i class="fa fa-check"></i> Pay</button>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>

<!-- ###################################### -->

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

            <?php
                $connction = mysqli_connect("localhost", "root", "", "adminpanel");
                $query = "SELECT * FROM payments";
                $query_run = mysqli_query($connction, $query);

                ?>
            <table class="table table-bordered" id="dtable" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Payee</th>
                        <th>Total To Pay</th>
                        <th>Amount</th>
                        <th>Remaning</th>
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
                        <td><?php echo $row['payee']; ?></td>
                        <td><?php echo $row['total_to_pay']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['remaning']; ?></td>
                        <td><?php echo $row['email']; ?></td>
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

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>