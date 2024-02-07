<?php include("includes/header.php"); ?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>User Lists
                    <a href="users-create.php" class="btn btn-primary float-end">Add Users</a>
                </h4>
            </div>
            <div class="card-body">
                <?php echo alertMessage(); ?>
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Is Ban</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $users = getAll('users');
                        if (mysqli_num_rows($users) > 0) {
                            foreach ($users as $userItem) {

                        ?>
                                <tr>
                                    <td><?php echo $userItem['id']; ?></td>
                                    <td><?php echo $userItem['name']; ?></td>
                                    <td><?php echo $userItem['email']; ?></td>
                                    <td><?php echo $userItem['phone']; ?></td>
                                    <td><?php echo $userItem['role']; ?></td>
                                    <td><?php echo $userItem['is_ban'] == 1 ? 'Banned' : 'Active'   ?></td>
                                    <td>
                                        <a href="users-edit.php?id=<?php echo $userItem['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                        <a onclick="return confirm('Are You Sure you want to delete this data?')" href="users-delete.php?id=<?php echo $userItem['id']; ?>" class="btn btn-danger btn-sm mx-2">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="7">No Record Found</td>
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