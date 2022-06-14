<div class="d-flex flex-column justify-content-center align-items-center">
    <div class="formulario row border rounded p-3 shadow-sm ms-10">
        <?php foreach($dados as $dado): ?>
        <ul class="list-group">
            <li class="list-group-item">
                <p>Evento: <?php echo $dado['evento']?></p>
                <p>Número do parágrafo: <?php echo $dado['nrparagrafo']?></p>
                <p>Nome: <?php echo $dado['nome']?>/Username: <?php echo $dado['username']?>/Núcleo: <?php echo $dado['nucleo']?></p>
                <p>Tipo da emenda: <?php echo $dado['descri']?></p>  
                <?php 
                    if(!isset($dado['paragrafo'])){
                        $dado['paragrafo'] = "";
                    }else{echo '<p>Parágrafo: '.$dado['paragrafo'].'</p>';}
                ?>   
                <p>Após a expressão: <?php echo $dado['pala_inicio']?></p>
                <p>
                    Texto 
                    <?php 
                        if($dado['descri'] == 'Aditiva' || $dado['descri'] == 'Substitutiva') {
                            echo 'a Adicionar:';
                        }else{
                            echo 'a Suprimir:';
                    }?>
                    <?php echo $dado['emendas']?>
                 </p>
                <?php 
                    if(!isset($dado['texto_sub'])){
                        $dado['texto_sub'] = "";
                    }else{echo '<p>Texto a suprimir: '.$dado['texto_sub'].'</p>';}
                ?>
            </li><br>
        </ul>
        <?php endforeach; ?>
    </div>
</div>