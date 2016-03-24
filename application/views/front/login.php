	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Entrar na minha conta</h2>
                                                <form action="<?= base_url('login/logar') ?>" method="POST">
							<input type="email" name="email" placeholder="Email" />
                                                        <input type="password" name="senha" placeholder="Senha" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Lembrar meus dados
							</span>
							<button type="submit" class="btn btn-default">Entrar</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OU</h2>
				</div>
				<div class="col-sm-6">
					<div class="login-form"><!--sign up form-->
						<h2>Sou novo aqui!</h2>
						<form action="<?= base_url('usuario/novo') ?>" method="POST">
						    <form action="<?= base_url('usuario/novo') ?>" method="POST">
						    		<input type="hidden" name="destino" value="login">
						    		<input type="hidden" name="tipo" value="3">
									<input type="text" name="apelido" required placeholder="Apelido" >
									<input type="email" name="email" required placeholder="Email *" >
									<input type="password" name="senha" required placeholder="Senha *" >
									<input type="text" name="nome" required placeholder="Nome *" >
									<input type="text" name="cpf" required placeholder="CPF *" >
									<input type="text" name="endereco" required placeholder="Endereço *" >
									<input type="text" name="numero" required placeholder="Número *" >
									<input type="text" name="complemento" required placeholder="Complemento *" >
									<input type="text" name="cep" required placeholder="CEP *" >
									<input type="text" name="bairro" required placeholder="Bairro *" >
									<input type="text" name="cidade" required placeholder="Cidade *" >
									<select name="estado" required>
										<option>-- Estado --</option>
										<option value="AC" >Acre</option>
										<option value="AL" >Alagoas</option>
										<option value="AP" >Amapá</option>
										<option value="AM" >Amazonas</option>
										<option value="BA" >Bahia</option>
										<option value="CE" >Ceará</option>
										<option value="DF" >Distrito Federal</option>
										<option value="ES" >Espirito Santo</option>
										<option value="GO" >Goiás</option>
										<option value="MA" >Maranhão</option>
										<option value="MS" >Mato Grosso do Sul</option>
										<option value="MT" >Mato Grosso</option>
										<option value="MG" >Minas Gerais</option>
										<option value="PA" >Pará</option>
										<option value="PB" >Paraíba</option>
										<option value="PR" >Paraná</option>
										<option value="PE" >Pernambuco</option>
										<option value="PI" >Piauí</option>
										<option value="RJ" >Rio de Janeiro</option>
										<option value="RN" >Rio Grande do Norte</option>
										<option value="RS" >Rio Grande do Sul</option>
										<option value="RO" >Rondônia</option>
										<option value="RR" >Roraima</option>
										<option value="SC" >Santa Catarina</option>
										<option value="SP" >São Paulo</option>
										<option value="SE" >Sergipe</option>
										<option value="TO" >Tocantins</option>
									</select>
									<input type="text" name="celular" required placeholder="Celular *" >
									<button type="submit" class="btn btn-default">Cadastrar</button>
							</div>
						</div>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
