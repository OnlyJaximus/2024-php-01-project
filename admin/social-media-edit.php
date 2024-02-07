<?php include("includes/header.php"); ?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Social Media
                    <a href="social-media.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <?php echo alertMessage(); ?>

                <form action="code.php" method="POST">
                    <?php
                    $paramResult =  checkParamId('id');
                    if (!is_numeric($paramResult)) {
                        echo  "<h5>" . $paramResult . "</h5>";
                        return false;
                    }

                    $socialMedia = getById('socail_medias', $paramResult);
                    if ($socialMedia) {
                        if ($socialMedia['status'] == 200) {
                    ?>
                            <input type="hidden" name="socialMediaId" value="<?php echo $socialMedia['data']['id']; ?>">

                            <div class="mb-3">
                                <label for="">Edit Social Media</label>
                                <input type="text" name="name" class="form-control" required value="<?php echo $socialMedia['data']['name'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="">Social Media URL/Link</label>
                                <input type="text" name="url" class="form-control" required value="<?php echo $socialMedia['data']['url'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="">Status</label>
                                <br>
                                <input type="checkbox" name="status" style="width: 30px;height:30px;" <?php echo $socialMedia['data']['status'] == "1" ? "checked" : "" ?>>
                            </div>

                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary" name="updateSocialMedia">Update</button>
                            </div>



                    <?php
                        } else {
                            echo  "<h5>" . $socialMedia['message'] . "</h5>";
                        }
                    } else {
                        echo  "<h5>Something Went Wrong!</h5>";
                    }


                    ?>


                </form>

            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>