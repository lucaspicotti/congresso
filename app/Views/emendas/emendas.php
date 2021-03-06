<div class="d-md-flex flex-column justify-content-center align-items-center">

    <div class="ps-3 pt-2 pe-2 titulo bg-gradient rounded-top shadow-sm">
        <h3>Emendas</h3>
    </div>

    <div class="formulario d-md-flex rounded-bottom p-3 shadow-sm ms-10">

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

        <div class="p-2 me-2 border-end d-sm-block">
            <ul class="list-group list-group-flush overflow-auto scrollMobile" style="max-height: 700px;">
                <?php foreach($dados as $dado):?> 
                <li class="list-group-item ">
                    <a onclick="sendP(this)" id="<?php echo $dado['nr_paragrafo']?>" style="cursor:pointer;">
                        <strong><?php echo $dado['menu'].$dado['nr_paragrafo'];?></strong>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <div class="p-2 flex-grow-1 d-sm-block">
            <h4>Parágrafo:</h4>
            <div class="alert alert-primary">
                <p class="h5" id="titulo" style="font-weight:bolder;"></p>
                <p id="paragrafo"></p>
                <div class="d-flex justify-content-center">
                    <a id="img_01" target="_blank" style="text-decoration: none;"></a>&nbsp;&nbsp;<a id="img_02" target="_blank" style="text-decoration: none;"></a>&nbsp;&nbsp;<a id="img_03" target="_blank" style="text-decoration: none;"></a>
                </div>
            </div>
            <hr class="m-2">
            <?php echo form_open('emendas/saveEmendas', ['class' => 'row']);?>
                <h4>Adicionar emendas:</h4>
                <input id="nrp" type="hidden" value="" name="nrparagrafo">
                <div class="col-md-4 p-2">
                    <label for="tipo" class="form-label">Selecione:</label>
                    <select id="tipo" name="tipo" class="form-select" onchange="suprimir(this)">
                        <option value="" selected disabled>Tipo de emenda</option>
                        <option value="9">Aditiva</option>
                        <option value="10">Supressiva</option>
                        <option value="11">Substitutiva</option>
                    </select>
                </div> 
                <div class="col-md-8 p-2">
                    <label for="pala_inicio" class="form-label">Após a expressão:</label>
                    <input type="text" class="form-control" id="pala_inicio" name="pala_inicio">
                </div>    
                <div class="col-md-12 p-2">
                    <label for="emendas" class="form-label" id="textoAdicionar"></label>
                    <textarea id="emendas" class="form-control" name="emendas" rows="3"></textarea>
                </div>
                <div class="col-md-12 p-2">
                    <label for="texto_sub" class="form-label">Texto a suprimir:</label>
                    <textarea id="textoSuprimir" class="form-control" name="texto_sub" rows="3"></textarea>
                </div>
                <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end pb-2">
                    <button type="submit" class="btn btn-ligth me-md-2 shadow-sm" style="color:white;background-color:#0aa2d8"><i class="bi bi-check"></i></i>&nbsp;&nbsp;Salvar</button>
                </div>
            <?php echo form_close(); ?> 
            <hr class="m-2">
            <h4>Emendas:</h4>
            <div id="emendas_computador">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                        <th scope="col">Emendas</th>
                        <th scope="col">Após a expressão</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Núcleo</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
            <div id="emendas_mobile">
                <ul class="list-group" id="emendas_list">
                </ul>
            </div>
        </div>
    </div>

</div>

