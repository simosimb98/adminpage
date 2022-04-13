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

    <div id="addAdmin" class="modal fade" >
    <div class="modal-dialog ">
    <div class="modal-content ">
        <form id="registerForm" action="includes/insertAdmin.inc.php" method="POST" data-parsley-validate="">
        <div class="modal-header">
            <h4 class="modal-title">Register</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <div style="float: left;">
            <div class="form-group">
                <label>Name</label>
                <input type="text" data-parsley-required-message="Please enter your name" name = "firstname" class="form-control" placeholder="Name" data-parsley-length="[4, 25]" data-parsley-group="block1" required="">
                <div class="valid-feedback">
                    Looks good!
                    </div>
            </div>
            <div class="form-group" >
                <label>Surname</label>
                <input type="text" data-parsley-required-message="Please enter your last name" name = "surname" class="form-control" placeholder="Surname" data-parsley-length="[4, 25]" data-parsley-group="block1" required="">
            </div>
            </div>
            <div style="float: right;">
            <div class="form-group">
                <label>Email</label>
                <input type="email" data-parsley-required-message="Please enter your email address" name = "email" class="form-control" placeholder="Email" data-parsley-type="email" required="">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="number" data-parsley-required-message="Please enter your phone number" name = "phone" class="form-control" placeholder="Phone" data-parsley-minlength="8" 
                    data-parsley-maxlength="16" required="">
            </div>
            </div>
            <div style="float: left;">
            <div class="form-group">
                <label>Password</label>
                <input type="password" data-parsley-required-message="Please enter a password" name = "password" id = "password" class="form-control" placeholder="Password" data-parsley-length="[6, 25]" required="">
            </div>
            </div>
            <div style="float: right;">
            <div class="form-group">
            <label>Repeat Password</label>
                <input type="password" class="form-control" name="Repassword" required="" data-parsley-equalto="#password"
                data-parsley-equalto-message="Please enter the same password" placeholder="Repeat password" data-parsley-required-message="Please enter your password">
            </div>
            </div>
            <div style="float: left;">
        <div class="form-group">
                <label>City</label>
                <input type="text" data-parsley-required-message="Please enter your city" name = "city" class="form-control" placeholder="City" data-parsley-length="[1, 25]" data-parsley-group="block1" required="">
                <div class="valid-feedback">
                    Looks good!
                    </div>
            </div>
            </div>
            <div style="float: right;">
            <div class="form-group">
                <label>Country</label>
                <input type="text" data-parsley-required-message="Please enter your last country" name = "country" class="form-control" placeholder="Country" data-parsley-length="[1, 25]" data-parsley-group="block1" required="">
            </div>
            </div>
            <div style="float: left;">
            <div class="form-group">
                <label>Address</label>
                <input type="text" data-parsley-required-message="Please enter your address" name = "address" class="form-control" placeholder="Address" data-parsley-length="[1,40]" required="">
            </div>
            </div>
            <div style="float: right;">
            <div class="form-group">
                <label>Postal Code</label>
                <input type="number" data-parsley-required-message="Please enter your postal code" name = "postalcode" class="form-control" placeholder="Postal Code" data-parsley-minlength="4" 
                    data-parsley-maxlength="16" required="">
            </div>    
            </div>  
        </div>
        <div class="modal-footer d-flex justify-content-between">
            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-info" value="Register" name="submitRegister"></input>
        </div>
        </form>
       </div>
    </div>
</div>

<?php
 include_once "includes/footer.inc.php";