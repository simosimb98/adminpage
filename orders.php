<?php
include_once "includes/header.inc.php";
?>

  <!-- Begin Page Content -->
                <div class="container-fluid">
     
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Orders</h1>
                    <p class="mb-4">Orders coming in from users</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ordes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <div class="table-wrapper">
                                <table class="table table-bordered" id="contentTables" width="100%" cellspacing="0">
                                 <thead>
                                        <tr>
                                            <th>Order Status</th>
                                            <th>Order ID</th>
                                            <th>Purchased By</th>
                                            <th>Date of Purchase</th>
                                            <th class="text-center">Orders</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php include_once "includes/ordersTable.inc.php"; ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<!-- Delete Modal HTML -->
    <div id="deleteOrder" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/deleteOrder.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Order</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure?</p>
                        <p class="text-warning"><small>This order's data will be deleted!</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="hidden" name="orderID" value='<?php echo $_GET['orderID'] ?>'>
                        <button type="submit" value="Yes" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
 include_once "includes/footer.inc.php";