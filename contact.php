<?php (include 'header.php') ?>

<div class="hs_page_title">
  <div class="container">
    <h3>Contact us</h3>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="about.html">contact</a></li>
    </ul>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="hs_contact_head_text">
        <h4 class="hs_contact_heading">Get in touch with us</h4>
        <!-- <p>Suspendisse ultrices sapien sit amet accumsan pharetra. Phasellus nec turpis neque. </br>Sed tortor lacus,
            eleifend vitae eros at, fermentum pellentesque leo.</p> -->
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-12 col-sm-12">
      <h4 class="hs_heading">Leave a Message</h4>
      <div class="hs_comment_form">
        <div class="row">
          <form method="post">

            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="input-group"> <span class="input-group-btn">
                  <button class="btn btn-success" type="button"><i class="fa fa-user"></i></button>
                </span>
                <input id="uname" type="text" class="form-control" placeholder="Full Name" name="name">
              </div>
              <!-- /input-group -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="input-group"> <span class="input-group-btn">
                  <button class="btn btn-success" type="button"><i class="fa fa-envelope"></i></button>
                </span>
                <input id="uemail" type="text" class="form-control" placeholder="Email" name="email">
              </div>
              <!-- /input-group -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-12">
              <div class="form-group">
                <textarea id="message" class="form-control" rows="8" name="message" placeholder="Write something here..."></textarea>
              </div>
              <!-- /input-group -->
            </div>
            <p id="err"></p>
            <div class="form-group">
              <!-- <div class="col-lg-8 col-md-8 col-sm-6">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="hs_checkbox" class="css-checkbox lrg" checked="checked" />
                    <label for="hs_checkbox" name="checkbox69_lbl" class="css-label lrg hs_checkbox">Receive Your
                      Comments By Email</label>
                  </label>
                </div>
              </div> -->
              <div class="col-lg-12 col-md-12 col-sm-12">
                <button id="em_sub" class="btn btn-success pull-right" type="submit" name="submit">Send</button>
              </div>
            </div>
          </form>

          <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];


            //Load Composer's autoloader
            require 'PHPMailer/Exception.php';
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'rishikalpa.sambhav@gmail.com';
                $mail->Password   = 'iwlw kelp jlia miud';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                //Recipients
                $mail->setFrom('rishikalpa.sambhav@gmail.com', 'CONTACT');
                $mail->addAddress('rishikalpadas@gmail.com', 'Rishikalpa Das');

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'New Message for Bengal Cancer Centre';
                $mail->Body    = "Name: $name<br>Email: $email<br>Message: $message";

                $mail->send();
                echo '<script>alert("Message has been sent successfully!")</script>';
            } catch (Exception $e) {
                echo "<script>alert('Message could not be sent! Mailer Error: {$mail->ErrorInfo}')</script>";
            }
        }


        ?>

        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
      <h4 class="hs_heading">Contact</h4>
      <div class="hs_contact">
        <ul>
          <li> <i class="fa fa-map-marker"></i>
            <p style="padding-left: 70px;">1st Floor, Prathika Appartment, Flat No. 1, TN Mukherjee Rd. South Subhas
              Pally, Dankuni, West Bengal - 712311</p>
          </li>
          <li> <i class="fa fa-phone"></i>

            <a href="tel:+918902202926">
              <p>+918902202926</p>
            </a>
            <a href="tel:+919597239955">
              <p>+919597239955</p>
            </a>

          </li>
          <!-- <li> <i class="fa fa-envelope"></i>
              <p><a href="Mailto:info@healthcare.com">info@healthcare.com</a></p>
              <p><a href="Mailto:info@healthcare.com">info@healthcare.com</a></p>
            </li> -->
        </ul>
      </div>
      <!-- <div class="hs_contact_social">
          <div class="hs_profile_social">
            <ul>
              <li><a href=""><i class="fa fa-facebook"></i></a></li>
              <li><a href=""><i class="fa fa-twitter"></i></a></li>
              <li><a href=""><i class="fa fa-linkedin"></i></a></li>
              <li><a href=""><i class="fa fa-skype"></i></a></li>
              <li><a href=""><i class="fa fa-youtube"></i></a></li>
            </ul>
          </div>
        </div> -->
    </div>
  </div>
  <!-- <div class="row">
      <div class="col-lg-12">
        <div class="hs_contact_head_text">
          <h4 class="hs_contact_heading">Additional Support Resource</h4>
          <p>Suspendisse ultrices sapien sit amet accumsan pharetra. Phasellus nec turpis neque. </br>Sed tortor lacus,
            eleifend vitae eros at, fermentum pellentesque leo.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="hs_additional_support">
              <h4>Manuals</h4>
              <p>venenatis, id pharetra ante luctus. Ae lacinia blandit tellus, eu dignissim rhoncus. Nam volutpat eu
                neque ac, mollis dictuml. </p>
              <a href="" class="btn btn-default">Read More</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="hs_additional_support">
              <h4>Manuals</h4>
              <p>venenatis, id pharetra ante luctus. Ae lacinia blandit tellus, eu dignissim rhoncus. Nam volutpat eu
                neque ac, mollis dictuml. </p>
              <a href="" class="btn btn-default">Read More</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="hs_additional_support">
              <h4>Manuals</h4>
              <p>venenatis, id pharetra ante luctus. Ae lacinia blandit tellus, eu dignissim rhoncus. Nam volutpat eu
                neque ac, mollis dictuml. </p>
              <a href="" class="btn btn-default">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  <div class="clearfix"></div>
</div>
<iframe
  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d230.04761029103057!2d88.28837932313635!3d22.699910908474532!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f8832a95bedb7b%3A0xc9d9814cbbab2e86!2sBengal%20Cancer%20Center!5e0!3m2!1sen!2sin!4v1731236318695!5m2!1sen!2sin"
  allowfullscreen="" width="100%" height="500px"></iframe>

<?php include('footer.php') ?>