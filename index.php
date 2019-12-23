<?php
    include 'includes/global_include.php';

    $sendedMail = false;

    if (!empty($_POST['prenom'])) {
        if (empty($_POST['name']))  // name is a honeypot
            envoi_mail_formulaire();
        
        $sendedMail = true;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.png">

    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <title><?php echo APP_NAME; ?></title>
</head>
<body>
    <h1>Formulaire</h1>
    <?php
        if ($sendedMail) : ?>
            <div class="container feedback-ok">
                Le formulaire a bien été envoyé!
            </div>
        <?php endif;
    ?>
    <div class="container fiche">
        <form action="" method="POST" role="form">
            <legend>Votre demande</legend>
            <?php include 'form.php' ?>
        </form>
    </div>
</body>
</html>