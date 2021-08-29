<?php
session_start();
include('includes/header.php'); 
include('includes/user_navbar.php');
?>

<div class="card shadow mb-4">
    <div class="card card-primary">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send Feedback</h5>
            </div>
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
            <form action="code.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Comment</label>
                        <textarea type="text" class="form-control" name="comment"
                            placeholder="Enter Comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="feedback_send">Send</button>
                </div>

            </form>
        </div>
    </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>