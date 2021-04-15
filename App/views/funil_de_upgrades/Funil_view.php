<div class="main-container">

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">App</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url('funil-de-upgrades') ?>">Funis de upgrades</a></li>
                <li class="breadcrumb-item active" aria-current="page">Funil de upgrades</li>
            </ol>
        </nav>
        <div class="dropdown">
            <a class="btn btn-round" href="<?=base_url('logout')?>">
                <i class="material-icons text-danger"> exit_to_app </i>
            </a>
        </div>
    </div>

    <div class="container-kanban">
        <div class="container-fluid page-header d-flex justify-content-between align-items-start m-0">
            <div class="col-lg-11">
                <h1>Funil de upgrades</h1>
                <span class="lead">Acompanhamento do funil de upgrade de clientes</span>
                <button class="btn float-right" data-toggle="modal" data-target="#createLeadModal">
                    Adcionar lead ao funil
                </button>
            </div>
        </div>
        <hr>
        <div class="kanban-board container-fluid">

            <!-- Interessados start -->
            <div class="kanban-col">
                <div class="card-list bg-danger">

                    <div class="card-list-header">
                        <h6 class="">Clientes interessados</h6>
                    </div>
                    <div class="card-list-body" id="ETAPA-1">
                        <!-- START ETAPA 1 -->
                        <?php foreach($funil['etapa1'] as $f1): ?>
                            <div class="card card-kanban" id="OLD-LEAD-<?=$f1['funil_id'] ?>">
                                <div class="card-body">
                                    <div class="dropdown card-options">
                                        <!-- OPTIONS -->
                                    </div>
                                    <div class="card-title">
                                        <p style="cursor:nw-resize" onclick="openLead(<?=$f1['funil_id'] ?>)">
                                            <small class="text-dark"><?=$f1['lead_nome'] ?></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!--END ETAPA 1 -->
                    </div>
                </div>
            </div>
            <!-- Interessados end -->

            <!-- degustando start -->
            <div class="kanban-col">
                <div class="card-list bg-warning">
                    <div class="card-list-header">
                        <h6>Clientes degustando</h6>
                    </div>
                    <div class="card-list-body" id="ETAPA-2">
                        <!-- START ETAPA 2 -->
                        <?php foreach($funil['etapa2'] as $f2): ?>
                            <div class="card card-kanban" id="OLD-LEAD-<?=$f2['funil_id'] ?>">
                                <div class="card-body">
                                    <div class="dropdown card-options">
                                        <!-- OPTIONS -->
                                    </div>
                                    <div class="card-title">
                                        <p style="cursor:nw-resize" onclick="openLead(<?=$f2['funil_id'] ?>)">
                                            <small class="text-dark"><?=$f2['lead_nome'] ?></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!--END ETAPA 2 -->
                    </div>
                </div>
            </div>
            <!-- Negociando end -->

            <!-- Comprando start -->
            <div class="kanban-col">
                <div class="card-list bg-success">
                    <div class="card-list-header">
                        <h6>Clientes comprando</h6>
                    </div>
                    <div class="card-list-body" id="ETAPA-3">
                        <!-- START ETAPA 3 -->
                        <?php foreach($funil['etapa3'] as $f3): ?>
                            <div class="card card-kanban" id="OLD-LEAD-<?=$f3['funil_id'] ?>">
                                <div class="card-body">
                                    <div class="dropdown card-options">
                                        <!-- OPTIONS -->
                                    </div>
                                    <div class="card-title">
                                        <p style="cursor:nw-resize" onclick="openLead(<?=$f3['funil_id'] ?>)">
                                            <small class="text-dark"><?=$f3['lead_nome'] ?></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!--END ETAPA 3 -->
                    </div>
                </div>
            </div>
            <!-- Comprando end -->

            <!-- pós-venda start -->
            <div class="kanban-col">
                <div class="card-list bg-info">
                    <div class="card-list-header">
                        <h6>Pós upgrade</h6>
                    </div>
                    <div class="card-list-body" id="ETAPA-4">
                        <!-- START ETAPA 4 -->
                        <?php foreach($funil['etapa4'] as $f4): ?>
                            <div class="card card-kanban" id="OLD-LEAD-<?=$f4['funil_id'] ?>">
                                <div class="card-body">
                                    <div class="dropdown card-options">
                                        <!-- OPTIONS -->
                                    </div>
                                    <div class="card-title">
                                        <p style="cursor:nw-resize" onclick="openLead(<?=$f4['funil_id'] ?>)">
                                            <small class="text-dark"><?=$f4['lead_nome'] ?></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!--END ETAPA 4 -->
                    </div>
                </div>
            </div>
            <!-- pós-venda end -->

        </div>
    </div>


    <!-- MODAL CLIENTE START -->
    <div class="modal modal-nota" id="openLeadModal" tabindex="-1" role="dialog" aria-labelledby="openLeadModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Acompanhamento do lead</h5>
                    <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <!--end of modal head-->
                <div class="modal-body">
                    <ul class="nav nav-tabs nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#nota" role="tab" aria-controls="nota" aria-selected="true">Anotações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="false">Atividades</a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="nota" role="tabpanel" aria-labelledby="notes-tab" >
                            <div class="content-list">
                                <div class="row content-list-head">
                                    <div class="col-auto">
                                        <h3>Anotações</h3>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" onclick="addNota()" class="btn">Adicionar nota</button>
                                    </div>
                                </div>
                                <!--end of content list head-->
                                <div class="content-list-body" id="notas" data-funil_id="">
                                    <!-- NOTAS -->

                                </div>
                            </div>
                        </div>
                        <!--end of tab-->
                        <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab" data-filter-list="list-group-activity">
                            <div class="content-list">
                                <div class="row content-list-head">
                                    <div class="col-auto">
                                        <h3>Atividades</h3>
                                    </div>
                                    <form class="col-md-auto">
                                        <div class="input-group input-group-round">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">filter_list</i>
                                                </span>
                                            </div>
                                            <input type="search" class="form-control filter-list-input" placeholder="Filtrar atividades" aria-label="Filter activity" aria-describedby="filter-acvitity">
                                        </div>
                                    </form>
                                </div>
                                <!--end of content list head-->
                                <div class="content-list-body">
                                    <ol class="list-group list-group-activity">

                                        <!-- Atividades start -->
                                        <li class="list-group-item  d-none">
                                            <div class="media align-items-center">
                                                <ul class="avatars">
                                                    <li>
                                                        <div class="avatar bg-primary">
                                                            <i class="material-icons">person_add</i>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <img alt="Marcus" src="<?=base_url()?>public/assets/img/avatar-male-1.jpg" class="avatar" data-filter-by="alt" />
                                                    </li>
                                                </ul>
                                                <div class="media-body">
                                                    <div>
                                                        <span class="h6" data-filter-by="text">Marcus</span>
                                                        <span data-filter-by="text">was assigned to the task</span>
                                                    </div>
                                                    <span class="text-small" data-filter-by="text">4 days ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Atividades end -->

                                    </ol>
                                </div>
                            </div>
                            <!--end of content list-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- MODAL CLIENTE END -->


    <!-- MODAL ADD CLIENTE START -->
    <div class="modal modal-task" id="createLeadModal" tabindex="-1" role="dialog" aria-labelledby="createLeadModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar leads</h5>
                    <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <!--end of modal head-->
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="members" role="tabpanel" aria-labelledby="members-tab" data-filter-list="content-list-body">
                            <div class="content-list">
                                <div class="row content-list-head">
                                    <form class="col-md-12">
                                        <div class="input-group input-group-round">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">filter_list</i>
                                                </span>
                                            </div>
                                            <input type="search" class="form-control filter-list-input col-12" placeholder="Procurar lead" aria-label="Procurar lead" aria-describedby="filter-members">
                                        </div>
                                    </form>
                                </div>
                                <!--end of content list head-->
                                <small class="text-primary">Marque todos os leads você deseja adicionar ao funil de upgrades:</small>
                                <div class="content-list-body row" style="overflow-y: auto; max-height: calc(100vh - 300px);">

                                    <?php foreach($leads as $l): ?>
                                        <div class="col-6" id="NEW-LEAD-CARD-<?=$l['lead_id']?>">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                                        <input type="checkbox" class="custom-control-input leadsToCreate" id="NEW-LEAD-<?=$l['lead_id']?>">
                                                        <label data-filter-by="text" class="custom-control-label" for="NEW-LEAD-<?=$l['lead_id']?>"><?=$l['lead_nome']?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                                <button class="btn btn-primary mt-3 float-right" onclick="createLead()">Inserir</button>
                            </div>
                            <!--end of content list-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL ADD CLIENTE END -->

</div>


<script type="text/javascript">
window.onload = initFunil;

function initFunil() {

    let mrKanban = new Draggable.Sortable(document.querySelectorAll('.kanban-col .card-list-body'), {
      //plugins: [SwapAnimation.default],
      draggable: '.card-kanban',
      handle: '.card-kanban',
      appendTo: 'body'
    });
    mrKanban.on('sortable:stop', function(e) {
        $.ajax({
            method: "POST",
            url: "<?=base_url('funil-de-upgrades/change')?>",
            data: {
                <?=$this->security->get_csrf_token_name()?>: "<?=$this->security->get_csrf_hash()?>",
                funil_id: e.data.dragEvent.data.originalSource.id.substr(9),
                funil_etapa: e.newContainer.id.substr(6)
            }
        })
        .done(function(resultado) {
            if(resultado>0){
                Swal.fire({
                    title: 'Que beleza!',
                    html: 'Eu tenho certeza de que esse lead já é nosso :D',
                    type: 'success',
                    confirmButtonText: 'Eu também!'
                })
            }
        });
    });
}

function createLead() {
    //Cria array com clientes adicionados
    let leads = new Array();
    $('.leadsToCreate').each(function()
    {
        if($(this).is(":checked") == true) {
            leads.push(this.id.replace('NEW-LEAD-', ''));
        }
    });

    //evita carregamento de nenhum lead
    if(leads.length===0){
        Swal.fire({
            title: 'Ops, faltou o principal!',
            html: 'Parece que você não selecionou nenhum lead...',
            type: 'info',
            confirmButtonText: 'Vou verificar!'
        })
        return false;
    }

    //envia request com clientes e localidade
    $.ajax({
        method: "POST",
        url: "<?=base_url('funil-de-upgrades/create_card')?>",
        data: {
            <?=$this->security->get_csrf_token_name()?>: "<?=$this->security->get_csrf_hash()?>",
            localidade_id: <?=$this->uri->segment(2) ?>,
            leads: leads
        }
    })

    .done(function(resultado) {
        //Renderiza os clientes adicionados
        $.each(resultado, function(i, result){
            var novoLead = `
                <div class="card card-kanban" id="OLD-LEAD-${result.funil_id}">
                    <div class="card-body">
                        <div class="dropdown card-options"></div>
                            <div class="card-title">
                            <p style="cursor:nw-resize" onclick="openLead(${result.funil_id})">
                                <small class="text-dark">${result.lead_nome}</small>
                            </p>
                        </div>
                    </div>
                </div>
            `;
            $('#NEW-LEAD-CARD-'+result.lead_id).empty().remove();
            $('#ETAPA-1').prepend(novoLead);
            $('#createLeadModal').modal('hide');
        })
        Swal.fire({
            title: 'Você é demais!',
            html: 'Eu fico muito empolgado quando você adiciona novos leads :)',
            type: 'success',
            confirmButtonText: 'Eu também!'
        })
    });
}

function openLead(funil_id) {
    $('#notas').empty();
    $.ajax({
        method: "POST",
        url: "<?=base_url('funil-de-upgrades/read')?>",
        data: {
            <?=$this->security->get_csrf_token_name()?>: "<?=$this->security->get_csrf_hash()?>",
            funil_id: funil_id
        }
    })
    .done(function(resultado) {
        $('#notas').data('funil_id',funil_id)
        //Renderiza os clientes adicionados
        $.each(resultado, function(i, result){
            var nota = `
            <div class="card card-note">
                <div class="card-header">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <h6 class="mb-0" data-filter-by="text">${result.fun_tipo}</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span>${result.created_at}</span>
                    </div>
                </div>
                <div class="card-body" >
                    <p>${result.fun_descricao}</p>
                </div>
            </div>
            `;
            $('#notas').append(nota);
        })
        $('#openLeadModal').modal('show');
    });
}

function addNota() {
    $('#openLeadModal').modal('hide');
    let funil_id = $('#notas').data('funil_id');
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    const titulo = Swal.fire({
      title: 'Adição de notas',
      html:
        `
        <hr>
        <div class="form-group">
            <label class="float-left" for="nota_tipo">Como ocorreu?</label>
            <select class="form-control" id="nota_tipo">
                <option value="Ligação">Via Ligação</option>
                <option value="Facebook">Via Facebook</option>
                <option value="Whatsapp">Via Whatsapp</option>
                <option value="Pessoal">Via Pessoal</option>
                <option value="SMS">Via SMS</option>
                <option value="Atualização">Atualização avulsa</option>
            </select>
            <label class="float-left" for="nota_descricao">Descrição</label>
            <input type="text" class="form-control" id="nota_descricao" style="z-index:999"></input>
        </div>
        `,
      preConfirm: () => {

          let nota_tipo = document.getElementById('nota_tipo').value;
          let nota_descricao = document.getElementById('nota_descricao').value;
          let created_at = new Date().toLocaleString();

          $.ajax({
              method: "POST",
              url: "<?=base_url('funil-de-upgrades/create_nota')?>",
              data: {
                  <?=$this->security->get_csrf_token_name()?>: "<?=$this->security->get_csrf_hash()?>",
                  funil_id: funil_id,
                  fun_tipo: nota_tipo,
                  fun_descricao: nota_descricao
              }
          })
          .done(function(resultado) {
              let nova_nota = `
              <div class="card card-note">
                  <div class="card-header">
                      <div class="media align-items-center">
                          <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">${nota_tipo}</h6>
                          </div>
                      </div>
                      <div class="d-flex align-items-center">
                          <span>${created_at}</span>
                      </div>
                  </div>
                  <div class="card-body" >
                      <p>${nota_descricao}</p>
                  </div>
              </div>
              `;
              $('#notas').append(nova_nota);
              $('#openLeadModal').modal('show');
              Swal.fire(
                  'Ótimo trabalho!',
                  'Nota adicionada, esse lead deve estar satisfeito com o seu trabalho...',
                  'success'
            )

          })


      }
    })


}
</script>
