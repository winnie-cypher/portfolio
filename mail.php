<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "bamgboyewinner@gmail.com";
    $email_subject = "my portfolio";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['Name']) ||
        !isset($_POST['Phone']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Your Message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['Name']; // required
    $email_from = $_POST['Phone']; // required
    $phone = $_POST['Email']; // required
    $message = $_POST[' Your Message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    echo "<script>alert('The Email Address you entered does not appear to be valid.')
location.href='index-dark.html#contact'</script>"; 
	//$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    echo "<script>alert('The Name you entered does not appear to be valid.')
location.href='index.php'</script>"; 
	//$error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
 
  if(strlen($message) < 2) {
    echo "<script>alert('The Message you entered do not appear to be valid.')
location.href='index.php'</script>";
	//$error_message .= 'The Message you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Message from $name and $phone on MY PORTFOLIO. Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Phone: ".clean_string($email_from)."\n";
    $email_message .= "Email: ".clean_string($phone)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 

echo "<script>alert('Thank you for contacting WINNER BAMGBOYE. I will be in touch with you very soon.')
location.href='contact.php'</script>"; 
?>
 
<!-- include your own success html here -->
 
<!--Thank you for contacting us. We will be in touch with you very soon.-->
 <?php
/*function IsInjected($str)
{
$injections = array('(\n+)',
'(\r+)',
'(\t+)',
'(%0A+)',
'(%0D+)',
'(%08+)',
'(%09+)'
);
$inject = join('|', $injections);
$inject = "/$inject/i";
if(preg_match($inject,$str))
{
return true;
}
else
{
return false;
}
}
if(IsInjected($visitor_email))
{
echo "Bad email value!";
exit;
}
*/?>
<?php
 
}
?>