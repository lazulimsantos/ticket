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
        		<div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Evento</h3>
              </div>
              <div class="panel-body">
                <form method="post" action="<?= base_url('cms/eventos/salvar') ?>" enctype="multipart/form-data">
                  <input type="hidden" class="form-control" name="id" value="<?= $evento->idevento ?>">
                  <p>
                     <div class="form-group" id="crop-imagem">
                            <label for="titulo" class="col-sm-2 control-label">Imagem Evento</label>
                            <div class="col-lg-10">
                                <div class="cropper-example-1">
                                    <img id="preview_image" src="<?= empty($evento->imagem_evento) ? '' : base_url($evento->imagem_evento) ?>" width="50%" height="50%">
                                </div>
                                <div class="mt10 fl">
                                    <button type="button" id="upload" class="btn btn-primary">Alterar / Selecionar uma imagem</button>
                                    <span class="text-muted small">Tamanho recomendado: 1100x450</span>
                                    <input type="file" class="file" id="imagem" name="imagem" style="visibility: hidden;" onchange="preview(this);">
                                </div>        
                            </div>
                        </div>     
                  </p>
                  <p>
                    <label class="label-control">Nome do evento</label>
                    <input type="text" class="form-control" name="nome" value="<?= $evento->nome ?>">
                  </p>
                  <p>
                    <label class="label-control">Descrição do evento</label>
                    <textarea class="form-control" name="ds_evento"><?= $evento->ds_evento ?></textarea>
                  </p>
                  <p>
                    <label class="label-control">Data do evento</label>
                    <input type="text" class="form-control" name="data" value="<?= $evento->data_evento ?>">
                  </p>
                  <p>
                    <label class="label-control">Hora do evento</label>
                    <input type="text" class="form-control" name="hora" value="<?= $evento->hora_evento ?>">
                  </p>
                   <p>
                    <label class="label-control">Idade Minima</label>
                    <input type="text" class="form-control" name="idade" value="<?= $evento->classificacao ?>">
                  </p>
                  <p>
                    <label class="label-control">Promotor</label>
                    <input type="text" class="form-control" name="promotor" value="<?= $this->session->userdata('usuario')->nome ?>" readonly>
                    <input type="hidden" class="form-control" name="promotor" value="<?= $this->session->userdata('usuario')->idusuario ?>">
                  </p>
                  <p>
                    <label class="label-control">Genero do evento</label>
                    <select name="genero" class="form-control">
                      <?php foreach ($generos as $genero) { ?>
                        <option value="<?= $genero->idgenero ?>" <?= $genero->idgenero == $evento->genero_idGenero ? 'selected' : '' ?>><?= $genero->ds_genero ?></option>
                      <?php } ?>
                    </select>
                  </p>
                  <p>
                    <label class="label-control">Local do evento</label>
                    <select name="local" class="form-control">
                      <?php foreach ($locais as $local) { ?>
                        <option value="<?= $local->idlocal ?>" <?= $local->idlocal == $evento->local_idlocal ? 'selected' : '' ?>><?= $local->nome_local ?></option>
                      <?php } ?>
                    </select>
                  </p>
                   <p>
                    <label class="label-control">Link Video</label>
                    <input type="text" class="form-control" name="link" value="<?= $evento->link_video ?>">
                  </p>
                   <p>
                    <label class="label-control">Recomendações</label>
                    <input type="text" class="form-control" name="recomendacoes" value="<?= $evento->recomendacoes ?>">
                  </p>
                  <p class="pull-right">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ingressos"><i class="fa fa-ticket"></i> Adicionar Ingressos</button>
                    <input type="submit" class="btn btn-primary" value="Salvar evento">
                  </p>
                </form>
              </div>
            </div>
            <?php if(!empty($evento->ingressos)) {?>
            <div class="col-lg-12">
              <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Ingressos do evento</h4>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Setor</th>
                      <th class="text">Genero</th>
                      <th class="numeric">Quantidade</th>
                      <th class="numeric">Valor R$</th>
                      <th class="numeric">Lote</th>
                      <th class="numeric">Maximo P/P</th>
                      <th class="text">Meia</th>
                      <th class="numeric">Evento</th>
                      <th class="col-lg-1"></th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($evento->ingressos as $ingresso) { ?>
                    <tr>
                        <td><?= $ingresso->nm_tipo_ingresso ?></td>
                        <td class="numeric"><?= $ingresso->sexo_tipo_ingresso == "F" ? "Feminino" : "Masculino" ?></td>
                        <td class="numeric"><?= $ingresso->qt_tipo_ingresso ?></td>
                        <td class="numeric"><?= $ingresso->valor_tipo_ingresso ?></td>
                        <td class="numeric"><?= $ingresso->lote_tipo_ingresso ?></td>
                        <td class="numeric"><?= $ingresso->qt_max_tipo_ingresso ?></td>
                        <td class="numeric"><?= $ingresso->meiaentrada ? "Sim" : "Não" ?></td>
                        <td class="numeric"><?= $ingresso->evento_idevento ?></td>
                        <td>
                          <button type="button" class="btn btn-info btn-xs" data-id="<?= $ingresso->idTipoIngresso ?>" data-toggle="modal" data-target="#ingressos"><i class="fa fa-pencil"></i></button>
                          <a type="button" class="btn btn-danger btn-xs" data-id="" href="<?= base_url($ingresso->idTipoIngresso) ?>"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </section>
            </div>
        	</div>
          <?php }?>
		    </section>
      </section>
      <!--main content end-->
     <div class="modal fade" id="ingressos" tabindex="-1" role="dialog" aria-labelledby="Cadastro de Ingressos">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cadastro de ingressos</h4>
      </div>
      <div class="modal-body">
        <form id="form_ingresso" method="post" action="<?= base_url('cms/ingressos/cadastrar') ?>">
          <input type="hidden" class="form-control" name="idevento" value="<?= $evento->idevento ?>">
          <input type="hidden" class="form-control" name="idevento_ingresso" >
          <p>
            <label class="label-control">Setor</label>
            <input type="text" class="form-control" name="setor" placeholder="Tipo: Pista, Área Vip, Camarote, etc">
          </p>
          <p>
            <label class="label-control">Genero</label>
            <select name="genero">
              <option value="F">Feminino</option>
              <option value="M">Masculino</option>
            </select>
          </p>
          <p>
            <label class="label-control">Quantidade</label>
            <input type="text" class="form-control" name="quantidade">
          </p>
          <p>
            <label class="label-control">Valor</label>
            <input type="text" class="form-control" name="valor">
          </p>
          <p>
            <label class="label-control">Máximo de ingressos por pessoa</label>
            <input type="text" class="form-control" name="maximo">
          </p>
          <p>
            <label class="label-control">Lote</label>
            <input type="text" class="form-control" name="lote">
          </p>
          <p>
           <div class="checkbox">
              <label>
                <input type="checkbox" name="meiaentrada" value="1">
                Haverá meia entrada para esse tipo de ingresso?
              </label>
            </div>
          </p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" onclick="document.getElementById('form_ingresso').submit()"><i class="fa fa-floppy-o"></i> Salvar</button>
      </div>
    </div>
  </div>
</div>
<script>
document.getElementById('upload').onclick = function() {
  document.getElementById('imagem').click();
};
function preview(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                        $('#preview_image').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
        }
}
</script>