<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/index.js"></script>
<script src="./assets/js/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js.map"></script>
<script>
  $(document).ready(function() {
    $('#toggle').click(function() {
      $('#sidemenu').toggleClass('close');
      $('#main').toggleClass('close-section');

    });
  });

  $(document).ready(function() {
    $('#employee_data').DataTable();
  });
</script>
<script>
  function password_show_hide() {
    var x = document.getElementById("password");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
      x.type = "text";
      show_eye.style.display = "none";
      hide_eye.style.display = "block";
    } else {
      x.type = "password";
      show_eye.style.display = "block";
      hide_eye.style.display = "none";
    }
  }
</script>
<script>
  ClassicEditor
    .create(document.querySelector('#editor1'))
    .catch(error => {
      console.error(error);
    });
</script>

<?php

if (isset($_SESSION['status']) && isset($_SESSION['status']) != '') {
?>
  <script>
    swal({
      title: "<?php echo $_SESSION['status']; ?>",
      // text: "You clicked the button!",
      icon: "<?php echo $_SESSION['status_code']; ?>",
      button: "OK. Done!",
    });
  </script>
<?php
unset($_SESSION['status']);
}

?>

</body>

</html>

<div id="snackbar">Login Succefully</div>