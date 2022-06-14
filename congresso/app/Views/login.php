<!DOCTYPE html>
<html lang="pt-br">
     <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plataforma de emendas</title> 

        <link href="<?php echo base_url('imagens/icon.png')?>" rel="icon">
        <link href="<?php echo base_url('css/index.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css')?>" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        
    </head>
  
    <body>
        <span class="msg"></span>
            <div class="d-flex">
                <div class="cabecalho d-flex justify-content-center align-items-center bg-gradient shadow-sm">
                    <img class="img" src="<?php echo base_url('imagens/logo_app.png')?>" width="200" height="116">  
                </div>
                <div class="log bg-gradient d-flex shadow-sm">
                    <?php echo form_open('login/auth', ['class' => 'form-signin', 'id' => 'send_login'])?>
                        <h1 class="h3 nome">Plataforma de emendas</h1>
                        <?php if (session()->get('msg')): ?>
                            <div class="alert alert-danger d-flex justify-content-center p" role="alert">
                                <i class="bi bi-exclamation-triangle"></i>
                                <?= session()->get('msg')?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label>Usuário:</label>
                            <input name="username" type="text" class="form-control shadow-sm"  placeholder="Digite o usuário">
                        </div><br>

                        <div class="form-group">
                            <label>Senha:</label>
                            <input name="password" type="password" class="form-control shadow-sm" placeholder="Digite a senha">
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn me-md-2 bg-gradient shadow-sm"   value="Acessar" name="SendLogin" type="submit" style="background-color:#0aa2d8;color:white!important;">Acessar</button>
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>
    </body>
  
</html>