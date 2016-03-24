      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="<?= base_url('cms/perfil')?>"><img src="<?= base_url('public/cms/img/ui-sam.jpg')?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Marcel Newman</h5>
              	  	
                  <li class="mt">
                      <a class="active" href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-calendar-o"></i>
                          <span>Eventos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?= base_url('cms/eventos')?>">Meus eventos</a></li>
                          <li><a  href="<?= base_url('cms/eventos/novo')?>">Criar evento</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-ticket"></i>
                          <span>Ingressos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?= base_url('cms/ingressos')?>">Meus ingressos</a></li>
                          <li><a  href="<?= base_url('cms/ingressos/novo')?>">Comprar ingressos</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Serviços</span>
                      </a>
                      <ul class="sub">
                          <li>
                            <a  href="<?= base_url('cms/artistas') ?>">
                              Artistas
                            </a>
                          </li>
                          <li>
                            <a  href="<?= base_url('cms/locais') ?>">
                              Locais para eventos
                            </a>
                          </li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->