<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "info@tresmentes-solutions.com";
 
    $email_subject = "Message From Your TRESMENTES Website";
 
 
    function died($error) {
 
        // your error code can go here
 
        echo "<script>
             alert('Make sure you fill in all the fields!');
             window.location.href='../index.html';
             </script>";
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['message']) ||

        !isset($_POST['subject'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $name = $_POST['name']; // required
  
    $email_from = $_POST['email']; // required

    $subject = $_POST['subject']; // required
  
    $comments = $_POST['message']; // required
 
     
 
  $error_message = "";
 
  $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
  $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
 
  }

  $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$subject)) {
 
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'The Message you entered do not appear to be valid.<br />';
 
  }

 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
  else{

    $email_message = "Messages details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
   
    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Subject: ".clean_string($subject)."\n";
   
    $email_message .= "Message: ".clean_string($comments)."\n";
   
       
   
       
   
  // create email headers
   
  $headers = 'From: '.$email_from."\r\n".
   
  'Reply-To: '.$email_from."\r\n" .
   
  'X-Mailer: PHP/' . phpversion();
   
  @mail($email_to, $email_subject, $email_message, $headers); 
  echo "<script>
   alert('Thank You For Contacting Us. We will reply ASAP.');
   window.location.href='../index.html';
   </script>";
  }
} 
?>
