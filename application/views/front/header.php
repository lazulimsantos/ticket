<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="UeGoo">
    <title>UeGoo | Seu ingresso a seu alcance</title>
    <link href="<?= base_url('public/front/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/front/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/front/css/prettyPhoto.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/front/css/price-range.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/front/css/animate.css') ?>" rel="stylesheet">
	<link href="<?= base_url('public/front/css/main.css') ?>" rel="stylesheet">
	<link href="<?= base_url('public/front/css/responsive.css') ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?= base_url('public/front/images/ico/favicon.ico') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('public/front/images/ico/apple-touch-icon-144-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('public/front/images/ico/apple-touch-icon-114-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('public/front/images/ico/apple-touch-icon-72-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('public/front/images/ico/apple-touch-icon-57-precomposed.png') ?>">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-10">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a style="cursor:none;"><i class="fa fa-phone"></i> 48 8454-4335</a></li>
								<li><a style="cursor:select;"><i class="fa fa-envelope"></i> contato@uegoo.com.br</a></li>
								<? if ($this->session->userdata('logado')) { ?>
								<li><a style="cursor:none;"><i class="fa fa-user"></i> Olá <?= $this->session->userdata('usuario')->apelido ?>, bem vindo!</a></li>
								<li><a style="cursor:none;">Seu saldo é de R$ <b><?= number_format($this->session->userdata('saldo')->valor, 2, ',', ' ') ?></b></a></li>
								<? } ?>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://pt-br.facebook.com/uegooweb" target="_blank" ><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/uegoo" target="_blank"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?= base_url() ?>"><img src="<?= base_url('public/front/images/home/logo.png') ?>" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<? if ($this->session->userdata('logado')) { ?>
									<li><a href="<?= base_url('conta') ?>"><i class="fa fa-user"></i> Conta</a></li>
									<li><a href="<?= base_url('favoritos') ?>"><i class="fa fa-star"></i> Favoritos</a></li>
	                                <li><a href="<?= base_url('checkout') ?>"><i class="fa fa-crosshairs"></i> Finalizar compras</a></li>
									<li><a href="<?= base_url('contato') ?>"><i class="fa fa-envelope-o"></i> Contato</a></li>
									<li><a href="<?= base_url('home/logout') ?>"><i class="fa fa-sign-out"></i> Sair</a></li>
								<? } else { ?>
	                                <li><a href="<?= base_url('login') ?>"><i class="fa fa-sign-in"></i> Entrar</a></li>
                                <? } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

    </header><!--/header-->