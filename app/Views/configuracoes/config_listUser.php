<div class="d-flex flex-column justify-content-center align-items-center">

    <div class="ps-3 pt-2 pe-2 titulo bg-gradient rounded-top shadow-sm">
        <h3>Editar usuário</h3>
    </div>

    <div class="formulario row border rounded-bottom p-3 shadow-sm ms-10">
        <?php if (session()->get('msg')): ?>
            <div class="ps-4 pt-3 pe-4 pb-3"> 
                <div class="alert alert-success d-flex justify-content-center p" role="alert">
                    <?= session()->get('msg')?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->get('error_msg')): ?>
            <div class="ps-4 pt-3 pe-4 pb-3"> 
                <div class="alert alert-danger d-flex justify-content-center p" role="alert">
                    <i class="fas fa-exclamation-triangle fa-lg p-1 me-1"></i>
                    <?= session()->get('error_msg')?>
                </div>
            </div>
        <?php endif; ?> 
        
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Grupo</th>
                <th scope="col">Email</th>
                <th scope="col">Abrir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($dados as $dado) :
                ?>
                <tr>                        
                <th scope="row"><?php echo($dado['nome']);?></th>
                <td>Grupo <?php echo($dado['setor']);?></td>
                <td><?php echo($dado['email']);?></td>
                <form method="POST" action="configurar/editUser">
                    <input type="search" aria-label="Search" name="id" value="<?php echo($dado['id']);?>" style="display: none;">
                <td><button type="submit" class="btn btn-white"><i class="bi bi-folder2-open"></i></i></button></td></form>
                </tr>                        
                <?php
                    endforeach
                ?>
            </tbody>
        </table>        
    </div>
</div>