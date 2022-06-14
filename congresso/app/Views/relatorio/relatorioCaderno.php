<div class="d-flex flex-column justify-content-center align-items-center">

    <div class="ps-3 pt-2 pe-2 titulo bg-gradient rounded-top shadow-sm">
        <h3>Relatório de caderno</h3>
    </div>

    <div class="formulario row border rounded-bottom p-3 shadow-sm ms-10">

        <?php echo form_open('relatorio/cadernoResultado', ['class' => 'row']);?>
            <div class="col-md-6 p-2">
                <label for="evento" class="form-label">Selecione o evento:</label>
                <select id="evento" name="evento" class="form-select">
                    <?php foreach($dados as $dado): ?>
                    <option value="<?php echo $dado['id']?>"><?php echo $dado['evento']?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-md-3 p-2">
                <label for="paragrafo_inicial" class="form-label">Número do primeiro parágrafo:</label>
                <input type="text" class="form-control" id="paragrafo_inicial" name="paragrafo_inicial">
            </div>
            <div class="col-md-3 p-2">
                <label for="paragrafo_final" class="form-label">Número do último parágrafo:</label>
                <input type="text" class="form-control" id="paragrafo_final" name="paragrafo_final">
            </div>
            <hr class="mt-5">
            <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end pb-2">
                <button type="submit" class="btn btn-ligth me-md-2 shadow-sm" style="color:white;background-color:#0aa2d8"><i class="bi bi-clipboard2-check"></i>&nbsp;&nbsp;Gerar relatório</button>
            </div>
        <?php echo form_close(); ?>

    </div>
</div>