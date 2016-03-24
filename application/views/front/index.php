	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1>Samba <span>Brasil</span> Floripa</h1>
									<h2>O maior evento de Samba e Pagode de Floripa.</h2>
                                                                        <p>- Thiaguinho.</p>
                                                                        <p>- Péricles.</p>
                                                                        <p>- Turma do pagode.</p>
                                                                        <p>- Belo</p>
                                                                        <p>- Jeito Moleque</p>
                                                                        <p>- Ta na mente</p>
                                                                        <p>- Clareou</p>
                                                                        <p>- Samba Aí</p>
									<button type="button" class="btn btn-default get">Ver evento</button>
								</div>
								<div class="col-sm-6">
									<img src="<?= base_url('public/front/images/home/girl1.png') ?>" class="girl img-responsive" alt="" />
									<!--<img src="<?= base_url('public/front/images/home/pricing.png') ?>"  class="pricing" alt="" />-->
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="<?= base_url('public/front/images/home/girl2.jpg') ?>" class="girl img-responsive" alt="" />
									<img src="<?= base_url('public/front/images/home/pricing.png') ?>"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="<?= base_url('public/front/images/home/girl3.jpg') ?>" class="girl img-responsive" alt="" />
									<img src="<?= base_url('public/front/images/home/pricing.png') ?>" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Categorias</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                                    <?php foreach($generos as $genero) {?>
                                                        <div class="panel panel-default">
                                                                <div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#gen<?= $genero->idgenero ?>">
											<?= !empty($genero->menu) ? '<span class="badge pull-right"><i class="fa fa-plus"></i></span>' : '' ?>
											<?= $genero->ds_genero ?>
										</a>
									</h4>
								</div>
                                                                <?php if (!empty($genero->menu)) { ?>
                                                                    <div id="gen<?= $genero->idgenero ?>" class="panel-collapse collapse">
                                                                            <div class="panel-body">
                                                                                <ul>
                                                                                    <?php foreach ($genero->menu as $menu) { ?>
                                                                                        <li><a href="#"><?= $menu->ds_categoria ?></a></li>
                                                                                    <?php } ?>    
                                                                                </ul>
                                                                            </div>
                                                                    </div>
                                                                <?php } ?>
							</div>
                                                    <?php } ?>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Locais de shows</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                                                                    <?php foreach ($locais as $local) { ?>
									<li><a href="#"> <span class="pull-right">(50)</span><?= $local->nome_local ?></a></li>
                                                                    <?php } ?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Preço</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="<?= base_url('public/front/images/home/shipping.jpg') ?>" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Eventos</h2>
                                                <?php foreach ($eventos as $evento) { ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?= base_url($evento->imagem_evento) ?>" alt="" />
											<h2><?= $evento->nome ?></h2>
                                                                                        <p><b>Local:</b> <?= $evento->nome_local ?></p>
                                                                                        <p><b>Data do evento:</b> <?= $evento->data_evento?> <?= $evento->hora_evento ?></p>
                                                                                        <p><b>Classificação:</b> <?= $evento->classificacao ?> anos</p>
                                                                                        <p><b>Gênero:</b> <?= $evento->ds_genero ?></p>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
                                                                                            <h2>Ingressos</h2>
                                                                                            <?php foreach($evento->ingressos as $ingresso) { 
                                                                                                if (!empty($this->session->userdata('usuario'))) {
                                                                                                    if ($this->session->userdata('usuario')->sexo === $ingresso->sexo_tipo_ingresso) { ?>
                                                                                                        <p><?= $ingresso->nm_tipo_ingresso ?> (<?= $ingresso->sexo_tipo_ingresso === 'F' ? 'Feminino' : 'Masculino' ?>) - R$ <?= $ingresso->valor_tipo_ingresso ?></p>
                                                                                                <?php } 
                                                                                                } else {?>
                                                                                            <p><?= $ingresso->nm_tipo_ingresso ?> (<?= $ingresso->sexo_tipo_ingresso === 'F' ? 'Feminino' : 'Masculino' ?>) - R$ <?= $ingresso->valor_tipo_ingresso ?></p>
                                                                                            <?php }
                                                                                            } ?>
                                                                                            <hr>
                                                                                            <? if ($this->session->userdata('logado')) { ?>
                                                                                            	<a href="<?= base_url('ingressos/adicionar/'. $evento->idevento ) ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                                                                            <? } ?>
                                                                                        </div>
										</div>
								</div>
                                <? if ($this->session->userdata('logado')) { ?>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="<?= base_url('ingressos/favoritos/'. $evento->idevento ) ?>"><i class="fa fa-plus-square"></i>Adicionar favoritos</a></li>
									</ul>
								</div>
								<? } ?>
							</div>
						</div>
						<?php } ?>
					</div><!--features_items-->
					
                                </div>
			</div>
		</div>
	</section>