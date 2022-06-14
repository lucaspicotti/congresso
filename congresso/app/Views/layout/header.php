<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title?> / APP-Sindicato</title>

  <link href="<?php echo base_url('imagens/icon.png')?>" rel="icon">
  <link href="<?php echo base_url('css/sistema.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css')?>" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

</head>

<body>

  <header class="mb-5">

    <nav class="navbar bg-gradient shadow-sm" id="nav_computador">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url('home');?>">
          <img src="<?php echo base_url('imagens/icon_branco.png')?>" alt="" width="60" height="50" class="d-inline-block align-text-top">
        </a>
        <ul class="nav justify-content-end-md">
          <li class="nav-item">
            <a class="nav-link link-light active" aria-current="page" href="<?php echo base_url('home');?>">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link link-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Emendas
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?php echo base_url('emendas');?>">Criar emendas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('selectEmendas');?>">Editar emendas</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link link-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Relatório
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?php echo base_url('relatorioEmenda');?>">Relatório de emendas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('relatorioCaderno');?>">Relatório de caderno</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link link-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Configurações
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?php echo base_url('criarEvento');?>">Criar evento</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('listEvento');?>">Editar evento</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('criarUser');?>">Criar usuário</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('listUser');?>">Editar usuários</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('incluirCaderno');?>">Incluir caderno</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('pesquisaCaderno');?>">Editar caderno</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="Login/logout" class="nav-link link-light active" aria-current="page">Sair</a>
          </li> 
        </ul>
      </div>
    </nav>

    <nav class="navbar bg-gradient shadow-sm" id="nav_mobile">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url('home');?>">
          <img src="<?php echo base_url('imagens/icon_branco.png')?>" alt="" width="60" height="50" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color: #0aa2d8!important;">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title link-light" id="offcanvasNavbarLabel">Plataforma de emendas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body" style="background-color: #0aa2d8!important;">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active link-light" aria-current="page" href="<?php echo base_url('home');?>">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle link-light" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Emendas
                </a>
                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown" style="background-color: #0aa2d8!important; border:none;">
                  <hr><li><a class="dropdown-item link-light" href="<?php echo base_url('emendas');?>">Criar emendas</a></li><hr>
                  <li><a class="dropdown-item link-light" href="<?php echo base_url('listEmendas');?>">Editar emendas</a></li><hr>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle link-light" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Configurações
                </a>
                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown" style="background-color: #0aa2d8!important; border:none;">
                  <hr><li><a class="dropdown-item link-light" href="<?php echo base_url('criarEvento');?>">Criar evento</a></li><hr>
                  <li><a class="dropdown-item link-light" href="<?php echo base_url('listEvento');?>">Editar evento</a></li><hr>
                  <li><a class="dropdown-item link-light" href="<?php echo base_url('criarUser');?>">Criar usuário</a></li><hr>
                  <li><a class="dropdown-item link-light" href="<?php echo base_url('listUser');?>">Editar usuários</a></li><hr>
                  <li><a class="dropdown-item link-light" href="<?php echo base_url('incluirCaderno');?>">Incluir caderno</a></li><hr>
                  <li><a class="dropdown-item link-light" href="<?php echo base_url('pesquisaCaderno');?>">Editar caderno</a></li><hr>
                </ul>
              </li>
              <li class="nav-item">
                <a href="Login/logout" class="nav-link link-light active" aria-current="page">Sair</a>
              </li> 
            </ul>
          </div>
      </div>
      </div>
    </nav>

  </header>