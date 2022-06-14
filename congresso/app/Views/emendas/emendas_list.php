<div class="d-flex flex-column justify-content-center align-items-center">

    <div class="ps-3 pt-2 pe-2 titulo bg-gradient rounded-top shadow-sm">
        <h3>Editar emendas</h3>
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

        <?php echo form_open('emendas/listEmendas', ['class' => 'row']);?>
        <div class="col-md-12 p-2">
            <label for="npr" class="form-label">Selecione o parágrafo que deseja:</label>
            <select id="npr" name="npr" class="form-select">
                <?php foreach($paragrafos as $paragrafo): ?>
                <option value="<?php echo $paragrafo['nr_paragrafo']?>"><?php echo $paragrafo['nr_paragrafo']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end pb-2">
            <button type="submit" class="btn btn-ligth me-md-2 mt-2 shadow-sm" style="color:white;background-color:#0aa2d8"><i class="bi bi-search"></i>&nbsp;&nbsp;Pesquisar</button>
        </div>
        <?php echo form_close(); ?>
        <hr class="mt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Emenda</th>
                <th scope="col">Após a expressão</th>
                <th scope="col">Tipo</th>
                <th scope="col">Abrir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($dados as $dado) :
                ?>
                <tr>                        
                <td><?php echo($dado['emendas']);?></th>
                <td><?php echo($dado['pala_inicio']);?></td>
                <td><?php echo($dado['descri']);?></td>
                <form method="POST" action="editEmendas">
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