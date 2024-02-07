<?php include("includes/header.php"); ?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>View Enquiry
                    <a href="enquiries.php" class="btn btn-danger float-end btn-sm mb-0">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <?php

                $paramResult =  checkParamId('id');

                if (!is_numeric($paramResult)) {
                    echo  "<h5>" . $paramResult . "</h5>";
                    return false;
                }

                $enquiry = getById('enquires', $paramResult);

                if ($enquiry) {
                    if ($enquiry['status'] == 200) {
                ?>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td width="30%">Enquiry ID</td>
                                    <td><?php echo $enquiry['data']['id']; ?></td>
                                </tr>

                                <tr>
                                    <td>Name</td>
                                    <td><?php echo $enquiry['data']['name']; ?></td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $enquiry['data']['email']; ?></td>
                                </tr>

                                <tr>
                                    <td>Service</td>
                                    <td><?php echo $enquiry['data']['service']; ?></td>
                                </tr>

                                <tr>
                                    <td>Message</td>
                                    <td><?php echo $enquiry['data']['message']; ?></td>
                                </tr>

                                <tr>
                                    <td>Status</td>
                                    <td><?php echo $enquiry['data']['status']; ?></td>
                                </tr>

                                <tr>
                                    <td>Created At (Enquiry Date)</td>
                                    <td><?php echo $enquiry['data']['created_at']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <mt-3>
                            <div class="card border card-body">

                                <form action="code.php" method="POST">
                                    <input type="hidden" name="enquiryId" value="<?php echo $enquiry['data']['id']; ?>">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Update Status</label>
                                            <select name="status" class="form-control">
                                                <option value="pending" <?php echo $enquiry['data']['status'] == "pending" ? 'selected' : '' ?>>Pending</option>
                                                <option value="completed" <?php echo $enquiry['data']['status'] == "completed" ? 'selected' : '' ?>>Completed</option>
                                                <option value="cancelled" <?php echo $enquiry['data']['status'] == "cancelled" ? 'selected' : '' ?>>Cancelled</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <br>
                                            <button type="submit" class="btn btn-primary" name="updateEnquiryStatus">Update</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </mt-3>
                <?php
                    } else {
                        echo "<h5>No record found</h5>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>