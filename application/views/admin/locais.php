      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
          <h3><i class="fa fa-calendar-o"></i> Locais de eventos</h3>
          <a href="<?= base_url('locais/novo') ?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Novo local</a>
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
            <?php foreach ($locais as $local) { ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><?= $local->nome_local ?></h3>
              </div>
              <div class="panel-body">
                <input type="hidden" class="form-control" name="id" value="<?= $local->idlocal ?>">
                <p>
                  <label class="label-control">Endere�o</label>
                  <div class="form-control"><?= $local->logradouro ?></textarea>
                </p>
                <p>
                  <label class="label-control">Cidade</label>
                  <div class="form-control"><?= $local->nome_cidade ?></div>
                </p>
                <p>
                  <label class="label-control">Telefone</label>
                  <div class="form-control"><?= $local->telefone_local ?></div>
                </p>
                <p class="pull-right">
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#excluir<?= $local->idlocal?>"><i class="fa fa-trash-o"></i> Excluir</button>
                  <a href="<?= base_url('locais/editar/'.$local->idlocal) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Editar</a>
                </p>
              </div>
            </div>
            <div class="modal fade" id="excluir<?= $local->idlocal?>" tabindex="-1" role="dialog" aria-labelledby="Excluir local">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Excluir local</h4>
                  </div>
                  <div class="modal-body">
                    <p>Você está prestes a excluir o local <?= $local->nome_local ?>.</p>
                    <p>Tem certeza que deseja realizar esta ação?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban"></i> Não</button>
                    <a href="<?= base_url('locais/excluir/'.$local->idlocal) ?>" class="btn btn-primary"><i class="fa fa-check"></i> Sim</a>
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
     