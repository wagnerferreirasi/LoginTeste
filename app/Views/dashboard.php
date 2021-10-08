<?php $this->layout("_themeDashboard", ['title' => 'Dashboard']); ?>
<?php if (!empty($msg)) : ?>
<div class="toast text-white bg-dark border-0 my-5 position-absolute top-0 end-0" data-bs-autohide="true" role="alert"
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
<div class="container my-5 text-center">
    <h1 class="fw-bold">DASHBOARD</h1>
    <p class="small">Utilize o menu para navegar</p>
</div>