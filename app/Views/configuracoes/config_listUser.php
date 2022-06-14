<div class="d-flex flex-column justify-content-center align-items-center">

    <div class="p-3 titulo bg-gradient rounded-top shadow-sm">
        <h2>Editar usuário</h2>
    </div>

    <div class="formulario row border rounded-bottom p-3 shadow-sm ms-10">
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