<?php include("includes/header.php"); ?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Services
                    <a href="services-create.php" class="btn btn-primary float-end">Add Services</a>
                </h4>
            </div>
            <div class="card-body">
                <?php echo alertMessage(); ?>
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $services = getAll('services');

                        if ($services) {

                            if (mysqli_num_rows($services) > 0) {
                                foreach ($services as $item) {

                        ?>
                                    <tr>
                                        <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['name']; ?></td>
                                        <td>
                                            <?php
                                            if ($item['status'] == 1) {
                                                echo "<span class='badge bg-danger text-white'>Hidden</span>";
                                            } else {
                                                echo "<span class='badge bg-success text-white'>Visible</span>";
                                            }


                                            ?>
                                        </td>
                                        <td>
                                            <a href="services-edit.php?id=<?php echo $item['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <a onclick="return confirm('Are You Sure you want to delete this data?')" href="services-delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm mx-2">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="4">No Record Found</td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">Something Went Wrong!</td>
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