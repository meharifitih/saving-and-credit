<?php 
include('security.php');
include('includes/header.php');
include('includes/user_navbar.php');

?>


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <section id="faq" class="faq section-bg">
                <?php
                $connction = mysqli_connect("localhost", "root", "", "adminpanel");
                $query = "SELECT * FROM info";
                $query_run = mysqli_query($connction, $query);

                ?>
                <div class="container">
                    <?php
                $connction = mysqli_connect("localhost", "root", "", "adminpanel");
                $query = "SELECT * FROM info";
                $query_run = mysqli_query($connction, $query);

                ?>
                    <div class="section-title">
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {

                                ?>
                        <h2><?php echo $row['title']; ?></h2>
                        <p>
                            <?php echo $row['description']; ?>
                        </p>
                        <?php
                            }
                        } else {
                            echo "No News Found";
                        }

                        ?>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>


<?php 

include('includes/footer.php');
include('includes/scripts.php');

?>