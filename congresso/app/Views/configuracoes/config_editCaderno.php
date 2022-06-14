<div class="d-flex flex-column justify-content-center align-items-center">

    <div class="ps-3 pt-2 pe-2 titulo bg-gradient rounded-top shadow-sm">
        <h3>Editar caderno</h3>
    </div>

    <div class="formulario row border rounded-bottom p-3 shadow-sm ms-10">
        
        <?php echo form_open('configurar/updateCaderno', ['class' => 'row']);?>
        <div class="col-md-8 p-2">
            <label for="evento" class="form-label">Selecione o evento:</label>
            <select id="evento" name="evento" class="form-select">
                <?php foreach($dados as $dado): ?>
                <option value="<?php echo $dado['evento']?>"><?php echo $dado['nomeEvento']?></option>
            </select>
        </div>         
        <div class="col-md-4 p-2">
            <label for="nr_paragrafo" class="form-label">Número do parágrafo:</label>
            <input type="text" class="form-control" id="nr_paragrafo" name="nr_paragrafo" value="<?php echo $dado['nr_paragrafo']?>">
        </div>
        <div class="col-md-12 p-2">
            <label for="titulo" class="form-label">Título do parágrafo:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $dado['titulo']?>">
        </div>
        <div class="col-md-12 p-2">
            <label for="paragrafo" class="form-label">Conteúdo do parágrafo:</label>
            <textarea class="form-control" id="paragrafo" name="paragrafo" rows="7"><?php echo $dado['paragrafo']?></textarea>
            <?php endforeach ?>
        </div>
        <hr class="mt-5">
        <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end pb-2">
            <button type="submit" class="btn btn-ligth me-md-2 shadow-sm" style="color:white;background-color:#0aa2d8"><i class="bi bi-check"></i>&nbsp;&nbsp;Salvar</button>
        </div>
        <?php echo form_close(); ?>

    </div>
</div>