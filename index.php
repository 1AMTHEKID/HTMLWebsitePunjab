<?php
/**
 * Created by PhpStorm.
 * User: pascu
 * Date: 15-5-2019
 * Time: 11:39
 */


//var_dump($_POST);

if (isset($_POST['submit'])) {
    require_once 'app/mailer/Mail.php';

    $emailCompany = Mail::$mailCompany;
    $subjectCompany = $_POST['firstName'] . " heeft een vraag gesteld";
    $messageCompany = $_POST['firstName'] . ' ' . $_POST['lastName'] . ' heeft een vraag gesteld';
    $messageCompany .= '<br><br>';
    $messageCompany .= '<b>Bericht</b>:<br>';
    $messageCompany .= $_POST['message'];
    $messageCompany .= '<br><br>';
    $messageCompany .= '<b>Gegevens</b>:<br>';
    $messageCompany .= '<b>Naam:</b>' . $_POST['firstName'] . ' ' . $_POST['lastName'];
    $messageCompany .= '<b>Email:</b>' . $_POST['email'];
    Mail::send($emailCompany, $subjectCompany, $messageCompany);

    $emailRecipient = $_POST['email'];
    $subjectRecipient = "U heeft een vraag gesteld.";
    $messageRecipient = 'Beste ' . $_POST['firstName'] . ' ' . $_POST['lastName'] . ',';
    $messageRecipient .= '<br><br>';
    $messageRecipient .= 'Bedankt voor uw vraag, we nemen zo snel mogelijk contact met u op!';
    $messageRecipient .= '<br><br>';
    $messageRecipient .= 'Met vriendelijke groet, <br>';
    $messageRecipient .= 'Interstellar Games';
    Mail::send($emailRecipient, $subjectRecipient, $messageRecipient);


}
?>

<!-- Modal boxes gebruiken-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="assets/img/logo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <title>Interstellar</title>
</head>
<body>
<div class="wrapper">
    <?php
    include_once("sub-pages/header.php");
    ?>
    <div class="container-fluid">
        <section>
            <?php
            include_once("sub-pages/buttons.php")
            ?>
        </section>
        <section>
            <?php
            include_once("sub-pages/articles.php");
            ?>
        </section>
    </div>
    <?php
    include_once("sub-pages/footer.php");
    ?>
</div>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
</body>
</html>
