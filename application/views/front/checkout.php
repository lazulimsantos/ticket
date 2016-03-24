	<section id="cart_items">
		<div class="container">

			<div class="step-one">
				<h2 class="heading">Finalizar compra</h2>
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
									<select id="<?= $evento->idevento ?>" onchange="atualizaCarrinho();">
										<option value="">-- Selecion um ingresso --</option>
										<?php foreach($evento->ingressos as $ingresso) { 
	                                        if ($this->session->userdata('usuario')->sexo === $ingresso->sexo_tipo_ingresso) { ?>
	                                            <option value="<?= $ingresso->valor_tipo_ingresso ?>" id="ticket<?= $ingresso->idTipoIngresso ?>"><?= $ingresso->nm_tipo_ingresso ?> (<?= $ingresso->sexo_tipo_ingresso === 'F' ? 'Feminino' : 'Masculino' ?>) - R$ <?= $ingresso->valor_tipo_ingresso ?></option>
	                                        <?php } 
	                                        } ?>
									</select>
								</div>
							</td>
							<td class="col-lg-1"></td>
							<td class="col-lg-1">
								<a class="btn btn-primary cart_quantity_delete" href="<?= base_url('ingressos/deleteCarrinho/'. $evento->idevento ) ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<? } ?> 
						<tr>
							<td colspan="2">&nbsp;</td>
							<td colspan="4">
								<table class="table table-condensed total-result">
									<tr>
										<td><h4>Total:</h4></td>
										<td><h4><span id="total">R$ 0.00</h4></span></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td colspan="2">
								<form action="<?= base_url('conta/finalizar') ?>" method="POST">
									<input type="hidden" name="ingressos" id="ingressos">
									<button class="btn btn-primary btn-lg" type="submit">Finalizar</button>
								</form>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
	</section> <!--/#cart_items-->
<script type="text/javascript">
function atualizaCarrinho() {
	var total = 0;
	var ingressos = new Array();
	<? foreach ($eventos as $evento) { ?>
		var str = $('#<?= $evento->idevento?>').val().replace(',', '.');  // .trim() may need a shim
        if (str) {   
            total += parseFloat(str, 10);
        	ingressos.push($('#<?= $evento->idevento?>').find(':selected').attr('id'));
        }
	<? } ?>
	$('#ingressos').val(ingressos);
	$('#total').text('R$ ' + total.toFixed(2));
}

</script>