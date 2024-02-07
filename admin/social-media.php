<?php include("includes/header.php"); ?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Social Media Lists
                    <a href="social-media-create.php" class="btn btn-primary float-end">Add Social Media</a>
                </h4>
            </div>
            <div class="card-body">
                <?php echo alertMessage(); ?>
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $socialMedias = getAll('socail_medias');

                        if ($socialMedias) {

                            if (mysqli_num_rows($socialMedias) > 0) {
                                foreach ($socialMedias as $socialMedia) {

                        ?>
                                    <tr>
                                        <td><?php echo $socialMedia['id']; ?></td>
                                        <td><?php echo $socialMedia['name']; ?></td>
                                        <td><?php echo $socialMedia['url']; ?></td>
                                        <td><?php echo $socialMedia['status'] == 1 ? 'Hidden' : 'Shown' ?></td>
                                        <td>
                                            <a href="social-media-edit.php?id=<?php echo $socialMedia['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <a onclick="return confirm('Are You Sure you want to delete this data?')" href="social-media-delete.php?id=<?php echo $socialMedia['id']; ?>" class="btn btn-danger btn-sm mx-2">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">No Record Found</td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5">Something Went Wrong!</td>
                            </tr>
                        <?php

                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>