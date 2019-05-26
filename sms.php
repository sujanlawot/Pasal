
<?php
/* watch the video for detailed instructions */
$to = "sujan.lawot010@gmail.com";
$from = "sujan.lawot@gmail.com";
$message = "This is a text message\nNew line...";
$headers = "From: $from\n";
mail($to, '', $message, $headers);
?>