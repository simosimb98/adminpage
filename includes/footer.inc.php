<!-- Footer -->
<!--Sweet Alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Maxon 2021</span>
        </div>
    </div>
</footer>
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

?>

</body>

</html>