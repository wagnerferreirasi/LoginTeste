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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= url('dashboard') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url('users') ?>" class="nav-link">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url('logout') ?>" class="nav-link ">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
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