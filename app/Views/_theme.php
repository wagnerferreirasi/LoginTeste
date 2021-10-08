<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | <?= $title; ?></title>
    <link rel="stylesheet" href="<?= asset('/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= asset('/css/icons.css') ?>">
    <link rel="stylesheet" href="<?= asset('/css/main.css') ?>">
</head>

<body>
    <?= $this->section('content') ?>
    <script src="<?= asset('/js/jquery.min.js') ?>"></script>
    <script src="<?= asset('/js/bootstrap.bundle.min.js') ?>"></script>
    <script>
    $(document).ready(function() {
        $('.toast').toast('show');
    });
    </script>
</body>

</html>