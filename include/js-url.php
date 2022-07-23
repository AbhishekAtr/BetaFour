
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/jquery.sticky.js"></script>
<script src="./js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./css/slick.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
    // Form dynimc start
    function submitclick(formId) {

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
                success: function(data) {
                    debugger
                    $("button").attr('disabled', false)
                    if (data == 1) {
                        // $(".loader").modal("show");
                        $("#" + formId)[0].reset();
                        var x = document.getElementById("snackbar");
                        x.className = "show";
                        setTimeout(function() {
                            x.className = x.className.replace("show", "Form Submitted Successfully");
                        }, 3000);
                        setTimeout(function() {
                            $(".loader").modal("hide");
                            $("#contact_modal").modal("hide");
                        }, 3000);

                    } else {
                        alert(data)
                    }
                },
                error: function(error) {
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

    function submitdata(formId) {

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
                success: function(data) {
                    $("button").attr('disabled', false)
                    if (data == 1) {
                        // $(".loader").modal("show");
                        $("#" + formId)[0].reset();
                        var x = document.getElementById("snackbar");
                        x.className = "show";
                        setTimeout(function() {
                            x.className = x.className.replace("show", "Form Submitted Successfully");
                        }, 3000);
                        setTimeout(function() {
                            $(".loader").modal("hide");
                            $("#contact_modal").modal("hide");
                        }, 3000);

                    } else {
                        alert(data)
                    }
                },
                error: function(error) {
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
<script>
    //   jQuery('#contactForm').on('submit',function(e){
    //     debugger
    // 	jQuery('#msg').html('');
    // 	jQuery('#submit').html('Please wait');
    // 	jQuery('#submit').attr('disabled',true);
    // 	jQuery.ajax({
    // 		url:'mail.php',
    // 		type:'post',
    // 		data:jQuery('#contactForm').serialize(),
    // 		success:function(result){
    // 			jQuery('#msg').html(result);
    // 			jQuery('#submit').html('Submit');
    // 			jQuery('#submit').attr('disabled',false);
    // 			jQuery('#contactForm')[0].reset();
    // 		}
    // 	});
    // 	e.preventDefault();
    //   });
</script>
</body>

</html>