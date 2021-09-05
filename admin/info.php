<?php
session_start();
// include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<!-- Modal -->
<div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <form action="code.php" method="POST" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description"
                            placeholder="Enter Description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="info_save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="container-fluid">

    <!-- Data table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Info

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newsModal">
                    ADD
                </button>
            </h6>
        </div>


        <div class="card-body">

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

            <div class="table-responsive">

                <?php
                $connction = mysqli_connect("localhost", "root", "", "adminpanel");
                $query = "SELECT * FROM info";
                $query_run = mysqli_query($connction, $query);

                ?>
                <table class="table table-bordered" id="dtable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <!-- <th>Edit</th> -->
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {

                                ?>

                        <tr>

                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <!-- <td>
                                <form action="news_edit.php" method="POST">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                                </form>
                            </td> -->
                            <td>
                                <form action="code.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="info_delete_btn" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
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
</div>






<?php
include('includes/scripts.php');
include('includes/footer.php');
?>