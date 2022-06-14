<div class="d-flex flex-column justify-content-center align-items-center">

    <div class="p-3 titulo bg-gradient rounded-top shadow-sm">
        <h2>Editar evento</h2>
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

        <?php 
            foreach($dados as $dado) {
            echo form_open('configurar/updateEvento/'.$dado['id'], ['class' => 'row']);
        ?>
        <div class="col-md-3 p-2">
            <label for="evento" class="form-label">Nome do evento:</label>
            <input type="text" class="form-control" id="evento" name="evento" value="<?php echo $dado['evento'];?>">
        </div>
        <div class="col-md-3 p-2">
            <label for="ini_evento" class="form-label">Início do evento:</label>
            <input type="date" class="form-control" id="ini_evento" name="ini_evento" value="<?php echo $dado['ini_evento'];?>">
        </div>

        <div class="col-md-3 p-2">
            <label for="fim_evento" class="form-label">Fim do evento:</label>
            <input type="date" class="form-control" id="fim_evento" name="fim_evento" value="<?php echo $dado['fim_evento'];?>">
        </div>
        <div class="col-md-3 p-2">
            <label for="nucleo" class="form-label">Núcleo:</label>
            <select id="nucleo" name="nucleo" class="form-select">
                <option value="<?php echo $dado['nucleo']?>"><?php echo $dado['nucleo']?></option>
                <?php } ?>
                <?php foreach($nucleos as $nucleo) { ?>
                <option value="<?php echo $nucleo['codigo']?>"><?php echo $nucleo['nucleo']?></option>
                <?php } ?>
            </select>
        </div>     
        <div class="col-md-12 p-2">
            <label for="instrucoes" class="form-label">Instruções:</label>
            <textarea class="form-control" id="instrucoes" name="instrucoes" rows="7"></textarea>
        </div>
        <hr class="mt-5">
        <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end pb-2">
            <button type="submit" class="btn btn-ligth me-md-2 shadow-sm" style="color:white;background-color:#0aa2d8"><i class="fas fa-check"></i>&nbsp;&nbsp;Salvar</button>
        </div>
        <?php echo form_close(); ?>

    </div>
</div>