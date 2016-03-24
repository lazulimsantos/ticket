      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
        	<h3><i class="fa fa-calendar-o"></i> Local</h3>
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
                <h3 class="panel-title">Local</h3>
              </div>
              <div class="panel-body">
                <form method="post" action="<?= base_url('cms/locais/salvar') ?>" enctype="multipart/form-data">
                  <input type="hidden" class="form-control" name="id" value="<?= $local->idlocal ?>">
                  <p>
                     <div class="form-group" id="crop-imagem">
                            <label for="titulo" class="col-sm-2 control-label">Imagem do local</label>
                            <div class="col-lg-10">
                                <div class="cropper-example-1">
                                    <img id="preview_image" src="<?= empty($local->imagem) ? '' : base_url($local->imagem) ?>" width="50%" height="50%">
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
                    <label class="label-control">Nome do local</label>
                    <input type="text" class="form-control" name="nome" value="<?= $local->nome_local ?>">
                  </p>
                  <p>
                    <label class="label-control">Endereço</label>
                    <input class="form-control" type="hidden" name="idEndereco" value="<?= $local->endereco_idendereco ?>">
                    <input class="form-control" type="text" name="endereco" value="<?= $local->logradouro ?>">
                  </p>
                  <p>
                    <label class="label-control">Cidade</label>
                    <select name="cidade" class="form-control">
                      <?php foreach ($cidades as $cidade) { ?>
                        <option value="<?= $cidade->id_cidade ?>" <?= $cidade->id_cidade == $local->cidade_idcidade ? 'selected' : '' ?>><?= $cidade->nome ?></option>
                      <?php } ?>
                    </select>
                  </p>
                  <p>
                    <label class="label-control">Telefone</label>
                    <input class="form-control"  type="text"  name="telefone" value="<?= $local->telefone_local ?>">
                  </p>
                  <p class="pull-right">
                    <input type="submit" class="btn btn-primary" value="Salvar local">
                  </p>
                </form>
              </div>
            </div>
          </section>
      </section>
      <!--main content end-->
     
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