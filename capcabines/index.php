<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<title>CAP Cabines</title>


	    <style>
	        body {
	            /* Definir a imagem de fundo */
	            background-image: url('images/yy.png');
	            
	            /* Fazer a imagem se repetir horizontalmente */
	            background-repeat: repeat-x;
	            
	            /* Opcional: Fixar a imagem no fundo para não rolar com a página */
	            background-attachment: fixed;
	        }

	        .img{
	        	position: absolute;
	        }
	    </style>
</head>

<header>
	<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">CAP Cabines e Totens</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarScroll">
	      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="#">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#">Link</a>
	        </li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Link
	          </a>
	          <ul class="dropdown-menu">
	            <li><a class="dropdown-item" href="#">Action</a></li>
	            <li><a class="dropdown-item" href="#">Another action</a></li>
	            <li><hr class="dropdown-divider"></li>
	            <li><a class="dropdown-item" href="#">Something else here</a></li>
	          </ul>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link disabled" aria-disabled="true">Link</a>
	        </li>
	      </ul>
	      <form class="d-flex" role="search">
	        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
	        <button class="btn btn-outline-success" type="submit">Search</button>
	      </form>
	    </div>
	  </div>
	</nav> 	

</header>

<body>
	<div class="container" style="background-color: black; width: 500px; height: 500px; padding: 0; margin-left: auto; margin-right: auto; position: relative;">

		<img src="images/tt.png" alt="Descrição da imagem" width="500" height="auto" class="img">

		<img id="imgAtvEst" src="images/estrutura.png" alt="Descrição da imagem" width="120" height="auto" class="img" style="margin-top: 128px; margin-left: 150px;">

		<img id="imgAtvCa" src="images/case.png" alt="Descrição da imagem" width="120" height="auto" class="img" style="margin-top: 330px; margin-left: 250px;">

		<img id="imgAtvTri" src="images/tripe.png" alt="Descrição da imagem" width="170" height="auto" class="img" style="margin-top: 308px; margin-left: 127px;">

		<button style="width:130px; height: 170px; position: absolute; z-index: 2; top: 120px; left: 10px; background-color: transparent; border: transparent;" onclick="mostrarEst()" id="Est"></button>

		<button style="width:130px; height: 170px; position: absolute; z-index: 2; top: 120px; left: 375px; background-color: transparent; border: transparent;" onclick="mostrarMo()"></button>

		<button style="width:130px; height: 190px; position: absolute; z-index: 2; top: 420px; left: 10px; background-color: transparent; border: transparent;" onclick="mostrarTri()"></button>

		<button style="width:130px; height: 190px; position: absolute; z-index: 2; top: 420px; left: 375px; background-color: transparent; border: transparent;" onclick="mostrarCo()"></button>

		<button style="width:130px; height: 190px; position: absolute; z-index: 2; top: 660px; left: 10px; background-color: transparent; border: transparent;" onclick="mostrarCa()"></button>

		<button style="width:130px; height: 190px; position: absolute; z-index: 2; top: 660px; left: 350px; background-color: transparent; border: transparent;" onclick="mostrarI()"></button>


	</div>

	<ul id="listE" style="display: none;">
	<?php

	$diretorio = '../capcabines/estruturas/';
	$imagens = scandir($diretorio);

	foreach ($imagens as $imagem) {
	    // Ignora . e ..
	    if ($imagem === '.' || $imagem === '..') continue;

	    // Verifica se é uma imagem com extensão válida
	    $extensoesValidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
	    $extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));

	    if (in_array($extensao, $extensoesValidas)) {
	        echo '<li><img src="' . $diretorio . $imagem . '" style="width: 120px; height: auto;" onclick="trocarEst(this)"></li>' . "\n";
	    }
	}

	?>
	</ul>

	<ul id="listM" style="display: none;">
  		<li><img src="images/foto1.jpg"></li>
  		<li><img src="images/foto2.jpg"></li>
  		<li><img src="images/foto3.jpg"></li>
	</ul>

	<ul id="listT" style="display: none;">
	<?php

	$diretorio = '../capcabines/tripes/';
	$imagens = scandir($diretorio);

	foreach ($imagens as $imagem) {
	    // Ignora . e ..
	    if ($imagem === '.' || $imagem === '..') continue;

	    // Verifica se é uma imagem com extensão válida
	    $extensoesValidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
	    $extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));

	    if (in_array($extensao, $extensoesValidas)) {
	        echo '<li><img src="' . $diretorio . $imagem . '" style="width: 120px; height: auto;" onclick="trocarTri(this)"></li>' . "\n";
	    }
	}

	?>
	</ul>

	<ul id="listCo" style="display: none;">
  		<li><img src="images/foto1.jpg"></li>
  		<li><img src="images/foto2.jpg"></li>
  		<li><img src="images/foto3.jpg"></li>
	</ul>

	<ul id="listCa" style="display: none;">
	<?php

	$diretorio = '../capcabines/cases/';
	$imagens = scandir($diretorio);

	foreach ($imagens as $imagem) {
	    // Ignora . e ..
	    if ($imagem === '.' || $imagem === '..') continue;

	    // Verifica se é uma imagem com extensão válida
	    $extensoesValidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
	    $extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));

	    if (in_array($extensao, $extensoesValidas)) {
	        echo '<li><img src="' . $diretorio . $imagem . '" style="width: 120px; height: auto;" onclick="trocarCa(this)"></li>' . "\n";
	    }
	}

	?>
	</ul>

	<ul id="listI" style="display: none;">
  		<li><img src="images/foto1.jpg"></li>
  		<li><img src="images/foto2.jpg"></li>
  		<li><img src="images/foto3.jpg"></li>
	</ul>


	<a id="wpp" href="https://wa.me/5511999999999?text=Olá,%20gostaria%20de%20saber%20mais%20sobre%20os%20totens%20e%20outros%20serviços%20da%20WeCabine!" target="_blank">
	  <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp" width="64" height="64">
	</a>


	<footer class="text-center text-lg-start bg-body-tertiary text-muted">
	  <!-- Section: Social media -->
	  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
	    <!-- Left -->
	    <div class="me-5 d-none d-lg-block">
	      <span>Get connected with us on social networks:</span>
	    </div>
	    <!-- Left -->

	    <!-- Right -->
	    <div>
	      <a href="" class="me-4 text-reset">
	        <i class="fab fa-facebook-f"></i>
	      </a>
	      <a href="" class="me-4 text-reset">
	        <i class="fab fa-twitter"></i>
	      </a>
	      <a href="" class="me-4 text-reset">
	        <i class="fab fa-google"></i>
	      </a>
	      <a href="" class="me-4 text-reset">
	        <i class="fab fa-instagram"></i>
	      </a>
	      <a href="" class="me-4 text-reset">
	        <i class="fab fa-linkedin"></i>
	      </a>
	      <a href="" class="me-4 text-reset">
	        <i class="fab fa-github"></i>
	      </a>
	    </div>
	    <!-- Right -->
	  </section>
	  <!-- Section: Social media -->

	  <!-- Section: Links  -->
	  <section class="">
	    <div class="container text-center text-md-start mt-5">
	      <!-- Grid row -->
	      <div class="row mt-3">
	        <!-- Grid column -->
	        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
	          <!-- Content -->
	          <h6 class="text-uppercase fw-bold mb-4">
	            <i class="fas fa-gem me-3"></i>Company name
	          </h6>
	          <p>
	            Here you can use rows and columns to organize your footer content. Lorem ipsum
	            dolor sit amet, consectetur adipisicing elit.
	          </p>
	        </div>
	        <!-- Grid column -->

	        <!-- Grid column -->
	        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
	          <!-- Links -->
	          <h6 class="text-uppercase fw-bold mb-4">
	            O que fazemos
	          </h6>
	          <p>
	            <a href="https://www.instagram.com/wecabine/" class="text-reset">Instagram</a>
	          </p>
	          <p>
	            <a href="#!" class="text-reset">React</a>
	          </p>
	          <p>
	            <a href="#!" class="text-reset">Vue</a>
	          </p>
	          <p>
	            <a href="#!" class="text-reset">Laravel</a>
	          </p>
	        </div>
	        <!-- Grid column -->

	        <!-- Grid column -->
	        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
	          <!-- Links -->
	          <h6 class="text-uppercase fw-bold mb-4">
	            Quem somos
	          </h6>
	          <p>
	            <a href="https://www.instagram.com/wecabine/" class="text-reset">Instagram</a>
	          </p>
	          <p>
	            <a href="#!" class="text-reset">React</a>
	          </p>
	          <p>
	            <a href="#!" class="text-reset">Vue</a>
	          </p>
	          <p>
	            <a href="#!" class="text-reset">Laravel</a>
	          </p>
	        </div>
	        <!-- Grid column -->

	        <!-- Grid column -->
	        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
	          <!-- Links -->
	          <h6 class="text-uppercase fw-bold mb-4">
	            Redes Sociais
	          </h6>
	          <p>
	            <a href="https://www.instagram.com/wecabine/" class="text-reset">Instagram</a>
	          </p>
	          <p>
	            <a href="#!" class="text-reset">React</a>
	          </p>
	          <p>
	            <a href="#!" class="text-reset">Vue</a>
	          </p>
	          <p>
	            <a href="#!" class="text-reset">Laravel</a>
	          </p>
	        </div>
	        <!-- Grid column -->


	        <!-- Grid column -->
	        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
	          <!-- Links -->
	          <h6 class="text-uppercase fw-bold mb-4">Contato</h6>
	          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
	          <p>
	            <i class="fas fa-envelope me-3"></i>
	            info@example.com
	          </p>
	          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
	          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
	        </div>
	        <!-- Grid column -->
	      </div>
	      <!-- Grid row -->
	    </div>
	  </section>
	  <!-- Section: Links  -->

	  <!-- Copyright -->
	  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
	    © 2025 Copyright:
	    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">WeCabine.com.br</a>
	  </div>
	  <!-- Copyright -->
	</footer>

	




	<script type="text/javascript" src="JS/javascript.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>