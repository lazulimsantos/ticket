	<section id="cart_items">
		<div class="container">
<!--			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div>/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Favoritos</h2>
			</div>
			<div class="review-payment">
				<h2>Ticket's Selecionados</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Ticket</td>
							<td class="description"></td>
							<td class="quantity">Setor/Valor</td>
							<td class="price"></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<? foreach ($eventos as $evento) { ?>
						<tr>
							<td class="col-lg-3" >
								<a href=""><img src="<?= base_url($evento->imagem_evento) ?>" alt="" class="img-responsive img-thumbnail"></a>
							</td>
							<td class="col-lg-4">
								<h4><?= $evento->nome ?></h4>
								<p>Classificação: <?= $evento->classificacao ?></p>
								<p>Data: <?= $evento->data_evento ?></p>
								<p>Abertura: <?= $evento->hora_evento ?></p>
							</td>
							<td class="col-lg-4">
								<div class="cart_quantity_button">
									<select>
										<?php foreach($evento->ingressos as $ingresso) { 
	                                        if ($this->session->userdata('usuario')->sexo === $ingresso->sexo_tipo_ingresso) { ?>
	                                            <option value="<?= $ingresso->idTipoIngresso ?>"><?= $ingresso->nm_tipo_ingresso ?> (<?= $ingresso->sexo_tipo_ingresso === 'F' ? 'Feminino' : 'Masculino' ?>) - R$ <?= $ingresso->valor_tipo_ingresso ?></option>
	                                        <?php } 
	                                        } ?>
									</select>
								</div>
							</td>
							<td class="col-lg-1">
								<a class="btn btn-primary" href="<?= base_url('ingressos/deleteFavorito/'. $evento->idevento ) ?>"><i class="fa fa-times"></i></a>
							</td>
							<td class="col-lg-1">
								<a class="btn btn-primary" href="<?= base_url('ingressos/adicionar/'. $evento->idevento ) ?>">Adicionar ao Carrinho</a>
							</td>
						</tr>
						<? } ?> 
					</tbody>
				</table>
			</div>
			<!-- <div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div> -->
	</section> <!--/#cart_items-->
