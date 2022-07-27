<?php
include_once "includes/header.inc.php";
?>

  <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-2 text-gray-800">Verified Users</h1>
                        <a href="#manualVerifiedUsers" class="btn btn-primary" data-toggle="modal"><i class="fas fa-question-circle">
                        </i> <span>Help</span></a>
                    </div>
                
                    <!-- Page Heading -->
                    <p class="mb-4">These users can log in to the website.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                
                                <table id="contentTables" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php include_once "includes/verifiedUsersTable.inc.php"; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

                  <!-- Manual Modal HTML -->
   <div id="manualVerifiedUsers" class="modal fade">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">              
                   <?php
                      include_once 'manuals/manualVerifiedUsers.html';         
                   ?>  
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" data-dismiss="modal" value="Ok" ?>
                    </div>
               
            </div>
        </div>
    </div>
 
             <!-- Delete Modal HTML -->
    <div id="deleteVerifiedUser" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/deleteVerifiedUser.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Deactivate Customer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure</p>
                        <p class="text-warning"><small>This user's will no longer be able to log in with his credentials!</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="hidden" name="userID" value='<?php echo $_GET['userID'] ?>'>
                        <button type="submit" value="Yes" class="btn btn-danger">Deactivate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
 include_once "includes/footer.inc.php";