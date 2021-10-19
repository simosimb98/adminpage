<?php
include_once "includes/header.inc.php";
?>
  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Verified Users</h1>
                    <p class="mb-4">These users can log in to the website.</p>

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
                                            <th>Country</th>
                                            <th>City</th>
                                            <th>Address</th>
                                            <th>Postal Code</th>
                                            <th>Shop</th>
                                            <th>Cooperates</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php include_once "includes/sovDetailsTable.inc.php"; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

             <!-- Edit Modal HTML -->
    <div id="editUserDetails" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/editUserDetails.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit User Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>City*</label>
                            <input type="text" class="form-control" name="city" value= '<?php echo $_GET['city']?>' required>
                        </div>
                        <div class="form-group">
                            <label>Address*</label>
                            <input type="text" class="form-control" name="address" value= '<?php echo $_GET['address']?>' required>
                        </div>
                        <div class="form-group">
                            <label>Postal code*</label>
                            <input type="number" class="form-control" name="postalcode" value= '<?php echo $_GET['postalcode']?>' required>
                        </div>
                        <div class="form-group">
                            <label>Shop*</label>
                            <input type="text" class="form-control" name="shop" value= '<?php echo $_GET['shop']?>' required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="hidden" name="userID" value= '<?php echo $_GET['userID']?>'>
                        <button type="submit" value="Yes" class="btn btn-info">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php
 include_once "includes/footer.inc.php";