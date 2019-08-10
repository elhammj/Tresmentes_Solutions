<?php
 
  $email_to = "elham.m.j@gmail.com";

  $email_subject = $_POST['subject']

  $name = $_POST['name']; 

  $email_from = $_POST['email']; 

  $comments = $_POST['message']; 

  $email_message = "Messages details below.\n\n";

   
  function clean_string($string) {

    $bad = array("content-type","bcc:","to:","cc:","href");

    return str_replace($bad,"",$string);

  }

  $email_message .= "Name: ".clean_string($name)."\n";

  $email_message .= "Subject: ".clean_string($email_subject)."\n";

  $email_message .= "Email: ".clean_string($email_from)."\n";

  $email_message .= "Message: ".clean_string($comments)."\n";  
   
  // create email headers
   
  $headers = 'From: '.$email_from."\r\n".
   
  'Reply-To: '.$email_from."\r\n" .
   
  'X-Mailer: PHP/' . phpversion();
   
  @mail($email_to, $email_subject, $email_message, $headers); 
 
?>
<!-- include your own success html here -->
<!-- 
<script>
    alert('Thank you for contacting us. I will be in touch with you very soon.');
    window.location.href='../index.html';
</script>
-->