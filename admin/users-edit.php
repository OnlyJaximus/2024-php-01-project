<?php include("includes/header.php"); ?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit User
                    <a href="users.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>

                <form action="code.php" method="POST">

                    <?php
                    $paramResult = checkParamId('id');

                    if (!is_numeric($paramResult)) {
                        echo '<h5>' . $paramResult . '</h5>';
                        return false;
                    }

                    $user = getById('users', $paramResult = checkParamId('id'));
                    if ($user['status'] == 200) {
                    ?>

                        <input value="<?php echo $user['data']['id']; ?>" type="hidden" name="userId">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Name</label>
                                    <input value="<?php echo $user['data']['name']; ?>" type="text" name="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Phone No.</label>
                                    <input value="<?php echo $user['data']['phone']; ?>" type="text" name="phone" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input value="<?php echo $user['data']['email']; ?>" type="email" name="email" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Password</label>
                                    <input value="<?php echo $user['data']['password']; ?>" type="password" name="password" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Select role</label>
                                    <select name="role" class="form-select" required>
                                        <option value="">Select role</option>
                                        <option value="admin" <?php echo $user['data']['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                        <option value="user" <?php echo $user['data']['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="">Is Ban</label>
                                    <br>

                                    <input type="checkbox" name="is_ban" <?php echo $user['data']['is_ban'] == true ? 'checked' : ''; ?> style="width:30px; height:30px">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 text-end">
                                    <br>
                                    <button type="submit" name="updateUser" class="btn btn-primary">Update</button>
                                </div>
                            </div>


                        </div>

                    <?php
                    } else {
                        echo  "<h5>" . $user['message'] . "</h5>";
                    }

                    ?>

                </form>

            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>