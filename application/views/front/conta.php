	<section id="cart_items">
		<div class="container">

			<div class="step-one">
				<h2 class="heading">Finalizar compra</h2>
			</div>
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-6">
						<div class="bill-to">
							<p>Dados Pessoais</p>
							<div class="form-one">
								<form action="<?= base_url('usuario/novo') ?>" method="POST">
									<input type="hidden" name="destino" value="conta">
									<input type="hidden" name="idusuario" value="<?= $this->session->userdata('usuario')->idusuario ?>">
									<input type="hidden" name="tipo" value="<?= $this->session->userdata('usuario')->tipo ?>">
									<input type="text" name="apelido" required placeholder="Apelido" value="<?= $this->session->userdata('usuario')->apelido ?>">
									<input type="email" name="email" required placeholder="Email *" value="<?= $this->session->userdata('usuario')->email ?>">
									<input type="text" name="nome" required placeholder="Nome *" value="<?= $this->session->userdata('usuario')->nome ?>">
									<input type="text" name="cpf" required placeholder="CPF *" value="<?= $this->session->userdata('usuario')->cpf ?>">
									<input type="text" name="endereco" required placeholder="Endereço *" value="<?= $this->session->userdata('usuario')->endereco ?>">
									<input type="text" name="numero" required placeholder="Número *" value="<?= $this->session->userdata('usuario')->numero ?>">
									<input type="text" name="complemento" required placeholder="Complemento *" value="<?= $this->session->userdata('usuario')->complemento ?>">
									<input type="text" name="cep" required placeholder="CEP *" value="<?= $this->session->userdata('usuario')->cep ?>">
									<input type="text" name="bairro" required placeholder="Bairro *" value="<?= $this->session->userdata('usuario')->bairro ?>">
									<input type="text" name="cidade" required placeholder="Cidade *" value="<?= $this->session->userdata('usuario')->cidade ?>">
									<select name="estado" required>
										<option>-- Estado --</option>
										<option value="AC" <?= $this->session->userdata('usuario')->estado === "AC" ? "selected" : "" ?>>Acre</option>
										<option value="AL" <?= $this->session->userdata('usuario')->estado === "AL" ? "selected" : "" ?>>Alagoas</option>
										<option value="AP" <?= $this->session->userdata('usuario')->estado === "AP" ? "selected" : "" ?>>Amapá</option>
										<option value="AM" <?= $this->session->userdata('usuario')->estado === "AM" ? "selected" : "" ?>>Amazonas</option>
										<option value="BA" <?= $this->session->userdata('usuario')->estado === "BA" ? "selected" : "" ?>>Bahia</option>
										<option value="CE" <?= $this->session->userdata('usuario')->estado === "CE" ? "selected" : "" ?>>Ceará</option>
										<option value="DF" <?= $this->session->userdata('usuario')->estado === "DF" ? "selected" : "" ?>>Distrito Federal</option>
										<option value="ES" <?= $this->session->userdata('usuario')->estado === "ES" ? "selected" : "" ?>>Espirito Santo</option>
										<option value="GO" <?= $this->session->userdata('usuario')->estado === "GO" ? "selected" : "" ?>>Goiás</option>
										<option value="MA" <?= $this->session->userdata('usuario')->estado === "MA" ? "selected" : "" ?>>Maranhão</option>
										<option value="MS" <?= $this->session->userdata('usuario')->estado === "MS" ? "selected" : "" ?>>Mato Grosso do Sul</option>
										<option value="MT" <?= $this->session->userdata('usuario')->estado === "MT" ? "selected" : "" ?>>Mato Grosso</option>
										<option value="MG" <?= $this->session->userdata('usuario')->estado === "MG" ? "selected" : "" ?>>Minas Gerais</option>
										<option value="PA" <?= $this->session->userdata('usuario')->estado === "PA" ? "selected" : "" ?>>Pará</option>
										<option value="PB" <?= $this->session->userdata('usuario')->estado === "PB" ? "selected" : "" ?>>Paraíba</option>
										<option value="PR" <?= $this->session->userdata('usuario')->estado === "PR" ? "selected" : "" ?>>Paraná</option>
										<option value="PE" <?= $this->session->userdata('usuario')->estado === "PE" ? "selected" : "" ?>>Pernambuco</option>
										<option value="PI" <?= $this->session->userdata('usuario')->estado === "PI" ? "selected" : "" ?>>Piauí</option>
										<option value="RJ" <?= $this->session->userdata('usuario')->estado === "RJ" ? "selected" : "" ?>>Rio de Janeiro</option>
										<option value="RN" <?= $this->session->userdata('usuario')->estado === "RN" ? "selected" : "" ?>>Rio Grande do Norte</option>
										<option value="RS" <?= $this->session->userdata('usuario')->estado === "RS" ? "selected" : "" ?>>Rio Grande do Sul</option>
										<option value="RO" <?= $this->session->userdata('usuario')->estado === "RO" ? "selected" : "" ?>>Rondônia</option>
										<option value="RR" <?= $this->session->userdata('usuario')->estado === "RR" ? "selected" : "" ?>>Roraima</option>
										<option value="SC" <?= $this->session->userdata('usuario')->estado === "SC" ? "selected" : "" ?>>Santa Catarina</option>
										<option value="SP" <?= $this->session->userdata('usuario')->estado === "SP" ? "selected" : "" ?>>São Paulo</option>
										<option value="SE" <?= $this->session->userdata('usuario')->estado === "SE" ? "selected" : "" ?>>Sergipe</option>
										<option value="TO" <?= $this->session->userdata('usuario')->estado === "TO" ? "selected" : "" ?>>Tocantins</option>
									</select>
									<input type="text" name="celular" required placeholder="Celular *" value="<?= $this->session->userdata('usuario')->celular ?>">
									<button class="btn btn-primary" type="submit">Salvar Alterações</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="shopper-info">
							<p>Informações do Usuário</p>
							<form action="<?= base_url('usuario/senha') ?>" method="POST">
								<input type="password" name="senha"required placeholder="Nova Senha">
								<button class="btn btn-primary" type="submit">Alterar Senha</button>
							</form>
						</div>
					</div>
					<p></p>
					<div class="col-sm-6">
						<div class="bill-to form-one">
							<p>Recarga</p>
							<form action="<?= base_url('conta/pagamento') ?>" method="POST">
								<input type="text" name="valor"required placeholder="Valor da recarga">
								<button class="btn btn-primary" type="submit">Recarga</button>
							</form>
							<!-- <form action="https://pagseguro.uol.com.br/checkout/v2/cart.html?action=add" method="post" onsubmit="PagSeguroLightbox(this); return false;">
							<input type="hidden" name="itemCode" value="0E71ACD32727CEE994A2EFABD88C13B8" />
								<p>Recarga de R$5,00</p>
							<input type="image" style="width:40%;" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/184x42-pagar-cinza-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
							</form>
							<form action="https://pagseguro.uol.com.br/checkout/v2/cart.html?action=add" method="post" onsubmit="PagSeguroLightbox(this); return false;">
								<input type="hidden" name="itemCode" value="A12C7CB7A1A1BF63346F3F931E37FF59" />
								<p>Recarga de R$10,00</p>
							<input type="image" style="width:40%;" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/184x42-pagar-cinza-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
								
							</form>
							<form action="https://pagseguro.uol.com.br/checkout/v2/cart.html?action=add" method="post" onsubmit="PagSeguroLightbox(this); return false;">
								<input type="hidden" name="code" value="B6BE3F961D1D3E0664091FA2891662E8" />
								<p>Recarga de R$50,00</p>
							<input type="image" style="width:40%;" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/184x42-pagar-cinza-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

							</form>
							<form action="https://pagseguro.uol.com.br/checkout/v2/cart.html?action=add" method="post" onsubmit="PagSeguroLightbox(this); return false;">
							<input type="hidden" name="itemCode" value="51EC46D11616130884C96F9835316188" />
								<p>Recarga de R$100,00</p>
							<input type="image" style="width:40%;" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/184x42-pagar-cinza-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
							</form>
							<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script> -->
							<br>
						</div>	
					</div>					
					
				</div>
			</div>
	</section> <!--/#cart_items-->
	