<?php $this->layout("_themeDashboard", ['title' => 'Novo Usuário']); ?>

<main class="main_content">
    <div class="container">
        <?php if (!empty($msg)) : ?>
        <div class="toast text-white bg-dark border-0 my-5 position-absolute" data-bs-autohide="true" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <strong class="me-auto">FLogSys</strong>
                <small><?= date('Y-m-d H:i') ?></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <i class="bi bi-exclamation-triangle-fill"></i> <?= $msg ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-sm-6 offset-sm-3 my-5">
                <h1 class="fw-bold text-center">Cadastro de Usuarios</h1>
            </div>
            <div class="col-sm-12 col-md-6 offset-md-3 col-lg-4 offset-lg-4">

                <form action="newUser_action" method="POST">
                    <div class="mb-3">
                        <label for="name">Nome Completo</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="login">Usuário</label>
                        <input type="text" name="login" id="login" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="mb-5 d-grid gap-2">
                        <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
                    </div>
                </form>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <a href="<?= url('dashboard') ?>" class="btn btn-outline-dark">Voltar</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>