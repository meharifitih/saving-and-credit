<?php
session_start();
include('includes/header.php'); 
include('includes/acc_navbar.php');
?>


<div class="card shadow mb-4">

    <h1>Feedback From Users</h1>

    <?php
                $connction = mysqli_connect("localhost", "root", "", "adminpanel");
                $query = "SELECT * FROM feedback";
                $query_run = mysqli_query($connction, $query);

                ?>

    <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {

                                ?>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <section id="faq" class="faq section-bg">

                    <div class="container">

                        <div class="section-title">

                            <h2><?php echo $row['user']; ?></h2>
                            <p>
                                <?php echo $row['comment']; ?>
                            </p>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <?php
                            }
                        } else {
                            echo "No News Found";
                        }

                        ?>

</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>