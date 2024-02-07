<?php
include("includes/header.php"); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Website Settings</h4>
            </div>
            <div class="card-body">

                <?php alertMessage(); ?>


                <form action="code.php" method="POST">
                    <?php

                    $setting = getById('settings', 2);
                    ?>

                    <input type="hidden" name="settingId" value="<?php echo $setting['data']['id'] ?? 'insert' ?>">

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $setting['data']['title'] ?? 'title' ?>">
                    </div>

                    <div class="mb-3">
                        <label>URL / Domain</label>
                        <input type="text" name="slug" class="form-control" value="<?php echo $setting['data']['slug'] ?? 'slug' ?>">
                    </div>

                    <div class="mb-3">
                        <label>Small Descrption</label>
                        <input type="text" name="small_description" class="form-control" value="<?php echo $setting['data']['small_description'] ?? 'small_description' ?>">
                    </div>

                    <h4 class="my-3">SEO Settings</h4>

                    <div class="mb-3">
                        <label>Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3"><?php echo $setting['data']['meta_description'] ?? 'meta_description' ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" rows="3"><?php echo $setting['data']['meta_keyword'] ?? 'meta_keyword' ?></textarea>
                    </div>


                    <h4 class="my-3">Contact Information</h4>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Email 1</label>
                            <input type="email" name="email1" class="form-control" value="<?php echo $setting['data']['email1'] ?? 'email1' ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Email 2</label>
                            <input type="email" name="email2" class="form-control" value="<?php echo $setting['data']['email2'] ?? 'email2' ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Phone 1</label>
                            <input type="text" name="phone1" class="form-control" value="<?php echo $setting['data']['phone1'] ?? 'phone1' ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Phone 2</label>
                            <input type="text" name="phone2" class="form-control" value="<?php echo $setting['data']['phone2'] ?? 'phone2' ?>">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control" rows="3"><?php echo $setting['data']['address'] ?? 'address' ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 text-end">
                        <button type="submit" name="saveSetting" class="btn btn-primary">Save Setting</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>