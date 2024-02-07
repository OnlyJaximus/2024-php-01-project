<?php include("includes/header.php"); ?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Services
                    <a href="services.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <?php echo alertMessage(); ?>

                <form action="code.php" method="POST" enctype="multipart/form-data">

                    <?php
                    $paramResult =  checkParamId('id');

                    if (!is_numeric($paramResult)) {
                        echo  "<h5>" . $paramResult . "</h5>";
                        return false;
                    }

                    $service = getById('services', $paramResult);
                    if ($service) {
                        if ($service['status'] == 200) {
                    ?>

                            <input type="hidden" name="serviceId" value="<?php echo $service['data']['id']  ?>">

                            <div class="mb-3">
                                <label for="">Service Name</label>
                                <input type="text" name="name" required class="form-control" value="<?php echo $service['data']['name'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="">Small Description</label>
                                <textarea name="small_description" rows="3" required class="form-control"><?php echo $service['data']['small_description'] ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Long Description</label>
                                <textarea name="long_description" rows="3" required class="form-control mySummernote"><?php echo $service['data']['long_description'] ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Upload Service Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="<?php echo   $service['data']['image'] ?>" alt="Img" style="width:70px; height:70px;">
                            </div>

                            <h5>SEO Tags</h5>
                            <div class="mb-3">
                                <label for="">Meta title</label>
                                <input type="text" name="meta_title" required class="form-control" value="<?php echo $service['data']['meta_title'] ?>">
                            </div>


                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" rows="3" class="form-control"><?php echo $service['data']['meta_description'] ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" rows="3" class="form-control"><?php echo $service['data']['meta_keyword'] ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Status (checked=hidden, unchekd=visible)</label>
                                <br>
                                <input type="checkbox" name="status" style="width:30px; height: 30px;" <?php echo $service['data']['status'] == '1' ? 'checked' : '';  ?>>
                            </div>

                            <div class="mb-3 text-end">
                                <button class="btn btn-primary" type="submit" name="updateService">Update Service</button>
                            </div>


                        <?php


                        } else {
                            echo "<h5>No such data found!</h5>";
                        }


                        ?>

                    <?php

                    } else {
                        echo "<h5>Someting Went Wrong!</h5>";
                    }

                    ?>
                </form>


            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>