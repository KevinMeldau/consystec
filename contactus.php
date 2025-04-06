<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <!-- Mobile Specific Data -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>ConSysTec - Contact Us</title>

    <link rel="stylesheet" href="assets/css/normalize.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto+Slab:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <!-- Load skeleton css -->
    <link rel="stylesheet" href="assets/css/bootstrap-grid.css" />
    <!-- Load Stylesheet -->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!-- IcoFont -->
    <link rel="stylesheet" href="assets/css/icofont.min.css" />
    <!-- Load Form -->
    <link rel="stylesheet" href="assets/css/bootstrap.css" media="screen" />		
    <!-- script src='https://www.google.com/recaptcha/api.js' async defer ></ script -->
  </head>
  <body>
    <header class="site-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 header-left">
            <div class="site-branding">
              <a href="index.html"><img src="images/logo.png" alt="Logo" /></a>
            </div>
            <!-- .site-branding -->
            <nav class="site-navigation">
              <ul class="main-nav">
                <li><a href="services.html">Services</a></li>
                <li><a href="about-us.html">About Us</a></li>
                <li><a href="resources.html">Resources</a></li>
                <li class="active"><a href="#">Contact Us</a></li>
              </ul>
            </nav>
            <a href="#"
              ><span
                class="icofont-navigation-menu mobile-icon js-mobile-close-icon"
              ></span
            ></a>
          </div>
          <!-- .col-md-12 -->
        </div>
        <!-- .row -->
      </div>
      <!-- .container -->
    </header>
    <nav class="mobile-navigation">
      <ul class="main-nav">
        <li><a href="#">Services</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Resources</a></li>
        <li><a class="ct-contact" href="#footer">Contact Us</a></li>
      </ul>
      <span class="icofont-plus menu-close-icon js-menu-close-icon"></span>
    </nav>

    <!-- div class="container ct-spacing">
	      <div class="container"> -->
	<div class="container ct-spacing">

      <!-- .ct-heading -->
      <div class="row ct-about-section">
<?php
if ((isset($_POST['destination']))||(isset($_POST['name']))||(isset($_POST['email']))||(isset($_POST['organization']))||(isset($_POST['phone']))||(isset($_POST['message']))){
	//$secretKey = "6Ldy5BMUAAAAAGA0ECfoTKvaPOdvBfLQIkumtq9r";
	//$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$_POST['g-recaptcha-response']);
	//$response = json_decode($response, true);
        $response["success"] = true;
	if($response["success"] == true) {
		//set destination
		if ($_POST['destination'] == "services"){
			$to = "inquiries@consystec.com";
			$subject = "ConSysTec Web Inquiry: Services";								
		}
		else if ($_POST['destination'] == "web"){
			$to = "webmaster@consystec.com";
			$subject = "ConSysTec Web Inquiry: Website Issue";								
		}
		else {
			$to = "inquiries@consystec.com";
			$subject = "ConSysTec Web Inquiry: General/Other";								
		}
								
		$message = "The following message was received on the ConSysTec Website:\r\n
		Name: " . $_POST['name'] ."\r\n
		Organization: " . $_POST['organization'] ."\r\n
		Phone: " . $_POST['phone'] ."\r\n
		Email: " . $_POST['email'] ."\r\n
		Subject: ". $subject . "\r\n
		Message: " . $_POST['message'] ."\r\n";
								
		$from = $_POST['email'];
		$headers = "From:" . $from . "\r\n";
		mail($to,$subject,$message,$headers);
								
		$receipt = "Thank you for your inquiry on the ConSysTec Website.  We will respond as soon as possible:\r\n
		Name: " . $_POST['name'] ."\r\n
		Organization: " . $_POST['organization'] ."\r\n
		Phone: " . $_POST['phone'] ."\r\n
		Email: " . $_POST['email'] ."\r\n
		Subject: ". $subject . "\r\n
		Message: " . $_POST['message'] ."\r\n";
								
		$from = $_POST['email'];
		$headers = "From:" . $from . "\r\n";
		mail($from,$subject,$receipt,$headers);							
		//echo("<h3 class='text-center'>Contact Us</h3>");
		echo("<p>Thank you for your inquiry with ConSysTec.  We will respond as soon as possible.  A copy of your message has been emailed to you for your records.</p><br/><br/>");
    	}
        else {
		echo("<h3 class='text-center'>Contact Us</h3>");
		echo("<p>Sorry, we can not verify that you are not a computer.  Please go back and try again.</p><br/><br/>");
	}						
}
else {
?>
	<h3 class="text-center">Contact Us</h3><p>
	Please fill out this form to contact us for any reason, including to receive information about our services, or for any issues with our website that you may be having.  We will respond to your inquiry as quickly as possible. </p>
							
	<form role="form" method="post" action="contactusnew.php">
	<div class="col-md-6">								
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" placeholder="Enter your name"/>
		</div>
		<div class="form-group">
			<label for="organization">Organization</label>
			<input type="text" class="form-control" name="organization" placeholder="Enter your organization"/>
		</div>
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" name="email" placeholder="Enter your email address"/>
		</div>
		<div class="form-group">
			<label for="phone">Contact Phone</label>
			<input type="text" class="form-control" name="phone" placeholder="Enter your phone number"/>
		</div><br/></br>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="destination">Purpose of your inquiry</label>
			<select class="form-control" name="destination">
				<option value="services">Information about ConSysTec Services</option>
				<option value="web">Website Issue</option>
				<option value="other">Other/General</option>
			</select>
		</div>
		<div class="form-group">
			<label for="message">Message</label>
			<textarea rows="8" class="form-control" name="message" placeholder="Enter your message here"/></textarea>
		</div>
		<!-- p> Please verify that you are not a computer: </p --> 
		<div data-sitekey="6Ldy5BMUAAAAAENesx7YWbHIzGEUdotSJY37FpRq"></div><br/>												
		<button type="submit" class="btn btn-default">Submit</button>
		<button type="reset" class="btn btn-default">Reset</button> <br/><br/>							
		</div>
</form> <br/><br/>
<?php
	$_POST['submitted']= true;
}
?>
				</div>
			</div>
			
<!--START BOILER PLATE FOOTER-->

   <footer class="footer ct-spacing" id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="ct-about-footer">
              <img src="images/final_logo_reversed.png" alt="Logo" />
              <div class="ct-heading">
                <h3 class="ct-header ct-title">
                  Consensus Systems Technologies Corporation
                </h3>
              </div>

              <div class="ct-social">
                <a href="https://www.facebook.com/ConSysTecITS" target="_blank"
                  ><img src="images/facebook-brands.svg" alt="fb"
                /></a>
                <a href="https://twitter.com/consystec" target="_blank"
                  ><img src="images/twitter-brands.svg" alt="tw"
                /></a>
                <a
                  href="https://www.linkedin.com/company/consensus-systems-technologies/"
                  target="_blank"
                  ><img src="images/linkedin-in-brands.svg" alt="in"
                /></a>
              </div>

              <span class="copyright">@ 2021 ConSysTec</span>
            </div>
          </div>
          <!-- .col-md-5 -->
          <div class="col-md-3">
            <div class="ct-heading">
              <h2 class="ct-header ct-title">Links</h2>
            </div>
            <p><a href="services.html">Services</a></p>
            <p><a href="about-us.html">About Us</a></p>
            <p><a href="resources.html">Resources</a></p>
            <p><a href="#">Sitemap</a></p>
          </div>
          <!-- .col-md-3 -->
          <div class="col-md-3">
            <div class="ct-heading">
              <h2 class="ct-header ct-title">Contact Us</h2>
            </div>
            <p>inquiries@consystec.com</p>
            <p>914.248.8466</p>
            <p>200 East 89th Street, Unit 34A</p>
            <p>New York, NY, USA 10128-4306</p>
          </div>
          <!-- .col-md-3 -->
        </div>
      </div>
      <!-- .container -->
    </footer>

    <!-- Load javascript files -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/jquery-custom.js"></script>
  </body>
</html>


<!-- END BOILER PLATE FOOTER-->