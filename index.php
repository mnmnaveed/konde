
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register your account in Konde.lk</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <section id="show">
        <div class="page-wrapper p-t-100 p-b-50">
            <div class="wrapper wrapper--w900">
                <div class="card card-6">
                    <div class="card-heading">
                        <h2 class="title">Register your Saloon to KONDE.LK</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-row">
                                <div class="name">Full name</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="full_name" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Email address</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-6" type="email" name="email" placeholder="example@email.com" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Phone Number</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="Phone_number" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Shop Name</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="shop_name" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="name">Any request or Message</div>
                                <div class="value">
                                    <div class="input-group">
                                        <textarea class="textarea--style-6" name="message" placeholder="Message sent to the employer" required></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="name">Upload Images</div>
                                <div class="value">
                                    <div class="input-group js-input-file">
                                        <input class="input-file" type="file" name="file_cv" id="file">
                                        <label class="label--file" for="file">Choose file</label>
                                        <span class="input-file__info">No file chosen</span>
                                    </div>
                                    <div class="label--desc">Upload your Profile Picture</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Message box</div>
                                <div class="value">
                                    <div class="input-group">
                                        <textarea class="textarea--style-6 textarea-text" name="ss" placeholder="Please read this carefully You might get spam links and messages like this dont give your personal details or register in that without contacting the kondey.lk thank you" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--radius-2 btn--blue-2" id="done-btn" type="submit" >Register Now</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
       </section>

   <section class="after-msg" id="after-reg">
        <div class="body-msg">
            <h2>Thank you for registration!</h2>
            <p>You will get your login informations soon</p>
        </div>
   </section>

    

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->

<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "aiyashmuneer@gmail.com";
    $email_subject = "A new customer";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['full_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['Phone_number']) ||
        !isset($_POST['shop_name']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $full_name = $_POST['full_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['Phone_number']; //required
    $shop_name = $_POST['shop_name']; // required
    $message = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$full_name)) {
    $error_message .= 'The full name entered does not appear to be valid.<br />';
  }
 
 
  if(strlen($message) < 2) {
    $error_message .= 'The message you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Full Name: ".clean_string($full_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Shop_name: ".clean_string($shop_name)."\n";
    $email_message .= "message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
<?php
 
}
?>