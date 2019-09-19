<?php
    session_start();

    if ($_SESSION["Usuario"]==""){
        header("location: login.php?erro=Usuário não autorizado!");
        exit();
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin do Site do WebDesign Studio">
    <meta name="author" content="Saulo Lopes">

    <title>WebDesign Studio - Admin - <?=$tituloPagina;?></title>

    <!-- Bootstrap core CSS -->
    <?php 
    include_once("bootstrap.php");
    ?>

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
          <img class="mb-4" src="../img/logo.png" alt="" width="160">
        </a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <h5 class="bg-sucess text-danger"><?php echo $_SESSION["Nome"]; ?></h5>
          <a class="nav-link" href="logout.php">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid" style="margin-top: 107px;">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="empresa.php">
                  <span data-feather="briefcase"></span>
                  Empresa
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="portfolio_lista.php">
                  <span data-feather="layers"></span>
                  Portfolio
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contatos_lista.php">
                  <span data-feather="users"></span>
                  Contatos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="categoria_lista.php">
                  <span data-feather="layers"></span>
                  Categorias
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="usuarios_lista.php">
                  <span data-feather="users"></span>
                  Usuários
                </a>
              </li>                
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">