<?php include 'include/header.php'; ?>


<section class="contact-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="contact-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrap-contact100 my-5">
                    <form class="contact100-form validate-form"  method="POST"  id="contactForm">
                        <span class="contact100-form-title">
                            Send Us A Message
                        </span>
                        <label class="label-input100" for="name">Tell us your name <span class="text-danger"> *</span></label>
                        <div class="wrap-input100 validate-input" data-validate="Type first name">
                            <input id="name" class="input100" type="text" name="name" placeholder="First name" required>
                            <span class="focus-input100"></span>
                        </div>
                        <!-- <div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
                            <input class="input100" type="text" name="last-name" placeholder="Last name" required>
                            <span class="focus-input100"></span>
                        </div> -->
                        <label class="label-input100" for="email">Enter your email <span class="text-danger"> *</span></label>
                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com" required>
                            <span class="focus-input100"></span>
                        </div>
                        <label class="label-input100" for="phone">Enter phone number <span class="text-danger"> *</span></label>
                        <div class="wrap-input100">
                            <input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +91 800 000000" onkeypress="if ( isNaN(this.value +
                            String.fromCharCode(event.keyCode) )) return false;" maxlength="12" minlength="10" required>
                            <span class="focus-input100"></span>
                        </div>
                        <label class="label-input100" for="message">Message <span class="text-danger"> *</span></label>
                        <div class="wrap-input100 validate-input" data-validate="Message is required">
                            <textarea id="message" class="input100" name="message" placeholder="Write us a message" required></textarea>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="container-contact100-form-btn">
                            <button class="contact100-form-btn btn btn-danger btn-block" type="button"  onclick="submitclick('contactForm')">
                                Send Message
                            </button>
                            <span style="color:red;" id="msg"></span>
                        </div>
                    </form>
                    <div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg')">
                        <div class="dis-flex  size1 p-b-47">
                            <div class="txt1 p-r-25">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="flex-col size2">
                                <span class="txt1 p-b-20">
                                    Address
                                </span>
                                <span class="txt3">
                                    F-32, Okhla Industrial Area, Phase-I, New Delhi-110022, India
                                </span>
                            </div>
                        </div>
                        <div class="dis-flex size1 p-b-47">
                            <div class="txt1 p-r-25">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="flex-col size2">
                                <span class="txt1 p-b-20">
                                    Lets Talk
                                </span>
                                <span class="txt3">
                                   <a href="tel:011-42575425" class="txt3">011-42575425</a>
                                </span>
                            </div>
                        </div>
                        <div class="dis-flex size1 p-b-47">
                            <div class="txt1 p-r-25">
                                <span class="fa fa-envelope"></span>
                            </div>
                            <div class="flex-col size2">
                                <span class="txt1 p-b-20">
                                    General Support
                                </span>
                                <span class="txt3">
                                   <a href="mailto:info@www.betafour.in" class="txt3">info@www.betafour.in</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="embed-responsive embed-responsive-16by9">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14022.766203821548!2d77.27242886977541!3d28.5189265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce1b9ef726369%3A0x56982b966e37914b!2sBeta%20Four!5e0!3m2!1sen!2sin!4v1651473749343!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<?php include 'include/footer.php'; ?>



      <a href="https://wa.me/8826660388" class="whatsapp_float" target="_blank" rel="noopener noreferrer">
        <i class="fa fa-whatsapp whatsapp-icon"></i>
      </a>