<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

    <!-- Data table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT Loan Status</h6>
        </div>


        <div class="card-body">

            <?php
            $connction = mysqli_connect("localhost", "root", "", "adminpanel");

            if (isset($_POST['status_edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM loan_list WHERE id='$id' ";
                $query_run = mysqli_query($connction, $query);

                foreach ($query_run as $row) {
                    ?>


            <form action="code.php" method="POST">

                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label>Status</label>

                    <select name="loan_status">
                        <option><span class="badge badge-warning">For Approval</span></option>
                        <option><span class="badge badge-info">Approved</span></option>
                        <option><span class="badge badge-success">Completed</span></option>
                        <option><span class="badge badge-danger">Denied</span></option>
                    </select>
                </div>

                <a href="loan_list.php" class="btn btn-danger">Cancel</a>
                <button type="submit" name="loan_status_btn" class="btn btn-primary">Update</button>
            </form>

            <?php
                }
            }

            ?>

        </div>
    </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>