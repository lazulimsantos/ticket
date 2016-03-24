      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
          <h3><i class="fa fa-calendar-o"></i> Artistas</h3>
          <a href="<?= base_url('cms/artistas/novo') ?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Novo artista</a>
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
        		<?php foreach ($bandas as $banda) { ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><?= $banda->nome_banda ?></h3>
              </div>
              <div class="panel-body">
                <input type="hidden" class="form-control" name="id" value="<?= $banda->idbanda ?>">
                <p>
                  <label class="label-control">Site do artista</label>
                  <textarea class="form-control" readonly><?= $banda->site_banda ?></textarea>
                </p>
                <p>
                  <label class="label-control">Responsável</label>
                  <div class="form-control"><?= $banda->contato_banda ?></div>
                </p>
                <p>
                  <label class="label-control">Telefone</label>
                  <div class="form-control"><?= $banda->telefone_banda ?></div>
                </p>
                <p class="pull-right">
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#excluir<?= $banda->idbanda?>"><i class="fa fa-trash-o"></i> Excluir</button>
                  <a href="<?= base_url('cms/artistas/editar/'.$banda->idbanda) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Editar</a>
                </p>
              </div>
            </div>
            <div class="modal fade" id="excluir<?= $banda->idbanda?>" tabindex="-1" role="dialog" aria-labelledby="Excluir artista">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Excluir artista</h4>
                  </div>
                  <div class="modal-body">
                    <p>Você está prestes a excluir o artista <?= $banda->nome_banda ?>.</p>
                    <p>Tem certeza que deseja realizar esta ação?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban"></i> Não</button>
                    <a href="<?= base_url('cms/artistas/excluir/'.$banda->idbanda) ?>" class="btn btn-primary"><i class="fa fa-check"></i> Sim</a>
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
     