<?php include("includes/header.php"); ?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-5">
                        <h4>Enquiries List</h4>
                    </div>
                    <div class="col-md-7">


                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="date" class="form-control" required name="date" value="<?php echo isset($_GET['date']) == true ?  $_GET['date'] : '' ?>">
                                </div>
                                <div class="col-md-4">
                                    <select name="status" class="form-select" required>
                                        <option value="">Select Status</option>
                                        <option value="pending" <?php echo isset($_GET['status']) == true ?  ($_GET['status'] == 'pending' ? 'selected' : '') : '' ?>>Pending</option>
                                        <option value="completed" <?php echo isset($_GET['status']) == true ?  ($_GET['status'] == 'completed' ? 'selected' : '') : '' ?>>Completed</option>
                                        <option value="cancelled" <?php echo isset($_GET['status']) == true ?  ($_GET['status'] == 'cancelled' ? 'selected' : '') : '' ?>>Cancelled</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <a href="enquiries.php" class="btn btn-danger">Reset</a>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>

            </div>
            <div class="card-body">
                <?php echo alertMessage(); ?>
                <?php

                if (isset($_GET['date']) && $_GET['date'] != '' && isset($_GET['status']) && $_GET['status'] != '') {

                    $date = validate($_GET['date']);
                    $status = validate($_GET['status']);
                    $enquires = mysqli_query($conn,  "SELECT * FROM enquires WHERE created_at = '$date' AND status = '$status' ORDER BY id DESC");
                } else {
                    // $enquires = getAll('enquires');
                    //$enquires = "SELECT * FROM enquires ORDER BY id";
                    $enquires = mysqli_query($conn,  "SELECT * FROM enquires ORDER BY id DESC");
                }




                if ($enquires) {

                    if (mysqli_num_rows($enquires) > 0) {
                ?>
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Service</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($enquires as $item) {

                                ?>
                                    <tr>
                                        <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['name']; ?></td>
                                        <td><?php echo $item['phone']; ?></td>
                                        <td><?php echo $item['service']; ?></td>
                                        <td><?php echo $item['created_at']; ?></td>
                                        <td><?php echo $item['status']; ?></td>
                                        <td>
                                            <a href="enquires-view.php?id=<?php echo $item['id']; ?>" class="btn btn-info btn-sm">View</a>
                                            <a onclick="return confirm('Are You Sure you want to delete this data?')" href="services-delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm mx-2">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>



                            </tbody>
                        </table>
                <?php
                    } else {

                        echo '<h5>No Record Found</h5>';
                    }
                } else {
                    echo '<h5>Somethinf Went Wrong!</h5>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>