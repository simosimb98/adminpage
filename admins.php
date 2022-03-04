<?php
include_once "includes/header.inc.php";
?>
        <link href="css/parsley.css" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="http://parsleyjs.org/dist/parsley.min.js" type="text/javascript"></script>
  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Administrators</h1>
                    <p class="mb-4">These users can log in to the website and the admin page.</p>

                    <a href="#addAdmin" class="btn btn-success" data-toggle="modal" style = "margin-left: 1100px; margin-bottom: 10px;"><i class="material-icons">&#xE147;</i>Add new admin</span></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Admins Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="contentTables" id="dataTable" width="100%" cellspacing="0">
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
                                      <?php include_once "includes/adminsTable.inc.php"; ?>
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
    <div id="deleteAdmin" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/deleteAdmin.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Administrator</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure?</p>
                        <p class="text-warning"><small>This admin's data will be permanently deleted!</small></p>
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

 <!-- Edit Modal HTML -->
     <div id="editAdminDetails" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/editAdminDetails.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Admin Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value= '<?php echo $_GET['name']?>'>
                        </div>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" class="form-control" name="surname" value= '<?php echo $_GET['surname']?>'>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value= '<?php echo $_GET['email']?>'>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" class="form-control" name="phone" value= '<?php echo $_GET['phone']?>'>
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

     <!-- Add Modal HTML -->
     <div id="addAdmin" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <body>
                    <form action="includes/insertAdmin.inc.php" method="POST" data-parsley-validate>
                        <div class="modal-header">
                            <h4 class="modal-title">Add a new admin</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name*</label>
                                <input type="text" class="form-control" name="name" required="" data-parsley-length="[4, 25]" data-parsley-required-message="Please enter a name">
                            </div>
                            <div class="form-group">
                                <label>Surname*</label>
                                <input type="text" class="form-control" name="surname" data-parsley-length="[4, 25]" required="" data-parsley-required-message="Please enter a surname"> 
                            </div>
                            <div class="form-group">
                                <label>Telephone*</label>
                                <input type="number" data-parsley-required-message="Please enter a phone number" name = "phone" class="form-control" placeholder="Phone" data-parsley-minlength="8" 
                                 data-parsley-maxlength="16" required="">
                            </div>
                            <div class="form-group">
                                <label>Email*</label>
                                <input type="email" data-parsley-required-message="Please enter your email address" name = "email" class="form-control" placeholder="Email" data-parsley-type="email" required="">
                            </div>
                            <div class="form-group">
                                <label>Password*</label>
                                <input type="password" class="form-control" id = "password" name="password" data-error= "Please enter a password"
                                       required="" data-parsley-length="[6, 30]">
                            </div>
                            <div class="form-group">
                                <label>Repeat Password*</label>
                                <input type="password" class="form-control" name="Repassword" required="" data-parsley-equalto="#password"
                                data-parsley-equalto-message="Please enter the same password">
                            </div>
                         </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-defauls" name="cancel" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" name="submit" value="Add">
                        </div>
                    </form>
                </body>
            </div>
        </div>
    </div>

<?php
 include_once "includes/footer.inc.php";