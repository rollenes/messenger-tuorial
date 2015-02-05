<?php
if (@$_POST['recipient'] && @$_POST['message']) {
    echo '<span id="confirmation">Your message has been sent to: ' . $_POST['recipient'] . '</span>';
}
?>

<form action="" method="post">
    <input name="recipient" type="email">
    <textarea name="message"></textarea>
    <input name="send" type="submit">
</form>
