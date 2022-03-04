<?php
$title = 'Newsletter | APM Admin';
include_once 'includes/header.inc.php';
?>
<style>
.btn-success{
    height: 38px;
}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2>Manage <b>Newsletter</b></h2>
                        </div>
                            <a href="#sendNewsletter" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Send newsletter</span></a>
                            <form action="includes/newsletterPDF.inc.php" method="POST">
                                <div class="col d-flex justify-content-end mb-2">
                            </form>

                    </div>
                </div>
                <table data-page-length='5' id="contentTables" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Entry ID</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include_once "includes/newsletterTable.inc.php"; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<!-- Add Modal HTML -->
<div id="sendNewsletter" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="includes/sendNewsletter.inc.php" method = "POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Send newsletter</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Subject*</label>
                        <input type="text" class="form-control" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label>Message*</label>
                        <textarea class ="form-control" name="message" id="message" cols="100" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name = "attach1">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-defauls" data-dismiss="modal" value="Cancel">
                    <input type="submit" name = "submitSendNewsletter" class="btn btn-success" value="Send">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteNewsletterUser" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action = "includes/deleteNewsletter.inc.php" method = "POST">
                <div class="modal-header">
                    <h4 class="modal-title">Delete subscriber</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                    <p class="text-warning">This subscriber will no longer receive newsletters</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="hidden" name="entryID" value= '<?php echo $_GET['entryID']?>'>
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once 'includes/footer.inc.php';
