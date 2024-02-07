<?php

include('includes/header.php');
$pageTitle = "Services";

?>

<div class="py-5 bg-secondary">
    <div class="container">
        <h4 class="text-white text-center">Our Services</h4>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php
            $serviceQuery = "SELECT * FROM services WHERE status = 0";
            $result = mysqli_query($conn, $serviceQuery);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {

                    foreach ($result as $row) {
            ?>
                        <div class="col-md-3 mb-3">
                            <div class="card shadow-sm">
                                <?php
                                if ($row['image'] != '') {
                                ?>
                                    <img src="<?php echo 'admin/' . $row['image'] ?>" alt="Img" class="w-100 rounded" style="min-height:200px; max-height:200px;">
                                <?php
                                } else {
                                ?>
                                    <img src="assets/images/no-image.png" alt="Img" class="w-100 rounded" style="min-height:200px; max-height:200px;">
                                <?php
                                }
                                ?>

                                <div class="card-body">
                                    <h5><?php echo $row['name'] ?></h5>
                                    <p>
                                        <?php echo $row['small_description'] ?>
                                    </p>
                                    <div>
                                        <a href="service.php?slug=<?php echo $row['slug']; ?>" class=" text-priamry">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                } else {
                    ?>
                    <div class="col-md-12">
                        <h5>No Service Available</h5>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="col-md-12">
                    <h5>Something Went Wrong!</h5>
                </div>
            <?php

            }

            ?>


        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>