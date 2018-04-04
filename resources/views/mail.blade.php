<form action="" method="post">
    <input type="submit" value="Send details to embassy" />
    <input type="hidden" name="button_pressed" value="1" />
</form>

<?php

if(isset($_POST['button_pressed']))
{
    $to      = 'subham2003@gmail.com';
    $subject = 'the subject';
    $message = 'hello';
    $headers = 'From: subham2003@gmail' . "\r\n" .
        'Reply-To: subham2003@gmail' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    echo 'Email Sent.';
}

?>
