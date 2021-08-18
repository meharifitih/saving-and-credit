<?php
session_start();
include('includes/header.php'); 
include('includes/user_navbar.php');
?>


<div class="card shadow mb-4">
    <div class="card card-primary">
        <form action="code.php" method="POST">
            <div class="card-header py-3">
                <h4 class="card-header py-3">Send Application</h4>
                <!-- <div class="card-header py-3">
                    

                </div> -->
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="exampleInputEmail1">Member</label>
                                    <input type="text" class="form-control" name="user" value=""
                                        placeholder="Enter Your Name..">
                                </div>
                            </div>

                            <div class="col-6">

                                <?php
                                $connction = mysqli_connect("localhost", "root", "", "adminpanel");
                                $query = "SELECT * FROM loan_type";
                                $query_run = mysqli_query($connction, $query);
                                ?>

                                <div class="form-group">

                                    <label for="exampleInputEmail1">Type of Loan</label>
                                    <select name="loan_type" class="form-control">
                                        <?php
                                    if (mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                    ?>
                                        <option>
                                            <?php echo $row['id']; 
                                            
                                                }
                                        } else {
                                            echo "No Record Found";
                                        }
                                            
                                            ?>
                                        </option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Payment</label>
                                    <input type="text" name="payment_mode" class="form-control"
                                        placeholder="Enter Mode Payment ..">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="text" class="form-control" name="amount" placeholder="00.00">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Request</label>
                                    <select name="request" class="form-control">
                                        <option>For Approval</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Duration</label>
                                    <input type="text" class="form-control" name="duration"
                                        placeholder="Enter Loan Duration in Months ..">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Purpose</label>
                                    <input type="text" class="form-control" name="purpose"
                                        placeholder="Enter Purpose ..">
                                </div>
                            </div>

                            <button type="submit" name="application" class="btn btn-primary"><i class="fa fa-check"></i>
                                Apply</button>

                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>