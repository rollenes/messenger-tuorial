<?php

require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$recipient = $request->request->get('recipient');
$message = $request->request->get('message');

if ($recipient && $message) {
    echo '<span id="confirmation">Your message has been sent to: ' . $recipient . '</span>';
}
?>

<form action="" method="post">
    <input name="recipient" type="email">
    <textarea name="message"></textarea>
    <input name="send" type="submit">
</form>
