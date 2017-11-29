<?php
if(isset($_POST['email'])) {
    $email_to = "katherinexphan@gmail.com";
    $email_subject = "Book Request";

    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $address = $_POST['address']; // required
    $book = $_POST['book']; // required

    function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
    }

    $email_message = "Someone has requested a book!\n\n";
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Address: ".clean_string($address)."\n";
    $email_message .= "Book: ".clean_string($book)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);
?>
  <!-- include your own success html here -->

  <div class="feedback">Happy reading! I'll be in touch shortly.</div>
  <?php
}
?>
