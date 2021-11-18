<!-- Footer -->
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

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

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



?>

</body>

</html>