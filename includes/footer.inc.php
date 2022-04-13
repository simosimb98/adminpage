<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Cyprus University of Technology <?php echo date("Y") ?></span>
    </div>
  </div>
</footer>
<!--Sweet Alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#contentTables').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<?php if (isset($_GET['modal']) && 'deleteVerifiedUser' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#deleteVerifiedUser").modal();
    </script>
<?php } ?>

<?php if (isset($_GET['modal']) && 'deletePendingUser' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#deletePendingUser").modal();
    </script>
<?php } ?>

<?php if (isset($_GET['modal']) && 'acceptPendingUser' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#acceptPendingUser").modal();
    </script>
<?php } ?>

<?php if (isset($_GET['modal']) && 'editUserDetails' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#editUserDetails").modal();
    </script>
<?php } ?>

<?php if (isset($_GET['modal']) && 'deleteAdmin' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#deleteAdmin").modal();
    </script>
<?php } ?>

<?php if (isset($_GET['modal']) && 'editAdminDetails' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#editAdminDetails").modal();
    </script>
<?php } ?>

<?php if (isset($_GET['modal']) && 'editAdminInfo' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#editAdminInfo").modal();
    </script>
<?php } ?>

<?php if (isset($_GET['modal']) && 'addAdmin' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#addAdmin").modal();
    </script>
<?php } ?>

<?php if (isset($_GET['modal']) && 'deletemessage' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#deletemessage").modal();
    </script>
<?php } ?>

<?php if (isset($_GET['modal']) && 'deleteOrder' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#deleteOrder").modal();
    </script>
<?php } ?>

<?php if (isset($_GET['modal']) && 'deleteNewsletterUser' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#deleteNewsletterUser").modal();
    </script>
<?php } ?>


<!--Sweet Alerts-->
<?php
if (isset($_GET['deletion'])) {
    if ($_GET['deletion'] == 'success') {
      echo '
        <script>
        $(document).ready(function(){
          Swal.fire({
            position: "center",
            icon: "success",
            title: "User has been deleted!",
            showConfirmButton: false,
            timer: 1600                 
          }).then(function() {
          })
        });                 
        </script>
        ';
    } else if ($_GET['deletion'] == 'error') {
      echo '
      <script>
      $(document).ready(function(){
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Deletion Failed!",
          showConfirmButton: false,
          timer: 1600                 
        }).then(function() {
          
        })
      });                 
      </script>
      ';
    }
  }

if (isset($_GET['deleteOrder'])) {
    if ($_GET['deleteOrder'] == 'success') {
      echo '
        <script>
        $(document).ready(function(){
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Order data has been deleted!",
            showConfirmButton: false,
            timer: 1600                 
          }).then(function() {
          })
        });                 
        </script>
        ';
    } else if ($_GET['deletionOrder'] == 'error') {
      echo '
      <script>
      $(document).ready(function(){
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Deletion Failed!",
          showConfirmButton: false,
          timer: 1600                 
        }).then(function() {
          
        })
      });                 
      </script>
      ';
    }
  }

  if (isset($_GET['deactivation'])) {
    if ($_GET['deactivation'] == 'success') {
      echo '
        <script>
        $(document).ready(function(){
          Swal.fire({
            position: "center",
            icon: "success",
            title: "User has been deactivated!",
            showConfirmButton: false,
            timer: 1600                 
          }).then(function() {
          })
        });                 
        </script>
        ';
    } else if ($_GET['deactivation'] == 'error') {
      echo '
      <script>
      $(document).ready(function(){
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Deactivation Failed!",
          showConfirmButton: false,
          timer: 1600                 
        }).then(function() {
          
        })
      });                 
      </script>
      ';
    }
  }

  if (isset($_GET['verification'])) {
    if ($_GET['verification'] == 'success') {
      echo '
        <script>
        $(document).ready(function(){
          Swal.fire({
            position: "center",
            icon: "success",
            title: "User has been accepted!",
            showConfirmButton: false,
            timer: 1600                 
          }).then(function() {
          })
        });                 
        </script>
        ';
    } else if ($_GET['verification'] == 'error') {
      echo '
      <script>
      $(document).ready(function(){
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Accepting User Failed!",
          showConfirmButton: false,
          timer: 1600                 
        }).then(function() {
          
        })
      });                 
      </script>
      ';
    }
  }

  if (isset($_GET['registration'])) {
    if ($_GET['registration'] == 'success') {
      echo '
        <script>
        $(document).ready(function(){
          Swal.fire({
            position: "center",
            icon: "success",
            title: "New admin has been added succesfully!",
            showConfirmButton: false,
            timer: 1600                 
          }).then(function() {
          })
        });                 
        </script>
        ';
    } else if ($_GET['registration'] == 'error') {
      echo '
      <script>
      $(document).ready(function(){
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Something went wrong, please try again!",
          showConfirmButton: false,
          timer: 1600                 
        }).then(function() {
          
        })
      });                 
      </script>
      ';
    }
  }

  if (isset($_GET['newsletter'])) {
    if ($_GET['newsletter'] == 'sent') {
      echo '
        <script>
        $(document).ready(function(){
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Newsletter has been sent to all subscribers!",
            showConfirmButton: false,
            timer: 1600                 
          }).then(function() {
          })
        });                 
        </script>
        ';
    } else if ($_GET['newsletter'] == 'fail') {
      echo '
      <script>
      $(document).ready(function(){
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Something went wrong, please try again!",
          showConfirmButton: false,
          timer: 1600                 
        }).then(function() {
          
        })
      });                 
      </script>
      ';
    }
  }

  if (isset($_GET['deleteMessage'])) {
    if ($_GET['deleteMessage'] == 'success') {
      echo '
        <script>
        $(document).ready(function(){
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Message has been deleted succesfully!",
            showConfirmButton: false,
            timer: 1600                 
          }).then(function() {
          })
        });                 
        </script>
        ';
    } else if ($_GET['deleteMessage'] == 'error') {
      echo '
      <script>
      $(document).ready(function(){
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Something went wrong, please try again!",
          showConfirmButton: false,
          timer: 1600                 
        }).then(function() {
          
        })
      });                 
      </script>
      ';
    }
  }

  if (isset($_GET['deleteNews'])) {
    if ($_GET['deleteNews'] == 'success') {
      echo '
        <script>
        $(document).ready(function(){
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Subscriber has been deleted succesfully!",
            showConfirmButton: false,
            timer: 1600                 
          }).then(function() {
          })
        });                 
        </script>
        ';
    } else if ($_GET['deleteNews'] == 'error') {
      echo '
      <script>
      $(document).ready(function(){
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Something went wrong, please try again!",
          showConfirmButton: false,
          timer: 1600                 
        }).then(function() {
          
        })
      });                 
      </script>
      ';
    }
  }

  if (isset($_GET['update'])) {
    if ($_GET['update'] == 'successful') {
      echo '
        <script>
        $(document).ready(function(){
          Swal.fire({
            position: "center",
            icon: "success",
            title: "New details have been added!",
            showConfirmButton: false,
            timer: 1600                 
          }).then(function() {
          })
        });                 
        </script>
        ';
    } else if ($_GET['update'] == 'stmtFailed') {
      echo '
      <script>
      $(document).ready(function(){
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Something went wrong, please try again!",
          showConfirmButton: false,
          timer: 1600                 
        }).then(function() {
          
        })
      });                 
      </script>
      ';
    }
  }
  
?>

</body>

</html>