      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
        	<h3><i class="fa fa-calendar-o"></i> Meus eventos</h3>
        	<div class="row mt">
        		<div class="col-lg-12">
              <?php if ($this->session->flashdata('sucesso')) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong><?= $this->session->flashdata('sucesso')?></strong>
            </div>
            <?php } 
             if ($this->session->flashdata('erro')) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong><?= $this->session->flashdata('erro')?></strong>
            </div>
            <?php } ?>
        		<?php foreach ($eventos as $evento) { ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><?= $evento->nome ?></h3>
              </div>
              <div class="panel-body">
                <input type="hidden" class="form-control" name="id" value="<?= $evento->idevento ?>">
                <p>
                  <label class="label-control">Descrição do evento</label>
                  <textarea class="form-control" readonly><?= $evento->ds_evento ?></textarea>
                </p>
                <p>
                  <label class="label-control">Data do evento</label>
                  <div class="form-control"><?= $evento->data_evento ?></div>
                </p>
                <p>
                  <label class="label-control">Hora do evento</label>
                  <div class="form-control"><?= $evento->hora_evento ?></div>
                </p>
                <p>
                  <label class="label-control">Promotor</label>
                  <div class="form-control"><?= $evento->nome_usuario ?></div>
                </p>
                <p>
                  <label class="label-control">Genero do evento</label>
                  <div class="form-control"><?= $evento->ds_genero ?></div>
                </p>
                <p>
                  <label class="label-control">Local do evento</label>
                  <div class="form-control"><?= $evento->nome_local ?></div>
                </p>
                <p class="pull-right">
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#excluir<?= $evento->idevento?>"><i class="fa fa-trash-o"></i> Excluir</button>
                  <a href="<?= base_url('eventos/editar/'.$evento->idevento) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Editar</a>
                </p>
              </div>
            </div>
            <div class="modal fade" id="excluir<?= $evento->idevento?>" tabindex="-1" role="dialog" aria-labelledby="Excluir evento">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Excluir evento</h4>
                  </div>
                  <div class="modal-body">
                    <p>Você está prestes a excluir o evento <?= $evento->nome ?>.</p>
                    <p>Tem certeza que deseja realizar esta ação?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban"></i> Não</button>
                    <a href="<?= base_url('eventos/excluir/'.$evento->idevento) ?>" class="btn btn-primary"><i class="fa fa-check"></i> Sim</a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
        		</div>
        	</div>
		    </section>
      </section>
      <!--main content end-->
     