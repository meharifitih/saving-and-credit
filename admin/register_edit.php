<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

    <!-- Data table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT Admin profile</h6>
        </div>


        <div class="card-body">

            <?php
            $connction = mysqli_connect("localhost", "root", "", "adminpanel");

            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM register WHERE id='$id' ";
                $query_run = mysqli_query($connction, $query);

                foreach ($query_run as $row) {
                    ?>


            <form action="code.php" method="POST">

                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label>User name</label>
                    <input type="text" class="form-control" value="<?php echo $row['username']; ?>" name="edit_username"
                        placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" value="<?php echo $row['email']; ?>" name="edit_email"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" value="<?php echo $row['password']; ?>"
                        name="edit_password" placeholder="Password">
                </div>



                <a href="register.php" class="btn btn-danger">Cancel</a>
                <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
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