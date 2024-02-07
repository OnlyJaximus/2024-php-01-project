<?php
$pageTitle = "Contact Us";
include('includes/header.php') ?>

<div class="py-5 bg-secondary">
    <div class="container">
        <h4 class="text-white text-center">Contact Us</h4>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php alertMessage(); ?>
                <div class="card card-body">
                    <form action="sendmail.php" method="POST">
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
                            <input type="text" class="form-control" name="service">
                        </div>

                        <div class="mb-3">
                            <label>Message / Comment</label>
                            <textarea name="message" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100" name="contactSubmit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="footer-heading">Contact Information</h4>
                <hr>
                <p>Address: <?php echo webSetting('address') ?? '';  ?>
                <p>Email: <?php echo webSetting('email1') ?? '';
                            echo webSetting('email2') ?? '' ?>
                <p>Phone No: <?php echo webSetting('phone1') ?? '';
                                echo webSetting('phone2') ?? '' ?>

            </div>

        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>