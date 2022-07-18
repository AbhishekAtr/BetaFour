
 <script src="./js/jquery-3.3.1.min.js"></script>
  <!-- <script src="./js/popper.min.js"></script> -->
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/jquery.sticky.js"></script>
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="./js/main.js"></script>
  <script src="./css/slick.min.js"></script>
  <script>
        function submitForm(formId) {
        
        try {

            if (!$("#" + formId).valid()) {
                return false
            }
            $("button").attr('disabled', true)
            var postData = $('#' + formId).serialize()
            $.ajax({
                type: 'POST',
                url: "mail.php",
                data: postData,
                success: function (data) {
                    $("button").attr('disabled', false)
                    if (data == 1) {
                        $(".loader").modal("show");
                        $("#" + formId)[0].reset();
                        var x = document.getElementById("snackbar");
                        x.className = "show";
                        setTimeout(function () {
                            x.className = x.className.replace("show", "Form Submitted Successfully");
                        }, 3000);
                        setTimeout(function () {
                            $(".loader").modal("hide");
                            $("#contact_modal").modal("hide");
                        }, 3000);

                    } else {
                        alert(data)
                    }
                },
                error: function (error) {
                    $("").attr('disabled', false)
                    alert("Something went wrong, please try again later")
                }
            });
        } catch (error) {
            console.log(error.message);

            $("button").attr('disabled', false)
            alert("Something went wrong, please try again later")
        }
    }
    
    function submitform(formId) {
        
        try {

            if (!$("#" + formId).valid()) {
                return false
            }
            $("button").attr('disabled', true)
            var postData = $('#' + formId).serialize()
            $.ajax({
                type: 'POST',
                url: "mail1.php",
                data: postData,
                success: function (data) {
                    $("button").attr('disabled', false)
                    if (data == 1) {
                        $(".loader").modal("show");
                        $("#" + formId)[0].reset();
                        var x = document.getElementById("snackbar");
                        x.className = "show";
                        setTimeout(function () {
                            x.className = x.className.replace("show", "Form Submitted Successfully");
                        }, 3000);
                        setTimeout(function () {
                            $(".loader").modal("hide");
                            $("#contact_modal").modal("hide");
                        }, 3000);

                    } else {
                        alert(data)
                    }
                },
                error: function (error) {
                    $("").attr('disabled', false)
                    alert("Something went wrong, please try again later")
                }
            });
        } catch (error) {
            console.log(error.message);

            $("button").attr('disabled', false)
            alert("Something went wrong, please try again later")
        }
    }

  </script>
  <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</body>

</html>