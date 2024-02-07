<?php

include('includes/header.php');
$pageTitle = "Services";

if (isset($_GET['slug'])) {
    if ($_GET['slug'] == null) {
        redirect('services.php', '');
    }
} else {
    redirect('services.php', '');
}

$slug = validate($_GET['slug']);

$service = "SELECT * FROM services WHERE status  = 0 AND slug = '$slug' LIMIT 1";
$result = mysqli_query($conn, $service);


if (mysqli_num_rows($result) == 0) {
    redirect('services.php', '');
}

if (!$result) {
    redirect('services.php', '');
}

$rowData = mysqli_fetch_assoc($result);

?>

<div class="py-5 bg-secondary">
    <div class="container">
        <h4 class="text-white text-center"><?php echo $rowData['name'] ?></h4>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body shadow-sm">
                    <h4><?php echo $rowData['name'] ?></h4>
                    <div class="underline"></div>
                    <p>
                        <?php echo $rowData['small_description'] ?>
                    </p>

                    <div class="mb-3">
                        <?php if ($rowData['image'] != '') : ?>
                            <img src="<?php echo 'admin/' . $rowData['image'] ?>" alt="Img" class="w-100 rounded">
                        <?php else : ?>
                            <img src="assets/images/no-image.png" alt="Img" class="w-100 rounded">
                        <?php endif; ?>
                    </div>

                    <p>
                        <?php echo $rowData['long_description']; ?>
                    </p>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card sticky-top" style="top: 120px;">
                    <div class="card-header bg-warning">
                        <h4 class="text-white mb-0">Enquire Now</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="mb-3">
                                <label>Service</label>
                                <input type="text" class="form-control" name="service" readonly value="<?php echo $rowData['name']; ?>">
                            </div>

                            <div class="mb-3">
                                <label>Message / Comment</label>
                                <textarea name="message" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100" name="enquireBtn">Submit</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>