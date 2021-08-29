<?php
include('security.php');
include('includes/header.php');
include('includes/acc_navbar.php');
?>

<div class="container-fluid">

    <!-- Data table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT User profile</h6>
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
        </div>
        <div class="card-body">


            <?php
            $connction = mysqli_connect("localhost", "root", "", "adminpanel");

            // if (isset($_POST['edit_btn'])) {
                // $id = $_POST['edit_id'];
                $username = $_SESSION['username'];

                $query = "SELECT * FROM user WHERE email='$username' ";
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

                <div class="form-group">
                    <label for="type">User Type</label>
                    <select name="edit_type" id="type" class="custom-select">
                        <?php if($row['type'] == "user"): ?>
                        <option value="user">User</option>
                        <?php elseif($row['type'] == "accountant"): ?>
                        <option value="accountant">Accountant</option>
                        <?php endif; ?>

                    </select>
                </div>
                <button type="submit" name="user_updatebtn" class="btn btn-primary">Update</button>
            </form>

            <?php
                }
            // }

            ?>

        </div>
    </div>
</div>




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>