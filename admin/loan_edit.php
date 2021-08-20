<?php
session_start()
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

    <!-- Data table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT loan type</h6>
        </div>


        <div class="card-body">

            <?php
            $connction = mysqli_connect("localhost", "root", "", "adminpanel");

            if (isset($_POST['loan_edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM loan_plan WHERE id='$id' ";
                $query_run = mysqli_query($connction, $query);

                foreach ($query_run as $row) {
                    ?>


            <form action="code.php" method="POST">

                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label>Months</label>
                    <input type="text" class="form-control" value="<?php echo $row['months']; ?>" name="edit_months"
                        placeholder="Enter MOnths">
                </div>
                <div class="form-group">
                    <label>Interest</label>
                    <input type="text" class="form-control" value="<?php echo $row['interset']; ?>" name="edit_interest"
                        placeholder="Enter INterst">
                </div>
                <div class="form-group">
                    <label>Penality</label>
                    <input type="text" class="form-control" value="<?php echo $row['penality']; ?>" name="edit_penality"
                        placeholder="Penality">
                </div>



                <a href="loan.php" class="btn btn-danger">Cancel</a>
                <button type="submit" name="loan_updatebtn" class="btn btn-primary">Update</button>
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