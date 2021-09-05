<?php 
include('security.php');
include('includes/header.php');
include('includes/user_navbar.php');
?>

<div class="card shadow mb-4">
    <div class="card card-primary">
        <form action="code.php" method="POST">
            <div class="card-header py-3">
                <h4>Withdarw Money</h4>

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

                            <!-- <div class="col-12">
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
                            </div> -->

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="number" class="form-control" name="amount" placeholder="00.00"
                                        required>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" name="withdarw" class="btn btn-primary"><i class="fa fa-check"></i>
                    Withdarw</button>

            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?php 

include('includes/footer.php');
include('includes/scripts.php');

?>