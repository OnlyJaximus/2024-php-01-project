<?php include("includes/header.php"); ?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Services
                    <a href="services.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <?php echo alertMessage(); ?>

                <form action="code.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="">Service Name</label>
                        <input type="text" name="name" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" rows="3" required class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="">Long Description</label>
                        <textarea name="long_description" rows="3" required class="form-control mySummernote"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="">Upload Service Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <h5>SEO Tags</h5>
                    <div class="mb-3">
                        <label for="">Meta title</label>
                        <input type="text" name="meta_title" required class="form-control">
                    </div>


                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="">Status (checked=hidden, unchekd=visible)</label>
                        <br>
                        <input type="checkbox" name="status" style="width:30px; height: 30px;">
                    </div>

                    <div class="mb-3 text-end">
                        <button class="btn btn-primary" type="submit" name="saveService">Save Service</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>