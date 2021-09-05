<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="card shadow mb-4">
    <div class="card card-primary">
        <form action="code.php" method="POST">
            <div class="card-header py-3">
                <h4>Backup Database</h4>

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
                <p>Click the button below if you want to Backup the Database</p>

                <a href="back_up_db.php" style="color: white;" name="backup" class="btn btn-primary">Backup</a>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>


<?php 

include('includes/footer.php');
include('includes/scripts.php');

?>