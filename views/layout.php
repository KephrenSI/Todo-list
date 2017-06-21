<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Todolist</title>
    <link rel="stylesheet"
          href="./bower_components/cutestrap/dist/css/cutestrap.min.css">
    <link rel="stylesheet"
          href="./css/screen.css">
</head>
<body>

    <?php include('partials/_header.php'); ?>

    <?php include($data['view']); ?>

    <?php include('partials/_footer.php'); ?>

</body>
</html>