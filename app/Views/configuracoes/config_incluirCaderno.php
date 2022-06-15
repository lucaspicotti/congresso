<div class="d-flex flex-column justify-content-center align-items-center">

    <div class="ps-3 pt-2 pe-2 titulo bg-gradient rounded-top shadow-sm">
        <h3>Incluir caderno</h3>
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
        
        <?php echo form_open('configurar/saveCaderno', ['class' => 'row']);?>
        <div class="col-md-4 p-2">
            <label for="evento" class="form-label">Selecione o evento:</label>
            <select id="evento" name="evento" class="form-select">
                <?php foreach($eventos as $eventos): ?>
                <option value="<?php echo $eventos['id']?>"><?php echo $eventos['evento']?></option>
                <?php endforeach ?>
            </select>
        </div>         
        <div class="col-md-4 p-2">
            <label for="nr_paragrafo" class="form-label">Número do parágrafo:</label>
            <input type="text" class="form-control" id="nr_paragrafo" name="nr_paragrafo">
        </div>
        <div class="col-md-4 p-2">
            <label for="titulo" class="form-label">Título do parágrafo:</label>
            <input type="text" class="form-control" id="titulo" name="titulo">
        </div>
        <div class="col-md-12 p-2">
            <label for="paragrafo" class="form-label">Conteúdo do parágrafo:</label>
            <textarea class="form-control" id="paragrafo" name="paragrafo" rows="7"></textarea>
        </div>
        <hr class="mt-5">
        <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end pb-2">
            <button type="submit" class="btn btn-ligth me-md-2 shadow-sm" style="color:white;background-color:#0aa2d8"><i class="bi bi-check"></i>&nbsp;&nbsp;Salvar</button>
        </div>
        <?php echo form_close(); ?>

    </div>
</div>