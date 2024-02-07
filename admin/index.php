<?php
include("includes/header.php"); ?>

<div class="row">

    <div class="col-md-12">
        <?php alertMessage(); ?>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Users</p>
            <h5 class="font-weight-bolder mb-0">
                <?php echo getCount('users'); ?>
            </h5>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Services</p>
            <h5 class="font-weight-bolder mb-0">
                <?php echo getCount('services'); ?>
            </h5>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Social Media</p>
            <h5 class="font-weight-bolder mb-0">
                <?php echo getCount('socail_medias'); ?>
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Enquiries</p>
                <h5 class="font-weight-bolder mb-0">
                    <?php echo getCount('enquires'); ?>
                </h5>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Today Enquiries</p>
                <h5 class="font-weight-bolder mb-0">
                    <?php

                    $todayDate = date('Y-m-d');

                    $query = "SELECT * FROM enquires WHERE created_at =  '$todayDate'";
                    $result = mysqli_query($conn, $query);
                    $totalCount = mysqli_num_rows($result);
                    echo $totalCount;

                    ?>
                </h5>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Completed Enquiries</p>
                <h5 class="font-weight-bolder mb-0">
                    <?php



                    $query = "SELECT * FROM enquires WHERE status =  'completed'";
                    $result = mysqli_query($conn, $query);
                    $totalCount = mysqli_num_rows($result);
                    echo $totalCount;

                    ?>
                </h5>
            </div>
        </div>


        <div class="col-md-3 mb-4">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Cancelled Enquiries</p>
                <h5 class="font-weight-bolder mb-0">
                    <?php



                    $query = "SELECT * FROM enquires WHERE status =  'cancelled'";
                    $result = mysqli_query($conn, $query);
                    $totalCount = mysqli_num_rows($result);
                    echo $totalCount;

                    ?>
                </h5>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>