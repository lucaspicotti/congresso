<div class="d-flex flex-column justify-content-center align-items-center">

    <div class="ps-3 pt-2 pe-2 titulo bg-gradient rounded-top shadow-sm">
        <h3>Editar caderno</h3>
    </div>

    <div class="formulario row border rounded-bottom p-3 shadow-sm ms-10">
        <?php foreach($dados as $dado): ?>
        <?php echo form_open('emendas/emendasUpdate/'.$dado['id'], ['class' => 'row']);?>
        <div class="col-md-12 p-2">
            <label for="pala_inicio" class="form-label">Após a expressão:</label>
            <input type="text" class="form-control" id="pala_inicio" name="pala_inicio" value="<?php echo $dado['pala_inicio'];?>">
        </div>
        <div class="col-md-12 p-2">
            <label for="emendas" class="form-label">Texto da emenda:</label>
            <textarea class="form-control" id="emendas" name="emendas" rows="7"><?php echo $dado['emendas']?></textarea>
        </div>
        <hr class="mt-5">
        <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end pb-2">
            <button type="submit" class="btn btn-ligth me-md-2 shadow-sm" style="color:white;background-color:#0aa2d8"><i class="bi bi-check"></i>&nbsp;&nbsp;Salvar</button>
        </div>
        <?php echo form_close(); ?>
        <?php endforeach ?>
    </div>
</div>