<?php
include_once "includes/header.inc.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Checking Users</h1>
    <p class="mb-4">Check if the users data is valid or not.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include_once "includes/pendingUsers.inc.php"; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Delete Modal HTML -->
<div id="deletePendingUser" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="includes/deletePendingUser.inc.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Pending User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure</p>
                    <p class="text-warning"><small>This user's data will be permanently deleted!</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="hidden" name="userID" value='<?php echo $_GET['userID'] ?>'>
                    <button type="submit" value="Yes" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="acceptPendingUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="includes/acceptPendingUser.inc.php" method = "POST">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Accept pending user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <p>Are you sure</p>
                <p class="text-warning"><small>By clicking accept this user will now be able to log in to the page!</small></p>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="hidden" name="userID" value='<?php echo $_GET['userID'] ?>'>
                <button type="submit" class="btn btn-primary">Accept User Info</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once "includes/footer.inc.php";
