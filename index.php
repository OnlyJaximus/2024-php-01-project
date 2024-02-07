<?php
$pageTitle = "Home";

include('includes/header.php');

?>



<div class="container">
    <?php alertMessage(); ?>

</div>


<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/images/1rep.jpeg" class="d-block w-100 " alt="...">
        </div>
        <div class="carousel-item">
            <img src="assets/images/2rep.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="assets/images/3rep.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Welcome to <?php echo webSetting('title'); ?></h4>

                <div class="underline  mx-auto"></div>
                <p>Quisque interdum volutpat aliquam. Nullam fermentum massa ut fermentum lacinia. Quisque condimentum finibus diam, ut tempus dui gravida porta. Duis facilisis, sem quis blandit fermentum, magna nisl rhoncus nibh, eget ornare ipsum lacus ac justo. Sed blandit at velit non pellentesque. Fusce sodales felis a ipsum sodales blandit. Donec ut pretium erat. Donec porta nulla mi, id rhoncus diam vehicula eu. Donec faucibus mattis turpis nec laoreet. </p>

            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-12 mb-4 text-center">
                <h4>Our Services</h4>

                <div class="underline mx-auto"></div>
            </div>


            <?php
            $serviceQuery = "SELECT * FROM services WHERE status = 0 LIMIT 6";
            $result = mysqli_query($conn, $serviceQuery);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {

                    foreach ($result as $row) {
            ?>
                        <div class="col-md-4 mb-3">
                            <div class="card shadow">
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