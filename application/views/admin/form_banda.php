      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
        	<h3><i class="fa fa-calendar-o"></i> Artista</h3>
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
                <h3 class="panel-title">Artista</h3>
              </div>
              <div class="panel-body">
                <form method="post" action="<?= base_url('cms/artistas/salvar') ?>" enctype="multipart/form-data">
                  <input type="hidden" class="form-control" name="id" value="<?= $banda->idbanda ?>">
                  <p>
                     <div class="form-group" id="crop-imagem">
                            <label for="titulo" class="col-sm-2 control-label">Imagem do artista</label>
                            <div class="col-lg-10">
                                <div class="cropper-example-1">
                                    <img id="preview_image" src="<?= empty($banda->imagem_banda) ? '' : base_url($banda->imagem_banda) ?>" width="50%" height="50%">
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
                    <label class="label-control">Nome do artista</label>
                    <input type="text" class="form-control" name="nome" value="<?= $banda->nome_banda ?>">
                  </p>
                  <p>
                    <label class="label-control">Site do artista</label>
                    <input type="text" class="form-control" name="site" value="<?= $banda->site_banda ?>">
                  </p>
                  <p>
                    <label class="label-control">Responsável</label>
                    <input type="text" class="form-control" name="contato" value="<?= $banda->contato_banda ?>">
                  </p>
                  <p>
                    <label class="label-control">Telefone</label>
                    <input type="text" class="form-control" name="telefone" value="<?= $banda->telefone_banda ?>">
                  </p>
                  <p class="pull-right">
                    <input type="submit" class="btn btn-primary" value="Salvar artista">
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