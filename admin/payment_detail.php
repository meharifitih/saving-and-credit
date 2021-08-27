<?php
session_start();
include('includes/header.php'); 
include('includes/user_navbar.php');
?>


<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">


            <?php
              $email = $_SESSION['username'];
                $connction = mysqli_connect("localhost", "root", "", "adminpanel");
                $query = "SELECT * FROM payments where email='$email'";
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