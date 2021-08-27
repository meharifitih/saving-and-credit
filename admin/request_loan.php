<?php
session_start();
include('includes/header.php'); 
include('includes/user_navbar.php');
?>


<div class="card shadow mb-4">
    <div class="card card-primary">
        <form action="code.php" method="POST">
            <div class="card-header py-3">

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

                <h4 class="card-header py-3">Loan Application</h4>
                <!-- <div class="card-header py-3">
                    

                </div> -->
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">



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
                                            <?php echo $row['type_name']; 
                                            
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
                                    <label for="exampleInputEmail1">Payment Mode</label>
                                    <!-- <input type="text" name="payment_mode" class="form-control"
                                        placeholder="Enter Mode Payment .."> -->
                                    <select name="payment_mode" class="form-control">
                                        <option>From Salary</option>
                                        <option>Cash</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="text" class="form-control" name="amount"
                                        placeholder="Maximum 400,000,000">
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
                                    <label for="exampleInputEmail1">Duration In Years</label>
                                    <!-- <input type="text" class="form-control" name="duration"
                                        placeholder="Enter Loan Duration in Years .."> -->
                                    <select name="duration" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Purpose</label>
                                    <textarea type="text" class="form-control" name="purpose"
                                        placeholder="Enter the reason for loan .."></textarea>
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