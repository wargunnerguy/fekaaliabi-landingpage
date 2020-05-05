<?php
iconv_set_encoding("internal_encoding", "UTF-8");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $subject = mb_encode_mimeheader($subject, "UTF-8");
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];

    $mailTo = "info@fekaaliabi.ee";
    $headers = "From: Fekaaliabi<" . $mailTo . ">";
    $txt = $mailFrom . ", " . $name . " saatis kirja: " . "\n" . $message;
    mail(utf8_decode("Fekaaliabi <" . $mailTo . ">"),
        utf8_decode($subject . ", " . $name . ", " . $mailFrom),
        utf8_decode($txt), 
        utf8_decode($headers) . "\nContent-Type: text/plain; charset=UTF-8\nContent-Transfer-Encoding: 8bit\n");
    header("Location: index.php");
}
?>
