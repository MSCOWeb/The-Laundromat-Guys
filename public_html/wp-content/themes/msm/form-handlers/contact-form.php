<?php 
/*=== --- SETTINGS --- === */

$to = ""; // Where submissions are sent. Leave blank if using $_POST['to']
$bcc = "stephen@msmdesignz.com";
$from_name = "The Laundromat Guys";
$from_email = "info@thelaundromatguys.com"; // Where email to company is coming from
$subject = "The Laundromat Guys General Inquiry"; // Subject of email to company. Leave blank if using $_POST['subject']
$success_msg = "success"; // Message to return after successful execution
$prevent_spam = true; // Checks value of $_POST['timer'] to see if form was completed suspiciously fast
$required = array( // List of required form values
    "Name",
    "Email"
);
$include_ip = true; // If you want to include the submitter's IP address and referring URL with the form submission data
$html_email = true; // Make it look a little nicer by sending an HTML email

// CONFIRMATION EMAIL SETTINGS
$confirmation_email = false; // Send a "bounce-back" email to client
$return_subject = "Free Trial From Legacy Life Center"; // Subject of email sent to client
$return_message = <<< EOT
    <html><body>
    <p>Thank you for your interest in Legacy Life Center!<br/><br/>\r\n\r\n
    Please print this email and bring it in to us to schedule your free Martial Arts trial class. You can choose to try our Wushu, Taekwon-Do, Filipino Martial Arts or Cardio Kickboxing class!<br/><br/>\r\n\r\n
    If you would like to schedule your free class over the phone, please call us anytime at 732.210.2447<br/><br/>\r\n\r\n
    We look forward to seeing you soon!<br/><br/>\r\n\r\n
    Sincerely,<br/><br/>\r\n\r\n
    The Legacy Life Center Team</p>
    </body></html>
EOT;

/*=== --- END SETTINGS --- ===*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If form was submitted...

    $ip = $_SERVER['REMOTE_ADDR'];
    if(empty($ip)) dieSpam();

    if($prevent_spam){ // Let's prevent some spam! Make sure you're submitting a value for $_POST['timer']
        if(empty($_POST['timer'])) {
            dieSpam($ip);
        } else {
            $timer = $_POST['timer'];
            if(!is_numeric($timer) || $timer < 3 || $timer > 9999) dieSpam($ip);
        }
    }
    unset($_POST['timer']);

    // Assign an email to send submissions to, if one hasn't been set
    if(empty($to)){
        if(!empty($_POST['to'])){
            foreach($_POST['to'] as $value){
                $to .= strip_tags(trim($value)) . ", ";
            }
            $to = rtrim($to,',');
        } else {
            die("Please assign an email address to receive form submissions.");
        }
    }
    unset($_POST['to']);

    // Assign a subject if one hasn't been set. Defaults to "Form Submission Received"
    if(empty($subject)){
        if(!empty($_POST['subject'])){
            $subject = strip_tags(trim($_POST['subject']));
        } else {
            $subject = "Form Submission Received";
        }
    }
    unset($_POST['subject']);

    // Sanitize input and check for missing required values
	foreach ($_POST as $key => &$value){
		$value = strip_tags(trim($value));
		if($value == ''){
			if(in_array($key,$required)) die("Please complete the " . str_replace('_',' ',$key) . " field.");
		}
        if(strlen($value) > 1122) die("Your message is too long. Please shorten it and try again.");
        if(strtolower($key)== "email"){
    	   if(!filter_var($value,FILTER_VALIDATE_EMAIL)) die("Please provide a valid email address.");
        }
        unset($value);
    }

    // No errors...
    extract($_POST);
    $message = '';

    // Set parameters for email to company
    $headers = "From: $from_name <$from_email>\r\n";
    $headers .= "Reply-to: $from_email\r\n";
    if(!empty($bcc)) $headers .= "Bcc: $bcc\r\n";
    if($html_email){
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = "<html><body>";
    }
    foreach ($_POST as $key => $value) {
    	$message .= "<strong>" . str_replace('_',' ',ucfirst($key)) . ":</strong> " . nl2br($value) . "\r\n\r\n<br/><br/>";
    }

    if($html_email) $message .= "<hr/>";

    if($include_ip){
        $message .= "<em>I.P. Address: $ip</em>\r\n<br/>";
        $message .= "<em>Referral URL: " . $_SERVER['HTTP_REFERER'] . "</em>\r\n<br/>";
    }

    if($html_email){
        $message .= "</body></html>";
    } else {
        $message = strip_tags($message);
    }

    // Email to company
    if(!mail($to,$subject,$message,$headers)) die("We've encountered an error. Please try again."); // Error sending mail

    if($confirmation_email){
        if(!$html_email) $return_message = strip_tags($return_message);
        @mail($Email,$return_subject,$return_message,$headers);
    }

    die($success_msg);

} else {
	die("No direct access allowed.");
}

function dieSpam($ip = "No I.P."){
    $file = "spam-log.txt";
    date_default_timezone_set('America/New_York');
    $date = date('m/d/Y h:i:s a');
    @file_put_contents($file,"$date: $ip\r", FILE_APPEND | LOCK_EX); // Write to spam-log.txt
    die("There was an error with your attempt to contact us."); // Nice try, spam-bro
} ?>