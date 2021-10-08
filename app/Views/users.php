<?php $this->layout("_themeDashboard", ['title' => 'Gerenciamento de Usuários']); ?>

<div class="container my-5">

    <div class="row">

        <div class="col-sm-6 offset-sm-3">
            <h1 class="fw-bold text-center">Usuarios Cadastrados</h1>
        </div>
        <div class="col-sm-6 offset-sm-3 d-grid gap-2 my-4">
            <a href="<?= url('new-user') ?>" class="btn btn-outline-primary">+Cadastrar Novo Usuário</a>
        </div>
        <div class="col-sm-8 offset-sm-2">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Login</th>
                        <th scope="col">Data Cadastro</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($user as $itemUser) :
                        $date = $itemUser->data()->created_at;
                        $id = $itemUser->data()->id;
                        $name = $itemUser->data()->name;
                        $login = $itemUser->data()->login;
                    ?>

                    <tr>
                        <th scope="row"><?= $itemUser->data()->id ?></th>
                        <td><?= $name ?></td>
                        <td>@<?= $login ?></td>
                        <td><?= $date ?></td>
                        <td class="d-flex gap-2">
                            <a href="<?= url("edit-user/$id") ?>" class="btn btn-outline-dark btn-sm"><i
                                    class="bi bi-pencil-square"></i></a>
                            <a href="#" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteuser<?= $id ?>"><i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteuser<?= $id ?>" tabindex="-1"
                        aria-labelledby="deleteuser<?= $id ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteuserLabel">Está ação não podera ser desfeita!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Deseja realmente apagar o usuario?</p>
                                    <p class="text-danger lead"><?= $name ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-info"
                                        data-bs-dismiss="modal">Fechar</button>
                                    <a href="<?= url("delete-user/$id") ?>" class="btn btn-outline-danger">Deletar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</div>