
<!doctype html>
<html lang="fr">
<head>

    <title>Chat</title>
    <meta charset="utf-8"/>
    <meta charset="UTF-8" />
    <base href="<?= $root ?>" >
    <link rel="stylesheet" href="Ressources/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Ressources/css/home.css" />
</head>

<body>

<div class="container">
        <div class="navbar-header">
            <?php if(isset($_SESSION['user'])) {?>
            <a class="navbar-brand" href="/security/logout">logout</a>
            <?php } ?>
        </div>

</div>
<div class="container">
    <?php echo $content; ?>
</div>


</body>

</html>
