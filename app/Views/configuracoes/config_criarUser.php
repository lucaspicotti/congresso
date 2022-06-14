<div class="d-flex flex-column justify-content-center align-items-center">

    <div class="p-3 titulo bg-gradient rounded-top shadow-sm">
        <h2>Criar usuário</h2>
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
        
        <?php echo form_open('configurar/save', ['class' => 'row']);?>
        <div class="col-md-6 p-2">
            <label for="username" class="form-label">Login:</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="col-md-6 p-2">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="col-md-3 p-2">
            <label for="nome_completo" class="form-label">Nome completo:</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="col-md-3 p-2">
            <label for="celular" class="form-label">Celular:</label>
            <input type="tel" class="form-control" id="celular" name="celular" maxlength="15" pattern="\(\d{2}\)\s*\d{5}-\d{4}" required placeholder="(xx)">
        </div>
        <div class="col-md-3 p-2">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="col-md-3 p-2">
            <label for="nivel" class="form-label">Nível:</label>
            <select id="nivel" name="nivel" class="form-select">
            <option value="1">ADM</option>
            <option value="3">Usuário</option>
            </select>
        </div>
        <div class="col-md-4 p-2">
            <label for="setor" class="form-label">Grupo:</label>
            <select id="setor" name="setor" class="form-select">
            <option value="1">Grupo 1</option>
            <option value="2">Grupo 2</option>
            <option value="3">Grupo 3</option>
            <option value="4">Grupo 4</option>
            <option value="5">Grupo 5</option>
            <option value="6">Grupo 6</option>
            <option value="7">Grupo 7</option>
            <option value="8">Grupo 8</option>
            <option value="9">Grupo 9</option>
            <option value="10">Grupo 10</option>
            <option value="11">Grupo 11</option>
            <option value="12">Grupo 12</option>
            <option value="13">Grupo 13</option>
            <option value="14">Grupo 14</option>
            <option value="15">Grupo 15</option>
            <option value="16">Grupo 16</option>
            <option value="17">Grupo 17</option>
            <option value="18">Grupo 18</option>
            <option value="19">Grupo 19</option>
            <option value="20">Grupo 20</option>
            </select>
        </div>
        <div class="col-md-4 p-2">
            <label for="nucleo" class="form-label">Núcleo:</label>
            <select id="nucleo" name="nucleo" class="form-select">
                <?php foreach($nucleos as $nucleo): ?>
                <option value="<?php echo $nucleo['codigo']?>"><?php echo $nucleo['nucleo']?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-md-4 p-2">
            <label for="cod_eve" class="form-laber">Código do evento:</label>
            <select id="cod_eve" name="cod_eve" class="form-select">
            <?php foreach($eventos as $evento): ?>
                <option value="<?php echo $evento['id']?>"><?php echo $evento['evento']?></option>
                <?php endforeach ?>
            </select>
        </div>
        <hr class="mt-5">
        <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end pb-2">
            <button type="submit" class="btn btn-ligth me-md-2 shadow-sm" style="color:white;background-color:#0aa2d8"><i class="fas fa-check"></i>&nbsp;&nbsp;Salvar</button>
        </div>
        <?php echo form_close(); ?>

    </div>
</div>