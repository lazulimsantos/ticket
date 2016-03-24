	<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Entre em Contato</h2>    			    				    		
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Deixe seu contato</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" action="<?= base_url('contato/salvar') ?>" method="POST">
				            <div class="form-group col-md-6">
				                <input type="text" name="nome" class="form-control" required="required" placeholder="Nome">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="assunto" class="form-control" required="required" placeholder="Assunto">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="mensagem" class="form-control" rows="10" cols="8" required="required" placeholder="Deixe sua mensagem"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Enviar">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Informações de Contato</h2>
	    				<address>
	    					<p>UeGoo Tecnologia</p>
							<p>Rua Alverina Maria da Silva</p>
							<p>São José - Santa Catarina</p>
							<p>Celular: 48 8454-4335</p>
							<p>Email: contato@uegoo.com.br</p>
	    				</address>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
