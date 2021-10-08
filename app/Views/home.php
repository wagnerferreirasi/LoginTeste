<?php $this->layout("_theme", ['title' => 'Login']); ?>

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
                <?= $msg ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3 col-lg-4 offset-lg-4 my-5 rounded">
                <h1 class=" mt-0 fw-bold text-center text-primary">FLogSys</h1>
                <p class="text-center small muted fw-light">Sistema de Logistica Integrada</p>


                <form action="login" method="POST">
                    <div class="mb-3">
                        <label for="login"><i class="bi bi-person-circle"></i> Usuário</label>
                        <input type="text" name="login" id="login" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password"><i class="bi bi-key-fill"></i> Senha</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="mb-5 d-grid gap-2">
                        <button type="submit" class="btn btn-outline-primary">Entrar</button>
                    </div>
                </form>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <a href="" class="btn btn-outline-dark disabled">Esqueceu a senha?</a>
                        </div>
                        <div class="col-6 text-end">
                            <a href="<?= url('register') ?>" class="btn btn-outline-info">Solicitar cadastro</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>